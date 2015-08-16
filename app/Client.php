<?php

namespace myProject;

use Illuminate\Database\Eloquent\Model;

class Client extends
{
    protected $fillable =[
        'name',
        'responsible',
        'email',
        'phone',
        'address',
        'obs'

    ];
    //
}
