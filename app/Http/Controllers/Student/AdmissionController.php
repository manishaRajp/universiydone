<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Addmission;
use App\Models\College;
use App\Models\Course;
use App\Models\MeritRound;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdmissionController extends Controller
{
   
    public function index()
    {
        
    }

    
    public function create()
    {
        $adddmision_check = Addmission::where('user_id', [Auth::user()->id])->first();
        $clg_select = College::all();
        $course_select = Course::all();
        return view('frontend.addmission.add', compact('clg_select','course_select','adddmision_check'));
    }

  
    public function store(Request $request)
    {
        $merit_round = MeritRound::with('common_round_no')->where('id', $request['course_id'])->pluck('round_no')->first();
        $total_merit = meritcount($request->merit);
        $code = getRandomString($request->course_id);
        $user_id = Auth::user()->id;
        $addmission = new Addmission();
        $addmission->user_id = $user_id;
        $addmission->college_id = $request['college_id'];
        $addmission->course_id = $request['course_id'];
        $addmission->merit = $total_merit;
        $addmission->addmission_date = Carbon::now()->format('d-m-Y');
        $addmission->addmission_code = $code;
        $addmission->merit_round_id = $merit_round;
        $addmission->status = 1;
        $addmission->save();
        return redirect()->route('home');
    }

   
    public function show($id)
    {
        
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
        dd(23323);
    }

   
}
