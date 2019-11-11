<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LinhVuc;
use App\CauHoi;
use Illuminate\Http\RedirectResponse;
class LinhVucController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dsLinhVuc=LinhVuc::all();
        return view('ds-linh-vuc',compact('dsLinhVuc'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('form-linh-vuc');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $linhVuc=new LinhVuc;
       $linhVuc->ten_linh_vuc=$request->ten_linh_vuc;
       $linhVuc->save();
        echo  '<script>'."alert('Thêm lĩnh vực thành công')".'</script>';
        // return redirect()->route('linh-vuc/them-moi');
        return redirect()->route('linh-vuc.danh-sach');

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
        $linhVuc=LinhVuc::find($id);
        return view('form-linh-vuc',compact('linhVuc'));

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
         $linhVuc=LinhVuc::find($id);
         $linhVuc->ten_linh_vuc=$request->ten_linh_vuc;
         $linhVuc->save();
        return redirect()->route('linh-vuc.danh-sach');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cauHoi=CauHoi::all();
        $linhVuc=LinhVuc::find($id);
        foreach ($cauHoi as $cauhoi) {
            if(($cauhoi->linh_vuc_id)==($linhVuc->id))
                 return  '<script>'."alert('Không thể xóa')".'</script>';
            else
             {
                  $linhVuc->delete();
                  return redirect()->route('linh-vuc.danh-sach');
             }
         }
    }
     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function get_trash()
    {      
        $dsLinhVuc=LinhVuc::onlyTrashed()->get();
        return view('ds-linh-vuc-trash',compact('dsLinhVuc'));  
    }
     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore_linhvuc($id)
    {      
        $dsLinhVuc=LinhVuc::all();
         $linhVuc=LinhVuc::onlyTrashed()->get()->find($id);
        $linhVuc->restore();
         return redirect()->route('linh-vuc.danh-sach',compact('dsLinhVuc'));
    }
    

}
