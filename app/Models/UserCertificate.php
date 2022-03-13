<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class UserCertificate extends Model
{
    use HasFactory;

    const IMAGE_PATH = 'images/certifications/';

    protected $fillable = ['role_name', 'name', 'description', 'image'];

    public function scopeUserBy($query, $userId, $userRoleName)
    {
        return $query->where(['user_id' => $userId, 'role_name' => $userRoleName]);
    }

    public function getCertificateImageAttribute(): string
    {
        return $this->image ? Storage::url(self::IMAGE_PATH . $this->image) : '';
    }

}
