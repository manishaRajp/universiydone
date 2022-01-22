<?php

namespace App\Http\Controllers\University;

use App\Contracts\University\subjectContract;
use App\DataTables\SubjectDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\University\subjectUpdate;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function __construct(subjectContract $subjectService)
    {
        $this->subjectService = $subjectService;
    }


    
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
    public function update(subjectUpdate $request)
    {
        return $this->subjectService->update($request->all());
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
