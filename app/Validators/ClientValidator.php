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

class ClientValidator extends LaravelValidator
{
    /*without interface
     * protected  $rules = array('name'=>'required|max:255', ...);
     * */

    protected  $rules = array(

        ValidatorInterface::RULE_CREATE => array(
            'name'=> 'required|max:255',
            'responsible'=> 'required|max:255',
            'email'=> 'required|email',
            'phone'=> 'required',
            'address'=> 'required'
        ),
        ValidatorInterface::RULE_UPDATE => array(
            'name'=> 'max:255',
            'responsible'=> 'max:255',
            'email'=> 'email',
            'phone'=> 'required',
            'address'=> 'required'
        )

    );


}