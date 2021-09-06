<?php use \App\Http\Controllers\Helper\HelperController; 
     $menu_primary = new HelperController(); 
?>
<div class="header-bottom sticky-header fix-top sticky-content d-lg-show">
	<div class="container">
		<div class="header-left">
			<nav class="main-nav">
				 <?php
					if(isset($rs_menu1)){
					    $menu = new menu();
						$menu->menu_primary($rs_menu1,0, 0, 0,'menu', '');
					} ?>
			</nav>
		</div>
		<div class="header-right">
			<a href="#"><i class="d-icon-map"></i>Đơn hàng </a>
			<a href="#" class="ml-6"><i class="d-icon-card"></i>Khuyến mại</a>
		</div>
	</div>
</div>
<?php
 /*menu sidebar video*/
 class menu {
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