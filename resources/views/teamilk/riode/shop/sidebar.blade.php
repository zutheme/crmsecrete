<?php use \App\Http\Controllers\Helper\HelperController; 
     $option = new HelperController();
	 $_bannerbig = $option->getoptionbyid(1071);
	 $_backgroundbig = $option->getoptionbyid(1072);
?>
<div class="sidebar-overlay"></div>
<a class="sidebar-close" href="#"><i class="d-icon-times"></i></a>
<div class="sidebar-content">
	<div class="sticky-sidebar" data-sticky-options="{'top': 10}">
		<div class="filter-actions mb-4">
			<a href="#" class="sidebar-toggle-btn toggle-remain btn btn-outline btn-primary btn-icon-right btn-rounded">Filter<i class="d-icon-arrow-left"></i></a>
			<a href="#" class="filter-clean">Clean All</a>
		</div>
		<div class="widget widget-collapsible">
			<h3 class="widget-title">All Categories</h3>
			<?php
			if(isset($rs_menu1)){
					$menu = new menusidebar();
					$menu->menu_primary($rs_menu1, 0, 0,  0, 'widget-body filter-items search-ul', '');
			} ?>
			
		</div>
		<div class="widget widget-collapsible">
			<h3 class="widget-title">Filter by Price</h3>
			<div class="widget-body mt-3">
				<form action="#">
					<div class="filter-price-slider"></div>

					<div class="filter-actions">
						<div class="filter-price-text mb-4">Price:
							<span class="filter-price-range"></span>
						</div>
						<button type="submit" class="btn btn-dark btn-filter btn-rounded">Filter</button>
					</div>
				</form><!-- End Filter Price Form -->
			</div>
		</div>
		<div class="widget widget-collapsible">
			<h3 class="widget-title">Size</h3>
			<ul class="widget-body filter-items">
				<li><a href="#">Extra Large</a></li>
				<li><a href="#">Large</a></li>
				<li><a href="#">Medium</a></li>
				<li><a href="#">Small</a></li>
			</ul>
		</div>
		<div class="widget widget-collapsible">
			<h3 class="widget-title">Color</h3>
			<ul class="widget-body filter-items">
				<li><a href="#">Black</a></li>
				<li><a href="#">Blue</a></li>
				<li><a href="#">Green</a></li>
				<li><a href="#">White</a></li>
			</ul>
		</div>
		<div class="widget widget-collapsible">
			<h3 class="widget-title">Brands</h3>
			<ul class="widget-body filter-items">
				<li><a href="#">Cinderella</a></li>
				<li><a href="#">Comedy</a></li>
				<li><a href="#">Rightcheck</a></li>
				<li><a href="#">SkillStar</a></li>
				<li><a href="#">SLS</a></li>
			</ul>
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