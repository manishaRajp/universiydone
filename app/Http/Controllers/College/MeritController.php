<?php

namespace App\Http\Controllers\College;

use App\Contracts\college\MeritContract;
use App\DataTables\College_MeritDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\College\MeritStore;
use App\Http\Requests\College\MeritUpdate;
use App\Models\CollegeMerit;
use App\Models\Course;
use App\Models\CollegeCourse;
use App\Models\MeritRound;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MeritController extends Controller
{
    public function __construct(MeritContract $meritService)
    {
        $this->meritService = $meritService;
    }
    public function index(College_MeritDataTable $dataTable)
    {
        return $dataTable->render('backend.college.merit.index');
    }


    public function create()
    {

        $course_select = Course::get();
        return view('backend.college.merit.add', compact('course_select'));
    }


    public function store(MeritStore $request)
    {
        return $this->meritService->store($request->all());
    }

    public function show($id)
    {
        dd('view');
    }


    public function edit($id)
    {
        $course_select = CollegeCourse::get();
        $clg_merit = CollegeMerit::find($id);
        return view('backend.college.merit.edit', compact('clg_merit', 'course_select'));
    }


    public function update(MeritUpdate $request, $id)
    {
        return $this->meritService->update($request->all());
    }


    public function destroy(Request $request, $id)
    {
        $collegeDelete = CollegeMerit::find($id);
        $collegeDelete->delete();
        $request->session()->flash('success', 'Recored Deleted ');
        return redirect()->route('college.merit.index');
    }
}
