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

class ProjectTaskValidator extends LaravelValidator
{
    /*without interface
     * protected  $rules = array('name'=>'required|max:255', ...);
     * */

    protected  $rules = array(

        ValidatorInterface::RULE_CREATE => array(

            'name'=> 'required',
            'project_id'=> 'required|integer',
            'start_date'=> 'required',
            'due_date'=> 'required',
            'status'=> 'required',

        ),
        ValidatorInterface::RULE_UPDATE => array(

            'name'=> 'required',
            'project_id'=> 'required|integer',
            'start_date'=> 'required',
            'due_date'=> 'required',
            'status'=> 'required',

        )

    );


}