<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'tbEmail' => 'required|email',
            'userMessage' => 'required|string|min:1|max:200'
        ];
    }
    public function messages()
    {
        return [
            'tbName.required' => 'Name field is required',
            'tbEmail.required' => 'Email field is required',
            'userMessage.required' => 'Message field is required',
            'tbEmail.email' => 'Please enter a valid email(example: yourname@gmail.com).',
            'userMessage.max' => 'Please enter a message no longer than 200 characters.',
            'userMessage.min' => "Message field can't be empty"
        ];
    }
}
