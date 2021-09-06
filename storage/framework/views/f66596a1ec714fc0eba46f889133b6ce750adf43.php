<?php 	$idimpcross = app('request')->input('idimpcross'); 
		$no_thumbnail = 'dashboard/production/images/no_photo.jpg';
		//$idposttype = Request::segment(6);
		$idposttype = isset($_id_post_type) ? $_id_post_type : 3;
		$_posttype = isset($_posttype) ? $_posttype : 'post';
?>


<?php $__env->startSection('other_styles'); ?>
	<?php if($_posttype == 'exam'): ?>
		 <!-- Bootstrap -->
		<link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
		<!-- Datatables -->
		<link href="<?php echo e(asset('gentelella/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css')); ?>" rel="stylesheet">
		<link href="<?php echo e(asset('gentelella/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css')); ?>" rel="stylesheet">
		<link href="<?php echo e(asset('gentelella/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css')); ?>" rel="stylesheet">
		<link href="<?php echo e(asset('gentelella/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css')); ?>" rel="stylesheet">
		<link href="<?php echo e(asset('gentelella/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css')); ?>" rel="stylesheet">
	<?php endif; ?>
    <link href="<?php echo e(asset('dashboard/production/css/custom.css?v=0.8.5')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('gentelella/build/css/custom.min.css')); ?>" rel="stylesheet">
    <style>
		.ck-editor__editable_inline {
		    min-height: 100px;
		    margin-bottom: 15px;
	}
	</style> 
	 <link href="<?php echo e(asset('gentelella/build/css/custom-quiz.css?v=0.0.2')); ?>" rel="stylesheet">
	 <link href="<?php echo e(asset('node_modules/dragula/dist/dragula.css')); ?>" rel='stylesheet' type='text/css' />
	 <link href="<?php echo e(asset('node_modules/dragula/example/example.css?v=0.0.3')); ?>" rel='stylesheet' type='text/css' />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div class="row">
	<?php if(isset($_posttype) && $_posttype == 'product' || $idposttype == 10): ?>
		<?php echo $__env->make('admin.post.edit-product', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php elseif($_posttype == 'post'): ?>
		<?php echo $__env->make('admin.post.edit-post', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php elseif($_posttype == 'survey'): ?>
		<?php echo $__env->make('admin.post.edit-survey', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php elseif($_posttype == 'phone'): ?>
		<?php echo $__env->make('admin.post.edit-phone', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php elseif($_posttype == 'sms'): ?>
		<?php echo $__env->make('admin.post.edit-phone', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php elseif($_posttype == 'email'): ?>
		<?php echo $__env->make('admin.post.edit-phone', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php elseif($_posttype == 'booking'): ?>
		<?php echo $__env->make('admin.post.edit-phone', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php elseif($_posttype == 'consultant'): ?>
		<?php echo $__env->make('admin.post.edit-phone', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php elseif($_posttype == 'order'): ?>
		<?php echo $__env->make('admin.post.edit-order', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php elseif($_posttype == 'exam'): ?>
		<?php echo $__env->make('admin.post.edit-exam', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php elseif($_posttype == 'lesson'): ?>
		<?php echo $__env->make('admin.post.edit-lesson', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php else: ?>
		<?php echo $__env->make('admin.post.edit-another-type', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php endif; ?>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('other_scripts'); ?>
 	<script>
 		var _start_date_sl = '';
  		var _end_date_sl = '';
		var _idproduct = '<?php echo e($idproduct); ?>';
		var _posttype = '<?php echo e($_posttype); ?>';
		var _ckeditor_route_upload = '<?php echo e(route('ckeditor.upload')); ?>';
		var _url_thumbnail = '<?php echo e(asset($product[0]['url_thumbnail'])); ?>';
	</script>
	<?php if($_posttype == 'exam'): ?>
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
	<?php endif; ?>
	<script src="<?php echo e(asset('gentelella/vendors/moment/min/moment.min.js')); ?>"></script>
	<script src="<?php echo e(asset('gentelella/vendors/bootstrap-daterangepicker/daterangepicker.js')); ?>"></script>
    <!-- bootstrap-datetimepicker -->    
    <!-- morris.js -->
    <script src="<?php echo e(asset('gentelella/vendors/raphael/raphael.min.js')); ?>"></script>
    <script src="<?php echo e(asset('gentelella/vendors/morris.js/morris.min.js')); ?>"></script>
    <!-- bootstrap-progressbar -->
    <script src="<?php echo e(asset('gentelella/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js')); ?>"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="<?php echo e(asset('gentelella/vendors/moment/min/moment.min.js')); ?>"></script>
    <script src="<?php echo e(asset('gentelella/vendors/bootstrap-daterangepicker/daterangepicker.js')); ?>"></script>
    <script src="<?php echo e(asset('gentelella/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js')); ?>"></script>
    <!-- Custom Theme Scripts -->
    <script src="<?php echo e(asset('gentelella/build/js/custom.min.js')); ?>"></script>

    <script src="<?php echo e(asset('dashboard/production/js/process_images/capture_image.js?v=0.3.1')); ?>"></script>
  	
    
	<script src="<?php echo e(asset('editor-build/build/ckeditor.js')); ?>"></script>
	<script src="<?php echo e(asset('editor-build/ckeditor-interactive/js/classic-editor5.js?v=0.1.0')); ?>"></script>
	<!-- jQuery Tags Input -->
	<script src="<?php echo e(asset('gentelella/vendors/jquery.tagsinput/src/jquery.tagsinput.js')); ?>"></script>
	<script src="<?php echo e(asset('public/js/library.js?v=0.4.6')); ?>"></script>
	<script src="<?php echo e(asset('dashboard/production/js/uploadmultifile.js?v=0.8.9')); ?>"></script>
    <script src="<?php echo e(asset('dashboard/production/js/media-galerry.js?v=0.8.1')); ?>"></script>

    <script src="<?php echo e(asset('dashboard/production/js/filter_create_category.js?v=0.2.8')); ?>"></script> 
    <script src="<?php echo e(asset('dashboard/production/js/edit_update_category.js?v=0.0.9.4')); ?>"></script> 
    <script src="<?php echo e(asset('dashboard/production/js/interactive/select_category_tag.js?v=0.0.0.8')); ?>"></script>
	<script src="<?php echo e(asset('gentelella/production/js/custom-quiz.js?v=0.0.0.6')); ?>"></script>
	<script src="<?php echo e(asset('node_modules/dragula/dist/dragula.js?v=0.0.3')); ?>"></script>
	<script src="<?php echo e(asset('node_modules/dragula/example/example.min.js?v=0.0.1')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.general', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/crmenergy/domains/crm.secretenergy.net/public_html/resources/views/admin/post/edit.blade.php ENDPATH**/ ?>