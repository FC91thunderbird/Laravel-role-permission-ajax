<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated()
    {
        if (Auth::check()) {
            $user = Auth::user();
            
            if ($user->roleId === 1) {
                return redirect()->route('admin.dashboard');
            } elseif ($user->roleId === 2) {
                return redirect()->route('manager.dashboard');
            } elseif ($user->roleId === 3) {
                return redirect()->route('user.dashboard');
            }
        }
    
        return redirect()->route('home'); // Change 'home' to your default route
    }
}
