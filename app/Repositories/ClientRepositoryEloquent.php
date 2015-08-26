<?php
/**
 * Created by PhpStorm.
 * User: hel-sys
 * Date: 17-08-2015
 * Time: 23:46
 */

namespace myProject\Repositories;


use myProject\Entities\Client;
use Prettus\Repository\Eloquent\BaseRepository;

class ClientRepositoryEloquent  extends  BaseRepository implements ClientRepository
{
    public  function model(){

        return Client::class;

    }

}