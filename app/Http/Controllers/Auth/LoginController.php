<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use App\User;
use Log;

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
    
    /**
     * Redirect the user to the provider authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider($driver)
    {
        return Socialite::driver($driver)->redirect();
    }
    
    /**
     * Obtain the user information from provider.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback($driver)
    {
        try {
            $user = Socialite::driver($driver)->user();
        } catch (\Exception $e) {
            return redirect()->route('login');
        }
        
        $existingUser = User::where('email', $user->getEmail())->first();
        
        if ($existingUser) {
            if (empty($existingUser->provider_name) || empty($existingUser->provider_id) || empty($existingUser->avatar))
            {
                $existingUser->provider_name    = $driver;
                $existingUser->provider_id      = $user->getId();
                $existingUser->avatar           = $user->getAvatar();
                
                $existingUser->save();
            }
            
            auth()->login($existingUser, true);
            return redirect($this->redirectPath());
        } else {
            return redirect()->route('login')->with('google-auth-failed', 'Sorry, that Google account is not tied to an existing user.');
        }
    }
}
