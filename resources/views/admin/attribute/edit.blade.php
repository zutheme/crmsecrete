@extends('admin.general')

@section('other_styles')
    <!-- Custom Theme Style -->
    <link href="{{ asset('dashboard/build/css/custom.min.css') }}" rel="stylesheet">
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
		<form method="post" action="{{ action('Admin\AttributeController@update',$idattribute) }}"  enctype="multipart/form-data" style="width:100%">
			@csrf
			<input type="hidden" name="_method" value="PATCH">
			 <div class="form-group row">
				<label class="col-lg-4 col-form-label" >Tên thuộc tính <span class="text-danger">*</span></label>
				<div class="col-lg-8">
				  <input class="form-control" type="text" name="nameattribute" value="{{ $attributes->nameattribute }}"  required />
				</div>
			  </div>	
			<div class="form-group row">
				<label class="col-lg-4 col-form-label">Kiểu post <span class="text-danger">*</span></label>
				<div class="col-lg-8">
					<select class="form-control" name="sel_idposttype" required >
						<option value="">Chọn kiểu post</option>
						@foreach($posttypes as $row)
							<option value="{{ $row['idposttype'] }}" {{ $row['idposttype'] == $attributes->idposttype ? 'selected="selected"' : 29 }}>{{ $row['nametype'] }}</option>
						@endforeach        
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-lg-4 col-form-label">Trạng thái <span class="text-danger">*</span></label>
				<div class="col-lg-8">
					<select class="form-control cus-drop" name="sel_idstatustype" required >
						<option value="">Chọn trạng thái</option>
						@foreach($statustypes as $row)
							 <option value="{{ $row['id_status_type'] }}" {{ $row['id_status_type'] == $attributes->idstatustype ? 'selected="selected"' : 4 }}>{{ $row['name_status_type'] }}</option>
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
    {{-- <script src="{{ asset('dashboard/build/js/custom.min.js') }}"></script> --}}
    <script src="{{ asset('dashboard/build/js/custom.js') }}"></script>
    <script src="{{ asset('dashboard/production/js/custom.js?v=0.0.2') }}"></script>
@stop