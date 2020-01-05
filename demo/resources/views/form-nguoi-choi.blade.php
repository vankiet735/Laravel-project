@extends('layout')
@section('main-content')
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3 header-title">Thêm người chơi</h4>
                 @if( $errors->any() )
                <ul style="color:red">
                    @foreach( $errors->all() as $error )
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
                @endif
                <form action="{{Route('nguoi-choi.xl-them-moi')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="ten_dang_nhap">Tên đăng nhập</label>
                        <input type="text" class="form-control" id="ten_dang_nhap" name="ten_dang_nhap">
                    </div>
                     <div class="form-group">
                        <label for="ten_dang_nhap">Mật khẩu</label>
                        <input type="password" class="form-control" id="mat_khau" name="mat_khau">
                    </div>
                     <div class="form-group">
                        <label for="ten_dang_nhap">Xác nhận mật khẩu</label>
                        <input type="password" class="form-control" id="xac_nhan_mat_khau" name="xac_nhan_mat_khau">
                    </div>
                     <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" name="email">
                    </div>
                    <!--  <div class="form-group">
                        <label for="hinh_dai_dien">Ảnh đại diện</label>
                        <input type="text" class="form-control" id="hinh_dai_dien" name="hinh_dai_dien">
                    </div>
                     <div class="form-group">
                        <label for="diem_cao_nhat">Điểm cao nhất</label>
                        <input type="text" class="form-control" id="diem_cao_nhat" name="diem_cao_nhat">
                    </div>
                     <div class="form-group">
                        <label for="credit">Credit</label>
                        <input type="text" class="form-control" id="credit" name="credit">
                    </div> -->
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Thêm</button>
                </form>

            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div>
    <!-- end col -->
</div>
@endsection