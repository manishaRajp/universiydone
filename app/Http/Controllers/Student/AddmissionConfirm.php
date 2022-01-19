<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Addmission;
use App\Models\AddmissionConfirmation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AddmissionConfirm extends Controller
{

    public function index()
    {  
        $addmission = Addmission::where('user_id', Auth::user()->id)->first();
        if($addmission == NULL){
            $status = true;
        } else{
            $status = false;
        }
        // dd($addmission);
        // $addmission_confirm = AddmissionConfirmation::where('addmission_id',
        // $addmission->id)->first();
        // dd($addmission_confirm);
        return view('frontend.addmission.admission-confirm', compact('addmission','status'));
    }


    public function create()
    {

    }


    public function store(Request $request)
    {
        $addmission_confirm = AddmissionConfirmation::where('addmission_id', $request['addmission_id'])->first();
        dd($addmission_confirm);
        if ($addmission_confirm == null) {
            $addmission = Addmission::where('user_id', Auth::user()->id)->first();
            $request->session()->flash('danger', 'Please go for Admmision Prosses');
            return view('frontend.addmission.admission-confirm', compact('addmission'));
        } else {
            $addmissionConfirm = Addmission::where('user_id', Auth::user()->id)->pluck('id')->first();
            $confirm = new AddmissionConfirmation();
            $confirm->addmission_id = $addmissionConfirm;
            $confirm->confirm_college_id = $request['college_id'];
            $confirm->confirm_round_id = $request['merit_round_id'];
            $confirm->confirm_merit = $request['merit'];
            $confirm->confirmation_type = 'M';
            $confirm->save();
            return redirect()->route('home');
        }
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
