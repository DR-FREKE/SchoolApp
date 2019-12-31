<?php

namespace App\Http\Middleware;

use Closure;
use App;
use App\User;
use Auth;

class UserAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $username = $request->name;
        $password = $request->password;

        if(Auth::attempt([
            'name'=>$username,
            'password'=>$password
        ])){
            //return view("");
            $user = App\User::where('name', $request->name)->first();
            $request->session()->put('credentials', [$user->admin, $user->name]);
            return response()->json(['msg'=>'good']);
        }else{
            return response()->json(['msg'=>'Sorry']);
        }
        return $next($request);
    }
}
