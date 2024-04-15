<?php

namespace App\Http\Requests\Admin\Products;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
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
            'product_name' => 'required|min:5|max:50',
            'category_id' => 'required',
            'brand_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'product_name.required' => 'Tên chi tiết sân không được để trống',
            'product_name.min' => 'Tên chi tiết sân không được ngắn hơn 5 kí tự và dài hơn 100 kí tự',
            'product_name.max' => 'Tên chi tiết sân không được ngắn hơn 5 kí tự và dài hơn 100 kí tự',
            'category_id.required' => 'Loại chi tiết sân không được để trống',
            'brand_id.required' => 'Thương hiệu chi tiết sân không được để trống',
        ];
    }
}
