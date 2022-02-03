<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Hash;
use Str;
use Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;
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
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except(['logout','isUserConnected','saveRouteForLogin']);
    }

    public function saveRouteForLogin(Request $request){
        session()->put('pathname',$request->get('pathname'));
        return $request->get('pathname');
    }

    public function facebook(Request $request){
        return Socialite::driver('facebook')->redirect();
    }

    public function google(Request $request){
        return Socialite::driver('google')->redirect();
    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect('/');
      }

    public function isUserConnected(){
        return Auth::check();
    }

    public function facebookRedirect(Request $request){
        session()->put('state', $request->input('state'));
        $user = Socialite::driver('facebook')->user();

        $exl = explode(' ', $user->name);
        $name = $exl[1];
        $firstname = $exl[0];
        $user = User::firstOrCreate([
            'email' => $user->email
        ], [
            'name' => $name,
            'firstName' => $firstname,
            'password' => Hash::make(Str::random(24))
        ]);

        Auth::login($user,true);
        Log::debug("messages " . session()->get('pathname'));
        if($path = session()->get('pathname')){
            return redirect($path);
        } else{
            return redirect('/');
        }
    }

    public function googleRedirect(Request $request){
        session()->put('state', $request->input('state'));

        $user = Socialite::driver('google')->user();

        $exl = explode(' ', $user->name);
        $name = $exl[0];
        $firstname = null;
        if(count($exl) == 2){
            $firstname = $exl[1];
        }
        $user = User::firstOrCreate([
            'email' => $user->email
        ], [
            'name' => $name,
            'firstName' => $firstname,
            'password' => Hash::make(Str::random(24))
        ]);

        Auth::login($user,true);
        if($path = session()->get('pathname')){
            return redirect($path);
        } else{
            return redirect('/');
        }
    }
}
