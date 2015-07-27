<?php
/**
 * Created by PhpStorm.
 * User: Guga
 * Date: 27/07/2015
 * Time: 11:48
 */

namespace CrmResult\Validators;


use Prettus\Validator\LaravelValidator;

class UserValidator extends LaravelValidator {

    protected $rules = [
        'full_name' => 'required|max:150',
        'login' => 'required|max:50',
        'password' => 'required'
    ];

}