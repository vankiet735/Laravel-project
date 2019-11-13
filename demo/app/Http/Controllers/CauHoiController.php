<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CauHoi;
use App\LinhVuc;
use Illuminate\Http\RedirectResponse;
class CauHoiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dsCauHoi=CauHoi::all();
        return view('ds-cau-hoi',compact('dsCauHoi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dsLinhVuc=LinhVuc::all();
        return view('form-cau-hoi',compact('dsLinhVuc'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cauHoi=new CauHoi;
        $cauHoi->noi_dung=$request->noi_dung;
        $cauHoi->linh_vuc_id=$request->linh_vuc;
        $cauHoi->phuong_an_a=$request->phuong_an_a;
        $cauHoi->phuong_an_b=$request->phuong_an_b;
        $cauHoi->phuong_an_c=$request->phuong_an_c;
        $cauHoi->phuong_an_d=$request->phuong_an_d;
        $cauHoi->dap_an=$request->dap_an;
        $cauHoi->save();
        return  '<script>'."alert('Thêm lĩnh vực thành công')".'</script>';

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
        $dsLinhVuc=LinhVuc::all();
        $cauHoi=CauHoi::find($id);
        return view('form-cau-hoi',compact('dsLinhVuc','cauHoi'));
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
        $cauHoi=CauHoi::find($id);
        $cauHoi->noi_dung=$request->noi_dung;
        $cauHoi->phuong_an_a=$request->phuong_an_a;
        $cauHoi->phuong_an_b=$request->phuong_an_b;
        $cauHoi->phuong_an_c=$request->phuong_an_c;
        $cauHoi->phuong_an_d=$request->phuong_an_d;
        $cauHoi->save();
        return redirect()->route('cau-hoi.danh-sach');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cauHoi=CauHoi::find($id);
        $cauHoi->delete();
        return redirect()->route('cau-hoi.danh-sach');      
    }


    public function get_trash()
    {      
        $linhVuc=LinhVuc::all();
        $dsCauHoi=CauHoi::onlyTrashed()->get();
        return view('ds-cau-hoi-trash',compact('dsCauHoi','linhVuc'));  
    }

    public function restore_cauhoi($id)
    {      
        $dsCauHoi=CauHoi::all();
        $cauHoi=CauHoi::onlyTrashed()->get()->find($id);
        $cauHoi->restore();
        return redirect()->route('cau-hoi.danh-sach',compact('dsCauHoi'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete_trash($id)
    {      
       $cauHoi=CauHoi::onlyTrashed()->get()->find($id);
       $cauHoi->forceDelete();
       if(count(CauHoi::onlyTrashed()->get())==0)
        return redirect()->route('cau-hoi.danh-sach');
       return redirect()->route('cau-hoi.dstrash');
   }
}
