<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NguoiChoi;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
class NguoiChoiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dsNguoiChoi=NguoiChoi::all();
        return view('ds-nguoi-choi',compact('dsNguoiChoi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('form-nguoi-choi');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $nguoiChoi=new NguoiChoi;
       $nguoiChoi->ten_dang_nhap=$request->ten_dang_nhap;
       $nguoiChoi->mat_khau=Hash::make($request->mat_khau);
       $nguoiChoi->email=$request->email;
       $nguoiChoi->hinh_dai_dien=$request->hinh_dai_dien;
       $nguoiChoi->diem_cao_nhat=$request->diem_cao_nhat;
       $nguoiChoi->credit=$request->credit;
       $nguoiChoi->save();
       Toast()->success('Thêm thành công!'); 
       return redirect()->route('nguoi-choi.danh-sach');
   }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $nguoiChoi=NguoiChoi::find($id);
       $nguoiChoi->delete();
       Toast()->success('Xóa thành công!'); 
       return redirect()->route('nguoi-choi.danh-sach');    
   }
   public function get_trash()
   {      
    $dsNguoiChoi=NguoiChoi::onlyTrashed()->get();
    return view('ds-nguoi-choi-trash',compact('dsNguoiChoi'));  
}

public function restore_nguoichoi($id)
{      
    $nguoiChoi=NguoiChoi::onlyTrashed()->get()->find($id);
    $nguoiChoi->restore();
    Toast()->success('Khôi phục thành công!'); 
     if(count(NguoiChoi::onlyTrashed()->get())==0)
        return redirect()->route('nguoi-choi.danh-sach');
    else
     return redirect()->route('nguoi-choi.dstrash');
}
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete_trash($id)
    {      
     
     $nguoiChoi=NguoiChoi::onlyTrashed()->get()->find($id);
     $nguoiChoi->forceDelete();
     Toast()->success('Xóa thành công!'); 
     if(count(NguoiChoi::onlyTrashed()->get())==0)
        return redirect()->route('nguoi-choi.danh-sach');
    else
     return redirect()->route('nguoi-choi.dstrash');
 
}
}
