<?php

namespace myProject\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Project extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = array(
        'owner_id',
        'client_id',
        'name',
        'description',
        'progress',
        'status',
        'due_date'
    );

    /**
     * Get the codClient record associated with the client.
     */
    public function client()
    {
        return $this->belongsTo('myProject\Entities\Client');
    }

    /**
     * Get the codUser record associated with the user.
     */
    public function user()
    {
        // belongsTo()project  * - 1 user
        // hasMany() 1 - * //
        return $this->belongsTo('myProject\Entities\User');
    }

}
