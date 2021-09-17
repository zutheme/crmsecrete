
<?php $__env->startSection('other_styles'); ?>
    <!-- Custom Theme Style -->
    <link href="<?php echo e(asset('gentelella/build/css/custom.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('dashboard/production/css/custom.css?v=0.1.3')); ?>" rel="stylesheet">  
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
		<form class="frm_create_permission" method="post" action="<?php echo e(url('admin/permission')); ?>" width="100%">
			<?php echo e(csrf_field()); ?>

			<div class="form-group">
				<input type="text" name="name" class="form-control" placeholder="Tên quyền">
			</div>
			<div class="form-group">
				<textarea name="description" rows="4" cols="100" class="form-control" placeholder="Mô tả..."></textarea>
			</div>
			<div class="form-group"> 
            	<select class="select2_single form-control" name="idpermcommand">
            		<option value="0">Chọn lệnh thực thi ...</option>
                	<?php $__currentLoopData = $perm_commands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($row['idpercommand']); ?>"><?php echo e($row['command']); ?></option>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
				 </select>                                         
            </div>
            <div class="form-group">
            	<select class="form-control type-category" name="selidcategory" required="true">
            		<option value="">Chuyên mục</option>
            		<?php $__currentLoopData = $categorytypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            			<option value="<?php echo e($row['idcattype']); ?>"><?php echo e($row['catnametype']); ?></option>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>        
	         	</select>
	        </div>
			<div class="form-group">
	            <div class="catebyidcatetype">     
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
    <script src="<?php echo e(asset('dashboard/production/js/select-typecate.js?v=0.0.0.5')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.general', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/crmenergy/domains/crm.secretenergy.net/public_html/resources/views/admin/permission/create.blade.php ENDPATH**/ ?>