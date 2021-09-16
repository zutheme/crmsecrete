<?php use \App\Http\Controllers\Helper\HelperController;
	$extend = '';
 ?>


@extends('teamilk.master', compact('rs_latestproduct','rs_menu1','rs_menu2','rs_menu3','product'))

@section('other_styles')
  
@stop
@section('content')
@include('teamilk.chat.show-chat')
@stop
@section('other_scripts')
   
	
@stop
