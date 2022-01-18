<?php

namespace App\Http\Controllers\University;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    protected $redirectTo = "university/dasboard";

    public function __construct()
    {
        $this->middleware('guest:university')->except('logout');
    }

    public function showLoginForm()
    {
        return view('backend.university.admin.login');
    }

    protected function attemptLogin(Request $request)
    {
        return $this->guard('university')->attempt(
            $this->credentials($request),
            $request->filled('remember')
        );
    }

    public function logout(Request $request)
    {
        $this->guard('university')->logout();
        return redirect()->route('university.login');
    }

    protected function guard()
    {
        return Auth::guard('university');
    }
}
