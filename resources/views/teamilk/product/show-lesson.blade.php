<?php use \App\Http\Controllers\Helper\HelperController; ?>
 <div class="container-fluid">
	<div class="row page-titles">
		 <?php $curent_idcategory = 0;
				if(isset($cate_selected)){
				$curent_idcategory = $cate_selected[0]['idcategory'];
			} ?>
            <ol class="breadcrumb">
                <?php HelperController::breadcrumbpost($rs_cat_product,$curent_idcategory,'"breadcrumb-item',0); ?>
            </ol>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-body">
					<div class="row">
						<div class="col-xl-9 col-lg-6  col-md-6 col-xxl-5 ">
							{!! $product[0]['description'] !!}
						</div>
						<div class="col-xl-3 col-lg-6  col-md-6 col-xxl-7 col-sm-12">
							
						</div>
					</div>
				</div>
			</div>
		</div>
		
	</div>
</div>

@section('other_scripts')

  
@stop