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
    const DEFAULT_ROLES = ['consultant', 'mentor', 'student', 'paid_consultant', 'paid_mentor'];
    const DEFAULT_GENDER = 'male';
    const DEFAULT_ROLE = 'male';
    const IMAGE_PATH = 'images/users/';
    const DEFAULT_FEMALE_IMAGE = '/images/user-images/avatar-female.svg';
    const DEFAULT_MALE_IMAGE = '/images/user-images/avatar-male.svg';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'login',
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

    public function roleInformation(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(UserRoleInformation::class, 'user_id', 'id')->where('role_name', $this->default_role);
    }

    public function roleCertificatesProcent(): int
    {
        $certificatesCount = $this->hasMany(UserCertificate::class, 'user_id', 'id')->where('role_name', $this->default_role)->count();
        return intval((100 * (($certificatesCount >= 1) ? 1 : $certificatesCount)) / (1));
    }

    public function roleSpecializationsProcent(): int
    {
        $specializationsItems = $this->hasOne(UserRoleInformation::class, 'user_id', 'id')
            ->select(['skills', 'specialization_id', 'specialization_text'])
            ->where('role_name', $this->default_role)
            ->first()->toArray();

        $specializationsNotNullCount = count(array_filter($specializationsItems, function ($value) {
            return ($value != null && $value != "[]");
        }));

        return intval((100 * $specializationsNotNullCount) / (count($specializationsItems)));
    }

    public function roleAboutProcent(): int
    {
        $aboutItems = $this->hasOne(UserRoleInformation::class, 'user_id', 'id')
            ->select(['about_me', 'skills_description'])
            ->where('role_name', $this->default_role)
            ->first()->toArray();

        $userAboutItems = $this->query()->select(['country_id', 'address'])->first()->toArray();

        $aboutItemsArray = array_merge($aboutItems, $userAboutItems);

        $aboutNotNullCount = count(array_filter($aboutItemsArray, function ($value) {
            return ($value != null);
        }));

        return intval((100 * $aboutNotNullCount) / (count($aboutItemsArray)));
    }

    public function roleFullInformationProcent()
    {
        return intval(($this->roleCertificatesProcent() + $this->roleSpecializationsProcent() + $this->roleAboutProcent()) / (3));
    }

    public function getFirstNameAndLetterLastNameCustomAttribute()
    {
        return $this->first_name ? $this->first_name . ($this->last_name ? ' ' . mb_substr($this->last_name, 0, 1) : '') : __('site.Not filled');
    }

    public function getLastNameAndFirstName()
    {
        return "$this->last_name $this->first_name";
    }

    public function getCountryAddressCustomAttribute()
    {
        return $this->address ? $this->address . ($this->country_id ? ', ' . $this->hasOne(Country::class, 'id', 'country_id')->pluck('name')->first() : '') : __('site.Not filled');
    }

    public function getCountryAddress()
    {
        return $this->address ? $this->address . ($this->country_name ? ', ' . $this->country_name : '') : __('site.Not filled');
    }

    public function getAgeCustomAttribute()
    {
        return $this->birthday ? Carbon::parse($this->birthday)->diff(Carbon::now())->y : '';
    }

    public function getLoginCustomAttribute()
    {
        return $this->login ?: '';
    }

    public function getSpecializationTextCustomAttribute()
    {
        return $this->specialization_text ? Str::ucfirst($this->specialization_text) : __('site.Not filled');
    }

    public function getAvatarImageAttribute(): string
    {
        return $this->avatar ? Storage::url(self::IMAGE_PATH . $this->avatar) : self::DEFAULT_MALE_IMAGE;
    }

    public function messages(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Message::class);
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
