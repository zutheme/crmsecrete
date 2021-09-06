<?php use \App\Http\Controllers\Helper\HelperController; 
     $option = new HelperController();
	 $_desc_logo = $option->getoptionbyid(1084);
	 $_visa_card = $option->getoptionbyid(1085);
	 $_social = $option->getoptionbyid(1086);
	 $_copyright = $option->getoptionbyid(1090);
?>
<footer class="footer">
	<div class="container">
		<div class="footer-middle">
			<div class="row">
				<div class="col-lg-4 col-md-12">
					<div class="widget widget-about">
						<a href="<?php echo e(url('/')); ?>" class="logo-footer">
							<img src="<?php echo e(asset($_desc_logo[0]->urlfile)); ?>" alt="logo-footer" width="154" height="43">
						</a>
						<div class="widget-body">
							<?php echo $_desc_logo[0]->description; ?>

						</div>
					</div>
				</div>
				<div class="col-lg-8 col-md-12">
					<div class="row">
						<div class="col-md-4 col-sm-12">
							<div class="widget">
								<h4 class="widget-title">About Us</h4>
								<?php
								if(isset($rs_menu1)){
										$menu = new menubottom();
										$menu->menu_primary($rs_menu2, 0, 0,  0, 'widget-body', '');
								} ?>
							</div>
							<!-- End Widget -->
						</div>
						<div class="col-md-4 col-sm-12">
							<div class="widget">
								<h4 class="widget-title">Customer Service</h4>
								<?php
								if(isset($rs_menu1)){
										$menu = new menubottom();
										$menu->menu_primary($rs_menu2, 0, 0,  0, 'widget-body', '');
								} ?>
							</div>
							<!-- End Widget -->
						</div>
						<div class="col-md-4 col-sm-12">
							<div class="widget">
								<h4 class="widget-title">My Account</h4>
								<?php
								if(isset($rs_menu1)){
										$menu = new menubottom();
										$menu->menu_primary($rs_menu2, 0, 0,  0, 'widget-body', '');
								} ?>
							</div>
							<!-- End Widget -->
						</div>
					</div>
				</div>

			</div>
		</div>

		<!-- End Footer Middle -->
		<div class="footer-bottom">
			<div class="footer-left">
				<figure class="payment">
					<img src="<?php echo e(asset($_visa_card[0]->urlfile)); ?>" alt="payment" width="159" height="29">
				</figure>
			</div>
			<div class="footer-center">
				<?php echo $_copyright[0]->description; ?>

			</div>
			<div class="footer-right">
				<div class="social-links">
					<?php echo $_social[0]->description; ?>

				</div>
			</div>
		</div>
	</div>
	<!-- End Footer Bottom -->
</footer>
<!-- End Footer -->
<?php
 /*menu sidebar video*/
 class menubottom {
	public $list_menu;
	public function __construct()
    {
        $this->list_menu = "";
    }
    public function menu_primary($categories, $idparent = 0, $char = 0, $depth = 0, $class_ul, $class_li){
        $this->show_menu_primary($categories, $idparent = 0, $char = 0, $depth = 0, $class_ul, $class_li);
        echo $this->list_menu;
    }
    public function show_menu_primary($categories, $idparent = 0, $char = 0, $depth = 0, $class_ul, $class_li) {

        $cate_child = array();

        $arr_parent = array();

        foreach ($categories as $key => $item) {

            if($item['idparent'] == $idparent) {

                $cate_child[] = $item;

                unset($categories[$key]);

            }

        }                   

        if ($cate_child) {

            $depth_ul = $depth;

            if(!$char){

                $this->list_menu .= '<ul class="'.$class_ul.'">';

            }else{

                if($depth_ul == 0){

                     $this->list_menu .= '<ul class="sub-menu depth-'.$depth_ul.'">';

                }else if($depth_ul == 1){

                    $this->list_menu .= '<ul class="sub-menu depth-'.$depth_ul.'">';

                }else {

                     $this->list_menu .= '<ul class="sub-menu depth-'.$depth_ul.'">';

                }

            }

            foreach ($cate_child as $key => $item) {

                // Hiển thị tiêu đề chuyên mục

                $depth_li = $item['depth'];

                if($depth_li==0 && $item['haschild'] == 1){

                    $span1 ='menu-item menu-item-has-children td-menu-item td-normal-menu ';
                    $span_a ='sf-with-ul';
                    $span_icon = '<i class="td-icon-menu-down"></i><i class="td-icon-menu-down"></i>';

                } else if($depth_li==0 && $depth_li == 0){
                    $span1 ='menu-item td-menu-item td-normal-menu';
                    $span_a ='';
                    $span_icon = '';
                }
                else if($depth_li==1){
                    $span1 = 'menu-item td-menu-item td-normal-menu';
                     $span_a ='';
                    $span_icon = '';

                }else if ($depth_li==2) {
                    $span1 = 'menu-item td-menu-item td-normal-menu';
                     $span_a ='';
                    $span_icon = '';

                }elseif ($depth_li==3) {
                    $span1 = 'menu-item td-menu-item td-normal-menu';
                     $span_a ='';
                    $span_icon = '';
                } 
                else {

                    $span1 = '';
                }
                if($depth_li==0 && $item['haschild'] == 1){
                    $this->list_menu .= '<li class="'.$span1.'"><a class="'.$span_a.'" href="#">'.$item['namemenu'].$span_icon.'</a>';
                }else{
                    if($item['catnametype']=='link'){
                        $this->list_menu .= '<li class="'.$span1.'"><a href="'.url('/').'/'.$item['url'].'">'.$item['namemenu'].'</a>';
                    }else{
                        $this->list_menu .= '<li class="'.$span1.'"><a href="'.url('/').'/'.$item['slug'].'">'.$item['namemenu'].'</a>';
                    }
                }
                $char++;

                $this->show_menu_primary($categories, $item['idmenuhascate'], $char, $item['depth'], $class_ul, $class_li);  

                $this->list_menu .= "</li>";

            }  

            $this->list_menu .= '</ul>';

        } 

    }
 }
?><?php /**PATH /home/crmenergy/domains/crm.secretenergy.net/public_html/resources/views/teamilk/riode/footer.blade.php ENDPATH**/ ?>