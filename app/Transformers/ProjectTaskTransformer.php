<?php

namespace myProject\Transformers;

use League\Fractal\TransformerAbstract;
use myProject\Entities\ProjectTask;

/**
 * Class ProjectTaskTransformer
 * @package namespace myProject\Transformers;
 */
class ProjectTaskTransformer extends TransformerAbstract
{

    /**
     * Transform the \ProjectTask entity
     * @param \ProjectTask $model
     *
     * @return array
     */
    public function transform(ProjectTask $model) {
        return [
            'id'            => $model->id,
            'name'          => $model->name,
            'project_id'    => $model->project_id,
            'start_date'    => $model->start_date,
            'due_date'      => $model->due_date,
            'status'        => $model->status,
        ];
    }
}