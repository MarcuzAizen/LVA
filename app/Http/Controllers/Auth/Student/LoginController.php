<?php

namespace App\Http\Controllers\Auth\Student;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/student';

    public function __construct()
    {
        $this->middleware('student.guest:student', ['except' => 'logout']);
    }

    protected function guard()
    {
        return Auth::guard('student');
    }

    public function showLoginForm()
    {
        // dd('student login page');
        return view('student.auth.login');
    }

    public function username()
    {
        return 'username';
    }

    public function logout(Request $request)
    {

        $this->guard()->logout();

        $request->session()->flush();

        $request->session()->regenerate();

        return redirect($this->redirectTo);
    }
}
