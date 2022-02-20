<?php

namespace App\Http\Requests\Auth;

use App\Models\Role;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function rules()
    {
        $rules =  [
            'email' => 'required|string|unique:users,email',
            'password' => 'required|min:4',
            'password_confirmation' => 'required|min:4|same:password',
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required|min:9|unique:users,phone',
            'confirm_site_rules' => 'required|in:true,1',
            'confirm_privacy_policy' => 'required|in:true,1',
            'user_type' => 'required|in:' . implode(',',Role::DEFAULT_ROLES),
        ];

        if ($this->input('email')) {
            $rules['email'] = 'required|string|email';
        }
        return $rules;
    }
}
