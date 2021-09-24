<?php use \App\Http\Controllers\Helper\HelperController; ?>
<?php $curent_idcategory = 0 ;
	$title ='';
	if(isset($rs_lpro)){
		$template = $rs_lpro[0]['nametype'];
	}else{
		$template ='archive';
	}
	$curent_slug = Request::segment(1);
	if(isset($_idcategory)) { $curent_idcategory = $_idcategory; }
	if(isset($rs_cat_product)) {
	 	$title = HelperController::Getrootcate($rs_cat_product,$curent_idcategory,'',0); 
	}
	$curent_posttype = Request::segment(3); 
?> 

<?php $__env->startSection('other_styles'); ?>
<?php if(isset($rs_lpro) and $rs_lpro[0]['nametype'] =='product' ): ?>
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/riode/vendor/nouislider/nouislider.min.css')); ?>">
		<!-- Main CSS File -->
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/riode/css/style.min.css')); ?>">
<?php else: ?>
<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	<?php if(count($errors) > 0): ?>
		<?php echo e($errors); ?>

	<?php endif; ?>
	<?php if(isset($rs_lpro)): ?>
		 <?php if(isset($rs_lpro[0]['_commit'])): ?>
		   <?php if($rs_lpro[0]['_commit'] > 0 and isset($rs_lpro[0]['nametype'])): ?>
				<?php if($rs_lpro[0]['nametype']=='product'): ?>
					<?php echo $__env->make('teamilk.product.layout-product', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
				<?php elseif($rs_lpro[0]['nametype']=='post'): ?>
					<?php echo $__env->make('teamilk.product.layout-post', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
				<?php elseif($rs_lpro[0]['nametype']=='video'): ?>
					<?php echo $__env->make('teamilk.product.layout-video', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
				<?php else: ?>
					<?php echo $__env->make('teamilk.product.layout-post', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
				<?php endif; ?>
			<?php else: ?>
				<?php echo $__env->make('teamilk.product.no-post', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			<?php endif; ?>
		<?php else: ?>
			<?php echo $__env->make('teamilk.product.no-permit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		<?php endif; ?>	
	<?php else: ?>
		<?php echo $__env->make('teamilk.product.no-post', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('other_scripts'); ?>
   
<?php $__env->stopSection(); ?>
<?php echo $__env->make('teamilk.master',compact('title','template','rs_feature','rs_listpostpular','rs_lpro','_idcategory','rs_cat_product','iduser','rs_menu2','rs_menu3','rs_menu1','iduser'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/crmenergy/domains/crm.secretenergy.net/public_html/resources/views/teamilk/product/index.blade.php ENDPATH**/ ?>