<?php

namespace myProject\Entities;

use Illuminate\Database\Eloquent\model;

class Client extends model
{
    protected $fillable = array(
                'name',
                'responsible',
                'email',
                'phone',
                'address',
                'obs'
            );

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
