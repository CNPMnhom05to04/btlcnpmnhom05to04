<?php

namespace App\Http\Requests\Admin\Brands;

use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
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
            'brand_name' => 'required|max:50|min:5',
            'brand_keyword' => 'required',
            'brand_description' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'brand_name.required' => 'Tên khu vực địa chỉ không được để trống',
            'brand_name.max' => 'Tên khu vực địa chỉ không được ngắn hơn 5 kí tự và không được dài hơn 50 kí tự',
            'brand_name.min' => 'Tên khu vực địa chỉ không được ngắn hơn 5 kí tự và không được dài hơn 50 kí tự',
            'brand_keyword.required' => 'Quận không được để trống',
            'brand_description.required' => 'Mô tả không được để trống',
        ];
    }
}
