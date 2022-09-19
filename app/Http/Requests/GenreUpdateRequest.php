<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GenreUpdateRequest extends FormRequest
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
            'genreName' => 'required|string|min:3'
        ];
    }
    public function messages()
    {
        return [
            'genreName.required' => "Genre name is required.",
            'genreName.string' => "Genre name can only have text.",
            'genreName.min' => "Genre name must have at least 3 characters.",
            'genreName.unique' => "This genre already exists"
        ];
    }
}
