<?php

namespace App\Http\Controllers\University;

use App\DataTables\MeritDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\University\MeritStore;
use App\Models\Course;
use App\Models\MeritRound;
use Illuminate\Http\Request;

class Meritcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(MeritDataTable $datatable)
    {
        return $datatable->render('backend.university.merit.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $course = Course::all();
        return view('backend.university.merit.add',compact('course'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MeritStore $request)
    {
        $clg = new MeritRound();
        $clg->course_id = $request->course_id;
        $clg->round_no = $request->round_no;
        $clg->start_date = $request->start_date;
        $clg->end_date = $request->end_date;
        $clg->merit_result_declare_date = $request->merit_result_declare_date;
        $clg->status = 1;
        $clg->save();
        return redirect()->route('university.merti.index');
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
    public function destroy(Request $request,$id)
    {
        $collegeDelete = MeritRound::find($id);
        $collegeDelete->delete();
        $request->session()->flash('success', 'Recoreds Are Deleted ');
        return redirect()->route('university.college.index');
    }

    public function MeritStatus(Request $request)
    {
        $id = $request['id'];
        $code = MeritRound::find($id);
        if ($code->status == "1") {
            $code->status = "0";
        } else {
            $code->status = "1";
        }
        $code->save();
        return response()->json(['data' => $code]);
    }
}
