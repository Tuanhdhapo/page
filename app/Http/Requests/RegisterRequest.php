<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'min:4 ', 'max:255'],
            'email_user' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password_register' => ['required', 'string', 'min:8'],
            'password_confirmation' => ['required', 'same:password_register']
        ];
    }

    public function messages()
    {
        return [
            'password_register.required' => "The password field is not required.",
            'password_confirmation.same' => "The confirm password does not match.",
        ];
    }
}
