<?php

namespace myProject\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class ProjectFile extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = array(
        'name',
        'description',
        'extension'
    );

    public function project(){

        return $this->belongsTo(Project::class);

    }


}
