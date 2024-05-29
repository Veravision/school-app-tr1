<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\StatefulGuard;
use Auth;

class AdminController extends Controller
{
    function __construct(StatefulGuard $guard){
        $this->middleware("guest:admin")->except("logout");
        $this->guard = $guard;
    }
    function DisplayLoginForm() {
        if (Auth::guard('admin')->user()) {
            # code...
            return redirect()->route('admin.dashboard');
        }else {
            # code...
            return view('auth.login');
        }
    }
}
