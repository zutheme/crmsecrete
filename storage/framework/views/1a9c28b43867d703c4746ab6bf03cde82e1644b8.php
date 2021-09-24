

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
    <link href="<?php echo e(asset('gentelella/build/css/custom.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('dashboard/production/css/custom.css?v=0.1.2')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('dashboard/production/css/menuhascate.css?v=0.3.6')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $_namecattype = Request::segment(3);
$_namecattype = isset($_namecattype) ? Request::segment(3) : 'product';
$sel_idmenu =  app('request')->input('idmenu');  
$sel_idmenu = isset($sel_idmenu) ? $sel_idmenu : $idmenu;
?>
<?php $__env->startSection('content'); ?>
<script type="text/javascript">
		var temp_categories =[]; var tmpi = 0;
</script>
<?php $__currentLoopData = $rs_list_cate; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<script type="text/javascript">	
      	temp_categories[tmpi] = { idmenuhascate: '<?php echo e($row['idmenuhascate']); ?>', idmenu:'<?php echo e($row['idmenu']); ?>', idcategory:'<?php echo e($row['idcategory']); ?>', namemenu:'<?php echo e($row['namemenu']); ?>' ,idparent:'<?php echo e($row['idparent']); ?>', reorder:'<?php echo e($row['reorder']); ?>', depth:'<?php echo e($row['depth']); ?>', trash:'<?php echo e($row['trash']); ?>' };
      	tmpi = tmpi + 1; 
	</script>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<script type="text/javascript">
	localStorage.removeItem("lmn_items");
    localStorage.setItem('lmn_items', JSON.stringify(temp_categories));
</script>
   <div class="row">
		<div class="col-sm-12 menuhascate">
			<div class="card">
		    	<div class="card-body">
		        <h4 class="card-title">Menu</h4>
		       
                     <?php if($message = Session::get('error')): ?>

                          <h2 class="card-subtitle">error:<?php echo e($message); ?></h2>

                     <?php endif; ?>
                     <?php if($success = Session::get('success')): ?>

                          <h2 class="card-subtitle">success: <?php echo e($success); ?></h2>

                     <?php endif; ?>
				<div class="col-sm-4">
					<form class="frm-create-category" method="post" action="<?php echo e(action('Admin\MenuHasCateController@store')); ?>" >
						<?php echo e(csrf_field()); ?>

						<div class="form-group">
			                    <select class="form-control type-category" name="sel_idcattype" required="true">
			                    	<option value="">Kiểu chuyên mục</option>
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
			            	 <input type="hidden" class="idmenu" name="_idmenu" value="<?php echo e($sel_idmenu); ?>">
			            	 <input type="hidden" class="obj-add-cate" name="obj_add_cate" value="">
			            	 <input type="button" onclick="return AddCateToMenu();" class="btn btn-default btn-primary" name="btn-submit" value="Thêm vào" />
			            </div>
			        </form>
				</div>
				<div class="col-sm-8">
					<p><a class="btn btn-default btn-primary" href="<?php echo e(action('Admin\MenuController@create')); ?>">Tạo mới</a></p>	
					<form class="frm_menuhascate" method="post" action="<?php echo e(action('Admin\MenuHasCateController@update',$sel_idmenu)); ?>" >
						<?php echo e(csrf_field()); ?>

						<input type="hidden" name="_method" value="PATCH">
			           	<input type="hidden" class="hidden_idmenu" name="hidden_idmenu" value="<?php echo e($sel_idmenu); ?>">
						<div class="col-lg-12">
							<div class="table-menu">
				            	<div class="menu"></div>
				        	</div>
				        </div>
				        <div class="col-lg-6">
				        	<input type="hidden" class="obj-menu" name="objmenu" value="">
				        </div>
			            <div class="col-lg-6">
							<input type="button" onclick="return re_order_block();" class="btn btn-default btn-primary" name="btn-submit" value="Save change" />
						</div>
						<?php if(count($list) > 0): ?>
							<?php echo e($list); ?>

						<?php endif; ?>
						<?php if($message = Session::get('success')): ?>
				        	<h6 class="card-subtitle"><?php echo e($message); ?></h6>
				        <?php elseif($message = Session::get('error')): ?>
				        	<h6 class="card-subtitle"><?php echo e($message); ?></h6>
						<?php endif; ?>					
			            <p id="demo"></p>
			            <p id="enter"></p>
			            <p id="dragstart"></p>
			            <p id="dragleave"></p>
			           	<p id="dragend"></p>
			           	<p id="xy"></p>
		           	</form>
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
    <script src="<?php echo e(asset('gentelella/build/js/custom-build.js?v=0.1.3')); ?>"></script> 
    <script src="<?php echo e(asset('dashboard/production/js/menuhascate2.js?v=0.4.4.6')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.general', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/crmenergy/domains/crm.secretenergy.net/public_html/resources/views/admin/menuhascate/index.blade.php ENDPATH**/ ?>