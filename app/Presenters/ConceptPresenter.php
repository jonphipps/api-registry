<?php

namespace App\Presenters;

use App\Transformers\ConceptTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ConceptPresenter
 *
 * @package namespace App\Presenters;
 */
class ConceptPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ConceptTransformer();
    }
}
