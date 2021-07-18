<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email' => 'required|email',
            'password' => 'required|min:6'
    ];
    }
    public function messages()
    {
        return[
            'email.required' => 'Nhập email',
            'email.email' => 'Nhập đúng email',
            'password.require' => 'Nhập mật khẩu',
            'password.min' => 'Mật khẩu có ít nhất 6 kí tự',
        ];
    }
    public function attributes()
    {
        return[
            'password' => 'Mật khẩu',
        ];
    }
}
