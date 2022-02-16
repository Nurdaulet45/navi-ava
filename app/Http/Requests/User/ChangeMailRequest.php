<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class ChangeMailRequest extends FormRequest
{
    public function rules()
    {
        return [
            'email' => 'required|string|email|unique:users,email,' . auth()->user()->id
        ];
    }
}
