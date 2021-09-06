@extends('admin.general')
@section('other_styles')
    <!-- Custom Theme Style -->
    <link href="{{ asset('gentelella/build/css/custom.min.css') }}" rel="stylesheet">
    <style>
		.ck-editor__editable_inline {
		    min-height: 100px;
		    margin-bottom: 15px;
	}
	</style> 
     
@stop
@section('content')
<div class="row">
	<div class="col-sm-12">
		<h2>Thêm mới</h2>
		@if(count($errors) > 0)
		<div class="alert alert-danger">
			<ul>
				@foreach($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
		@endif
		@if(\Session::has('success'))
			<div class="alert alert-success">
				<p>{{ \Session::get('success') }}</p>
			</div>
		@endif
		<form class="frm_create_exam" method="post" action="{{url('admin/exam')}}" width="100%" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="row">
				<div class="form-group col-sm-12">
					<input type="text" name="examname" class="form-control" placeholder="Tên kỳ thi">
				</div>
				<div class="form-group col-sm-12">
					<textarea id="editor" name="body"></textarea>
				</div>
				
				<div class="form-group col-sm-6">
					@include('admin.exam.select-category')
				</div>
			   
				<div class="form-group col-sm-12">
					<input type="submit" class="btn btn-default btn-submit" name="btn-submit" value="Xác nhận" />
				</div>
			</div>
		</form>
	</div>
</div>
@stop
@section('other_scripts')
 	<script>
 		 var _start_date_sl = '';
  		var _end_date_sl = '';
	</script>
	<script src="{{ asset('gentelella/vendors/moment/min/moment.min.js') }}"></script>
	<script src="{{ asset('gentelella/vendors/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <!-- bootstrap-datetimepicker -->    

    <!-- morris.js -->
    <script src="{{ asset('gentelella/vendors/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('gentelella/vendors/morris.js/morris.min.js') }}"></script>
    <!-- bootstrap-progressbar -->
    <script src="{{ asset('gentelella/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="{{ asset('gentelella/vendors/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('gentelella/vendors/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('gentelella/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') }}"></script>
    <!-- Custom Theme Scripts -->
    <script src="{{ asset('gentelella/build/js/custom.min.js') }}"></script>

    <script src="{{ asset('dashboard/production/js/process_images/capture_image.js?v=0.3.1') }}"></script>
  	
    <script> var _ckeditor_route_upload = '{{ route('ckeditor.upload') }}';</script>;
	<script src="{{ asset('editor-build/build/ckeditor.js') }}"></script>
	<script src="{{ asset('editor-build/ckeditor-interactive/js/classic-editor5.js?v=0.1.0') }}"></script>
	<!-- jQuery Tags Input -->
	<script src="{{ asset('gentelella/vendors/jquery.tagsinput/src/jquery.tagsinput.js') }}"></script>
	<script src="{{ asset('public/js/library.js?v=0.4.6') }}"></script>
	<script src="{{ asset('dashboard/production/js/uploadmultifile.js?v=0.8.9') }}"></script>
    <script src="{{ asset('dashboard/production/js/media-galerry.js?v=0.7.9') }}"></script>

    <script src="{{ asset('dashboard/production/js/filter_create_category.js?v=0.2.7') }}"></script> 
    <script src="{{ asset('dashboard/production/js/edit_update_category.js?v=0.0.8.7') }}"></script> 
    <script src="{{ asset('dashboard/production/js/interactive/select_category_tag.js?v=0.0.0.7') }}"></script>
	
@stop