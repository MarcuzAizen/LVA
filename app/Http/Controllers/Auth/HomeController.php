<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function admin() 
    {
        return view('admin.home');
    }

    public function registrar()
    {
        return view('registrar.home');
    }

    public function enrollmentOfficer()
    {
        return view('enrollment-officer.home');
    }

    public function principal()
    {
        return view('principal.home');
    }

    public function teacher()
    {
        return view('teacher.home');
    }
}
