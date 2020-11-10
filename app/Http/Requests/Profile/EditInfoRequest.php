<?php

namespace App\Http\Requests\Profile;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EditInfoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'      => ['required', 'string', 'max:255'],
            'intro'     => ['nullable', 'string', 'max:255'],
            'sex'       => ['nullable', 'string', 'max:6', Rule::In(['Male', 'Female'])],
            'dob'       => ['nullable', 'date', 'max:255', 'before:today'],
            'location'  => ['nullable', 'string', 'max:255'],
            'education' => ['nullable', 'string', 'max:255'],
            'workplace' => ['nullable', 'string', 'max:255'],
        ];
    }

    public function attributes()
    {
        return [
            'name'      => 'Name',
            'intro'     => 'Introduction',
            'sex'       => 'Sex',
            'dob'       => 'Birth Date',
            'location'  => 'Location',
            'education' => 'Education',
            'workplace' => 'Workplace',
        ];
    }
}
