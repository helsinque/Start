<?php

namespace myProject\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class ProjectTask extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = array(
        'id',
        'name',
        'project_id',
        'start_date',
        'due_date',
        'status',
        'created_at',
        'updated_at'
    );

    public function project(){

        return $this->belongsTo(Project::class);
    }

}
