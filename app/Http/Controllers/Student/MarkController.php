<?php

namespace App\Http\Controllers\Student;

use App\Contracts\student\MarksContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\Student\Marksstore;
use App\Models\StudentMark;
use App\Models\Subject;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class MarkController extends Controller
{
    public function __construct(MarksContract $marksService)
    {
        $this->marksService = $marksService;
    }
    public function index()
    {
        return view('frontend.dashboard.welcome');
    }


    public function create()
    {
        $student_marks = StudentMark::where('user_id', [Auth::user()->id])->first();
        $sub = Subject::all();
        return view('frontend.marks.add', compact('sub', 'student_marks'));
    }


    public function store(Request $request)
    {
       return $this->marksService->store($request->all());
    }

    public function show($id)
    {
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
        dd(232);
    }
}
