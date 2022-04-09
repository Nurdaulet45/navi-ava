<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $guarded = false;

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function fromContact(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(UserRoleInformation::class, 'id', 'from');
    }

    public function toContactInformation(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(UserRoleInformation::class, 'id', 'to');
    }
}
