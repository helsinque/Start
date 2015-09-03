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

    protected $relationships = array('user','client');

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




}