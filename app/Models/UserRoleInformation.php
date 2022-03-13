<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRoleInformation extends Model
{
    use HasFactory;

    protected $guarded = false;

    public static function checkUserAccountActivated(): bool
    {
        return self::query()->where(['user_id' => auth()->user()->id, 'role_name' => auth()->user()->default_role])
            ->pluck('is_activated')->first();
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function specializationName()
    {
        return $this->hasOne(Specialization::class, 'id', 'specialization_id')->pluck('name')->first();
    }

    public function certifications($userId, $roleName)
    {
        return UserCertificate::query()->where(['user_id' => $userId, 'role_name' => $roleName])->get();
    }
}
