<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'contact_no' => ['required', 'max:255', 'unique:users'],
            'gender' => ['required', 'in:M,F,O'],
            'address' => ['required', 'string', 'max:255'],
            'adhaar_card_no' => ['required', 'max:255'],
            'dob' => ['required'],
            'image' => ['required', 'mimes:jpg,bmp,png'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $images = uploadFile($data['image'], 'Studentimage');
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'contact_no' => $data['contact_no'],
            'gender' => $data['gender'],
            'address' => $data['address'],
            'dob' => $data['dob'],
            // 'otp' => $data['otp'],
            'password' => Hash::make($data['password']),
            'adhaar_card_no' => $data['adhaar_card_no'],
            'image' =>   $images,

        ]);
    }
}
