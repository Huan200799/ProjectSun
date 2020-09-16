<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormReginsterRequest extends FormRequest
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
    public static function rules()
    {

        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'address' => ['required', 'string', 'string' ],
            'phone' => ['required', 'string', 'max:255' ],
        ];
    }

    public function messages()
    {

        return [
            'name.required' => 'Name is required!',
            'email.required' => 'Email is required!',
            'password.required' => 'Password is required!',
            'address.required' => 'Address is required!',
            'phone.required' => 'Phone is required!',
        ];
    }
}
