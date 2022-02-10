<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function rules()
    {
        $rules =  [
            'login' => 'required|string|unique:users,login',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|min:4|string|confirmed',
            'password_confirmation' => 'required|string|min:4|max:191|same:password',
            'confirm_policy' => 'required|in:true,1',
        ];

        if ($this->input('email')) {
//            $rules['phone'] = 'required|string|min:18|max:18';
            $rules['email'] = 'required|string|email';
        }
        return $rules;
    }
}
