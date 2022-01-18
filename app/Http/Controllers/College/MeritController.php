<?php

namespace App\Http\Controllers\College;

use App\DataTables\College_MeritDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\College\MeritStore;
use App\Http\Requests\College\MeritUpdate;
use App\Models\CollegeMerit;
use App\Models\Course;
use App\Models\CollegeCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MeritController extends Controller
{


    public function index(College_MeritDataTable $dataTable)
    {
        return $dataTable->render('backend.college.merit.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $course_select = Course::get();
        return view('backend.college.merit.add', compact('course_select'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MeritStore $request)
    {
        $clg_id = Auth::guard('college')->user()->id;
        $add_merit = new CollegeMerit();
        $add_merit->college_id = $clg_id;
        $add_merit->course_id = $request['course_id'];
        $add_merit->merit_round_id = $request['merit_round_id'];
        $add_merit->merit = $request['merit'];
        $add_merit->save();
        return redirect()->route('college.merit.index');
        
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
        $course_select = CollegeCourse::get();
        $clg_merit = CollegeMerit::find($id);
        return view('backend.college.merit.edit',compact('clg_merit','course_select'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MeritUpdate $request, $id)
    {
        $clg_merit_update = CollegeMerit::find($id);
        $clg_merit_update->course_id = $request->course_id;
        $clg_merit_update->merit_round_id = $request->merit_round_id;
        $clg_merit_update->merit = $request->merit;
        $clg_merit_update->update();
        $request->session()->flash('info', 'Recoreds Are Updates ');
        return redirect()->route('college.merit.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd(4324);
    }
}
