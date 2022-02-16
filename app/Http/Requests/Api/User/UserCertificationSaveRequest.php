<?php

namespace App\Http\Requests\Api\User;

use Illuminate\Foundation\Http\FormRequest;

class UserCertificationSaveRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'certifications' => 'required|array',
            'certifications.*.name' => 'required|string',
            'certifications.*.description' => 'required|string',
            'certifications.*.image' => 'required',
        ];
    }
}
