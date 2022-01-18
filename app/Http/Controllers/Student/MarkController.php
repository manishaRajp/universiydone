<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Http\Requests\Student\Marksstore;
use App\Models\StudentMark;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MarkController extends Controller
{
    public function index()
    {
       return view('frontend.dashboard.welcome');
    }

   
    public function create()
    {
        $sub = Subject::all();
        return view('frontend.marks.add', compact('sub'));
    }

   
    public function store(Marksstore $request)
    {
        $user_id = Auth::user()->id;
        $add_course = new StudentMark();
        $add_course->user_id = $user_id;
        $add_course->subject_id =  $request['subject_id'];
        $add_course->total_mark = $request['total_mark'];
        $add_course->obtain_mark = $request['obtain_mark'];
        $add_course->save();
        return redirect()->route('marks.index');
    }

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
        dd(232);
    }
}
