<?php

namespace App\Http\Controllers\University;

use App\Contracts\University\collegeContract;
use App\DataTables\CollegeDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\University\CollegeStore;
use App\Mail\registermail;
use App\Models\College;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class CollegeController extends Controller
{
    public function __construct(collegeContract $collegeRegister)
    {
        $this->collegeRegister = $collegeRegister;
    }


    public function index(CollegeDataTable $dataTable)
    {
        return $dataTable->render('backend.university.college.index');
    }


    public function create()
    {
        return view('backend.university.college.add');
    }

    public function store(CollegeStore $request)
    {
        return $this->collegeRegister->store($request->all());
    }

    public function show($id)
    {
        $clg_show = College::find($id);
        return view('backend.university.college.show', compact('clg_show'));
    }


    public function edit($id)
    {
        $clg_edit = College::find($id);
        return view('backend.university.college.edit', compact('clg_edit'));
    }


    public function update(Request $request, $id)
    {
        return $this->collegeRegister->update($request->all());
    }

    public function destroy(Request $request ,$id)
    {
        $collegeDelete = College::find($id);
        $collegeDelete->delete();
        $request->session()->flash('success', 'Recoreds Are Deleted ');
        return redirect()->route('university.college.index');
    }
}
