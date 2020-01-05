@extends('layout')

@section('js')
<!-- third party js -->
<script src="{{asset('assets/libs/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/libs/datatables/dataTables.bootstrap4.js')}}"></script>
<script src="{{asset('assets/libs/datatables/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets/libs/datatables/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/libs/datatables/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/libs/datatables/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/libs/datatables/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/libs/datatables/buttons.flash.min.js')}}"></script>
<script src="{{asset('assets/libs/datatables/buttons.print.min.js')}}"></script>
<script src="{{asset('assets/libs/datatables/dataTables.keyTable.min.js')}}"></script>
<script src="{{asset('assets/libs/datatables/dataTables.select.min.js')}}"></script>
<script src="{{asset('assets/libs/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('assets/libs/pdfmake/vfs_fonts.js')}}"></script>
<!-- third party js ends -->

<!-- Datatables init -->
<script type="text/javascript">
	$(document).ready(function() {
		$("#table-goi-credit").DataTable({
			language: {
				paginate: {
					previous: "<i class='mdi mdi-chevron-left'>",
					next: "<i class='mdi mdi-chevron-right'>"
				}
			},
			drawCallback: function() {
				$(".dataTables_paginate > .pagination").addClass("pagination-rounded")
			}
		});
	});
	

</script>
<style type="text/css">
	button.btn.btn-primary.waves-effect.waves-light{
		float: right;
	}
	div.col-4 div.card-body{
		margin-top:100px;
	}
</style>

@endsection

@section('css')
<link href="{{asset('assets/libs/datatables/dataTables.bootstrap4.css')}}"rel="stylesheet" type="text/css" />
<link href="{{asset('assets/libs/datatables/responsive.bootstrap4.css')}}"rel="stylesheet" type="text/css" />
<link href="{{asset('assets/libs/datatables/buttons.bootstrap4.css')}}"rel="stylesheet" type="text/css" />
<link href="{{asset('assets/libs/datatables/select.bootstrap4.css')}}"rel="stylesheet" type="text/css" />
@endsection

@section('main-content')
<div class="row">
	<div class="col-8">
		<div class="card">
			<div class="card-body">
				<h4 class="header-title">Danh sách Gói Credit</h4>
				<a href="{{Route('goi-credit.dstrash')}}" type="button" class="btn btn-primary btn-rounded waves-effect waves-light"><i class=" mdi mdi-trash-can"></i></a>
				
				<p></p>

				<table id="table-goi-credit" class="table dt-responsive">
					<thead>
						<tr>
							<th>ID</th>
							<th>Tên gói</th>
							<th>Credit</th>
							<th>Số tiền</th>
							<th></th>
						</tr>
					</thead>


					<tbody>
						@foreach($dsGoiCredit as $goiCredit )
						<tr>
							<td>{{ $goiCredit->id }}</td>
							<td>{{ $goiCredit->ten_goi}}</td>
							<td>{{ $goiCredit->credit}}</td>
							<td>{{ $goiCredit->so_tien}}</td>
							<td>
								<a href="{{Route('goi-credit.cap-nhat',['id'=>$goiCredit->id])}}" class="btn btn-success waves-effect waves-light"><i class=" mdi mdi-wrench"></i></a>
								<a onclick="Delete('{{Route('goi-credit.xoa',['id'=>$goiCredit->id])}}')"  href="#" class="btn btn-danger waves-effect waves-light"><i class=" mdi mdi-trash-can"></i></a>
								
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>

			</div> <!-- end card body-->
		</div> <!-- end card -->
	</div><!-- end col-->

	<div class="col-4">
		<div class="card">

			<div class="card-body">
				 @if( $errors->any() )
                    <ul style="color:red">
                        @foreach( $errors->all() as $error )
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif
				<h4 class="mb-3 header-title">@if(isset($goicredit)) Cập nhật @else Thêm @endif Gói credit</h4>
				@if(isset($goicredit))
				<form action="{{Route('goi-credit.xl-cap-nhat',['id'=>$goiCredit->id])}}" method="post">
				@else
				<form action="{{Route('goi-credit.xl-them-moi')}}" method="post">
				@endif
					@csrf
					<div class="form-group">
						<label for="ten_goi">Tên Gói</label>
						<input type="text" class="form-control" id="ten_goi" name="ten_goi" @if(isset($goicredit)) value="{{$goicredit->ten_goi}}" @endif>
					</div>
					<div class="form-group">
						<label for="credit">Credit</label>
						<input type="number" class="form-control" id="credit" name="credit" @if(isset($goicredit)) value="{{$goicredit->credit}}" @endif>
					</div>
					<div class="form-group">
						<label for="so_tien">Số tiền</label>
						<input type="number" class="form-control" id="so_tien" name="so_tien" @if(isset($goicredit)) value="{{$goicredit->so_tien}}" @endif>
					</div>
					<button type="submit" class="btn btn-primary waves-effect waves-light">@if(isset($goicredit)) Cập nhật @else Thêm @endif</button>
				</form>

			</div> <!-- end card-body-->
		</div> <!-- end card-->
	</div>
</div>
@include('sweetalert::alert')
@include('sweet_alert')
@endsection

