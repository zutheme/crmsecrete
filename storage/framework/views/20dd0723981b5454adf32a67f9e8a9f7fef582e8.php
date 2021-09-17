
<?php $__env->startSection('other_styles'); ?>
    <!-- Custom Theme Style -->
    <link href="<?php echo e(asset('dashboard/build/css/custom.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('dashboard/production/css/custom.css?v=0.1.2')); ?>" rel="stylesheet">  
<?php $__env->stopSection(); ?>
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
		<?php if(\Session::has('success')): ?>
			<div class="alert alert-success">
				<p><?php echo e(\Session::get('success')); ?></p>
			</div>
		<?php endif; ?>
		<form method="post" action="<?php echo e(url('admin/cattype')); ?>">
			<?php echo e(csrf_field()); ?>

			<div class="form-group">
				<input type="text" name="catnametype" class="form-control" placeholder="Kiểu chuyên mục">
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
<?php echo $__env->make('admin.general', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/crmenergy/domains/crm.secretenergy.net/public_html/resources/views/admin/cattype/create.blade.php ENDPATH**/ ?>