<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use LRedis;
use App\Events\RedisEvent;
class socketController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index()
    {
        return view('socket');
    }

    public function writemessage()
    {
        return view('writemessage');
    }

    public function sendMessage(Request $request){
		$input = json_decode(file_get_contents('php://input'),true);
        $_ticket = $input['data'];
		$note ='';
        if(isset($_ticket['note'])){
          $note = $_ticket['note'];
        }
        //$redis = LRedis::connection();
        //$redis->publish('message', $note);
		event(
			$e = new RedisEvent($note)
		);
        return response()->json(array('error'=>0,'message'=>$note));
    }
}
