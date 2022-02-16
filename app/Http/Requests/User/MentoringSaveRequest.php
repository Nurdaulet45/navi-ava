<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class MentoringSaveRequest extends FormRequest
{
    public function rules()
    {
        $rules = [];
        if ($this->has('is_service_payable')) {
            $rules['service_price'] = 'required|integer|min:100';
        }
        return $rules;
    }
}
