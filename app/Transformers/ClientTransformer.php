<?php

namespace myProject\Transformers;

use League\Fractal\TransformerAbstract;
use myProject\Entities\Client;

/**
 * Class ClientPresenterTransformer
 * @package namespace myProject\Transformers;
 */
class ClientTransformer extends TransformerAbstract
{

    /**
     * Transform the \ClientPresenter entity
     * @param \Client $model
     *
     * @return array
     */
    public function transform(Client $model) {
        return [
            'id'         => (int)$model->id,
            'name'      => $model->name,
            'responsible' => $model->resposible,
            'email'     => $model->email,
            'phone'     => $model->phone,
            'address'   => $model->address,
            'obs'       => $model->obs,
        ];
    }
}