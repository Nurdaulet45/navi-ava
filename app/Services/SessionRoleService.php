<?php

namespace App\Services;

use App\Models\Role;
use Illuminate\Support\Facades\Session;

class SessionRoleService
{
    public static function textByRole($mentorText, $consultantText, $studentText, $defaultText = 'не определен')
    {
        if (self::isMentor()) {
            return $mentorText;
        }
        if (self::isPaidMentor()) {
            return $mentorText;
        }
        if (self::isConsultant()) {
            return $consultantText;
        }
        if (self::isPaidConsultant()) {
            return $consultantText;
        }
        if (self::isStudent()) {
            return $studentText;
        }
        return $defaultText;
    }

    public static function textUserRoleStatus($userStatus): string
    {
        if (self::isMentor() || self::isPaidMentor()) {
            return $userStatus ? 'Принимаю учеников' : 'Не принимаю учеников';
        }
        if (self::isConsultant() || self::isPaidConsultant()) {
            return $userStatus ? 'Консультирую' : 'Не консультирую';
        }
        return $userStatus ? 'Готов к обучению' : 'Не готов к обучению';
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

    public static function isPaidConsultant(): bool
    {
        return Session::get('role') == Role::PAID_CONSULTANT_NAME;
    }

    public static function isPaidMentor(): bool
    {
        return Session::get('role') == Role::PAID_MENTOR_NAME;
    }

    public static function getSessionRoleName(): string
    {
        if (self::isStudent()) {
            return 'Ученик';
        }
        if (self::isConsultant()) {
            return 'Консультант';
        }
        if (self::isMentor()) {
            return 'Наставник';
        }
        if (self::isPaidMentor()) {
            return 'Платный наставник';
        }
        if (self::isPaidConsultant()) {
            return 'Платный консультант';
        }
        return 'Не определен';
    }

    public static function isSessionHasRole($role): bool
    {
        return mb_strtolower(self::roleName($role)) == mb_strtolower(self::getSessionRoleName());
    }

    public static function roleName($role): string
    {
        switch ($role) {
            case Role::MENTOR_NAME:
                return 'Наставник';
            case Role::PAID_MENTOR_NAME:
                return 'Платный наставник';
            case Role::CONSULTANT_NAME :
                return 'Консультант';
            case Role::PAID_CONSULTANT_NAME:
                return 'Платный консультант';
            case Role::STUDENT_NAME:
                return 'Ученик';
            default:
                return 'Не определен';
        }
    }

    public static function roleNameRoute($roleName): string
    {
        switch ($roleName) {
            case ($roleName == 'mentor' || $roleName == 'paid_mentor'):
                return 'mentors.mentor';
            case ($roleName == 'consultant' || $roleName == 'paid_consultant'):
                return 'consultants.consultant';
            default:
                return 'students.student';
        }
    }
}
