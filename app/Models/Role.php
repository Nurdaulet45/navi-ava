<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends \Spatie\Permission\Models\Role
{
    use HasFactory;
    const DEFAULT_ROLES = ['mentor', 'student', 'consultant'];
    const DEFAULT_ROLE = self::STUDENT_NAME;
    const STUDENT_NAME = 'student';
    const MENTOR_NAME = 'mentor';
    const CONSULTANT_NAME = 'consultant';
}
