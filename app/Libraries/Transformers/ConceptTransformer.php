<?php
/**
 * Created by PhpStorm.
 * User: jonphipps
 * Date: 2015-10-28
 * Time: 5:46 PM
 */

namespace App\Libraries\Transformers;


use App\Models\Concept;
use League\Fractal\TransformerAbstract;

class ConceptTransformer extends TransformerAbstract
{
    public function transform(Concept $concept)
    {
        xdebug_break();
        //dd($concept);
        $properties = [];
        foreach ($concept->ConceptProperties as $conceptProperty) {

        }
        $result = [
            'properties' => $properties,

        ];

        return $result;
    }

}
