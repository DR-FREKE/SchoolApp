<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App;
use App\User;
use Auth;

class loginController extends Controller
{
    //

    public function __construct(){
        //$this->middleware('userauth');
        //$this->getBrowser();
    }
    public function isLoggedinRole(Request $request){
        if($request->session()->has('credentials')){
            
            $userLevel = $request->session()->get('credentials')[0];
            //$name = array("username"=>$request->session()->get('credentials')[1], "admin"=>$userLevel);
            
            if($userLevel == 0){
                return view('home');
            }else{
                return view('admin');
            }
        }else{
            return view('auth/login');
        }
    }

    public function getBrowser(){
        $browser = get_browser(null, true);
        $new_browser = strtolower($browser['browser']);
        
        if($new_browser != 'chrome'){
            return response()->json(['browser_msg'=>'wrong browser']);
        }
    }

    public function store(Request $request){
        // $schoolUser = new User();
        // $schoolUser->name = "ndifereke";
        // $schoolUser->schoolCode = bcrypt("22550142");
        // $schoolUser->admin = "1";

        // $finder = App\User::where('name', 'ndifereke')->first();
        // if($finder->name == 'ndifereke'){
        //     echo "Record already exists";
        // }else{
        //     $schoolUser->save();
        // }
        $school = App\School::firstOrNew(['schoolName' => 'Jesse', 'schoolCode' => 'CS50101', 'userType'=>0]);
        if($school->exists){
            echo "Record already exists";
        }else{
            if($school->save()){
                // do function saveUser
                if($school->allowed){
                    // if allowed is true
                    $this->savetoUser($school->schoolName, $school->schoolCode, $school->userType);
                }
            }
        }
    }
    public function savetoUser($name, $password, $type){
        $user = App\User::create(['name'=>$name, 'schoolCode'=>bcrypt($password), 'admin'=>$type]);
        $user->save();
    }
}
