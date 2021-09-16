<?php 
	$parent = 0;
	if(isset($product[0]['idproduct'])){
	$parent = $product[0]['idproduct'];
} ?>
<div class='examples'>
  <div class='parent'>
    <div class='wrapper'>
      <div id='left-defaults' class='container-drop'>
		@foreach($rs_quiz as $row)
		  <div class="data" idimp="{{ $row['idimp'] }}" idproduct="{{ $row['idproduct'] }}" orders="{{ $row['orders'] }}" >
			<ul class="quiz">
				<li>{{ $row['orders'] }}</li>
				<li>{{ $row['difflevel'] }}</li>
				<li class="title">{{ $row['namepro'] }}</li>
				<li class="category">{{ $row['listcat'] }}</li>
				<li class="li-thumb"><img class="img-thumb" src="{{ asset($row['urlfile']) }}"></li>
				<li class="btn-control-action">
				  <a href="{{ action('Admin\PostsController@edit',[$row['idproduct'],'idparent'=>$parent]) }}" class="info-number"><i class="fa fa-pencil-square"></i></a>
				</li>
			</ul>
		  </div>
		  @endforeach 
      </div>
      <div id='right-defaults' class='container-drop'>
        
      </div>
	   
    </div>
    <div class='container-drop'>
			<button type="button" onclick="sort_quiz();" class="">Sort</button>
	 </div>
  </div>
</div>