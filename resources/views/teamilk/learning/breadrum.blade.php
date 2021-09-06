<?php use \App\Http\Controllers\Helper\HelperController; ?>
<div class="row page-titles">
	 <?php $curent_idcategory = 0;
			if(isset($cate_selected)){
			$curent_idcategory = $cate_selected[0]['idcategory'];
		} ?>
		<ol class="breadcrumb">
			<?php HelperController::breadcrumbpost($rs_cat_product,$curent_idcategory,'"breadcrumb-item',0); ?>
		</ol>
</div>