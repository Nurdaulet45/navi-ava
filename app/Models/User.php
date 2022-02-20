<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes,
        HasRoles;

    const LANGUAGES = ['ru', 'kk', 'en'];
    const DEFAULT_LANG = 'ru';
    const DEFAULT_ROLES = ['consultant', 'mentor', 'student'];
    const DEFAULT_GENDER = 'male';
    const DEFAULT_ROLE = 'male';
    const IMAGE_PATH = 'images/users/';
    const DEFAULT_FEMALE_IMAGE = '/images/user-review-female.png';
    const DEFAULT_MALE_IMAGE = '/images/user-review-male.png';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'phone',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    public function scopeEmailBy($query, $email)
    {
        return $query->where('email', $email);
    }

    public function scopeLeftJoinCountryName($query)
    {
        return $query->leftJoin('countries', 'countries.id', 'users.country_id')
            ->selectRaw('users.*,countries.name as country_name');
    }

    public function getFirstNameAndLetterLastNameCustomAttribute()
    {
        return $this->first_name ? $this->first_name . ($this->last_name ? ' ' . substr($this->last_name, 0, 1) : '') : __('site.Not filled');
    }

    public function getCountryAddressCustomAttribute()
    {
        return $this->address ? $this->address . ($this->country_name ? ', ' . $this->country_name : '') : __('site.Not filled');
    }

    public function getAgeCustomAttribute()
    {
        return $this->birthday ? Carbon::parse($this->birthday)->diff(Carbon::now())->y : '';
    }

    public function getSpecializationTextCustomAttribute()
    {
        return $this->specialization_text ? Str::ucfirst($this->specialization_text) : __('site.Not filled');
    }
    public function getAvatarImageAttribute()
    {
        return $this->avatar ? 'storage/' .User::IMAGE_PATH . $this->avatar : 'images/user-icon.png';
    }

    protected $casts = [
        'skills' => 'array',
        'gender' => 'boolean',
        'is_accept_students' => 'boolean',
        'is_service_payable' => 'boolean',
        'is_mail_notification_enabled' => 'boolean',
        'is_phone_notification_enabled' => 'boolean',
        'is_email_confirmed' => 'boolean',
    ];
}
