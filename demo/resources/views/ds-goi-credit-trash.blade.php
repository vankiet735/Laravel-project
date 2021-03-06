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

@endsection

@section('css')
<link href="{{asset('assets/libs/datatables/dataTables.bootstrap4.css')}}"rel="stylesheet" type="text/css" />
<link href="{{asset('assets/libs/datatables/responsive.bootstrap4.css')}}"rel="stylesheet" type="text/css" />
<link href="{{asset('assets/libs/datatables/buttons.bootstrap4.css')}}"rel="stylesheet" type="text/css" />
<link href="{{asset('assets/libs/datatables/select.bootstrap4.css')}}"rel="stylesheet" type="text/css" />
@endsection

@section('main-content')
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<h4 class="header-title">Danh sách Gói Credit đã xóa</h4>
				
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
								<a href="{{Route('goi-credit.restore',['id'=>$goiCredit->id])}}" class="btn btn-success waves-effect waves-light"><i class="mdi mdi-replay"></i></a>
								<a onclick="Delete('{{Route('goi-credit.delete-trash',['id'=>$goiCredit->id])}}')" href="#" class="btn btn-danger waves-effect waves-light"><i class=" mdi mdi-trash-can"></i></a>
								
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>

			</div> <!-- end card body-->
		</div> <!-- end card -->
	</div><!-- end col-->
</div>
@include('sweetalert::alert')
@include('sweet_alert')
@endsection