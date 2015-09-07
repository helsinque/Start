<?php
/**
 * Created by PhpStorm.
 * User: hel-sys
 * Date: 24-08-2015
 * Time: 22:11
 */

namespace myProject\Validators;


use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\LaravelValidator;

class ProjectValidator extends LaravelValidator
{
    /*without interface
     * protected  $rules = array('name'=>'required|max:255', ...);
     * */

    protected  $rules = array(

        ValidatorInterface::RULE_CREATE => array(
            'owner_id'=> 'required|max:255',
            'client_id'=> 'required|max:255',
            'name'=> 'required|email',
            'description'=> 'required',
            'due_date'=> 'required',
            'progress'=> 'required',
            'status'=> 'required',
        ),
        ValidatorInterface::RULE_UPDATE => array(
            'owner_id'=> 'required|max:255',
            'client_id'=> 'required|max:255',
            'name'=> 'required|email',
            'description'=> 'required',
            'due_date'=> 'required',
            'progress'=> 'required',
            'status'=> 'required',
        )

    );


}