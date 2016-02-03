<?php

namespace myProject\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use myProject\Entities\ProjectectMembers;

/**
 * Class PtojectMembersRepositoryEloquent
 * @package namespace myProject\Repositories;
 */
class PtojectMembersRepositoryEloquent extends BaseRepository implements PtojectMembersRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ProjectMembers::class;
    }

    public function isMember($projectId, $memberId){

        if(count($this->findWhere(['id'=>$projectId, 'member_id'=> $memberId])) ==0)
            return false;
        return true;

    }


    /**
     * Boot up the repository, pushing criteria
    public function boot()
    {
        $this->pushCriteria( app(RequestCriteria::class) );
    }
     *
     */
}