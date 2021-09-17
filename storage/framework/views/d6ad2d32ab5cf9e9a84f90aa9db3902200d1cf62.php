<?php use \App\Http\Controllers\Helper\HelperController; 
     $option = new HelperController();
	 $_desc_logo = $option->getoptionbyid(1041);
?>
<div class="nav-header">
	<a href="<?php echo e(url('/')); ?>" class="brand-logo">
		<img class="logo" src="<?php echo e(asset($_desc_logo[0]->urlfile)); ?>" />
	</a>
	<div class="nav-control">
		<div class="hamburger">
			<span class="line"></span><span class="line"></span><span class="line"></span>
		</div>
	</div>
</div>
<?php /**PATH /home/crmenergy/domains/crm.secretenergy.net/public_html/resources/views/teamilk/learning/nav-header.blade.php ENDPATH**/ ?>