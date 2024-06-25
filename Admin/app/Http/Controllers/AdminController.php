<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Routing\Pipeline;
use Laravel\Fortify\Actions\AttemptToAuthenticate;
use Laravel\Fortify\Actions\EnsureLoginIsNotThrottled;
use Laravel\Fortify\Actions\PrepareAuthenticatedSession;
use Laravel\Fortify\Actions\RedirectIfTwoFactorAuthenticatable;
use Laravel\Fortify\Contracts\LoginResponse;
use Laravel\Fortify\Contracts\LoginViewResponse;
use Laravel\Fortify\Contracts\LogoutResponse;
use Laravel\Fortify\Features;
use Laravel\Fortify\Fortify;
use Laravel\Fortify\Http\Requests\LoginRequest;
use Auth;
use Validator;

use App\Models\Admins;
use Illuminate\Validation\Rules\Password;
use Laravel\Jetstream\Jetstream;

use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    protected $guard;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(StatefulGuard $guard)
    {
        # code...
        $this->middleware('guest:admin')->except('logout');
        $this->guard = $guard;
    }


    public function DisplayLoginForm()
    {
        # code...
        if (Auth::guard('admin')->user()) {
            return redirect()->route('admin.dashboard');
        } else {
            return view('admin.auth.login');
        }
    }

    public function DisplayRegisterForm() {
        if (Auth::guard('admin')->user()) {
            return redirect()->route('admin.dashboard');
        } else {
            return view('admin.auth.register');
        }
    }

    function CreateNewAdmin(Request $request) {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:admins'],
            'password' => ['required', Password::min(8)->mixedCase(8)->numbers()->symbols()->uncompromised(), 'confirmed'],
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ]);

        $admin = Admin::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        if($admin){
            $request->session()->regenerate();
            return redirect()->intended(route('admin.dashboard', ['guard' => 'admin']));
        }else {
            # code...
            return back()->withInput($request->only('email', 'remember'))->withErrors(['New user could not be registered...']);
        }
    }

    
    public function ProcessLogin(Request $request)
    {
        # code...
        $request->validate([
            'email' => ['required'],
            'password' => ['required', 'min:4']
        ]);


        if (Auth::guard('admin')->attempt([
            'email' => $request->email,
            'password' => $request->password,
        ], $request->remember)) {
            # code...
            $request->session()->regenerate();
            return redirect()->intended(route('admin.dashboard', ['guard' => 'admin']));
        }else {
            # code...
            return back()->withErrors(['Credentials do not match.'])->onlyInput('email', 'remember');
        }
        return back()->withInput($request->only('email', 'remember'));
    }

    public function logout(Request $request)
    {
        # code...
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        return redirect()->route('admin.login');
        $request->session()->regenerateToken();

        return app(LogoutResponse::class);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
