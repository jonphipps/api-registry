<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\ElementSet;

/**
 * Class ElementSetTransformer
 * @package namespace App\Transformers;
 */
class ElementSetTransformer extends TransformerAbstract
{

    /**
     * Transform the \ElementSet entity
     * @param \ElementSet $model
     *
     * @return array
     */
    public function transform(ElementSet $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
