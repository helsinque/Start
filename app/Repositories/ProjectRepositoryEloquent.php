<?php

namespace myProject\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use myProject\Entities\Project;
use myProject\Presenters\ProjectPresenter;


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

        $this->skipPresenter(true);
        if(count($this->findWhere(['id'=>$projectId, 'owner_id'=> $userId])) ==0)
            return false;

        $this->skipPresenter(false);
        return true;

    }


    public function hasMember($project_id , $member_id){

        $this->skipPresenter(true);

        $project = $this->find($project_id);

        foreach($project->members as $member){
            if($member->id == $member_id){

                $this->skipPresenter(false);
                return true;
            }
        }
        return false;
    }

    public  function presenter(){

        return ProjectPresenter::class;
    }



}