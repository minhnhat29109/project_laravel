<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            're_password' => 'required|same:password',
            'name' => 'required',
            'phone' => 'required|min:10',
            'address' => 'required',

    ];
    }
    public function messages()
    {
        return[
            'email.required' => 'Nhập email',
            'email.email' => 'Nhập đúng email',
            'name.required' => 'Nhập họ tên',

            'email.unique' => 'Email đã tồn tại',
            'password.require' => 'Nhập mật khẩu',
            'password.min' => 'Mật khẩu có ít nhất 6 kí tự',
            're_password.required' => 'Nhập lại mật khẩu',
            're_password.same' => 'Nhập lại sai mật khẩu',
            'phone.required' => 'Nhập số điện thoại',
            'phone.min' => 'Nhập đúng số điện thoại',
            'address.required' => 'Nhập địa chỉ',

        ];
    }
    public function attributes()
    {
        return[
            'password' => 'Mật khẩu',
        ];
    }
}
