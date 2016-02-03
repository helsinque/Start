<?php

namespace myProject\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use myProject\Entities\Project;

/**
 * Class ProjectRepositoryEloquent
 * @package namespace myProject\Repositories;
 */
class ProjectRepositoryEloquent extends BaseRepository implements ProjectRepository
{

    protected $relationships = array('user','client','members');

    /**
     * @return array
     */
    public function getRelations()
    {
        return $this->relationships;

    }
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Project::class;
    }

    public function isOwner($projectId, $userId){

        if(count($this->findWhere(['id'=>$projectId, 'owner_id'=> $userId])) ==0)
            return false;
        return true;

    }

}