<?php namespace App\Libraries\Repositories;

use App\Models\Concept;
use App\Models\ConceptProperty;
use App\Models\ProfileProperty;
use Prettus\Repositories\Eloquent\Repository;
use Schema;
use Symfony\Component\HttpKernel\Exception\HttpException;

class ConceptRepository extends Repository
{

    /**
    * Configure the Model
    *
    **/
    public function model()
    {
      return 'App\Models\Concept';
    }

    /**
     * @param $input
     * @return array
     */
    public function search($input)
    {
        $query = Concept::query();

        $columns = Schema::getColumnListing('concepts');
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

    /**
     * @param integer $id
     * @return Concept
     *
     * @throws HttpException
     */
    public function apiFindOrFail($id)
    {
        /** @var \App\Models\Concept $model */
        $model = $this->model->with('ConceptProperties.ProfileProperty')->find($id);

        if(empty($model))
        {
            throw new HttpException(1001, "Concept not found");
        }

        //$propertyRepo = new \App\Libraries\Repositories\ConceptPropertyRepository();
        //$properties = $model->ConceptProperties()->get();
        //$properties = $model::with('ConceptProperties.ProfileProperty')->get();
        //$properties = ConceptProperty::join('profile_property', 'profile_property.skos_id', '=', 'reg_concept_property.skos_property_id')->where('concept_id', $id)->get();
        //$model2 = Concept::with('ConceptProperty')->get($id);

        return $model;
    }

    /**
     * @param $id
     * @return mixed
     *
     * @throws HttpException
     */
    public function apiDeleteOrFail($id)
    {
        $model = $this->find($id);

        if(empty($model))
        {
            throw new HttpException(1001, "Concept not found");
        }

        return $model->delete();
    }
}
