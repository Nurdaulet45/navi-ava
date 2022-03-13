<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class AboutMeRequest extends FormRequest
{

    public function rules()
    {
        $rules = [];
        if ($this->input('phone')) {
            $rules['phone'] = 'unique:users,phone,' . auth()->user()->id;
        }
        return $rules;
    }
}
