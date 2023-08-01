<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateNewsRequest extends FormRequest
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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'author' => 'string',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'pdf' => 'mimes:pdf',
            'text' => 'required|string',
            'tags' => 'string',
            'status' => 'required|string'
        ];
    }
}
