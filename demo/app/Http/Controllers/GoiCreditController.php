<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GoiCredit;
class GoiCreditController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dsGoiCredit=GoiCredit::all();
        return view('ds-goi-credit',compact('dsGoiCredit'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $goiCredit=new GoiCredit;
        $goiCredit->ten_goi=$request->ten_goi;
        $goiCredit->credit=$request->credit;
        $goiCredit->so_tien=$request->so_tien;
        $goiCredit->save();
        toast()->success('Thêm thành công!'); 
        return redirect()->route('goi-credit.danh-sach');
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
         $dsGoiCredit=GoiCredit::all();
         $goicredit=GoiCredit::find($id);
        return view('ds-goi-credit', compact('goicredit','dsGoiCredit'));
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
       
        $goicredit=GoiCredit::find($id);
       $goicredit->ten_goi=$request->ten_goi;
       $goicredit->credit=$request->credit;
       $goicredit->so_tien=$request->so_tien;
       $goicredit->save();
       toast()->success('Cập nhật thành công!'); 
       return redirect()->route('goi-credit.danh-sach');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $goiCredit=GoiCredit::find($id);
        $goiCredit->delete();
        toast()->success('Xóa thành công!'); 
        return redirect()->route('goi-credit.danh-sach');      
    }
    public function get_trash()
    {      
        $dsGoiCredit=GoiCredit::onlyTrashed()->get();
        return view('ds-goi-credit-trash',compact('dsGoiCredit'));  
    }

    public function restore_goi_credit($id)
    {      
        $goiCredit=GoiCredit::onlyTrashed()->get()->find($id);
        $goiCredit->restore();
        toast()->success('Khôi phục thành công!'); 
         if(count(GoiCredit::onlyTrashed()->get())==0)
        return redirect()->route('goi-credit.danh-sach');
       return redirect()->route('goi-credit.dstrash');
        
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete_trash($id)
    {      
       $goiCredit=GoiCredit::onlyTrashed()->get()->find($id);
       $goiCredit->forceDelete();
       toast()->success('Xóa thành công!'); 
       if(count(GoiCredit::onlyTrashed()->get())==0)
        return redirect()->route('goi-credit.danh-sach');
       return redirect()->route('goi-credit.dstrash');
   }
}
