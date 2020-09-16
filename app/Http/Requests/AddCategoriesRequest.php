<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddCategoriesRequest extends FormRequest
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
            //
            'categories_name' => 'unique:categories,categories_name'
        ];
    }
    public function messages()
    {
        return[
            'categories_name.unique' => 'Tên danh mục đã bị trùng!'
        ];
    }
}

