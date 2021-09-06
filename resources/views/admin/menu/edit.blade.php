@extends('admin.general')

@section('other_styles')
      <!-- Custom Theme Style -->
    <link href="{{ asset('gentelella/build/css/custom.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dashboard/production/css/custom.css?v=0.1.2') }}" rel="stylesheet">
@stop
@section('content')


<div class="row">
	<div class="col-sm-6">
		<h2>Chỉnh sửa</h2>
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
		<form class="frm_edit_menu" method="post" action="{{action('Admin\MenuController@update',$idmenu)}}">
			{{ csrf_field() }}
			<input type="hidden" name="_method" value="PATCH">
			<div class="form-group">
				<input type="text" name="namemenu" class="form-control" value="{{$menus->namemenu}}">
			</div>
	
			<div class="form-group">
				<input type="submit" class="btn btn-default btn-submit" name="btn-submit" value="Cập nhật" />
			</div>
		</form>
		<div class="select_dynamic">
        	@if(isset($str))
        		{!! $str !!}
        	@endif
    	</div>
		
	</div>
</div>

@stop
@section('other_scripts')
     <script src="{{ asset('gentelella/build/js/custom.js') }}"></script>
    <script src="{{ asset('dashboard/production/js/category.js?v=1.2.1')}}"></script>  
@stop
