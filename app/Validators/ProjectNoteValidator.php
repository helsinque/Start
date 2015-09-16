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

class ProjectNoteValidator extends LaravelValidator
{
    /*without interface
     * protected  $rules = array('name'=>'required|max:255', ...);
     * */

    protected  $rules = array(

        ValidatorInterface::RULE_CREATE => array(
            'project_id'=> 'required|integer',
            'title'=> 'required',
            'note'=> 'required',

        ),
        ValidatorInterface::RULE_UPDATE => array(
            'project_id'=> 'required|integer',
            'title'=> 'required',
            'note'=> 'required',

        )

    );


}