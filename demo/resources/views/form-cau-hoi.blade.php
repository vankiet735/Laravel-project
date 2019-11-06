@extends('layout')
@section('main-content')
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3 header-title">Thêm mới câu hỏi</h4>

                <form action="{{route('cau-hoi.xl-them-moi')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="noi_dung">Nội dung</label>
                        <input type="text" class="form-control" id="noi_dung" name="noi_dung" placeholder="Nội dung">
                    </div>
                     <div class="form-group">
                        <label for="linh_vuc">Lĩnh vực</label>
                        <select name="linh_vuc" id="linh_vuc" class="form-control">
                             <option>Chọn lĩnh vực</option>
                            @foreach($dsLinhVuc as $linhVuc)
                                <option value="{{$linhVuc->id}}">{{$linhVuc->ten_linh_vuc}}</option>
                            @endforeach
                        </select>
                    </div>
                     <div class="form-group">
                        <label for="phuong_an_a">Phương Án A</label>
                        <input type="text" class="form-control" id="phuong_an_a" name="phuong_an_a" placeholder="Phương Án A">
                    </div>
                     <div class="form-group">
                        <label for="phuong_an_b">Phương Án B</label>
                        <input type="text" class="form-control" id="phuong_an_b" name="phuong_an_b" placeholder="Phương Án A">
                    </div>
                    <div class="form-group">
                        <label for="phuong_an_c">Phương Án C</label>
                        <input type="text" class="form-control" id="phuong_an_c" name="phuong_an_c" placeholder="Phương Án C">
                    </div>
                    <div class="form-group">
                        <label for="phuong_an_d">Phương Án D</label>
                        <input type="text" class="form-control" id="phuong_an_d" name="phuong_an_d" placeholder="Phương Án D">
                    </div>
                     <div class="form-group">
                        <label for="dap_an">Đáp Án</label>
                        <input type="text" class="form-control" id="dap_an" name="dap_an" placeholder="Đáp Án">
                    </div>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Lưu</button>
                </form>

            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div>
    <!-- end col -->
</div>
@endsection