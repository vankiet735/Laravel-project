@extends('layout')
@section('main-content')

<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3 header-title"> 

                @if(isset($cauHoi))Cập nhật @else Thêm mới @endif câu hỏi</h4>
                
                @if( $errors->any() )
                <ul style="color:red">
                    @foreach( $errors->all() as $error )
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
                @endif

                @if(isset($cauHoi))
                <form action="{{route('cau-hoi.xu-ly-cap-nhat',['id'=>$cauHoi->id])}}" method="post">
                    @else
                    <form action="{{route('cau-hoi.xl-them-moi')}}" method="post">
                        @endif
                        @csrf
                        <div class="form-group">
                            <label for="noi_dung">Nội dung</label>
                            <input type="text" class="form-control" id="noi_dung" name="noi_dung" placeholder="Nội dung" @if(isset($cauHoi)) value="{{$cauHoi->noi_dung}}" @endif>
                        </div>

                        @if(isset($cauHoi))
                        <div class="form-group"></div>
                        @else
                        <div class="form-group">
                            <label for="linh_vuc">Lĩnh vực</label>
                            <select name="linh_vuc" id="linh_vuc" class="form-control">
                                @foreach($dsLinhVuc as $linhVuc)
                                <option value="{{$linhVuc->id}}">{{$linhVuc->ten_linh_vuc}}</option>
                                @endforeach
                            </select>
                        </div>
                        @endif

                        <div class="form-group">
                            <label for="phuong_an_a">Phương Án A</label>
                            <input type="text" class="form-control" id="phuong_an_a" name="phuong_an_a" placeholder="Phương Án A" @if(isset($cauHoi)) value="{{$cauHoi->phuong_an_a}}" @endif>
                        </div>
                        <div class="form-group">
                            <label for="phuong_an_b">Phương Án B</label>
                            <input type="text" class="form-control" id="phuong_an_b" name="phuong_an_b" placeholder="Phương Án B" @if(isset($cauHoi)) value="{{$cauHoi->phuong_an_b}}" @endif>
                        </div>
                        <div class="form-group">
                            <label for="phuong_an_c">Phương Án C</label>
                            <input type="text" class="form-control" id="phuong_an_c" name="phuong_an_c" placeholder="Phương Án C" @if(isset($cauHoi)) value="{{$cauHoi->phuong_an_c}}" @endif>
                        </div>
                        <div class="form-group">
                            <label for="phuong_an_d">Phương Án D</label>
                            <input type="text" class="form-control" id="phuong_an_d" name="phuong_an_d" placeholder="Phương Án D" @if(isset($cauHoi)) value="{{$cauHoi->phuong_an_d}}" @endif>
                        </div>
                        <div class="form-group">
                            <label for="dap_an">Đáp Án </label>
                            @if(isset($cauHoi))
                            <select name="dap_an" id="dap_an" class="form-control">
                                <option>{{$cauHoi->dap_an}}</option>
                                <option>A</option>
                                <option>B</option>
                                <option>C</option>
                                <option>D</option>
                            </select>
                            @else
                            <select name="dap_an" id="dap_an" class="form-control">
                                <option>A</option>
                                <option>B</option>
                                <option>C</option>
                                <option>D</option>
                            </select>
                            @endif

                        </div>
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Lưu</button>
                    </form>

                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div>
        <!-- end col -->
    </div>
    @endsection