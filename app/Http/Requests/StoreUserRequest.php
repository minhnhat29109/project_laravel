<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'name' => 'required|max:255',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'phone' => 'required|min:10',
            'address' => 'required',
            'role' => 'required',
    ];
    }
    public function messages()
    {
        return[
            'name.required' => 'Nhập tên người dùng',
            'email.required' => 'Nhập email',
            'email.email' => 'Nhập đúng email',
            'password.required' => 'Nhập mật khẩu',
            'phone.required' => 'Nhập số điện thoại',
            'address.required' => 'Nhập địa chỉ',
        ];
    }
    public function attributes()
    {
        return[
            'name' => 'tên',
        ];
    }
}
