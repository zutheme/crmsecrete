<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Posts;
use App\PostType;
use App\status_type;
use Illuminate\Support\Facades\DB;
use Auth;
use App\attribute;
use App\Role;
use Validator;
use Illuminate\Support\MessageBag;
use Illuminate\Routing\UrlGenerator;

class AttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = $this->CheckPermission();
        $allow = $roles[0]['allow'];
        if($allow > 0 ){
            $qr_attributes = DB::select('call ListAttribute()');
			$rs_attributes = json_decode(json_encode($qr_attributes), true);
			return view('admin.attribute.index',compact('rs_attributes'));
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
		$roles = $this->CheckPermission();
        $allow = $roles[0]['allow'];
        if($allow > 0 ){
            $posttypes = PostType::all()->toArray();
			$qr_status = DB::select('call ListStatusbyIdposttype(?)', array(3));
			$statustypes = json_decode(json_encode($qr_status), true);
			return view('admin.attribute.create',compact('statustypes','posttypes'));
        }else{
            return view('admin.welcome.disable');
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
        $_iduser = Auth::id();
		$_nameattribute = $request->get('nameattribute');
		$_id_post_type = $request->get('sel_idposttype');
		$_idstatustype = $request->get('sel_idstatustype');
		$validator = Validator::make($request->all(), [ 
            'nameattribute' => 'required',
			'sel_idposttype' => 'required',
			'sel_idstatustype' => 'required'
        ]);
        if ($validator->fails()) { 
            $errors = $validator->errors();
            return redirect()->route('admin.attribute.create')->with(compact('errors'));           
        }
		$attribute = new attribute(['idposttype'=>$_id_post_type,'nameattribute'=>$_nameattribute,'idstatustype'=>$_idstatustype,'iduser'=>$_iduser]);
        $attribute->save();
        $idattribute = $attribute->idattribute;
		return view('admin.attribute.edit',$idattribute);
		//return redirect()->route('admin.category.index')->with('success','data added');
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
    public function edit($idattribute)
    {
		$roles = $this->CheckPermission();
        $allow = $roles[0]['allow'];
        if($allow > 0 ){
            $attributes = attribute::find($idattribute);
			$posttypes = PostType::all()->toArray();
			$qr_status = DB::select('call ListStatusbyIdposttype(?)', array(3));
			$statustypes = json_decode(json_encode($qr_status), true);
			return view('admin.attribute.edit',compact('attributes','idattribute','posttypes','statustypes'));
        }else{
            return view('admin.welcome.disable');
        }  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idattribute)
    {
        $posttypes = PostType::all()->toArray();
		$qr_status = DB::select('call ListStatusbyIdposttype(?)', array(3));
		$statustypes = json_decode(json_encode($qr_status), true);
		$attributes = attribute::find($idattribute);
        $attributes->nameattribute = $request->get('nameattribute');
        $attributes->idposttype = $request->get('sel_idposttype');
		$attributes->idstatustype = $request->get('sel_idstatustype');
        $attributes->save();
		return view('admin.attribute.edit',compact('attributes','idattribute','posttypes','statustypes'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return redirect()->route('admin.attribute.index')->with('success','data update');
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
        $pattern_index = "/admin\/roles$/";
        $pattern_create = "/admin\/roles\/create$/";
        $pattern_edit = "/admin\/roles\/[0-9]+\/edit$/";
        $pattern_delete = "/admin\/roles\/[0-9]+$/";
        $matches = array();
        if (preg_match($pattern_index, $url, $matches)){
            $_command = "select";
            $url = "admin/roles";
        }elseif (preg_match($pattern_create, $url, $matches)){
            $_command = "create";
            $url = "admin/roles/create";
        }elseif (preg_match($pattern_edit, $url, $matches)){
            $_command = "edit";
            $url = "admin/roles/0/edit";
        }elseif (preg_match($pattern_delete, $url, $matches)){
            $_command = "delete";
            $url = "admin/roles/0";
        }
        $result = array('url'=>$url,'command'=>$_command);
        return $result;
    }
    public function CheckPermission(){
        $_iduser = Auth::id();
        $arr = $this->curent_url();
        $_command = $arr['command'];
        $_curent_url = $arr['url'];
        $qr_roles = DB::select('call ListRolePermissionProcedure(?,?,?,?)',array($_iduser, $_command ,'dashboard' , $_curent_url));
        $roles = json_decode(json_encode($qr_roles), true);
        return $roles;
    }
	
}
