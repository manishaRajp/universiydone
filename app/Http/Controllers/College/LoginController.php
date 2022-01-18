<?php

namespace App\Http\Controllers\College;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    protected $redirectTo = "college/dasboard";

    public function __construct()
    {
        $this->middleware('guest:college')->except('logout');
    }

    public function showLoginForm()
    {
        return view('backend.college.admin.login');
    }

    protected function attemptLogin(Request $request)
    {
        return $this->guard('college')->attempt(
            $this->credentials($request),
            $request->filled('remember')
        );
    }

    public function logout(Request $request)
    {
        $this->guard('college')->logout();
        return redirect()->route('college.login');
    }

    protected function guard()
    {
        return Auth::guard('college');
    }
}
