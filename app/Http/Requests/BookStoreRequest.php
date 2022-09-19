<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookStoreRequest extends FormRequest
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
            'title'=>'required|string|min:4',
            'author1'=>'required|string|min:4',
            'author2'=>'nullable|string|min:4',
            'description'=>'required|string|min:10',
            'image'=>'required|image|max:2048',
            'genreId'=>'required|exists:genres,id',
            'price'=>'required|numeric',
            'publishYear'=>'required|numeric'
        ];
    }
    public function messages()
    {
        return [
          'title.required'=>'Title field is required',
          'author1.required'=>'Author field is required',
          'description.required'=>'Description field is required',
          'image.required'=>'The image is required',
          'title.string'=>'Title field can contain only text',
          'author1.string'=>'Author field can contain only text',
          'author2.string'=>'Author field can contain only text',
          'author1.min'=>'Author must have at least 4 characters',
          'author2.min'=>'Author must have at least 4 characters',
          'image.image'=>'Uploaded file must be an image',
          'image.max'=>'The image must be under 2MB',
          'genreId.required'=>'Genre is required',
          'price.required'=>'Price is required',
          'publishYear.required'=>'Publication year is required',
          'price.numeric'=>'Price must be a number',
          'publishYear.numeric'=>'Publication year must be a number',
        ];
    }
}
