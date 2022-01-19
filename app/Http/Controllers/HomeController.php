<?php

namespace App\Http\Controllers;

use App\Models\Addmission;
use App\Models\StudentMark;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $marks_cheak =  StudentMark::where('user_id',Auth::user()->id)->first();
        $addmission_cheak = Addmission::where('user_id',Auth::user()->id)->first();
        return view('frontend/dashboard/home',compact('marks_cheak','addmission_cheak'));
    }
}
