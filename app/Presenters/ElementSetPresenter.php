<?php

namespace App\Presenters;

use App\Transformers\ElementSetTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ElementSetPresenter
 *
 * @package namespace App\Presenters;
 */
class ElementSetPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ElementSetTransformer();
    }
}
