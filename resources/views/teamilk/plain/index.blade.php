@extends('teamilk.master')
@section('other_styles')
    <!-- Custom Theme Style -->
   <link href="{{ asset('public/css/plain.css?v=0.1.1') }}" rel="stylesheet">
@stop
@section('content')
<?php 
      //$posttype = Request::segment(3);
      $_start_date_sl = session()->get('start_date');
      $_end_date_sl = session()->get('end_date');
      $_idcategory_sl = session()->get('idcategory');
      $_id_post_type_sl = session()->get('id_post_type');
      $_id_status_type_sl = session()->get('id_status_type');
      $_id_store = session()->get('idstore');
      $_namecattype = isset($_namecattype) ? $_namecattype : 'post';
      $id_post_type = isset($id_post_type) ? $id_post_type : 3;
      $posttype = isset($posttype) ? $posttype : 'post';
      $_idcategory = isset($_idcategory_sl) ? $_idcategory_sl : Request::segment(4);
      $_id_post_type = isset($_id_post_type_sl) ? $_id_post_type_sl : Request::segment(5);
      $_id_status_type = isset($_id_status_type_sl) ? $_id_status_type_sl : Request::segment(6);
      //$_sel_receive = $lists['_sel_receive'];
      $_namecattype = $posttype; 
?>
    @include('teamilk.plain.index-plain') 
@stop

@section('other_scripts')

	<script src="{{ asset('public/js/caculate.js?v=0.0.1.7') }}"></script>
      
@stop