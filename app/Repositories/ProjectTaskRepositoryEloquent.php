<?php

namespace myProject\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use myProject\Entities\ProjectTask;

/**
 * Class ProjectTaskRepositoryEloquent
 * @package namespace myProject\Repositories;
 */
class ProjectTaskRepositoryEloquent extends BaseRepository implements ProjectTaskRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ProjectTask::class;
    }

    /**
     * Boot up the repository, pushing criteria
     *
    public function boot()
    {
        $this->pushCriteria( app(RequestCriteria::class) );
    }
    **/

}