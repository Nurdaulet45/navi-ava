<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'password' => 'required',
            'new_password' => 'required|string|min:4',
            'new_password_confirmation' => 'required|string|min:4|same:new_password',
//            'password' => 'required|str/*ing',
//            'password_confirmation' => */'required|string|min:4',
        ];
    }
}
