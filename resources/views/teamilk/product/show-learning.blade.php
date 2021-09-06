<?php use \App\Http\Controllers\Helper\HelperController;
	$extend = '';
 ?>
@if(isset($product))
	<?php $_posttype = $product[0]['nametype']; 
		  $_template = $product[0]['template'];
	?>
@endif

@extends('teamilk.master-learning', compact('rs_latestproduct','rs_menu1','rs_menu2','rs_menu3','product'))

@section('other_styles')
  
@stop
@section('content')

@if(isset($product) and $product[0]['_commit'] > 0)
	@if ($_posttype == 'lesson')
		@include('teamilk.product.show-lesson')
	@elseif ($_posttype=='page')
		@if(isset($_template))
			<?php $template = 'teamilk.product.template.'.$product[0]['template']; ?>
				@if(\View::exists($template))
					@include($template)
				@else
					@include('teamilk.product.page')
				@endif
		@else
			@include('teamilk.product.no-post')
		@endif
	@else
		@include('teamilk.product.no-post')
	@endif
@else
	@include('teamilk.product.no-post')
@endif

@stop
@section('other_scripts')
   
	
@stop
