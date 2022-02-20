<?php

namespace App\Services;

use Illuminate\Support\Facades\Session;

class AcceptByUserRole
{

    public static function isDeniedAndRedirectHasRole($role, $redirectRoute = 'index')
    {
        if (is_array($role)) {
            if (in_array(Session::get('role'), $role)) {
                return redirect()->route($redirectRoute)->send();
            }
        } else {
            if (Session::get('role') == $role) {
                return redirect()->route($redirectRoute)->send();
            }
        }
    }

    public static function isDeniedHasRole($role): bool
    {
        if (is_array($role)) {
            return in_array(Session::get('role'), $role);
        }
        return Session::get('role') == $role;
    }
}
