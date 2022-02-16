<?php

namespace App\Services;

class UserService
{
    public static function getFirstNameAndLetterLastName($user)
    {
        return $user->first_name
            ? $user->first_name . ($user->last_name ? ' ' . substr($user->last_name, 0, 1) : '')
            : $user->email;
    }

}
