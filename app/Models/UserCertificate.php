<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCertificate extends Model
{
    use HasFactory;

    const IMAGE_PATH = 'images/certifications/';

    protected $fillable = ['name', 'description', 'image'];

    public function scopeUserBy($query, $userId)
    {
        return $query->where('user_id', $userId);
    }
}
