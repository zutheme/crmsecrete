<?php 	$idimpcross = app('request')->input('idimpcross'); 
		$no_thumbnail = 'dashboard/production/images/no_photo.jpg';
		//$idposttype = Request::segment(6);
		$idposttype = isset($_id_post_type) ? $_id_post_type : 3;
		$_posttype = isset($_posttype) ? $_posttype : 'post';
?>
@extends('admin.general')

@section('other_styles')
	@if($_posttype == 'exam')
		 <!-- Bootstrap -->
		<link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
		<!-- Datatables -->
		<link href="{{ asset('gentelella/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
		<link href="{{ asset('gentelella/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}" rel="stylesheet">
		<link href="{{ asset('gentelella/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') }}" rel="stylesheet">
		<link href="{{ asset('gentelella/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}" rel="stylesheet">
		<link href="{{ asset('gentelella/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') }}" rel="stylesheet">
	@endif
    <link href="{{ asset('dashboard/production/css/custom.css?v=0.8.5') }}" rel="stylesheet">
    <link href="{{ asset('gentelella/build/css/custom.min.css') }}" rel="stylesheet">
    <style>
		.ck-editor__editable_inline {
		    min-height: 100px;
		    margin-bottom: 15px;
	}
	</style> 
	 <link href="{{ asset('gentelella/build/css/custom-quiz.css?v=0.0.2') }}" rel="stylesheet">
	 <link href="{{ asset('node_modules/dragula/dist/dragula.css') }}" rel='stylesheet' type='text/css' />
	 <link href="{{ asset('node_modules/dragula/example/example.css?v=0.0.3') }}" rel='stylesheet' type='text/css' />
@stop
@section('content')

<div class="row">
	@if(isset($_posttype) && $_posttype == 'product' || $idposttype == 10)
		@include('admin.post.edit-product')
	@elseif($_posttype == 'post')
		@include('admin.post.edit-post')
	@elseif($_posttype == 'survey')
		@include('admin.post.edit-survey')
	@elseif($_posttype == 'phone')
		@include('admin.post.edit-phone')
	@elseif($_posttype == 'sms')
		@include('admin.post.edit-phone')
	@elseif($_posttype == 'email')
		@include('admin.post.edit-phone')
	@elseif($_posttype == 'booking')
		@include('admin.post.edit-phone')
	@elseif($_posttype == 'consultant')
		@include('admin.post.edit-phone')
	@elseif($_posttype == 'order')
		@include('admin.post.edit-order')
	@elseif($_posttype == 'exam')
		@include('admin.post.edit-exam')
	@elseif($_posttype == 'lesson')
		@include('admin.post.edit-lesson')
	@else
		@include('admin.post.edit-another-type')
	@endif
</div>

@stop
@section('other_scripts')
 	<script>
 		var _start_date_sl = '';
  		var _end_date_sl = '';
		var _idproduct = '{{ $idproduct }}';
		var _posttype = '{{ $_posttype }}';
		var _ckeditor_route_upload = '{{ route('ckeditor.upload') }}';
		var _url_thumbnail = '{{ asset($product[0]['url_thumbnail']) }}';
	</script>
	@if($_posttype == 'exam')
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
		<!-- bootstrap-daterangepicker -->
		<script src="{{ asset('gentelella/vendors/moment/min/moment.min.js') }}"></script>
		<script src="{{ asset('gentelella/vendors/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
		<!-- bootstrap-datetimepicker -->    
		<script src="{{ asset('gentelella/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') }}"></script>
		<!-- Custom Theme Scripts -->
	@endif
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
  	
    
	<script src="{{ asset('editor-build/build/ckeditor.js') }}"></script>
	<script src="{{ asset('editor-build/ckeditor-interactive/js/classic-editor5.js?v=0.1.0') }}"></script>
	<!-- jQuery Tags Input -->
	<script src="{{ asset('gentelella/vendors/jquery.tagsinput/src/jquery.tagsinput.js') }}"></script>
	<script src="{{ asset('public/js/library.js?v=0.4.6') }}"></script>
	<script src="{{ asset('dashboard/production/js/uploadmultifile.js?v=0.8.9') }}"></script>
    <script src="{{ asset('dashboard/production/js/media-galerry.js?v=0.8.1') }}"></script>

    <script src="{{ asset('dashboard/production/js/filter_create_category.js?v=0.2.8') }}"></script> 
    <script src="{{ asset('dashboard/production/js/edit_update_category.js?v=0.0.9.4') }}"></script> 
    <script src="{{ asset('dashboard/production/js/interactive/select_category_tag.js?v=0.0.0.8') }}"></script>
	<script src="{{ asset('gentelella/production/js/custom-quiz.js?v=0.0.0.6') }}"></script>
	<script src="{{ asset('node_modules/dragula/dist/dragula.js?v=0.0.3') }}"></script>
	<script src="{{ asset('node_modules/dragula/example/example.min.js?v=0.0.1') }}"></script>
@stop