@extends('admin.general')
@section('other_styles')
     <!-- Custom Theme Style -->
    <link href="{{ asset('dashboard/build/css/custom.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dashboard/production/css/custom.css?v=0.1.2') }}" rel="stylesheet">  
@stop
@section('content')
<div class="row">
	<div class="col-sm-6">
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
		<form method="post" action="{{url('admin/grantperm')}}">
			{{ csrf_field() }}
			<div class="form-group row">
                <label class="col-lg-4 col-form-label" for="sel_idposttype">Thêm quyền <span class="text-danger">*</span></label>
                <div class="col-lg-8">
                    <select class="form-control cus-drop" name="sel_idrole">
                    	<option value="">Chọn vai trò</option>
                    	@foreach($roles as $row)
                    		 <option value="{{ $row['idrole'] }}">{{ $row['name'] }}</option>
						@endforeach        
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-lg-4 col-form-label" for="sel_iduser">Cấp quyền <span class="text-danger">*</span></label>
                <div class="col-lg-8">
                    <select class="form-control cus-drop" name="sel_to_iduser">
                    	<option value="">chọn người dùng</option>
                    	@foreach($users as $row)
                    		 <option value="{{ $row['id'] }}">{{ $row['name'] }}</option>
						@endforeach        
                    </select>
                </div>
            </div>
			<div class="form-group">
				<input type="submit" class="btn btn-default btn-submit" name="btn-submit" value="Xác nhận" />
			</div>
		</form>
	</div>
</div>
@stop
@section('other_scripts')
 <script src="{{ asset('dashboard/build/js/custom.js') }}"></script>
 <script src="{{ asset('dashboard/production/js/custom.js?v=0.0.2') }}"></script>

@stop
