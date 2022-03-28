<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserFavorite extends Model
{
    use HasFactory;

    protected $guarded = false;

    public function user(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(User::class, 'id', 'favorite_user_id');
    }

    public function specializationName()
    {
        return $this->hasOne(Specialization::class, 'id', 'specialization_id')->pluck('name')->first();
    }

    public function favorite($favoriteUserId, $favoriteUserRoleName)
    {
        return $this->query()->where(['favorite_user_id' => $favoriteUserId, 'favorite_user_role_name' => $favoriteUserRoleName])
            ->where(['user_id' => auth()->user()->id, 'user_role_name' => auth()->user()->default_role])->pluck('id')->first();
    }
}
