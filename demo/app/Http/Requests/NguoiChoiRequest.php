<?php

namespace App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class NguoiChoiRequest extends FormRequest
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
            'ten_dang_nhap'=>'bail|required|min:6|max:25|unique:nguoi_choi,ten_dang_nhap',
            'mat_khau'=>'bail|required|',
            'xac_nhan_mat_khau'=>'bail|same:mat_khau',
            'email'=>'bail|required|email|unique:nguoi_choi,email',
        ];
    }
     public function messages()
    {
        return[
            'ten_dang_nhap.required'=>'Tên đăng nhập không được để trống',
            'ten_dang_nhap.min'=>"Tên đăng nhập phải có tối thiểu 6 kí tự",
            'ten_dang_nhap.max'=>"Tên đăng nhập tối đa 25 kí tự",
            'ten_dang_nhap.unique'=>"Tên đăng nhập đã tồn tại",

            'mat_khau.required'=>"Mật khẩu không được để trống",

            'xac_nhan_mat_khau.same'=>"Mật khẩu không khớp",
            'email.required'=>"Email không được bỏ trống",
            'email.email'=>"email không đúng định dạng",
            'email.unique'=>"email đã tồn tại"
        ];
    }

}
