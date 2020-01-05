<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\QuanTriVien;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class QuanTriVienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
         
        return view('layout');
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
        //
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
        //
    }

    public function DangNhap(){
       
        return view('dang-nhap');
    }

    public function XuLyDangNhap(Request $request){
        $thongtin=$request->only('ten_dang_nhap','mat_khau');
        $qtv=QuanTriVien::where('ten_dang_nhap',$thongtin['ten_dang_nhap'])->first();
        if($qtv==null)
          {
              alert()->error('', 'Tên đăng nhập không đúng');
             return redirect()->route('dangnhap');
        }
        
        if(!Hash::check($thongtin['mat_khau'],$qtv->mat_khau)){
            alert()->error('', 'Mật khẩu không đúng');
            return redirect()->route('dangnhap');
        }
        Auth::login($qtv);
            return redirect()->route('trangchu');
    }

     public function DangXuat(){
            Auth::logout();
            return redirect()->route('dangnhap');
    }
   //  protected $redirectTo = 'trang-chu';
   // protected function redirectTo()
   //  {
   //      return 'trang-chu';
   //  }
}
