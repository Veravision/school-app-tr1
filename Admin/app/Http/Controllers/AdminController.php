<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;


use Illuminate\Support\Facades\Hash;
use Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use Illuminate\Validation\Rules\Password;
use App\Actions\Fortify\PasswordValidationRules;

class AdminController extends Controller
{
    protected $guard;

    public function __construct(StatefulGuard $guard){
        $this->middleware("guest:admin")->except("logout");
        $this->guard = $guard;
    }

    public function DisplayLoginForm() {
        if (Auth::guard('admin')->user()) {
            # code...
            return redirect()->route('admin.dashboard');
        }else {
            # code...
            return view('admin.auth.login');
        }
    }
    
    public function DisplayRegisterForm() {
        if (Auth::guard('admin')->user()) {
            # code...
            return redirect()->route('admin.dashboard');
        }else {
            # code...
            return view('admin.auth.register');
        }
    }

    public function CreateNewAdmin(Request $request){
        Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:admins'],
            'password' => ['required', Password::min(8)->mixedCase(8)->numbers()->symbols()->uncompromised(), 'confirmed'],
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        $admin = Admin::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        if ($admin) {
            # code...
            if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
                # code...
                $request->session()->regenerate();
                return redirect()->intended(route('admin.dashboard', ['admin' => 'admin']));
            }else {
                # code...
                return back()->withErrors(['Credentials do not match.'])->onlyInputs('name', 'email', 'terms');
            }
        }else {
            # code...
            return back()->withErrors(['User account could not be created.'])->onlyInputs('name', 'email', 'terms');
        }
    }

    public function AdminLoginProcess(Request $request) {
        Validator::make($request->all(), [
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', Password::min(8)->mixedCase(8)->numbers()->symbols()->uncompromised()],
        ])->validate();

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            # code...
            $request->session()->regenerate();
            // return "user logged in";
            return redirect()->intended(route('admin.dashboard', ['guard' => 'admin']));
        }else {
            # code...
            return back()->withErrors(['Credentials do not match.'])->onlyInput('name', 'email', 'terms');
        }
    }
}
