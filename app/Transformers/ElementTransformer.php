<?php
/**
 * Created by PhpStorm.
 * User: jonphipps
 * Date: 2015-11-02
 * Time: 12:10 PM
 */

namespace App\Transformers;


use App\Entities\Element;
use League\Fractal\TransformerAbstract;

/**
 * Class ElementTransformer
 * @package namespace App\Transformers;
 */
class ElementTransformer extends TransformerAbstract
{

    /**
     * Transform the \Element entity
     * @param Element $model
     *
     * @return array
     */
    public function transform(Element $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
