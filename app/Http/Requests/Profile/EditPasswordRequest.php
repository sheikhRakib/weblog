<?php

namespace App\Http\Requests\Profile;

use Illuminate\Foundation\Http\FormRequest;
use Laravel\Fortify\Rules\Password;

class EditPasswordRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'old-password' => ['required', 'string'],
            'password'     => ['required', 'string', (new Password)->length(5), 'confirmed'],
        ];
    }

    public function attributes()
    {
        return [
            'old-password' => 'Old Password',
            'password'     => 'New Password',
        ];
    }
}
