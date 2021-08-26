<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\SocialLogin;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    protected $redirectTo = '/';//RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectTo(){
        $role = Auth::user()->rol->key;

        switch ($role) {
            case 'admin':
                return '/dashboard/post';
                break;
            
            default:
                return '/';
                break;
        }
    }

    public function redirectToProvider($provider = "github"){

        if(!config("services.$provider")) abort(404);

        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider = "github"){

        if(!config("services.$provider")) abort(404);

        $userS = Socialite::driver($provider)->user();

        if($userSocial = SocialLogin::where('nick_email',$userS->email)->orWhere('nick_email', $userS->nickname)->first()){
            return $this->loginAndRedirect($userSocial->user);
        }else{
            $user = User::create([
                'name' => Str::of($userS->name)->explode('')[0],
                'rol_id' => 2,
                'email' => $userS->email ? $userS->email : $userS->nickname,
                'email_verified_at' => now(),
                'password' => bcrypt(Str::random(10))
            ]);

            SocialLogin::create([
                'user_id' => $user->id,
                'provider' => $provider,
                'nick_email' => $userS->email ? $userS->email : $userS->nickname,
                'social_id' => $userS->id
            ]);

            return $this->loginAndRedirect($user);
        }
    }

    public function loginAndRedirect($user){
        Auth::login($user);
        return redirect()->to('/home');
    }
}
