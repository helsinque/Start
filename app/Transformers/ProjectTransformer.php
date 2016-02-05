<?php

namespace myProject\Transformers;

use League\Fractal\TransformerAbstract;
use myProject\Entities\Project;


/**
 * Class ProjectTransformerTransformer
 * @package namespace myProject\Transformers;
 */
class ProjectTransformer extends TransformerAbstract
{

    protected  $defaultIncludes = ['members'];
    /**
     * Transform the \ProjectTransformer entity
     * @param \ProjectTransformer $model
     *
     * @return array
     */
    public function transform(Project $project) {

        return [
            'project_id' =>$project->id,
            'client_id' =>$project->client_id,
            'owner_id' =>$project->owner_id,
            'name' =>$project->name,
            'description' =>$project->description,
            'progress' =>$project->progress,
            'status' =>$project->status,
            'due_date' =>$project->due_date,
        ];
    }

    public function  includeMembers(Project $project){

        return $this->collection($project->members, new ProjectMemberTransformer());
    }
}