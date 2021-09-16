<?php 
	$parent = 0;
	if(isset($product[0]['idproduct'])){
	$parent = $product[0]['idproduct'];
} ?>
<div class='examples'>
  <div class='parent'>
    <div class='wrapper'>
      <div id='left-defaults' class='container-drop'>
		<?php $__currentLoopData = $rs_quiz; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		  <div class="data" idimp="<?php echo e($row['idimp']); ?>" idproduct="<?php echo e($row['idproduct']); ?>" orders="<?php echo e($row['orders']); ?>" >
			<ul class="quiz">
				<li><?php echo e($row['orders']); ?></li>
				<li><?php echo e($row['difflevel']); ?></li>
				<li class="title"><?php echo e($row['namepro']); ?></li>
				<li class="category"><?php echo e($row['listcat']); ?></li>
				<li class="li-thumb"><img class="img-thumb" src="<?php echo e(asset($row['urlfile'])); ?>"></li>
				<li class="btn-control-action">
				  <a href="<?php echo e(action('Admin\PostsController@edit',[$row['idproduct'],'idparent'=>$parent])); ?>" class="info-number"><i class="fa fa-pencil-square"></i></a>
				</li>
			</ul>
		  </div>
		  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
      </div>
      <div id='right-defaults' class='container-drop'>
        
      </div>
	   
    </div>
    <div class='container-drop'>
			<button type="button" onclick="sort_quiz();" class="">Sort</button>
	 </div>
  </div>
</div><?php /**PATH /home/crmenergy/domains/crm.secretenergy.net/public_html/resources/views/admin/post/exam-dragula.blade.php ENDPATH**/ ?>