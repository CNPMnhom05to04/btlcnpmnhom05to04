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
            'brand_name' => 'required|max:50',
            'brand_keyword' => 'required',
            'brand_description' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'brand_name.required' => 'Tên khối lượng không được để trống',
            'brand_name.max' => 'Tên khối lượng không được không được dài hơn 50 kí tự',
            'brand_keyword.required' => 'Từ khóa khối lượng không được để trống',
            'brand_description.required' => 'Mô tả khối lượng không được để trống',
        ];
    }
}
