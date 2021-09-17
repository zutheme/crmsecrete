

<?php $__env->startSection('other_styles'); ?>
    <!-- Custom Theme Style -->
    <link href="<?php echo e(asset('dashboard/build/css/custom.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('dashboard/production/css/custom.css?v=0.1.2')); ?>" rel="stylesheet">  
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
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
		<form method="post" action="<?php echo e(action('Admin\AttributeController@update',$idattribute)); ?>"  enctype="multipart/form-data" style="width:100%">
			<?php echo csrf_field(); ?>
			<input type="hidden" name="_method" value="PATCH">
			 <div class="form-group row">
				<label class="col-lg-4 col-form-label" >Tên thuộc tính <span class="text-danger">*</span></label>
				<div class="col-lg-8">
				  <input class="form-control" type="text" name="nameattribute" value="<?php echo e($attributes->nameattribute); ?>"  required />
				</div>
			  </div>	
			<div class="form-group row">
				<label class="col-lg-4 col-form-label">Kiểu post <span class="text-danger">*</span></label>
				<div class="col-lg-8">
					<select class="form-control" name="sel_idposttype" required >
						<option value="">Chọn kiểu post</option>
						<?php $__currentLoopData = $posttypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<option value="<?php echo e($row['idposttype']); ?>" <?php echo e($row['idposttype'] == $attributes->idposttype ? 'selected="selected"' : 29); ?>><?php echo e($row['nametype']); ?></option>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>        
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-lg-4 col-form-label">Trạng thái <span class="text-danger">*</span></label>
				<div class="col-lg-8">
					<select class="form-control cus-drop" name="sel_idstatustype" required >
						<option value="">Chọn trạng thái</option>
						<?php $__currentLoopData = $statustypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							 <option value="<?php echo e($row['id_status_type']); ?>" <?php echo e($row['id_status_type'] == $attributes->idstatustype ? 'selected="selected"' : 4); ?>><?php echo e($row['name_status_type']); ?></option>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>        
					</select>
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
    
    <script src="<?php echo e(asset('dashboard/build/js/custom.js')); ?>"></script>
    <script src="<?php echo e(asset('dashboard/production/js/custom.js?v=0.0.2')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.general', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/crmenergy/domains/crm.secretenergy.net/public_html/resources/views/admin/attribute/edit.blade.php ENDPATH**/ ?>