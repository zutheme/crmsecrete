<?php use \App\Http\Controllers\Helper\HelperController; 
     $option = new HelperController();
	 $_desc_logo = $option->getoptionbyid(1084);
	 $_visa_card = $option->getoptionbyid(1085);
	 $_social = $option->getoptionbyid(1086);
?>
<footer class="footer">
	<div class="container">
		<div class="footer-middle">
			<div class="row">
				<div class="col-lg-4 col-md-12">
					<div class="widget widget-about">
						<a href="{{ url('/') }}" class="logo-footer">
							<img src="{{ asset($_desc_logo[0]->urlfile) }}" alt="logo-footer" width="154" height="43">
						</a>
						<div class="widget-body">
							{!! $_desc_logo[0]->description !!}
						</div>
					</div>
					<!-- End Widget -->
				</div>
				<div class="col-lg-8 col-md-12">
					<div class="row">
						<div class="col-md-4 col-sm-12">
							<div class="widget">
								<h4 class="widget-title">About Us</h4>
								<?php
								if(isset($rs_menu1)){
									show_menu_list($rs_menu1, 0, 0, 0, 'widget-body', '', 1)
								} ?>
								<!--<ul class="widget-body">
									<li>
										<a href="about-us.html">About Us</a>
									</li>
									<li>
										<a href="#">Order History</a>
									</li>
									<li>
										<a href="#">Returns</a>
									</li>
									<li>
										<a href="#">Custom Service</a>
									</li>
									<li>
										<a href="#">Terms &amp; Condition</a>
									</li>
								</ul>-->
							</div>
							<!-- End Widget -->
						</div>
						<div class="col-md-4 col-sm-12">
							<div class="widget">
								<h4 class="widget-title">Customer Service</h4>
								<?php
								if(isset($rs_menu1)){
									show_menu_list($rs_menu1, 0, 0, 0, 'widget-body', '', 1)
								} ?>
								<!--<ul class="widget-body">
									<li>
										<a href="#">Payment Methods</a>
									</li>
									<li>
										<a href="#">Money-back Guarantee!</a>
									</li>
									<li>
										<a href="#">Returns</a>
									</li>
									<li>
										<a href="#">Custom Service</a>
									</li>
									<li>
										<a href="#">Terms &amp; Conditions</a>
									</li>
								</ul>-->
							</div>
							<!-- End Widget -->
						</div>
						<div class="col-md-4 col-sm-12">
							<div class="widget">
								<h4 class="widget-title">My Account</h4>
								<?php
								if(isset($rs_menu1)){
									show_menu_list($rs_menu1, 0, 0, 0, 'widget-body', '', 1)
								} ?>
								<!--<ul class="widget-body">
									<li>
										<a href="#">Sign in</a>
									</li>
									<li>
										<a href="cart.html">View Cart</a>
									</li>
									<li>
										<a href="wishlist.html">My Wishlist</a>
									</li>
									<li>
										<a href="#">Track My Order</a>
									</li>
									<li>
										<a href="#">Help</a>
									</li>
								</ul>-->
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
					<img src="{{ asset($_visa_card[0]->urlfile) }}" alt="payment" width="159" height="29">
				</figure>
			</div>
			<div class="footer-center">
				{!! $_social[0]->description !!}
			</div>
			<div class="footer-right">
				<div class="social-links">
					{!! $_social[0]->description !!}
				</div>
			</div>
		</div>
	</div>
	<!-- End Footer Bottom -->
</footer>
<!-- End Footer -->
<?php 
    function show_menu_list($categories, $idparent = 0, $char = 0, $depth = 0, $class_ul='', $class_li='', $show) {
        $list_cate = '';
		$cate_child = array();
        $arr_parent = array();
        $arr_show = array();
        $arr_show[0] = $show;
        foreach ($categories as $key => $item) {
            if($item['idparent'] == $idparent) {
                $cate_child[] = $item;
                unset($categories[$key]);
            }
        }                   
        if ($cate_child) {
            $depth_ul = $depth;
            $show_number = '';
            if(!$char){
                $list_cate = '<ul class="'.$class_ul.' '.$depth_ul.'">';
            }else{

                if($depth_ul == 0){

                    $list_cate = '<ul class="'.$class_ul.' '.$depth_ul.'">';

                }else if($depth_ul == 1){

                    $list_cate = '<ul class="'.$class_ul.' '.$depth_ul.'">';

                }else {

                    $list_cate = '<ul class="'.$class_ul.' '.$depth_ul.'">';

                }
            }

            foreach ($cate_child as $key => $item) {

                // Hiển thị tiêu đề chuyên mục

                $depth_li = $item['depth'];

                if($depth_li==0 && $item['haschild'] == 1){

                    $span1 = $class_li;


                } else if($depth_li==0 && $depth_li == 0){
                   $span1 = $class_li;

                }
                else if($depth_li==1){

                    $span1 = $class_li;

                }else if ($depth_li==2) {

                    $span1 = $class_li;

                }elseif ($depth_li==3) {

                    $span1 = $class_li;
                } 
                else {
                    $span1 = '';
                }
                if($depth_li == 0 && $item['haschild'] == 1){
                    $list_cate .= '<li class="'.$span1.'"><a href="#">'.$item['namemenu'].'</a>';
                }else{
                    if($item['catnametype']=='link'){
                        $list_cate .= '<li class="'.$span1.'"><a href="'.url('/').'/'.$item['url'].'">'.$item['namemenu'].'</a>';
                    }else{
                        if($arr_show[0] == 1) $show_number = '<span class="td-cat-no">'.$item['count'].'</span>'; 
                        $list_cate .= '<li class="'.$span1.' '.$arr_show[0].'-depth_li-'.$depth_li.'"><a href="'.url('/').'/'.$item['slug'].'"><span class="td-cat-name">'.$item['namemenu'].'</span>'.$show_number.'</a>';
                    }
                }
                $char++;
                show_menu_list($categories,$item['idmenuhascate'], $char, $item['depth'], $class_ul , $class_li, $arr_show[0]);
                $list_cate .= '</li>';
            }  
            $list_cate .= '</ul>';
        } 
		echo $list_cate;
    }
?>