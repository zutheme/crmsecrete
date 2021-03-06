<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Requests;
use Validator;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\MessageBag;
//namespace App\Http\Controllers;
//use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Auth;
//use Carbon\Carbon;
//use App\User;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    */
    use AuthenticatesUsers;
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
   
    public function logout(){
        Auth::logout();
        session()->forget('sidebar-admin');
        session()->forget('profile');
        return redirect('/');
    }
    
    public function getLogin()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $iduser = Auth::id(); 
            //profile
            $qr_select_profile = DB::select('call SelectProfileProcedure(?)',array($iduser));
            $profile = json_encode($qr_select_profile);
            session()->put('profile', $profile);
            return redirect('/'); 
            //return redirect()->route('teamilk.home')->with('success',$user->name);
        } else {
            //return view('teamilk.login');
            return redirect('/admin/dashboard');
        }

    }
    public function postLogin(Request $request) {
      $rules = [
        //'email' =>'required|email',
        'name' =>'required',
        'password' => 'required|min:8'
      ];
      $messages = [
        //'email.required' => 'Email l?? tr?????ng b???t bu???c',
        //'email.email' => 'Email kh??ng ????ng ?????nh d???ng',
        'name.required' => 'T??n ????ng nh???p l?? tr?????ng b???t bu???c',
        'password.required' => 'M???t kh???u l?? tr?????ng b???t bu???c',
        'password.min' => 'M???t kh???u ph???i ch???a ??t nh???t 8 k?? t???',
      ];
      $validator = Validator::make($request->all(), $rules, $messages);
      if ($validator->fails()) {
        //return redirect()->back()->withErrors($validator)->withInput();
         //$errors = $validator->errors();
        return redirect('client/login')->withErrors($validator)->withInput();
      } else {
        //$email = $request->input('email');
        $name = $request->input('name');
        $password = $request->input('password');
        //if( Auth::attempt(['email' => $email, 'password' =>$password])) {
        if( Auth::attempt(['name' => $name, 'password' =>$password])) {
           $user = Auth::user();
           $iduser = Auth::id();  
           $success['token'] =  $user->createToken('MyApp')->accessToken;
           //return redirect()->intended('dashboard');
           $value = $request->session()->get('key');
            $qr_select_profile = DB::select('call SelectProfileProcedure(?)',array($iduser));
            $profile = json_encode($qr_select_profile);
            session()->put('profile', $profile); 
          return redirect('/');
           //return redirect()->route('teamilk.home')->with('success',$value);
        } else {
          $errors = new MessageBag(['error' => 'T??n ????ng nh???p ho???c m???t kh???u kh??ng ????ng']);
          //return redirect()->back()->withInput()->withErrors($errors);
          // 'custom' => [
          //     'email' => [
          //         'required' => 'We need to know your e-mail address!',
          //     ],
          // ],
          //return redirect('client/login')->with(compact('errors'));
          return redirect('admin/dashboard')->with(compact('errors'));
          //return redirect()->route('teamilk.login')->with($errors);
        }
      }
    } 
   //response ajax login
    public function postloginmodal() {
        $input = json_decode(file_get_contents('php://input'),true);  
        $email = $input['login_email'];
        $password = $input['login_password'];
        if( Auth::attempt(['email' => $email, 'password' =>$password])) {
           //$user = Auth::user(); 
           $success['token'] =  $user->createToken('MyApp')->accessToken;
           return redirect('/'); 
           //return redirect()->route('teamilk.home');
           //return response()->json(array('success' => true, 'email' => $email), 200);
        } else {
          $errors = new MessageBag(['error' => 'Email ho???c m???t kh???u kh??ng ????ng']);
          //return redirect()->back()->withInput()->withErrors($errors);
          return response()->json(array('success' => false, 'error' => $errors), 200);
        }
      }
      

}

