<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\StatefulGuard;
use Auth;


use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use Illuminate\Validation\Rules\Password;
use App\Actions\Fortify\PasswordValidationRules;

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
            return view('admin.auth.login');
        }
    }
    
    function DisplayRegisterForm() {
        if (Auth::guard('admin')->user()) {
            # code...
            return redirect()->route('admin.dashboard');
        }else {
            # code...
            return view('admin.auth.register');
        }
    }

    function CreateNewAdmin(array $input){
        dd($input);
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', Password::min(8)->mixedCase(8)->numbers()->symbols()->uncompromised(), 'confirmed'],
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        return Admin::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
