<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CartRequest extends FormRequest
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
            'address' => 'required|max:255',
            'email' => 'required|max:255|email',
            'phone' => 'required|numberic',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên',
            'name.max' => 'Không được vượt quá 255 kí tự',
            'address.required' => 'Vui lòng nhập địa chỉ',
            'address.max' => 'Không được vượt quá 255 kí tự',
            'email.required' => 'Vui lòng nhập email',
            'email.max' => 'Không được vượt quá 255 kí tự',
            'email.email' => 'Email không đúng định dạng',
            'phone.required' => 'Vui lòng nhập số điện thoại',
            'phone.numberic' => 'Số điện thoại không đúng, vui lòng nhập lại',
        ];
    }
}
