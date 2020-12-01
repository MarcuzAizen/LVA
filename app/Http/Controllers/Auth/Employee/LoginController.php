<?php

namespace App\Http\Controllers\Auth\Employee;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo;

    public function __construct()
    {
       // $this->middleware('guest')->except('logout');
    }

    public function redirectTo()
    {
        switch (Auth::user()->role_id) {
            case 1: 
                $this->redirectTo = '/admin/home';
                return $this->redirectTo;
                break;
            case 2: 
                $this->redirectTo = '/registrar/home';
                return $this->redirectTo;
                break;
            case 3: 
                $this->redirectTo = '/enrollment-officer/home';
                return $this->redirectTo;
                break;
            case 4: 
                $this->redirectTo = '/principal/home';
                return $this->redirectTo;
                break;
            case 5: 
                $this->redirectTo = '/teacher/home';
                return $this->redirectTo;
                break;
            default: 
                $this->redirectTo = '/login';
                return $this->redirectTo;
                break;
        }
    }

    public function username()
    {
        return 'username';
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->flush();
        $request->session()->regenerate();
        return redirect()->route('login');
    }
}
