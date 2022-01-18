<?php

namespace App\Http\Controllers\University;

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
        $images = uploadFile($request['logo'], 'CollegeLogo');
        $clg = new College();
        $clg->name = $request->name;
        $clg->email = $request->email;
        $clg->contact_no = $request->contact_no;
        $clg->address = $request->address;
        $clg->password = Hash::make($request->password);
        $clg->logo = $images;
        $clg->status = 1;
        $clg->save();

        Mail::to($clg->email)->send(new registermail($request->all()));
        return redirect()->route('university.college.index')->with('success', 'Data is successfully added!');
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
        $clg_update = College::find($id);
        if (isset($request->logo)) {
            $image = uploadFile($request->logo, 'CollegeLogo');
        } else {
            $image = $clg_update->getRawOriginal('logo');
        }
        $clg_update->name = $request->name;
        $clg_update->email = $request->email;
        $clg_update->contact_no = $request->contact_no;
        $clg_update->address = $request->address;
        $clg_update->logo = $image;
        $clg_update->update();
        $request->session()->flash('info', 'Recoreds Are Updates ');
        return redirect()->route('university.college.index');
    }

    public function destroy($id)
    {
        dd(452);
        $compani = College::find($id);
        $compani->delete();
        return redirect()->route('company.index');
    }
}
