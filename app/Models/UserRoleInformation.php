<?php

namespace App\Models;

use Carbon\CarbonImmutable;
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

    public function checkMyProfileCard($mentorId): bool
    {
        $userInformation = auth()->user()->roleInformation()->first();

        if ($mentorId == $userInformation->id) {
            return true;
        }
        return false;
    }

    public function favorite($favoriteUserId, $favoriteUserRoleName)
    {
        return UserFavorite::query()
            ->where(['favorite_user_id' => $favoriteUserId, 'favorite_user_role_name' => $favoriteUserRoleName])
            ->where(['user_id' => auth()->user()->id, 'user_role_name' => auth()->user()->default_role])->pluck('id')->first();
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function lastMyMessage(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Message::class, 'from', 'id')
            ->orderByDesc('id');
    }

    public function lastMessage(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Message::class, 'to', 'id')
            ->orderByDesc('id');
    }

    public function specializationName()
    {
        return $this->hasOne(Specialization::class, 'id', 'specialization_id')->pluck('name')->first();
    }

    public function visitedSum()
    {
        return UserAccountView::query()->where(['user_id' => auth()->user()->id, 'role_name' => auth()->user()->default_role])->sum('visited');
    }

    public function visitedWeekSum()
    {
        return UserAccountView::query()
            ->where(['user_id' => auth()->user()->id, 'role_name' => auth()->user()->default_role])
            ->whereDate('created_at', '>', CarbonImmutable::now()->startOfWeek())
            ->sum('visited');
    }

    public function certifications($userId, $roleName)
    {
        return UserCertificate::query()->where(['user_id' => $userId, 'role_name' => $roleName])->get();
    }
}
