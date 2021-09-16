<?php use \App\Http\Controllers\Helper\HelperController;
	$extend = '';
 ?>
@if(isset($product))
	<?php $_posttype = $product[0]['nametype']; 
		  $_template = $product[0]['template'];
	?>
@endif

@extends('teamilk.master', compact('rs_latestproduct','rs_menu1','rs_menu2','rs_menu3','product'))

@section('other_styles')
  
@stop
@section('content')


@stop
@section('other_scripts')
   
	
@stop
