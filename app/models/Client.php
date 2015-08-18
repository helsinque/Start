<?php

namespace myProject\models;

use Illuminate\Database\Eloquent\model;

class Client extends model
{
    protected $client =[
        'name',
        'responsible',
        'email',
        'phone',
        'address',
        'obs'
    ];
    
}