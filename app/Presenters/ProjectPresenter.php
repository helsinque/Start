<?php

namespace myProject\Presenters;

use Prettus\Repository\Presenter\FractalPresenter;
use myProject\Transformers\ProjectTransformer;

/**
 * Class ProjectPresenterPresenter
 *
 * @package namespace myProject\Presenters;
 */
class ProjectPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ProjectTransformer();
    }
}
