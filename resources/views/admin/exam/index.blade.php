@extends('admin.general')

@section('other_styles')
   <!-- Datatables -->
      <link href="{{ asset('gentelella/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
      <link href="{{ asset('gentelella/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}" rel="stylesheet">
      <link href="{{ asset('gentelella/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') }}" rel="stylesheet">
      <link href="{{ asset('gentelella/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}" rel="stylesheet">
      <link href="{{ asset('gentelella/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') }}" rel="stylesheet">
    
     <!-- Custom Theme Style -->
    <link href="{{ asset('gentelella/build/css/custom.min.css') }}" rel="stylesheet">
    <link href="{{ asset('gentelella/production/css/custom.css?v=0.1.2') }}" rel="stylesheet">
@stop

@section('content')
   <div class="row">
	<div class="col-12">
	<div class="card">
	    <div class="card-body">
	        <h4 class="card-title">Đề thi</h4>
	        @if($message = Session::get('success'))
	        	<h6 class="card-subtitle">{{ $message }}</h6>
			@endif
			<div align="right">
			<a class="btn btn-default btn-primary" href="{{ route('admin.exam.create') }}">Thêm mới</a>
			</div>
	          <div class="x_content">
	           <table id="datatable" class="table table-striped table-bordered"  width="100%">
	                <thead>
	                    <tr>
	                        <th>ID</th>
							<th>Tên đề thi</th>
							<th>Thời gian</th>
							<th>Ngày khởi tạo</th>
							<th>-</th>
							<th>-</th>
	                    </tr>
	                </thead>
	                <tfoot>
	                    <tr>
	                        <th>ID</th>
							<th>Tên đề thi</th>
							<th>Thời gian</th>
							<th>Ngày khởi tạo</th>
							<th>-</th>
							<th>-</th>
	                    </tr>
	                </tfoot>
	                <tbody>
	                	@foreach($exams as $row)
							<tr>
								<td>{{ $row['idexam'] }}</td>
								<td>{{ $row['examname'] }}</td>
								<td>{{ $row['timeleft'] }}</td>
								<td>{{ $row['created_at'] }}</td>			
								<td class="btn-control"><a class="btn btn-primary btn-edit" href="{{ action('Admin\ExamController@edit',$row['idexam']) }}"><i class="fa fa-edit"></i></a></td>
								<td class="btn-control">
								     <form method="post" class="delete_form" action="{{action('Admin\ExamController@destroy', $row['idexam'])}}">
								      {{csrf_field()}}
								      <input type="hidden" name="_method" value="DELETE" />
								      <button type="submit" class="btn btn-danger btn-delete"><i class="fa fa-trash" aria-hidden="true"></i></button>
								     </form>
								</td>
							</tr>
						@endforeach                
	                </tbody>
	            </table>
	        </div>
	    </div>

	</div>
	</div>
</div>
@stop

@section('other_scripts')
    <!-- Datatables -->
    <script src="{{ asset('gentelella/vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('gentelella/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('gentelella/vendors/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('gentelella/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ asset('gentelella/vendors/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('gentelella/vendors/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('gentelella/vendors/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('gentelella/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') }}"></script>
    <script src="{{ asset('gentelella/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
    <script src="{{ asset('gentelella/vendors/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('gentelella/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js') }}"></script>
    <script src="{{ asset('gentelella/vendors/datatables.net-scroller/js/dataTables.scroller.min.js') }}"></script>
    <script src="{{ asset('gentelella/vendors/jszip/dist/jszip.min.js') }}"></script>
    <script src="{{ asset('gentelella/vendors/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ asset('gentelella/vendors/pdfmake/build/vfs_fonts.js') }}"></script>
      <!-- Custom Theme Scripts -->
    {{-- <script src="{{ asset('gentelella/build/js/custom.min.js') }}"></script> --}}
    <script src="{{ asset('gentelella/build/js/custom.js') }}"></script>
    <script src="{{ asset('gentelella/production/js/custom.js?v=0.0.2') }}"></script>
@stop