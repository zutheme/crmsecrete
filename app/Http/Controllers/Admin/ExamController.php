<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Illuminate\Support\Facades\DB;
use Validator;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Input;
class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	public $main_menu;
	public function __construct() {
        $main_menu = '';
    }
    public function index()
    {
        $permissions = $this->CheckPermission();
        $allow = $permissions[0]['allow'];
        if($allow > 0 ){
             $exams = array();
			return view('admin.exam.index',compact('exams'));
        }else{
            return view('admin.welcome.disable');
        } 
	   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = $this->CheckPermission();
        $allow = $permissions[0]['allow'];
        if($allow > 0 ){
			$idposttype = 29;
            $qr_category = DB::select('call ListParentCatByIdcatetypeProcedure(?)',array($idposttype));
			$categories = json_decode(json_encode($qr_category), true);
			$_namecattype = 'lesson';
			$cate_selected = array();
			$str = $this->all_category($_namecattype, $cate_selected );
            return view('admin.exam.create',compact('categories'));
        }else{
            return view('admin.welcome.disable');
            //return redirect()->route('admin.welcome.disable')->with('disable');
        } 
		
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), ['name' => 'required','idpermcommand' => 'required']);
        if ($validator->fails()) { 
            $errors = $validator->errors();
            return redirect()->route('admin.permission.create')->with(compact('errors'));           
        }
        $input = $request->all();
        $name = $request->get('name');
        $description = $request->get('description');
        $idpermcommand = $request->get('idpermcommand');         
        $message = "";
        $idcategory = 0;  
        try {
            $iduserimp = Auth::id();
            //$idcategory = $request->input('list_check');
            $l_idcategory = $request->input('list_check');
            if($l_idcategory){
                foreach ($l_idcategory as $_idcategory) {
                   $idcategory = $_idcategory;
                } 
            }
            $qr_permission = DB::select('call AddPermissionProcedure(?,?,?,?)',array($name, $description, $idpermcommand, $idcategory));
            $rs_permission = json_decode(json_encode($qr_permission), true);
            $result = $name.','.$idpermcommand.','.$idcategory.','.$iduserimp;
        } catch (\Illuminate\Database\QueryException $ex) {
            $errors = new MessageBag(['errorlogin' => $ex->getMessage()]);
            return redirect()->back()->withInput()->withErrors($errors);
        } 
        return redirect()->route('admin.permission.index')->with('success',$result);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
	public function curent_url()
    {
        $totalSegsCount = count(\Request::segments());
        $url = '';
        for ($i = 0; $i < $totalSegsCount; $i++) { 
            $url .= \Request::segment($i+1)."/";
        }
        $url = rtrim($url, '/');
        $_command = "select";
        $pattern_index = "/admin\/permission$/";
        $pattern_create = "/admin\/permission\/create$/";
        $pattern_edit = "/admin\/permission\/[0-9]+\/edit$/";
        $pattern_delete = "/admin\/permission\/[0-9]+$/";
        $matches = array();
        if (preg_match($pattern_index, $url, $matches)){
            $_command = "select";
            $url = "admin/permission";
        }elseif (preg_match($pattern_create, $url, $matches)){
            $_command = "create";
            $url = "admin/permission/create";
        }elseif (preg_match($pattern_edit, $url, $matches)){
            $_command = "edit";
            $url = "admin/permission/0/edit";
        }elseif (preg_match($pattern_delete, $url, $matches)){
            $_command = "delete";
            $url = "admin/permission/0";
        }
        $result = array('url'=>$url,'command'=>$_command);
        return $result;
    }
    public function CheckPermission(){
        $_iduser = Auth::id();
        $arr = $this->curent_url();
        $_command = $arr['command'];
        $_curent_url = $arr['url'];
        $qr_permission = DB::select('call ListEnablePermission(?,?,?,?)',array($_iduser, $_command ,'dashboard' , $_curent_url));
        $permissions = json_decode(json_encode($qr_permission), true);
        return $permissions;
    }
	//show sub category
    public function all_category($_namecattype, $_cate_selected) {
        $result = DB::select('call ListAllCatByTypeProcedure(?)',array($_namecattype));
        $categories = json_decode(json_encode($result), true);
        $this->showCategories($categories,0,'',$_cate_selected,$_namecattype);
		return $this->main_menu;
    }
 
    public function showCategories($categories, $idparent = 0, $char = '', $_cate_selected, $_cattype = 'post'){
        $cate_child = array();
		$name_check = "list_check[]";
        foreach ($categories as $key => $item)
        {
            if ($item['idparent'] == $idparent)
            {
                $cate_child[] = $item;
                unset($categories[$key]);
            }
        }
        $list_cat="";       
        if ($cate_child)
        {	
				$this->main_menu .= '<ul class="list-check">';
				foreach ($cate_child as $key => $item){
					// Hiển thị tiêu đề chuyên mục
					$_idcateproduct = $this->compare_in_list($_cate_selected,$item['idcategory']);
					$selected = ($_idcateproduct > 0) ? ' checked' : '';
					$this->main_menu .= '<li><input class="checklist" type="checkbox" name="'.$name_check.'" value="'.$item['idcategory'].'"'.$selected.' onclick="OnChangeCheckbox(this)">'.$item['namecat'];
					$this->main_menu .= '<input type="hidden" class="hidden_idcate" value="'.$_idcateproduct.'" />';
					$this->showCategories($categories, $item['idcategory'], $char.'|---', $_cate_selected, $_cattype);
					$this->main_menu .= '</li>';
				}
				$this->main_menu .= '</ul>';
			
        }
    }
    public function compare_in_list($_cate_selected, $x = 0){
        foreach ($_cate_selected as $item)
        {
           if($x == $item['idcategory']) return $item['idcateproduct'];
        }
        return 0;
    }
    public function find_list($list_check = array(), $s=0){
        foreach ($list_check as $key=>$value) {
            if($s==$value) return $key;              
        }
        return -1;
    }
}
