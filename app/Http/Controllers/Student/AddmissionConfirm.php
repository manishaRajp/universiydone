<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Mail\AddmisionConfirmationMAil;
use App\Models\Addmission;
use App\Models\AddmissionConfirmation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AddmissionConfirm extends Controller
{

    public function index()
    {
        $addmissionConfirm = AddmissionConfirmation::with('Addmission_id')->where('addmission_id', Auth::user()->id)->first();
        $addmission = Addmission::where('user_id', Auth::user()->id)->first();
        return view('frontend.addmission.admission-confirm', compact('addmission', 'addmissionConfirm'));
    }


    public function create()
    {
    }
    public function store(Request $request)
    {
       
        $addmissionConfirm = Addmission::where('user_id', Auth::user()->id)->pluck('id')->first();
        $confirm = new AddmissionConfirmation();
        $confirm->addmission_id = $addmissionConfirm;
        // $confirm->confirm_college_id = $request['college_id'];
        // $confirm->confirm_round_id = $request['merit_round_id'];
        // $confirm->confirm_merit = $request['merit'];
        $confirm->confirmation_type = 'M';
        $confirm->save();
        return redirect()->route('home')->with('success', 'You Request send Wait for Declaration');
    }
    public function show($id)
    {
        // 
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
