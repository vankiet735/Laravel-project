<?php

namespace App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CauHoiRequest extends FormRequest
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
        'noi_dung'=>'bail|required|unique:cau_hoi,noi_dung',
        'phuong_an_a'=>'bail|required|different:phuong_an_b,phuong_an_c,phuong_an_d',
        'phuong_an_b'=>'bail|required|different:phuong_an_a,phuong_an_c,phuong_an_d',
        'phuong_an_c'=>'bail|required|different:phuong_an_a,phuong_an_b,phuong_an_d',
        'phuong_an_d'=>'bail|required|different:phuong_an_a,phuong_an_c,phuong_an_b',
      ];

    }
    

    public function messages()
    {
      return [
        'noi_dung.required'=>'Câu hỏi không được để trống',
        'noi_dung.unique'=>'Câu hỏi đã tồn tại',
        'phuong_an_a.required'=>'Đáp án A không được để trống',
        'phuong_an_a.different'=>'Đáp án A đã bị trùng',
        'phuong_an_b.required'=>'Đáp án B không được để trống',
        'phuong_an_b.different'=>'Đáp án B đã bị trùng',
        'phuong_an_c.required'=>'Đáp án C không được để trống',
        'phuong_an_c.different'=>'Đáp án C đã bị trùng',
        'phuong_an_d.required'=>'Đáp án D không được để trống',
        'phuong_an_d.different'=>'Đáp án D đã bị trùng',
      ];
    }

    
  
  }
