<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //
    public function login()
    {
        return redirect('/index');//重定向到首页,不能加admin
    }
    public function toLogin()
    {
        return view('admin.login');
    }
    public function toIndex()
    {
        return view('admin.index');
    }

}
