<?php

namespace App\Http\Controllers\College;

use App\DataTables\Courses_collegeDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\College\Coursestore;
use App\Http\Requests\College\CourseUpdate;
use App\Models\Course;
use App\Models\CollegeCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Courses_collegeDataTable $dataTable)
    {
        return $dataTable->render('backend.college.course.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $course_select = Course::get();
        return view('backend.college.course.add', compact('course_select'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Coursestore $request)
    {
        $clg_id = Auth::guard('college')->user()->id;
        $add_course = new CollegeCourse();
        $add_course->college_id = $clg_id;
        $add_course->course_id =  $request['course_id'];
        $add_course->seat_no = $request['seat_no'];
        $add_course->reserved_seat = $request['reserved_seat'];
        $add_course->merit_seat = $request['merit_seat'];
        $add_course->save();
        return redirect()->route('college.course.index');
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
        
        $course = Course::get();
        $clg_course_edit = CollegeCourse::find($id);
        return view('backend.college.course.edit',compact('clg_course_edit','course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CourseUpdate $request, $id)
    {
        $clg_course_update = CollegeCourse::find($id);
        $clg_course_update->course_id = $request->course_id;
        $clg_course_update->seat_no = $request->seat_no;
        $clg_course_update->reserved_seat = $request->reserved_seat;
        $clg_course_update->merit_seat = $request->merit_seat;
        $clg_course_update->update();
        $request->session()->flash('info', 'Recoreds Are Updates ');
        return redirect()->route('college.course.index');
    }

   
    public function destroy($id)
    {
        dd(5446);
        $compani = CollegeCourse::find($id);
        $compani->delete();
        return redirect()->route('college.course.index');
    }
}
