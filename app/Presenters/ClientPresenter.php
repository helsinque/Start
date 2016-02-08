<?php

namespace myProject\Presenters;

use Prettus\Repository\Presenter\FractalPresenter;
use myProject\Transformers\ClientTransformer;

/**
 * Class ClientPresenterPresenter
 *
 * @package namespace myProject\Presenters;
 */
class ClientPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ClientTransformer();
    }
}
