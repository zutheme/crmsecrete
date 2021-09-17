<?php use \App\Http\Controllers\Helper\HelperController;
	$extend = '';
 ?>
<?php if(isset($product)): ?>
	<?php $_posttype = $product[0]['nametype']; 
		  $_template = $product[0]['template'];
	?>
<?php endif; ?>



<?php $__env->startSection('other_styles'); ?>
  
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<?php if(isset($product) and $product[0]['_commit'] > 0): ?>
	<?php if($_posttype == 'lesson'): ?>
		<?php echo $__env->make('teamilk.product.show-lesson', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php elseif($_posttype=='page'): ?>
		<?php if(isset($_template)): ?>
			<?php $template = 'teamilk.product.template.'.$product[0]['template']; ?>
				<?php if(\View::exists($template)): ?>
					<?php echo $__env->make($template, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
				<?php else: ?>
					<?php echo $__env->make('teamilk.product.page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
				<?php endif; ?>
		<?php else: ?>
			<?php echo $__env->make('teamilk.product.no-post', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		<?php endif; ?>
	<?php else: ?>
		<?php echo $__env->make('teamilk.product.no-post', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php endif; ?>
<?php else: ?>
	<?php echo $__env->make('teamilk.product.no-post', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('other_scripts'); ?>
   
	
<?php $__env->stopSection(); ?>

<?php echo $__env->make('teamilk.master-learning', compact('rs_latestproduct','rs_menu1','rs_menu2','rs_menu3','product'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/crmenergy/domains/crm.secretenergy.net/public_html/resources/views/teamilk/product/show-learning.blade.php ENDPATH**/ ?>