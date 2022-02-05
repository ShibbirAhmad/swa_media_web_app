<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
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





    public function register(Request $request){

        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'max:14', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        $data['password']=Hash::make($request->password);
        User::query()->create($data);
        Auth::attempt(['email'=> $request->email, 'password' => $request->password]);  
    }


    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($validated)) {
            if (Auth::user()->role == 1) {
                return redirect()->route('user.dashboard');
            } elseif (Auth::user()->role == 2) {
                return redirect()->route('admin.home');

            } else {
                return redirect('/');

            }
        } else {
            return back()->withErrors(['msg' => 'Credential Do Not Match Your  Record']);
        }

    }
}
