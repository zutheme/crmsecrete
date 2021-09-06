 <?php use \App\Http\Controllers\Helper\HelperController; 
     $option = new HelperController();
	 $_wellcome = $option->getoptionbyid(1062);
?>
 <div class="header-top">
	<div class="container">
		<div class="header-left">
			<p class="welcome-msg">{!! $_wellcome[0]->description !!}</p>
		</div>
		<div class="header-right">
			<div class="dropdowns">
				<a href="#">Đăng nhập</a>
				<!--<ul class="dropdown-box">
					<li><a href="#USD">USD</a></li>
					<li><a href="#EUR">EUR</a></li>
				</ul>-->
			</div>
			<!-- End DropDown Menu -->
			<div class="dropdowns ml-5">
				<a href="#">Đăng ký</a>
				<!--<ul class="dropdown-box">
					<li>
						<a href="#USD">ENG</a>
					</li>
					<li>
						<a href="#EUR">FRH</a>
					</li>
				</ul>-->
			</div> 
			<!-- End DropDown Menu -->
			<span class="divider d-lg-show"></span>
			<div class="dropdown dropdown-expanded d-lg-show">
				<a href="#dropdown">Links</a>
				<?php
				if(isset($rs_menu2)){
					    $menu = new menutop();
						$menu->menu_primary($rs_menu2, 0, 0,  0, 'dropdown-box', '');
				} ?>
			</div>
		</div>
	</div>
</div>
<!-- End HeaderTop -->
<?php
 /*menu sidebar video*/
 class menutop {
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