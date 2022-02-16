<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserReview extends Model
{
    use HasFactory;

    const PAGINATION_PER_PAGE = 10;
    public function reply()
    {
        return $this->hasOne(self::class, 'parent_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function reviewer()
    {
        return $this->belongsTo(User::class,'reviewer_id','id');
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
}
