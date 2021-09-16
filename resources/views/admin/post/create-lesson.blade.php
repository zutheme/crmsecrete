<form class="frm_create_post" method="post" action="{{ action('Admin\PostsController@store',['idparent' => $idparent,'idcrosstype' => $idcrosstype]) }}" onsubmit="return readytextarea()" enctype="multipart/form-data">
	{{ csrf_field() }}
	<div class="col-md-9 col-xs-12">
	<div class="form-group">		
		@if(isset($idparent))
			<a class="btn btn-default" href="{{ action('Admin\PostsController@edit',$idparent) }}">&nbsp;<i class="fa fa-angle-double-left"></i>&nbsp;Về bài học chính</a>
		@endif
	</div>
	<div class="form-group">
		<input type="text" name="title" class="form-control" placeholder="Chủ đề" required />
	</div>
	{{-- <div class="form-group">
		<input type="text" name="slug" class="form-control" placeholder="Slug">
	</div> --}}
	<div class="form-group">
	  <div class="x_panel">         
		<div class="x_content">
		  <div id="alerts"></div>         
		   <textarea id="editor" name="body"></textarea>
		</div>
	  </div>
	</div>
	 
	  <div class="form-group row short_desc">
		<label class="control-label col-md-3 col-sm-3 col-xs-12">Mô tả vắn tắt</label>
		<div class="col-md-12">
		  <textarea id="shorteditor" name="short_desc" class="form-control" rows="3" cols="50" placeholder=""></textarea>
		</div>
	  </div>
	  
	<div class="form-group row"> 
		<div class="col-lg-12">                
			<ul class="multi-file">
				<li class="item0">	
					<a href="javascript:void(0);" onclick="performClickByClass(this);">Đính kèm&nbsp;&nbsp;<i class="fa fa-paperclip" aria-hidden="true"></i>&nbsp;&nbsp;</a>
					<input onchange="changefile(event,this);" type="file" style="display: none;" name="file_attach[]" class="file file_attach" accept=".xlsx,.xls,image/*,.doc, .docx,.ppt, .pptx,.txt,.pdf,.zip,.rar" />
					<label class="namefile"></label>
					<p><canvas class="my_canvas" width="0px" height="0px"></canvas></p>
					<p><span class="btn bnt-default btn-trash" style="display: none;" onclick="trash('item0');"><i class="fa fa-trash" aria-hidden="true"></i></span></p>
				</li>
			</ul>
			<p><input type="button" style="display: none" class="btn btn-default btn-more-file" name="btn-more-file" value="Thêm file" /></p>
		</div>
	</div>
	<div class="form-group row">
		<label class="control-label col-md-3 col-sm-3 col-xs-12">Keyword:</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
		  <input type="text" name="keyword" class="form-control" />
		</div>
	  </div>
	 <div class="form-group row">
		<label class="control-label col-md-3 col-sm-3 col-xs-12">Link:</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
		  <input type="text" name="link" class="form-control" />
		</div>
	  </div>
		<div class="form-group row">
		<label class="control-label col-md-3 col-sm-3 col-xs-12">Feature:</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
		  <input type="number" name="feature" class="form-control" />
		</div>
	  </div>
	  <div class="form-group row">
		<label class="control-label col-md-3 col-sm-3 col-xs-12">ID youtube:</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
		  <input type="text" name="idyoutube" class="form-control" />
		</div>
	  </div>
	   <div class="form-group row">
		<label class="control-label col-md-3 col-sm-3 col-xs-12">difficult level (0-10):</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
			<input type="number" name="difflevel" class="form-control" value="" min="0" max="10" />
		</div>
	  </div>
	</div>
	<div class="col-md-3 col-xs-12">
		<div class="form-group row">
			<label class="col-lg-4 col-form-label" for="sel_idposttype">Kiểu post <span class="text-danger">*</span></label>
			<div class="col-lg-8">
				<select class="form-control cus-drop" name="sel_idposttype" required >
					<option value="">Chọn kiểu post</option>
					@foreach($posttypes as $row)
						<option value="{{ $row['idposttype'] }}" {{ $row['idposttype'] == $idposttype ? 'selected="selected"' : 3 }}>{{ $row['nametype'] }}</option>
					@endforeach        
				</select>
			</div>
		</div>
		<div class="form-group row">
			<label class="col-lg-4 col-form-label" for="sel_idstatustype">Trạng thái <span class="text-danger">*</span></label>
			<div class="col-lg-8">
				<select class="form-control cus-drop" name="sel_idstatustype" required >
					<option value="">Chọn trạng thái</option>
					@foreach($statustypes as $row)
						 <option value="{{ $row['id_status_type'] }}">{{ $row['name_status_type'] }}</option>
					@endforeach        
				</select>
			</div>
		</div>
		@include('admin.post.create-survey-category')
		<div class="form-group frm-image thumbnails">
			<p><a href="javascript:void(0)" onclick="performClick('file1');"><i class="fa fa-camera-retro" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Ảnh đại diện</a>
			<input style="display:none" type="file" name="thumbnail" class="file" id="file1" accept="image/*"/></p>
			<p><canvas id="my_canvas_id1" width="0px" height="0px"></canvas></p>
			{{-- <p><input class="data_url" type="hidden" name="file_canvas1" value=""></p> --}}
		</div>
		<div class="form-group">
			<label class="control-label col-md-3 col-sm-3 col-xs-12">template:</label>
			<div class="col-md-9 col-sm-9 col-xs-12">
			  <input type="text" name="template" class="form-control" />
			</div>
		  </div>	
		<div class="form-group text-center">
			<input type="submit" class="btn btn-default btn-primary btn-submit" name="btn-submit" value="Xác nhận" />
		</div>
	 </div>
	 
</form>