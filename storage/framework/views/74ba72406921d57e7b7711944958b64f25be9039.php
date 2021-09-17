

<?php $__env->startSection('other_styles'); ?>
   <!-- Datatables -->
      <link href="<?php echo e(asset('gentelella/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css')); ?>" rel="stylesheet">
      <link href="<?php echo e(asset('gentelella/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css')); ?>" rel="stylesheet">
      <link href="<?php echo e(asset('gentelella/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css')); ?>" rel="stylesheet">
      <link href="<?php echo e(asset('gentelella/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css')); ?>" rel="stylesheet">
      <link href="<?php echo e(asset('gentelella/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css')); ?>" rel="stylesheet">
    
     <!-- Custom Theme Style -->
    <link href="<?php echo e(asset('gentelella/build/css/custom.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('gentelella/production/css/custom.css?v=0.1.2')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
   <div class="row">
	<div class="col-12">
	<div class="card">
	    <div class="card-body">
	        <h4 class="card-title">Thông tin đăng ký</h4>
	        <?php if($message = Session::get('success')): ?>
	        	<h6 class="card-subtitle"><?php echo e($message); ?></h6>
			<?php endif; ?>
			<div align="right">
				<a class="btn btn-default btn-primary" href="<?php echo e(route('admin.permission.create')); ?>">Thêm mới</a>
			</div>
	        
	          <div class="x_content">
	           <table id="datatable" class="table table-striped table-bordered"  width="100%">
	                <thead>
	                    <tr>
	                        <th>Tên quyền</th>
							<th>Mô tả</th>
							<th>Thực thi</th>
							<th>Chuyên mục</th>
							<th>-</th>
							<th>-</th>
	                    </tr>
	                </thead>
	                <tfoot>
	                    <tr>
	                        <th>Tên quyền</th>
							<th>Mô tả</th>
							<th>Thực thi</th>
							<th>Chuyên mục</th>
							<th>-</th>
							<th>-</th>
	                    </tr>
	                </tfoot>
	                <tbody>
	                	<?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr>
								<td><?php echo e($row['name']); ?></td>
								<td><?php echo e($row['description']); ?></td>
								<td><?php echo e($row['command']); ?></td>
								<td><?php echo e($row['namecat']); ?></td>			
								<td class="btn-control"><a class="btn btn-primary btn-edit" href="<?php echo e(action('Admin\PermissionController@edit',$row['idperm'])); ?>"><i class="fa fa-edit"></i></a></td>
								<td class="btn-control">
								     <form method="post" class="delete_form" action="<?php echo e(action('Admin\PermissionController@destroy', $row['idperm'])); ?>">
								      <?php echo e(csrf_field()); ?>

								      <input type="hidden" name="_method" value="DELETE" />
								      <button type="submit" class="btn btn-danger btn-delete"><i class="fa fa-trash" aria-hidden="true"></i></button>
								     </form>
								</td>
							</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                
	                </tbody>
	            </table>
	        </div>
	    </div>

	</div>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('other_scripts'); ?>
    <!-- Datatables -->
    <script src="<?php echo e(asset('gentelella/vendors/datatables.net/js/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('gentelella/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('gentelella/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')); ?>"></script>
    <script src="<?php echo e(asset('gentelella/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('gentelella/vendors/datatables.net-buttons/js/buttons.flash.min.js')); ?>"></script>
    <script src="<?php echo e(asset('gentelella/vendors/datatables.net-buttons/js/buttons.html5.min.js')); ?>"></script>
    <script src="<?php echo e(asset('gentelella/vendors/datatables.net-buttons/js/buttons.print.min.js')); ?>"></script>
    <script src="<?php echo e(asset('gentelella/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')); ?>"></script>
    <script src="<?php echo e(asset('gentelella/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js')); ?>"></script>
    <script src="<?php echo e(asset('gentelella/vendors/datatables.net-responsive/js/dataTables.responsive.min.js')); ?>"></script>
    <script src="<?php echo e(asset('gentelella/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')); ?>"></script>
    <script src="<?php echo e(asset('gentelella/vendors/datatables.net-scroller/js/dataTables.scroller.min.js')); ?>"></script>
    <script src="<?php echo e(asset('gentelella/vendors/jszip/dist/jszip.min.js')); ?>"></script>
    <script src="<?php echo e(asset('gentelella/vendors/pdfmake/build/pdfmake.min.js')); ?>"></script>
    <script src="<?php echo e(asset('gentelella/vendors/pdfmake/build/vfs_fonts.js')); ?>"></script>
      <!-- Custom Theme Scripts -->
    
    <script src="<?php echo e(asset('gentelella/build/js/custom.js')); ?>"></script>
    <script src="<?php echo e(asset('gentelella/production/js/custom.js?v=0.0.2')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.general', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/crmenergy/domains/crm.secretenergy.net/public_html/resources/views/admin/permission/index.blade.php ENDPATH**/ ?>