

<?php $__env->startSection('other_styles'); ?>
      <!-- Custom Theme Style -->
    <link href="<?php echo e(asset('gentelella/build/css/custom.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('dashboard/production/css/custom.css?v=0.1.2')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<?php if(isset($selected)) {
      foreach($selected as $row) {
          $selected_idcat = $row['idcategory'];
			$name_cat =   $row['namecat'] ;
			$selected_idparent = $row['idparent'];
			$name_cat_parent =   $row['parent'];
			$selected_idcattype =  $row['idcattype'];
			$catnametype = $row['catnametype'];
       }
}
$idcattype = Request::segment(5); 
//$idcattype = app('request')->input('idcattype');
?>
<div class="row">
	<div class="col-sm-6">
		<h2>Chỉnh sửa</h2>
		<?php if(count($errors) > 0): ?>
		<div class="alert alert-danger">
			<ul>
				<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<li><?php echo e($error); ?></li>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</ul>
		</div>
		<?php endif; ?>
		<?php if(\Session::has('success')): ?>
			<div class="alert alert-success">
				<p><?php echo e(\Session::get('success')); ?></p>
			</div>
		<?php endif; ?>
		<form class="frm_create_category" method="post" action="<?php echo e(action('Admin\CategoryController@update',$_idcategory)); ?>" enctype="multipart/form-data">
			<?php echo e(csrf_field()); ?>

			<input type="hidden" name="_method" value="PATCH">
			<div class="form-group row">
				<label class="col-lg-4 col-form-label" for="sel_idcattype">Tên chuyên mục <span class="text-danger">*</span></label>
                <div class="col-lg-8">
					<input type="text" name="namecat" class="form-control" value="<?php echo e($categorybyid->namecat); ?>">
				</div>
			</div>
			<div class="form-group row">
                <label class="col-lg-4 col-form-label" for="sel_idcattype">Kiểu chuyên mục <span class="text-danger">*</span></label>
                <div class="col-lg-8">
                    <select class="form-control type-category" name="sel_idcattype">
                    	<option value="">Kiểu chuyên mục</option>
                    	<?php $__currentLoopData = $categorytypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    		<option value="<?php echo e($row['idcattype']); ?>" <?php echo e($row['idcattype'] == $idcattype ? 'selected="selected"' : ''); ?>><?php echo e($row['catnametype']); ?></option>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>        
                    </select>
                </div>
            </div>
			<div class="form-group row">
                <label class="col-lg-4 col-form-label" for="sel_idparent">Chuyên mục <span class="text-danger">*</span></label>
                <div class="col-lg-8">
                    <select class="form-control catebyidcatetype" name="sel_idparent">
                    	<option value="">Thuộc chuyên mục</option>
                    	<?php if(isset($parent_cate)): ?>
	                    	<?php $__currentLoopData = $parent_cate; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	                    		 <option value="<?php echo e($row['idcategory']); ?>" <?php echo e($row['idcategory'] == $selected_idparent ? 'selected="selected"' : ''); ?>><?php echo e($row['namecat']); ?></option>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						<?php endif; ?>        
                    </select>
                </div>
            </div>
            <div class="form-group row">
            	<label class="col-lg-4 col-form-label" for="sel_idcattype">Route <span class="text-danger">*</span></label>
                <div class="col-lg-8">
					<input type="text" name="pathroute" class="form-control" value="<?php echo e($categorybyid->pathroute); ?>">
				</div>
			</div>
			<div class="form-group row">
            	<label class="col-lg-4 col-form-label" for="sel_idcattype">URL <span class="text-danger">*</span></label>
                <div class="col-lg-8">
					<input type="text" name="url" class="form-control" value="<?php echo e($categorybyid->url); ?>">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-lg-4 col-form-label" for="sel_idcattype">ID Group <span class="text-danger">*</span></label>
                <div class="col-lg-8">
					<input type="text" name="idgroup" class="form-control" value="<?php echo e($categorybyid->idgroup); ?>">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-lg-4 col-form-label" for="sel_idcattype">Icon <span class="text-danger">*</span></label>
                <div class="col-lg-8">
					<input type="text" name="icon" class="form-control" value="<?php echo e($categorybyid->icon); ?>">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-lg-4 col-form-label" for="sel_idcattype">Image <span class="text-danger">*</span></label>
                <div class="col-lg-8">
					<img width="200px" src="<?php echo e(asset($categorybyid->url_image)); ?>"/>
				</div>
				
			</div>
			
            <div class="form-group frm-image thumbnails">
                <p><a href="javascript:void(0)" onclick="performClick('file1');"><i class="fa fa-camera-retro" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Ảnh đại diện</a>
                <input style="display:none" type="file" name="thumbnail" class="file" id="file1" accept="image/*"/></p>
                <p><canvas id="canvas_thumbnail" width="0px" height="0px"></canvas></p>
			</div>
           
			<div class="form-group">
				<input type="submit" class="btn btn-default btn-submit" name="btn-submit" value="Cập nhật" />
			</div>
		</form>
		
	</div>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('other_scripts'); ?>
	<script>var _url_thumbnail = '<?php echo e(asset($categorybyid->url_image)); ?>';</script>
    <script src="<?php echo e(asset('gentelella/build/js/custom.js')); ?>"></script>
    <script src="<?php echo e(asset('dashboard/production/js/uploadmultifile.js?v=0.8.9')); ?>"></script>
    <script src="<?php echo e(asset('dashboard/production/js/process_images/capture_image.js?v=0.3.1')); ?>"></script>
    <script src="<?php echo e(asset('dashboard/production/js/media-galerry.js?v=0.8.0')); ?>"></script>
    <script src="<?php echo e(asset('dashboard/production/js/category.js?v=1.2.3')); ?>"></script>   
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.general', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/crmenergy/domains/crm.secretenergy.net/public_html/resources/views/admin/category/edit.blade.php ENDPATH**/ ?>