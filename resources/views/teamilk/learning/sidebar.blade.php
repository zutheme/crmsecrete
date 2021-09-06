<!--**********************************
	Sidebar start
***********************************-->
<li id="liprofile" class="dropdown header-profile" style="display:none">
	<a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
		<img src="{{ $url_avatar }}" width="20" alt=""/>
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
		<?php
		if(isset($rs_menu3)){
				$menu = new menusidebar();
				$menu->menu_primary($rs_menu3, 0, 0,  0, 'metismenu', '');
		} ?>
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

                $this->list_menu .= '<ul class="'.$class_ul.'" id="menu">';

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
				$span1 = '';
				$span_a = '';
				$span_icon = '';
                if($depth_li==0 && $item['haschild'] == 1){  
					$span_a = 'has-arrow ai-icon';
					if(isset($item['icon'])){
						$span_icon = $item['icon'];
					}
				}elseif($depth_li==0){
					if(isset($item['icon'])){
						$span_icon = $item['icon'];
					}
				}
                if($depth_li==0 && $item['haschild'] == 1){
                    $this->list_menu .= '<li><a class="'.$span_a.'" href="#">'.$span_icon.'<span class="nav-text">'.$item['namemenu'].'</span></a>';
                }else{
                    if($item['catnametype']=='link'){
                        $this->list_menu .= '<li><a class="'.$span_a.'" href="'.url('/').'/'.$item['url'].'">'.$span_icon.'<span class="nav-text">'.$item['namemenu'].'</span></a>';
                    }else{
                        $this->list_menu .= '<li><a class="'.$span_a.'" href="'.url('/').'/'.$item['slug'].'">'.$span_icon.'<span class="nav-text">'.$item['namemenu'].'</span></a>';
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