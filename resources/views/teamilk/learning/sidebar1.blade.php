<!--**********************************
	Sidebar start
***********************************-->
<li class="dropdown header-profile" style="display:none">
	<a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
		<img src="{{ $url_avartar_sex }}" width="20" alt=""/>
		<div class="header-info ms-3">
			<span class="font-w600 ">Hi,<b>{{ $firstname }}</b></span>
			<small class="text-end font-w400">{{ $email }}</small>
		</div>
	</a>
	<div class="dropdown-menu dropdown-menu-end">
		<a href="./app-profile.html" class="dropdown-item ai-icon">
			<svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
			<span class="ms-2">Profile </span>
		</a>
		<a href="./email-inbox.html" class="dropdown-item ai-icon">
			<svg id="icon-inbox" xmlns="http://www.w3.org/2000/svg" class="text-success" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
			<span class="ms-2">Inbox </span>
		</a>
		<a href="./login.html" class="dropdown-item ai-icon">
			<svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
			<span class="ms-2">Logout </span>
		</a>
	</div>
</li>
<div class="dlabnav">
	<div class="dlabnav-scroll">
		<ul class="metismenu" id="menu">
			
			<li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
					<i class="flaticon-025-dashboard"></i>
					<span class="nav-text">Dashboard</span>
				</a>
				<ul aria-expanded="false">
					<li><a href="index.html">Dashboard Light</a></li>
					<li><a href="index-2.html">Dashboard Dark</a></li>
					<li><a href="my-wallet.html">My Wallet</a></li>
					<li><a href="page-invoices.html">Invoices</a></li>
					<li><a href="cards-center.html">Cards Center</a></li>
					<li><a href="page-transaction.html">Transaction</a></li>
					<li><a href="transaction-details.html">Transaction Details</a></li>	
				</ul>

			</li>
			<li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
				<i class="flaticon-050-info"></i>
					<span class="nav-text">Apps</span>
				</a>
				<ul aria-expanded="false">
					<li><a href="./app-profile.html">Profile</a></li>
					<li><a href="./post-details.html">Post Details</a></li>
					<li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Email</a>
						<ul aria-expanded="false">
							<li><a href="./email-compose.html">Compose</a></li>
							<li><a href="./email-inbox.html">Inbox</a></li>
							<li><a href="./email-read.html">Read</a></li>
						</ul>
					</li>
					<li><a href="./app-calender.html">Calendar</a></li>
					<li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Shop</a>
						<ul aria-expanded="false">
							<li><a href="./ecom-product-grid.html">Product Grid</a></li>
							<li><a href="./ecom-product-list.html">Product List</a></li>
							<li><a href="./ecom-product-detail.html">Product Details</a></li>
							<li><a href="./ecom-product-order.html">Order</a></li>
							<li><a href="./ecom-checkout.html">Checkout</a></li>
							<li><a href="./ecom-invoice.html">Invoice</a></li>
							<li><a href="./ecom-customers.html">Customers</a></li>
						</ul>
					</li>
				</ul>
			</li>
			<li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
					<i class="flaticon-041-graph"></i>
					<span class="nav-text">Charts</span>
				</a>
				<ul aria-expanded="false">
					<li><a href="./chart-flot.html">Flot</a></li>
					<li><a href="./chart-morris.html">Morris</a></li>
					<li><a href="./chart-chartjs.html">Chartjs</a></li>
					<li><a href="./chart-chartist.html">Chartist</a></li>
					<li><a href="./chart-sparkline.html">Sparkline</a></li>
					<li><a href="./chart-peity.html">Peity</a></li>
				</ul>
			</li>
			<li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
					<i class="flaticon-086-star"></i>
					<span class="nav-text">Bootstrap</span>
				</a>
				<ul aria-expanded="false">
					<li><a href="./ui-accordion.html">Accordion</a></li>
					<li><a href="./ui-alert.html">Alert</a></li>
					<li><a href="./ui-badge.html">Badge</a></li>
					<li><a href="./ui-button.html">Button</a></li>
					<li><a href="./ui-modal.html">Modal</a></li>
					<li><a href="./ui-button-group.html">Button Group</a></li>
					<li><a href="./ui-list-group.html">List Group</a></li>
					<li><a href="./ui-card.html">Cards</a></li>
					<li><a href="./ui-carousel.html">Carousel</a></li>
					<li><a href="./ui-dropdown.html">Dropdown</a></li>
					<li><a href="./ui-popover.html">Popover</a></li>
					<li><a href="./ui-progressbar.html">Progressbar</a></li>
					<li><a href="./ui-tab.html">Tab</a></li>
					<li><a href="./ui-typography.html">Typography</a></li>
					<li><a href="./ui-pagination.html">Pagination</a></li>
					<li><a href="./ui-grid.html">Grid</a></li>

				</ul>
			</li>
			<li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
					<i class="flaticon-045-heart"></i>
					<span class="nav-text">Plugins</span>
				</a>
				<ul aria-expanded="false">
					<li><a href="./uc-select2.html">Select 2</a></li>
					<li><a href="./uc-nestable.html">Nestedable</a></li>
					<li><a href="./uc-noui-slider.html">Noui Slider</a></li>
					<li><a href="./uc-sweetalert.html">Sweet Alert</a></li>
					<li><a href="./uc-toastr.html">Toastr</a></li>
					<li><a href="./map-jqvmap.html">Jqv Map</a></li>
					<li><a href="./uc-lightgallery.html">Light Gallery</a></li>
				</ul>
			</li>
			<li><a href="widget-basic.html" class="ai-icon" aria-expanded="false">
					<i class="flaticon-013-checkmark"></i>
					<span class="nav-text">Widget</span>
				</a>
			</li>
			<li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
					<i class="flaticon-072-printer"></i>
					<span class="nav-text">Forms</span>
				</a>
				<ul aria-expanded="false">
					<li><a href="./form-element.html">Form Elements</a></li>
					<li><a href="./form-wizard.html">Wizard</a></li>
					<li><a href="./form-ckeditor.html">CkEditor</a></li>
					<li><a href="form-pickers.html">Pickers</a></li>
					<li><a href="form-validation.html">Form Validate</a></li>
				</ul>
			</li>
			<li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
					<i class="flaticon-043-menu"></i>
					<span class="nav-text">Table</span>
				</a>
				<ul aria-expanded="false">
					<li><a href="table-bootstrap-basic.html">Bootstrap</a></li>
					<li><a href="table-datatable-basic.html">Datatable</a></li>
				</ul>
			</li>
			<li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
					<i class="flaticon-022-copy"></i>
					<span class="nav-text">Pages</span>
				</a>
				<ul aria-expanded="false">
					<li><a href="./page-login.html">Login</a></li>
					<li><a href="./page-register.html">Register</a></li>
					<li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Error</a>
						<ul aria-expanded="false">
							<li><a href="./page-error-400.html">Error 400</a></li>
							<li><a href="./page-error-403.html">Error 403</a></li>
							<li><a href="./page-error-404.html">Error 404</a></li>
							<li><a href="./page-error-500.html">Error 500</a></li>
							<li><a href="./page-error-503.html">Error 503</a></li>
						</ul>
					</li>
					<li><a href="./page-lock-screen.html">Lock Screen</a></li>
					<li><a href="./empty-page.html">Empty Page</a></li>
				</ul>
			</li>
		</ul>
		<div class="copyright">
			<p><strong>TICMEDI</strong> © 2021 All Rights Reserved</p>
		</div>
	</div>
</div>
<?php
 /*menu sidebar video*/
 class menusidebar {
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
?>