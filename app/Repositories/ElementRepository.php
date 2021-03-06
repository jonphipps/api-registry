<?php namespace App\Repositories;

use App\Entities\Element;
use Schema;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;


class ElementRepository extends BaseRepository implements IElementRepository
{

    /**
    * Configure the Model
    *
    **/
    public function model()
    {
      return Element::class;
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
        $query = Element::query();

        $columns = Schema::getColumnListing('elements');
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
        /** @var \App\Entities\Element $model */
        $model = $this->model->with('ElementProperties.ProfileProperty')->find($id);

        if(empty($model))
        {
            throw new HttpException(1001, "Element not found");
        }

        return $model;
    }

    public function apiDeleteOrFail($id)
    {
        $model = $this->find($id);

        if(empty($model))
        {
            throw new HttpException(1001, "Element not found");
        }

        return $model->delete();
    }
}
