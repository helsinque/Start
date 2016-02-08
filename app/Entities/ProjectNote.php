<?php

namespace myProject\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class ProjectNote
 * @package myProject\Entities
 */
class ProjectNote extends Model implements Transformable
{
    use TransformableTrait;


    /**
     * @var array
     */
    protected $fillable = array(
        'project_id',
        'title',
        'note',
    );

    public function project(){

        return $this->belongsTo(Project::class);
    }
}
