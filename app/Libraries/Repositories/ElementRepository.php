<?php namespace App\Libraries\Repositories;

use App\Models\Element;
use Bosnadev\Repositories\Eloquent\Repository;
use Schema;
use Symfony\Component\HttpKernel\Exception\HttpException;

class ElementRepository extends Repository
{

    /**
    * Configure the Model
    *
    **/
    public function model()
    {
      return 'App\Models\Element';
    }

	public function search($input)
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

        return [$query->get(), $attributes];
    }

    public function apiFindOrFail($id)
    {
        /** @var \App\Models\Element $model */
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
