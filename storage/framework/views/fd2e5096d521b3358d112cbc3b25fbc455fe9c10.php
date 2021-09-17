
<?php $__env->startSection('other_styles'); ?>
     <!-- Custom Theme Style -->
    <link href="<?php echo e(asset('gentelella/build/css/custom.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('dashboard/production/css/custom.css?v=0.1.2')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $_namecattype = Request::segment(4);
$_namecattype = isset($_namecattype) ? Request::segment(4) : 'product'; ?>
<?php $__env->startSection('content'); ?>
<div class="row">
	<div class="col-sm-6">
		<h2>Thêm mới</h2>
		<?php if(count($errors) > 0): ?>
		<div class="alert alert-danger">
			<ul>
				<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<li><?php echo e($error); ?></li>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</ul>
		</div>
		<?php endif; ?>
		<form class="frm_create_category" method="post" action="<?php echo e(url('admin/category/storeby/'.$_namecattype)); ?>">
			<?php echo e(csrf_field()); ?>

			<div class="form-group row">
				<label class="col-lg-4 col-form-label" for="parent">Tên chuyên mục <span class="text-danger">*</span></label>
                <div class="col-lg-8">
					<input type="text" name="namecat" class="form-control" placeholder="Tên chuyên mục">
				</div>
			</div>
			
			<div class="form-group row">
                <label class="col-lg-4 col-form-label" for="sel_idparent">Chuyên mục <span class="text-danger">*</span></label>
                <div class="col-lg-8">
                    <select class="form-control cus-drop" name="sel_idparent">
                    	<option value="0">Thuộc chuyên mục</option>
                    	<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    		 <option value="<?php echo e($row['idcategory']); ?>"><?php echo e($row['namecat']); ?></option>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>        
                    </select>
                </div>
            </div>
			<div class="form-group row">
                <label class="col-lg-4 col-form-label" for="sel_idcattype">Kiểu chuyên mục <span class="text-danger">*</span></label>
                <div class="col-lg-8">
                    <select class="form-control cus-drop" name="sel_idcattype">
                    	<option value="">Kiểu chuyên mục</option>
                    	<?php $__currentLoopData = $categorytypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    		 <option value="<?php echo e($row['idcattype']); ?>" <?php echo e($row['catnametype'] == $_namecattype ? 'selected="selected"' : ''); ?>><?php echo e($row['catnametype']); ?></option>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>        
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-lg-4 col-form-label" for="sel_idstoretype">Thuộc kiểu post <span class="text-danger">*</span></label>
                <div class="col-lg-8">
                    <select class="form-control cus-drop" name="sel_idstoretype">
                    	<option value="0">Kiểu post</option>
                    	<?php $__currentLoopData = $rs_store; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    		 <option value="<?php echo e($row['idcattype']); ?>" <?php echo e($row['catnametype'] == $_namecattype ? 'selected="selected"' : ''); ?>><?php echo e($row['catnametype']); ?></option>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>        
                    </select>
                </div>
            </div>
            <div class="form-group row">
				<label class="col-lg-4 col-form-label" for="parent">URL <span class="text-danger">*</span></label>
                <div class="col-lg-8">
					<input type="text" name="url" class="form-control" placeholder="URL">
				</div>
			</div>
            <div class="form-group row">
				<label class="col-lg-4 col-form-label" for="parent">Route <span class="text-danger">*</span></label>
                <div class="col-lg-8">
					<input type="text" name="pathroute" class="form-control" placeholder="Route">
				</div>
			</div>
			<div class="form-group frm-image thumbnails">
                    <p><a href="javascript:void(0)" onclick="performClick('file1');"><i class="fa fa-camera-retro" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Ảnh đại diện</a>
                    <input style="display:none" type="file" name="thumbnail" class="file" id="file1" accept="image/*"/></p>
                    <p><canvas id="my_canvas_id1" width="0px" height="0px"></canvas></p>
                    
			</div>
			<div class="form-group row">
				<label class="col-lg-4 col-form-label" for="sel_idcattype">ID Group <span class="text-danger">*</span></label>
                <div class="col-lg-8">
					<input type="text" name="idgroup" class="form-control" value="">
				</div>
			</div>
			<div class="form-group">
				<input type="submit" class="btn btn-default btn-submit" name="btn-submit" value="Xác nhận" />
			</div>
			
		</form>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('other_scripts'); ?>
    
    <script src="<?php echo e(asset('gentelella/build/js/custom.js')); ?>"></script>
    <script src="<?php echo e(asset('dashboard/production/js/custom.js?v=0.0.2')); ?>"></script>
    <script src="<?php echo e(asset('dashboard/production/js/uploadmultifile.js?v=0.8.9')); ?>"></script>
    <script src="<?php echo e(asset('dashboard/production/js/process_images/capture_image.js?v=0.3.1')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.general', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/crmenergy/domains/crm.secretenergy.net/public_html/resources/views/admin/category/create.blade.php ENDPATH**/ ?>