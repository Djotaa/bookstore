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
            'tbName'=>'required|string|min:5',
            'tbEmail' => 'required|email|unique:users,email',
            'tbPass' => 'required|string|min:7'
        ];
    }
    public function messages()
    {
        return [
            'tbName.required' => 'Name field is required',
            'tbEmail.required' => 'Email field is required',
            'tbEmail.unique' => 'This email is already taken.',
            'tbEmail.email' => 'Please enter a valid email(example: yourname@gmail.com).',
            'tbPass.required' => 'Password field is required'
        ];
    }
}
