<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DangNhapRequest extends FormRequest
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
			'tenDangNhap'=>['required'],
			'matKhau'=>['required']
		];
    }

    public function messages()
    {
        return ['tenDangNhap.required'=> 'Bạn cần phải nhập :attribute',
    'matKhau.required'=>'Bạn cần phải nhập :attribute'];
    }

    public function attributes()
    {
        return ['tenDangNhap'=>'tên đăng nhập', 'matKhau'=>'mật khẩu'];
    }
}
