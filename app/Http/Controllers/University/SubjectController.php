<?php

namespace App\Http\Controllers\University;

use App\DataTables\SubjectDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\University\subjectUpdate;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    
    public function index(SubjectDataTable $dataTable)
    {
        return $dataTable->render('backend.university.subject.index');
    }

    
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $sub_edit = Subject::find($id);
        return view('backend.university.subject.edit', compact('sub_edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(subjectUpdate $request, $id)
    {

        $sub_update = Subject::find($id);
        $sub_update->name = $request->name;
        $sub_update->code = $request->code;
        $sub_update->update();
        $request->session()->flash('info', 'Recoreds Are Updates ');
        return redirect()->route('university.subject.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd(2332);
    }
}
