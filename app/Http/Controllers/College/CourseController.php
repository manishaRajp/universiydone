<?php

namespace App\Http\Controllers\College;

use App\Contracts\college\CourseContract;
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
    public function __construct(CourseContract $courseService)
    {
        $this->courseService = $courseService;
    }

    public function index(Courses_collegeDataTable $dataTable)
    {
        return $dataTable->render('backend.college.course.index');
    }

   
    public function create()
    {
        $course_select = Course::get();
        return view('backend.college.course.add', compact('course_select'));
    }

    
    public function store(Coursestore $request)
    {
       return $this->courseService->store($request->all());
    }

    
    public function show($id)
    {
        //
    }

  
    public function edit($id)
    {
        
        $course = Course::get();
        $clg_course_edit = CollegeCourse::find($id);
        return view('backend.college.course.edit',compact('clg_course_edit','course'));
    }

   
    public function update(CourseUpdate $request)
    {
        return $this->courseService->update($request->all());
    }

   
    public function destroy(Request $request ,$id)
    {
        $compani = CollegeCourse::find($id);
        $compani->delete();
        $request->session()->flash('error', 'Recoreds Are Deleted ');
        return redirect()->route('college.course.index');
    }
}
