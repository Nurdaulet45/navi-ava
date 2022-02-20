<?php

namespace App\Services;

use App\Models\Role;
use Illuminate\Support\Facades\Session;

class SessionRoleService
{

    public static function textByRole($mentorText, $consultantText, $studentText = '', $defaultText = 'не определен')
    {
        if (self::isMentor()) {
            return $mentorText;
        }
        if (self::isConsultant()) {
            return $consultantText;
        }
        if (self::isStudent()) {
            return $studentText ?: $defaultText;
        }
        return $defaultText;
    }

    public static function isMentor(): bool
    {
        return Session::get('role') == Role::MENTOR_NAME;
    }

    public static function isConsultant(): bool
    {
        return Session::get('role') == Role::CONSULTANT_NAME;
    }

    public static function isStudent(): bool
    {
        return Session::get('role') == Role::STUDENT_NAME;
    }

    public static function getSessionRoleName(): string
    {
        if (self::isStudent()) {
            return 'Студент';
        }
        if (self::isConsultant()) {
            return 'Консультант';
        }
        if (self::isMentor()) {
            return 'Наставник';
        }
        return 'Не определен';
    }

    public static function isSessionHasRole($role)
    {
        return mb_strtolower(self::roleName($role)) == mb_strtolower(self::getSessionRoleName());
    }
    public static function roleName($role): string
    {
        switch ($role) {
            case Role::MENTOR_NAME : {
                return 'Наставник';
            }
            case Role::CONSULTANT_NAME : {
                return 'Консультант';
            }
            case Role::STUDENT_NAME : {
                return 'Студент';
            }
            default: {
                return 'Не определен';
            }
        }
    }
}
