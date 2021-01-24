<?php

namespace App\Http\Controllers\Auth\Student;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    protected $redirectTo = '/student/login';

    public function __construct()
    {
        $this->middleware('student.auth:student');
    }

    public function index() {
        return view('student.home');
    }
}
