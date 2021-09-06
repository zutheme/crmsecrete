<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
	<?php $str_dashboard = session()->get('sidebar-admin'); ?>
    <?php if(isset($str_dashboard)): ?>
      <?php echo $str_dashboard; ?>
    <?php endif; ?>
</div><?php /**PATH /home/crmenergy/domains/crm.secretenergy.net/public_html/resources/views/admin/sidebar.blade.php ENDPATH**/ ?>