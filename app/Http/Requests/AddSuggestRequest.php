<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddSuggestRequest extends FormRequest
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
            'product_name' => 'unique:product,product_name|min:2',
            'description' => 'required|min:6',
            'reason' => 'required|min:6',
        ];
    }
    public function messages()
    {
        return[
            'product_name.unique' => 'Tên sản phẩm đã bị trùng!',
            'product_name.min'=>'Tên phải có ít nhất 2 kí tự',
            'description.min'=>'Miêu tả phải có ít nhất 6 kí tự',
            'reason.min'=>'Góp ý phải có ít nhất 6 kí tự',
            'image.product_img' => 'Chỉ chấp nhận hình thẻ với đuôi .jpg .jpeg .png .gif',
        ];
    }
}
