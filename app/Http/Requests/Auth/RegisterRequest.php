<?php

namespace App\Http\Requests\Auth;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function rules()
    {
        $rules =  [
            'login' => 'required|string|unique:users,login',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|min:4|string',
            'confirm_site_rules' => 'required|in:true,1',
            'confirm_privacy_policy' => 'required|in:true,1',
            'user_type' => 'required|in:' . implode(',',User::DEFAULT_ROLES),
        ];

        if ($this->input('email')) {
            $rules['email'] = 'required|string|email';
        }
        return $rules;
    }
}
