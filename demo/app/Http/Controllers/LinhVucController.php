<?php

namespace App\Http\Controllers;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use App\LinhVuc;
use App\CauHoi;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\LinhVucRequest;
use Illuminate\Support\Facades\Auth;

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
    public function store(LinhVucRequest $request)
    {
     $linhVuc=new LinhVuc;
     $linhVuc->ten_linh_vuc=$request->ten_linh_vuc;
     $linhVuc->save();
     // echo  '<script>'."alert('Thêm lĩnh vực thành công')".'</script>';
        // return redirect()->route('linh-vuc/them-moi');
      toast()->success('Thêm lĩnh vực thành công !!'); 
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
       Toast()->success('Cập nhật thành công !!'); 
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
        $a=0;
        $cauHoi=CauHoi::all();
        $linhVuc=LinhVuc::find($id);
        foreach ($cauHoi as $cauhoi) {
            if(($cauhoi->linh_vuc_id)==($id))
                $a++;
        }
       if($a!=0)
            {
               alert()->error('', 'Lĩnh vực còn tồn tại câu hỏi - Không thể xóa lĩnh vực này');
               return redirect()->route('linh-vuc.danh-sach');
            }
           else
           {
              $linhVuc->delete();
             Toast()->success('Xóa thành công !!'); 
              return redirect()->route('linh-vuc.danh-sach');
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
        
        $linhVuc=LinhVuc::onlyTrashed()->get()->find($id);
        $linhVuc->restore();
        Toast()->success('Khôi phục thành công !!'); 
        return redirect()->route('linh-vuc.dstrash');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete_trash($id)
    {      
       $linhVuc=LinhVuc::onlyTrashed()->get()->find($id);
       $linhVuc->forceDelete();
       if(count(LinhVuc::onlyTrashed()->get())==0)
         return redirect()->route('linh-vuc.danh-sach');
        else
           return redirect()->route('linh-vuc.dstrash');
   }
}
