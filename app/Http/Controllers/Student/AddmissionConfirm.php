<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Addmission;
use App\Models\AddmissionConfirmation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AddmissionConfirm extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $addmission = Addmission::where('user_id', Auth::user()->id)->first();
        return view('frontend.addmission.index', compact('addmission'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd(Auth::user()->id);
        $addmissionConfirm = Addmission::where('user_id', Auth::user()->id)->pluck('id')->first();
        // dd($addmissionConfirm);
        $confirm = new AddmissionConfirmation();
        $confirm->addmission_id = $addmissionConfirm;
        $confirm->confirm_college_id = $request['college_id'];
        $confirm->confirm_round_id = $request['merit_round_id'];
        $confirm->confirm_merit = $request['merit'];
        $confirm->confirmation_type = 'M';
        $confirm->save();
        return redirect()->route('addmoission-confirm.index');

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
