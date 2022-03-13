<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends \Spatie\Permission\Models\Role
{
    use HasFactory;

    const DEFAULT_ROLES = ['mentor','student', 'consultant', 'paid_consultant', 'paid_mentor'];
    const DEFAULT_ROLE = self::STUDENT_NAME;
    const STUDENT_NAME = 'student';
    const MENTOR_NAME = 'mentor';
    const CONSULTANT_NAME = 'consultant';
    const PAID_CONSULTANT_NAME = 'paid_consultant';
    const PAID_MENTOR_NAME = 'paid_mentor';

    public  function getDefaultUserRoles(): \Illuminate\Support\Collection
    {
        return $this->query()->whereIn('id',[1])->pluck('id');
    }
}
