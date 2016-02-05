<?php

namespace myProject\Transformers;

use League\Fractal\TransformerAbstract;
use myProject\Entities\User;


/**
 * Class ProjectTransformerTransformer
 * @package namespace myProject\Transformers;
 */
class ProjectMemberTransformer extends TransformerAbstract
{

    /**
     * Transform the \ProjectTransformer entity
     * @param \ProjectTransformer $model
     *
     * @return array
     */
    public function transform(User  $member) {

        return [
            'member_id' =>$member->id,
            'name' =>$member->name,

        ];
    }
}