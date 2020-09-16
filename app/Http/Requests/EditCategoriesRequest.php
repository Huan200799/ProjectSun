<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditCategoriesRequest extends FormRequest
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
            'categories_name' => 'required|max:255|min:2',
        ];
    }
    public function messages()
    {
        return[
            'categories_name.max' => 'Tên quá số lượng ký tự quy định!',
            'categories_name.min' => 'Tên quá ngắn so với quy định!'
        ];
    }
}
