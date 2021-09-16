<!--table-->
<?php 
	$parent = 0;
	if(isset($product[0]['idproduct'])){
	$parent = $product[0]['idproduct'];
} ?>
<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%"> 
	<thead>

			<tr>
				<th>Thứ tự</th>
				<th>Độ khó</th>
				<th>Tiêu đề</th>
				<th>Chuyên mục</th>
				<th>ID</th>
				<th>Ngày</th>
				<th>Người đăng</th>
				<th>Hình ảnh</th>
				<th>-</th>
			 </tr>

		 </thead>

		 <tfoot>

		  <tr>
				<th>Thứ tự</th>
				<th>Độ khó</th>
				<th>Tiêu đề</th>
				<th>Chuyên mục</th>
				<th>ID</th>
				<th>Ngày</th>
				<th>Người đăng</th>
				<th>Hình ảnh</th>
				<th>-</th>
			 </tr>

		</tfoot>

  <tbody>
		  <?php $__currentLoopData = $rs_quiz; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		  <tr>
			<td><?php echo e($row['orders']); ?></td>
			<td><?php echo e($row['difflevel']); ?></td>
			<td class="title"><?php echo e($row['namepro']); ?></td>
			<td><?php echo e($row['listcat']); ?></td>
			<td><?php echo e($row['idproduct']); ?></td>
			<td><?php echo e($row['created_at']); ?></td>
			<td><?php echo e($row['author']); ?></td>
			<td><img class="thumb" src="<?php echo e(asset($row['urlfile'])); ?>"></td>
			<td class="btn-control-action">
			  <a href="<?php echo e(action('Admin\PostsController@edit',[$row['idproduct'],'idparent'=>$parent])); ?>" class="info-number"><i class="fa fa-pencil-square"></i></a>
			</td>
		  </tr>
		  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
		</tbody>

  </table>
<!--end table--><?php /**PATH /home/crmenergy/domains/crm.secretenergy.net/public_html/resources/views/admin/post/list-quiz.blade.php ENDPATH**/ ?>