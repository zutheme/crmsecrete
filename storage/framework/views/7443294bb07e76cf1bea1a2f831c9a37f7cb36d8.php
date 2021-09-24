<?php use \App\Http\Controllers\Helper\HelperController; ?>
<div class="container-fluid">
	<div class="row page-titles">
		<?php $curent_idcategory = 0;
			if(isset($cate_selected)){
			$curent_idcategory = $cate_selected[0]['idcategory'];
		} ?>
		<ol class="breadcrumb">
			<?php HelperController::breadcrumbpost($rs_cat_product,$curent_idcategory,'breadcrumb-item',0); ?>
		</ol>
	</div>
	<div class="row">
	 <?php if(isset($rs_lpro)): ?>
		<?php $__currentLoopData = $rs_lpro; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		 <div class="col-xl-3 col-lg-6 col-sm-6">
			<div class="card">
				<div class="card-body">
					<div class="new-arrival-product">
						<div class="new-arrivals-img-contnent">
							<img class="img-fluid" src="<?php echo e(asset( $row['urlfile'] )); ?>" alt="">
						</div>
						<div class="new-arrival-content text-center mt-3">
							<h4><a href="<?php echo e(url('/')); ?>/<?php echo e($row['slug']); ?>"><?php echo e($row['namepro']); ?></a></h4>
							<ul class="star-rating">
								<li><i class="fa fa-star"></i></li>
								<li><i class="fa fa-star"></i></li>
								<li><i class="fa fa-star"></i></li>
								<li><i class="fa fa-star-half-empty"></i></li>
								<li><i class="fa fa-star-half-empty"></i></li>
							</ul>
							
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</div>
	<div class="row">
	<?php $countpage = $rs_lpro[0]['count_page']; ?>
		<?php if($countpage > 1): ?>
		<?php $curent_page = Request::segment(3); 
			if(empty($curent_page)) $curent_page =1; ?>
		<div class="page-nav td-pb-padding-side">
			<?php for($i=1; $i < ($countpage + 1); $i++): ?>
			<?php  $curent_class = ($curent_page == $i) ? '<span class="current">'.$i.'</span>':''; ?>
				<?php if(isset($curent_class) and !empty($curent_class)): ?>
					<?php echo $curent_class; ?>

				<?php elseif($i == $countpage): ?>
					<a href="<?php echo e(url('/')); ?>/<?php echo e($curent_slug); ?>/page/<?php echo e($i); ?>" class="last" title="<?php echo e($countpage); ?>"><?php echo e($countpage); ?></a><a href="#"><i class="fa fa-arrow-right"></i></a><span class="pages">Page <?php echo e($curent_page); ?> of <?php echo e($countpage); ?></span><div class="clearfix"></div>
				<?php else: ?>
					<a class="page" title="<?php echo e($i); ?>" href="<?php echo e(url('/')); ?>/<?php echo e($curent_slug); ?>/page/<?php echo e($i); ?>"><?php echo e($i); ?></a>
				<?php endif; ?>
			<?php endfor; ?>
			
		</div>
		<?php endif; ?>
	<?php endif; ?>
	</div>
</div> 
  
<?php /**PATH /home/crmenergy/domains/crm.secretenergy.net/public_html/resources/views/teamilk/product/layout-lesson.blade.php ENDPATH**/ ?>