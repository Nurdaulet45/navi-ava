<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Type;

class UserReview extends Model
{
    use HasFactory;

    const PAGINATION_PER_PAGE = 10;

    protected $guarded = false;

    public function reply(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(self::class, 'parent_id');
    }

    public function userRoleInformation(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(UserRoleInformation::class, 'id', 'user_id');
    }

    public function parentReviews(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(self::class, 'parent_id', 'id')->orderByDesc('id');
    }

    public function checkParentReview(): ?\Illuminate\Database\Eloquent\Relations\HasOne
    {
        if (auth()->check()){
            $userInformation = auth()->user()->roleInformation()->first() ;

            return $this->hasOne(self::class, 'parent_id', 'id')
                ->where(['user_id' => ($userInformation->id)]);
        }
        return null;
    }

    public function reviewer(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'reviewer_id', 'id');
    }

    public function scopeUserBy($query, $userId)
    {
        return $query->where('user_id', $userId);
    }

    public function scopeAllReviewsUserBy($query, $userId)
    {
        return $query->where('user_id', $userId)->orWhere('reviewer_id', $userId);
    }

    public function scopeReviewerBy($query, $reviewerId)
    {
        return $query->where('reviewer_id', $reviewerId);
    }

    public function dateFormat($typeLanguage = 'ru'): string
    {
        if ($typeLanguage == 'kk') {
            return Carbon::parse($this->created_at)->locale($typeLanguage)->translatedFormat('j F, Y');
        }
        return Carbon::parse($this->created_at)->locale($typeLanguage)->translatedFormat('j F, Y');
    }
}
