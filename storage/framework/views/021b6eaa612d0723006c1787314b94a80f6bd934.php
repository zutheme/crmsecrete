

<?php $__env->startSection('other_styles'); ?>
   <!-- Bootstrap -->
    <link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <!-- Datatables -->
    <link href="<?php echo e(asset('gentelella/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('gentelella/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('gentelella/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('gentelella/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('gentelella/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css')); ?>" rel="stylesheet">
    
     <!-- Custom Theme Style -->
    <!--<link href="<?php echo e(asset('dashboard/build/css/custom.min.css')); ?>" rel="stylesheet">-->
    <link href="<?php echo e(asset('dashboard/production/css/custom.css?v=0.1.2')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
   <div class="row">
	<div class="col-12">
	<div class="card">
	    <div class="card-body">
	        <h4 class="card-title">Thông tin nguồn</h4>
	        <?php if($message = Session::get('success')): ?>
	        	<h6 class="card-subtitle"><?php echo e($message); ?></h6>
			<?php endif; ?>
			<div align="right">
				<a class="btn btn-default btn-primary" href="<?php echo e(route('admin.cattype.create')); ?>">Thêm mới</a>
			</div>
	        <div class="table-responsive m-t-40">
	            <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
	                <thead>
	                    <tr>
	                        <th>Tên loại</th>
							<th>-</th>
							<th>-</th>
	                    </tr>
	                </thead>
	                <tfoot>
	                    <tr>
	                       <th>Tên loại</th>
	                       <th>-</th>
						   <th>-</th>						
	                    </tr>
	                </tfoot>
	                <tbody>
	                	<?php $__currentLoopData = $cattypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr>
								<td><?php echo e($row['catnametype']); ?></td>						
								<td class="btn-control"><a class="btn btn-primary btn-edit" href="<?php echo e(action('Admin\CategoryTypeController@edit',$row['idcattype'])); ?>"><i class="fa fa-edit"></i></a></td>
								<td class="btn-control">
								     <form method="post" class="delete_form" action="<?php echo e(action('Admin\CategoryTypeController@destroy', $row['idcattype'])); ?>">
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
    <!-- bootstrap-daterangepicker -->
    <script src="<?php echo e(asset('gentelella/vendors/moment/min/moment.min.js')); ?>"></script>
    <script src="<?php echo e(asset('gentelella/vendors/bootstrap-daterangepicker/daterangepicker.js')); ?>"></script>
    <!-- bootstrap-datetimepicker -->    
    <script src="<?php echo e(asset('gentelella/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js')); ?>"></script>
    <!-- Custom Theme Scripts -->
    <!-- <script src="<?php echo e(asset('gentelella/build/js/custom.min.js')); ?>"></script>  -->
    <script src="<?php echo e(asset('gentelella/build/js/custom-build.js?v=0.1.3')); ?>"></script> 
     
    
   
     <!--<script src="<?php echo e(asset('dashboard/production/js/filter_select_category.js?v=0.2.1')); ?>"></script> 
	 <script src="<?php echo e(asset('public/js/library.js?v=0.4.6')); ?>"></script>-->
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.general', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/crmenergy/domains/crm.secretenergy.net/public_html/resources/views/admin/cattype/index.blade.php ENDPATH**/ ?>