<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (isPatient()){
            return view('home');
        }
        return view('admin.layouts.dashboard');
    }
}
