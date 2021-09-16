<div class="col-md-9 col-xs-12">
	<div class="col-md-6 col-xs-12">
		<h2>Mã đề:<?php echo e($product[0]['idproduct']); ?></h2>
	</div>
	<div class="col-md-6 col-xs-12">
		<div class="form-group group-exam">
			<a href="javascript:void(0);" class="btn bnt-default btn-primary btn-open-exam"><i class="fa fa-angle-down" aria-hidden="true"></i></a>
		</div>
	</div>
</div>
<form class="frm_edit_post" method="post" action="<?php echo e(action('Admin\PostsController@update',$idproduct)); ?>" enctype="multipart/form-data" style="width:100%">
	<?php echo e(csrf_field()); ?>

	<input type="hidden" name="_method" value="PATCH">
	<input type="hidden" name="idimp" value="<?php echo e($product[0]['idimp']); ?>">
	<div class="col-md-9 col-xs-12">
		<div class="form-group">
			<input type="text" name="title" class="form-control" placeholder="Chủ đề" required value="<?php echo e($product[0]['namepro']); ?>" />
		</div>
		
		<div class="form-group">
			<input type="text" name="slug" class="form-control" placeholder="Slug" value="<?php echo e($product[0]['slug']); ?>">
		</div>
		<div class="form-group">
			<textarea id="editor" name="body"><?php echo e($product[0]['description']); ?></textarea>
		</div>
		<div id="exam" class="exam" style="display:none">
		 <div class="form-group short_desc">
			<label class="control-label">Mô tả vắn tắt</label>
			 <textarea id="shorteditor" name="short_desc" class="form-control" rows="3" cols="50" placeholder="Mô tả vắn tắt"><?php echo e($product[0]['short_desc']); ?></textarea>
		 </div>
		<div class="ln_solid"></div>
		<div class="form-group"> 
			<div class="col-lg-12">
				<?php if(isset($gallery)): ?> 
					<script>
					var item ='';
					var list_gallery = [];
					</script> 
					<ul class="multi-file">
						<?php $__currentLoopData = $gallery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<li class="item<?php echo e($row['idfile']); ?>">
							<input class="producthasfile" type="hidden" name="edit-gallery[]" value="0">	
							<a href="javascript:void(0);" onclick="performClickByClass(this);">Chỉnh sửa&nbsp;&nbsp;<i class="fa fa-paperclip" aria-hidden="true"></i>&nbsp;&nbsp;</a>
							<input onchange="editfile(event,this,'<?php echo e($row['idproducthasfile']); ?>');" type="file" style="display: none;" name="file_attach[]" class="file file_attach" accept=".xlsx,.xls,image/*,.doc, .docx,.ppt, .pptx,.txt,.pdf,.zip,.rar" />
							<label class="namefile"></label>
							<p><canvas class="my_canvas gallery" width="0px" height="0px"></canvas></p>
							<script> 
								var item = '<?php echo e(asset($row['urlfile'])); ?>';
								if(item) {
									list_gallery.push(item); 
								}
							</script>
							<p><a href="javascript:void(0);" class="btn bnt-default btn-trash" style="display: block;" onclick="trash_item('item<?php echo e($row['idfile']); ?>','<?php echo e($row['idproducthasfile']); ?>');"><i class="fa fa-trash" aria-hidden="true"></i></a></p>
							<p><img class="loading-trash" style="display:none;width:30px;" src="<?php echo e(asset('dashboard/production/images/loader.gif')); ?>"></p>
						</li>
						 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</ul>
				<?php endif; ?>
				<p><input type="button" style="display: block" class="btn btn-default btn-more-file" name="btn-more-file" value="Thêm file" /></p>
				 <div class="ln_solid"></div>
			</div>
		</div>
		  <div class="form-group row">
			<label class="control-label col-md-3 col-sm-3 col-xs-12">Link:</label>
			<div class="col-md-9 col-sm-9 col-xs-12">
			  <input type="text" name="link" class="form-control" value="<?php echo e($product[0]['link']); ?>" />
			</div>
		  </div>
		  <div class="form-group row">
			<label class="control-label col-md-3 col-sm-3 col-xs-12">keyword:</label>
			<div class="col-md-9 col-sm-9 col-xs-12">
			  <input type="text" name="keyword" class="form-control" value="<?php echo e($product[0]['keyword']); ?>" />
			</div>
		  </div>
		 <div class="form-group row">
			<label class="control-label col-md-3 col-sm-3 col-xs-12">Feature:</label>
			<div class="col-md-9 col-sm-9 col-xs-12">
			  <input type="number" name="feature" class="form-control" value="<?php echo e($product[0]['feature']); ?>" />
			</div>
		  </div>
		  <div class="form-group row">
			<label class="control-label col-md-3 col-sm-3 col-xs-12">ID youtube:</label>
			<div class="col-md-9 col-sm-9 col-xs-12">
			  <input type="text" name="idyoutube" class="form-control" value="<?php echo e($product[0]['idyoutube']); ?>" />
			</div>
		  </div>
		</div>
		<div class="form-group row">
			<div class="col-md-12 text-center">
			  <a class="btn btn-default btn-primary" href="<?php echo e(action('Admin\PostsController@create',['idposttype' => 29, 'idparent' => $idproduct,'idcrosstype' => 7])); ?>" class="btn btn-default btn-create-new">Tạo mới câu hỏi</a>
			</div>
		 </div>
		<div class="form-group row">
			<div class="col-md-12">
			<?php echo $__env->make('admin.post.list-quiz', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			</div>
		</div>
		<div class="form-group row">
			<div class="col-md-12">
			<?php echo $__env->make('admin.post.exam-dragula', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			</div>
		</div>
	</div>
	<div class="col-md-3 col-xs-12">
		<div class="form-group row">
			<label class="col-lg-4 col-form-label" for="sel_idposttype">Kiểu post <span class="text-danger">*</span></label>
			<div class="col-lg-8">
				<select class="form-control cus-drop" name="sel_idposttype" required >
					<option value="">Chọn kiểu post</option>
					<?php $__currentLoopData = $posttypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<option value="<?php echo e($row['idposttype']); ?>" <?php echo e($row['idposttype'] == $idposttype ? 'selected="selected"' : ''); ?>><?php echo e($row['nametype']); ?></option>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>        
				</select>
			</div>
		</div>
		<div class="form-group row">
			<label class="col-lg-4 col-form-label" for="sel_idstatustype">Trạng thái <span class="text-danger">*</span></label>
			<div class="col-lg-8">
				<select class="form-control cus-drop" name="sel_idstatustype" required >
					<option value="">Chọn trạng thái</option>
					<?php $__currentLoopData = $statustypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						 <option value="<?php echo e($row['id_status_type']); ?>" <?php echo e($row['id_status_type'] == $product[0]['idstatus_type'] ? 'selected="selected"' : ''); ?>><?php echo e($row['name_status_type']); ?></option>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>        
				</select>
			</div>
		</div>
		<?php echo $__env->make('admin.post.create-survey-category', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		
		<div class="form-group row frm-image thumbnails">
			<p><a href="javascript:void(0)" onclick="performClick('file1');"><i class="fa fa-camera-retro" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Ảnh đại diện</a>
			<input style="display:none" type="file" name="thumbnail" class="file" id="file1" accept="image/*"/></p>
			<p><canvas id="canvas_thumbnail" width="0px" height="0px"></canvas></p>
		</div>
		<div class="form-group row">
			<label class="control-label col-md-3 col-sm-3 col-xs-12">template:</label>
			<div class="col-md-9 col-sm-9 col-xs-12">
			  <input type="text" name="template" class="form-control" value="<?php echo e($product[0]['template']); ?>" />
			</div>
		  </div>			
		<div class="form-group row text-center">
			<input type="submit" class="btn btn-default btn-primary btn-submit" name="btn-submit" value="Xác nhận" />
		</div>
	 </div> 
</form>
	<?php /**PATH /home/crmenergy/domains/crm.secretenergy.net/public_html/resources/views/admin/post/edit-exam.blade.php ENDPATH**/ ?>