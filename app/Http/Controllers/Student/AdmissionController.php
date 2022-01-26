<?php

namespace App\Http\Controllers\Student;

use App\Contracts\student\AddmissionContract;
use App\Http\Controllers\Controller;
use App\Models\Addmission;
use App\Models\College;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdmissionController extends Controller
{

    public function __construct(AddmissionContract $addmissionservice)
    {
        $this->addmissionservice = $addmissionservice;
    }
   
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
      return $this->addmissionservice->store($request->all());
    }

   
    public function show($id)
    {
    }

 
    public function edit($id)
    {
    }

   
    public function update(Request $request, $id)
    {
    }

   
    public function destroy($id)
    {
        dd(23323);
    }

   
}
