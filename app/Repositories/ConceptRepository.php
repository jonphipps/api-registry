<?php namespace App\Repositories;

use App\Entities\Concept;
use App\Entities\ConceptProperty;
use App\Entities\ProfileProperty;
use Schema;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;


class ConceptRepository extends BaseRepository implements IConceptRepository
{

    /**
    * Configure the Model
    *
    **/
    public function model()
    {
      return Concept::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    /**
     * @param $input
     * @return array
     */
    public function search($input, $getResults = true)
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

        if ($getResults)
            return [$query->get(), $attributes];
        else
            return $query;
    }

    /**
     * @param integer $id
     * @return Concept
     *
     * @throws HttpException
     */
    public function apiFindOrFail($id)
    {
        /** @var \App\Entities\Concept $model */
        $model = $this->model->with('Properties.ProfileProperty')->find($id);

        if(empty($model))
        {
            throw new HttpException(1001, "Concept not found");
        }

        //$propertyRepo = new \App\Repositories\ConceptPropertyRepository();
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
