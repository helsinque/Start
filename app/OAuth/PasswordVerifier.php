<?php
/**
 * Created by PhpStorm.
 * User: hel-sys
 * Date: 10-09-2015
 * Time: 23:34
 */

namespace myProject\OAuth;

use Illuminate\Support\Facades\Auth;

class PasswordVerifier
{

    public function verify($username, $password)
    {
        $credentials = [
            'email'    => $username,
            'password' => $password,
        ];

        if (Auth::once($credentials)) {
            return Auth::user()->id;
        }

        return false;
    }
}