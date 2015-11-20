<?php namespace App\Repositories;

use App\Entities\ElementProperty;
use Schema;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Contracts\RepositoryInterface;


class ElementPropertyRepository extends BaseRepository implements IElementPropertyRepository
{

    /**
    * Configure the Model
    *
    **/
    public function model()
    {
      return ElementProperty::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function search($input, $getResults = true)
    {
        $query = ElementProperty::query();

        $columns = Schema::getColumnListing('elementProperties');
        $attributes = array();

        foreach($columns as $attribute)
        {
            if(isset($input[$attribute]) and !empty($input[$attribute]))
            {
                $query->where($attribute, $input[$attribute]);
                $attributes[$attribute] = $input[$attribute];
            }
            else
            {
                $attributes[$attribute] =  null;
            }
        }

        if ($getResults)
            return [$query->get(), $attributes];
        else
            return $query;
    }

    public function apiFindOrFail($id)
    {
        $model = $this->find($id);

        if(empty($model))
        {
            throw new HttpException(1001, "ElementProperty not found");
        }

        return $model;
    }

    public function apiDeleteOrFail($id)
    {
        $model = $this->find($id);

        if(empty($model))
        {
            throw new HttpException(1001, "ElementProperty not found");
        }

        return $model->delete();
    }
}
