<?php
/**
 * Created by PhpStorm.
 * User: jonphipps
 * Date: 2015-10-28
 * Time: 5:46 PM
 */

namespace App\Transformers;


use App\Entities\Concept;
use League\Fractal\TransformerAbstract;

class ConceptTransformer extends TransformerAbstract
{
    /**
     * Transform the \Concept entity
     * @param Concept $concept
     *
     * @return array
     */
    public function transform(Concept $concept)
    {
        xdebug_break();
        //dd($concept);
        $properties = [];
        foreach ($concept->ConceptProperties as $conceptProperty) {

        }
        $result = [
            'id'         => (int) $concept->id,

            /* place your other model properties here */

            'created_at' => $concept->created_at,
            'updated_at' => $concept->updated_at,
            'properties' => $properties,

        ];

        return $result;
    }

}
