<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class AboutMeRequest extends FormRequest
{

    public function rules()
    {
        $rules = [];
        if ($this->input('phone')) {
            $rules['phone'] = 'min:18|max:18|unique:users,login,' . auth()->user()->id;
        }
        return $rules;
    }
}
