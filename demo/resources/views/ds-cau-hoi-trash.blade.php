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
		$("#linh-vuc-datatable").DataTable({
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
@endsection

@section('css')
<!-- third party css -->
<link href="{{asset('assets/libs/datatables/dataTables.bootstrap4.css')}}"rel="stylesheet" type="text/css" />
<link href="{{asset('assets/libs/datatables/responsive.bootstrap4.css')}}"rel="stylesheet" type="text/css" />
<link href="{{asset('assets/libs/datatables/buttons.bootstrap4.css')}}"rel="stylesheet" type="text/css" />
<link href="{{asset('assets/libs/datatables/select.bootstrap4.css')}}"rel="stylesheet" type="text/css" />
<!-- third party css end -->
@endsection
@section('title')
Danh sách câu hỏi đã bị xóa
@endsection
@section('main-content')

<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<h4 class="header-title">  </h4>
				 

				<table id="linh-vuc-datatable" class="table dt-responsive ">
					<thead>
						<tr>
							<th>ID</th>
							<th>Nội dung</th>
							<th>Lĩnh Vực</th>
							<th>Phương án A</th>
							<th>Phương án B</th>
							<th>Phương án C</th>
							<th>Phương án D</th>
							<th>Đáp án</th>
							<th></th>
						</tr>
					</thead>


					<tbody>
						@foreach($dsCauHoi as $cauhoi)
						<tr>
							<td>{{ $cauhoi->id }}</td>
							<td>{{ $cauhoi->noi_dung }}</td>
							 <td>{{ $cauhoi->linhVuc->ten_linh_vuc }}</td>
                             <td>{{ $cauhoi->phuong_an_a }}</td>
                             <td>{{ $cauhoi->phuong_an_b }}</td>
                             <td>{{ $cauhoi->phuong_an_c }}</td>
                             <td>{{ $cauhoi->phuong_an_d }}</td>
                             <td>{{ $cauhoi->dap_an}}</td>   
							<td>
								<a href="{{route('cau-hoi.restore',['id'=>$cauhoi->id])}}" class="btn btn-success waves-effect waves-light"><i class="mdi mdi-replay"></i></a>
								<a href="{{route('cau-hoi.delete-trash',['id'=>$cauhoi->id])}}" class="btn btn-danger waves-effect waves-light"><i class=" mdi mdi-trash-can"></i></a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>

			</div> <!-- end card body-->
		</div> <!-- end card -->
	</div><!-- end col-->
</div>
@endsection
