<?php

namespace App\Http\Requests\Profile;

use Illuminate\Foundation\Http\FormRequest;

class EditEmailRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'old-email' => ['required', 'string', 'email', 'max:255'],
            'email'     => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'  => ['required', 'string'],
        ];
    }

    public function attributes()
    {
        return [
            'old-email' => 'Old Email',
            'email'     => 'New Email',
            'password'  => 'Password',
        ];
    }
}
