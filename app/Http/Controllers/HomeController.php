<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function superadmin()
    {
        return view('superadmin.index');
    }
    public function subadmin()
    {
        return view('subadmin.index');
    }
    public function admin()
    {
        return view('admin.index');
    }
    public function user()
    {
        return view('user.index');
    }
    public function security()
    {
        return view('security.index');
    }
}
