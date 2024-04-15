<?php

namespace App\Http\Requests\Admin\Users;

use App\Models\UserModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UserUpdateRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'user_password' => 'min:5|max:20',
        ];
    }

    public function messages()
    {
        return [
            'user_password.min' => 'Mật khẩu phải dài hơn 5 kí tự',
            'user_password.max' => 'Mật khẩu không được dài quá 20 kí tự',
        ];
    }
}
