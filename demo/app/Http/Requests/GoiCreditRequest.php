<?php

namespace App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class GoiCreditRequest extends FormRequest
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
        return
        [
            'ten_goi'=>'bail|required|unique:goi_credit,ten_goi',
            'credit'=>'bail|required',
            'so_tien'=>'bail|required',
        ];
       
    }
     public function messages()
    {
       return [
            'ten_goi.required'=>"Tên gói không được để trống",
            'ten_goi.unique'=>'Gói credit đã tồn tại',
            'credit.required'=>'Số credit không được để trống',
            'so_tien.required'=>'Số tiền không được để trống'
        ];
    }
}
