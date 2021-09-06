<?php use \App\Http\Controllers\Helper\HelperController; 
     $option = new HelperController();
	 $_desc_logo = $option->getoptionbyid(1041);
?>
<div class="nav-header">
	<a href="{{ url('/') }}" class="brand-logo">
		<img class="logo" src="{{ asset($_desc_logo[0]->urlfile) }}" />
	</a>
	<div class="nav-control">
		<div class="hamburger">
			<span class="line"></span><span class="line"></span><span class="line"></span>
		</div>
	</div>
</div>
