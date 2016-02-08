<?php

namespace myProject\Transformers;

use League\Fractal\TransformerAbstract;
use myProject\Entities\ProjectNote;

/**
 * Class ProjectNoteTransformer
 * @package namespace myProject\Transformers;
 */
class ProjectNoteTransformer extends TransformerAbstract
{
    /**
     * Transform the \ProjectNote entity
     * @param \ProjectNote $model
     *
     * @return array
     */
    public function transform(ProjectNote $model) {
        return [
            '_id'        =>$model->id,
            'project_id' =>$model->project_id,
            'title'      =>$model->title,
            'note'       =>$model->note,
        ];
    }
}