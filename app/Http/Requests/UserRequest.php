<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'email' => 'required|max:255|email|unique:users,email,',
            'password' => 'required|min:6',
            'name' => 'required|max:50',
        ];
    }

    public function messages()
    {
        return [
            'email.unique' => 'Email đã tồn tại',
            'email.required' => 'Vui lòng nhập email',
            'email.max' => 'Không được vượt quá 255 kí tự',
            'email.email' => 'Email không đúng định dạng',
            'password.required' => 'Vui lòng nhập password',
            'password.min' => 'Password không được nhỏ hơn 6 kí tự',
            'name.required' => 'Vui lòng nhập tên',
            'name.max' => 'Không được vượt quá 255 kí tự',
        ];
    }
}
