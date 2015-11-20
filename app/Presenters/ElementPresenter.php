<?php

namespace App\Presenters;

use App\Transformers\ElementTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ElementPresenter
 *
 * @package namespace App\Presenters;
 */
class ElementPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ElementTransformer();
    }
}
