<?php

namespace myProject\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use myProject\Entities\ProjectNote;
use myProject\Presenters\ProjectNotePresenter;

/**
 * Class ProjectNoteRepositoryEloquent
 * @package namespace myProject\Repositories;
 */
class ProjectNoteRepositoryEloquent extends BaseRepository implements ProjectNoteRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ProjectNote::class;
    }

    function  presenter()
    {
        return ProjectNotePresenter::class;
    }

}