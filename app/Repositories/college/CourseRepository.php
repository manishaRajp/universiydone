<?php

namespace App\Repositories\college;

use App\Contracts\college\CourseContract;
use App\Models\CollegeCourse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CourseRepository implements CourseContract
{
 
    public function store(array $request)
    {
        $clg_id = Auth::guard('college')->user()->id;
        $add_course = new CollegeCourse();
        $add_course->college_id = $clg_id;
        $add_course->course_id =  $request['course_id'];
        $add_course->seat_no = $request['seat_no'];
        $add_course->reserved_seat = $request['reserved_seat'];
        $add_course->merit_seat = $request['merit_seat'];
        $add_course->save();
        return redirect()->route('college.course.index')->with('success','Data added succefully');
    }

    public function update(array $request)
    {
        $clg_course_update = CollegeCourse::where('id', $request['id'])->get()->first();
        $clg_course_update->course_id = $request['course_id'];
        $clg_course_update->seat_no = $request['seat_no'];
        $clg_course_update->reserved_seat = $request['reserved_seat'];
        $clg_course_update->merit_seat = $request['merit_seat'];
        $clg_course_update->update();
        return redirect()->route('college.course.index')->with('info','Data Updated Succefully');

    }
   
}
