<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\VerifyUser;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
        $this->middleware('guest')->except('logout');
    }

    public function email()
    {
        return 'email';
    }

    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            $this->email() => 'required|string',
            'password' => 'required|string',
        ]);
    }

    protected function authenticated(Request $request, $user)
    {
        $user = User::where('email', $request->email)
                ->first();
    
        if (!$user) {
            return back()->with('error_login', 'Email not Found');
        } 
        
        if (!Hash::check($request->password, $user->password)) {
            return back()->with('error_login', 'Login Failed');
        }

        $remember = $request->remember ? true : false;

        $credentials = $request->only('email', 'password');
 
        if (Auth::attempt($credentials, $remember)) {
            $user_auth = Auth::user();
            $token = $user->createToken('user', ['user-access'])->plainTextToken;
            if($user_auth->roles[0]->name == 'superadmin'){
                $token = $user->createToken('admin', ['admin-access'])->plainTextToken;
            }
            if ($user_auth || $user) {
                session()->put('access_token', $token);
                session()->put('name', $user->name);
                session()->put('email', $user->email);
                session()->put('role', $user_auth->roles[0]->name);
            }

            return redirect(route('dashboard'))->with('success_login', 'Success login!');
        }
        return back()->with('error_login', 'Login Failed');
    
    }
    
    public function verifyEmail($token)
    {
        $verify_user = VerifyUser::with('user')->where('token', $token)->first();
        if ($verify_user) {
            $user = $verify_user->user;
            if ($user->email_verified_at == null && $user->is_active == false) {
                $user->email_verified_at = Carbon::now();
                $user->is_active = true;
                $user->save();
                return \redirect(route('login'))->with('session_activate', 'Your account has been activated');
            } else {
                return \redirect()->back()->with('info_activate', 'Your account has already been activated');
            }
        } else {
            return \redirect(route('login'))->with('error_activate', 'Something went wrong!!');
        }
    }

}
