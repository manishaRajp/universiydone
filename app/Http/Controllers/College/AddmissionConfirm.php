<?php

namespace App\Http\Controllers\College;

use App\DataTables\AddmissionConfirmMeritDataTable;
use App\DataTables\AddmissionConfirmReservedDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AddmissionConfirm extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(AddmissionConfirmMeritDataTable $dataTable)
    {
        return $dataTable->render('backend.college.addmissionConfirm.merit_index');
    }


    public function create(AddmissionConfirmReservedDataTable $dataTable)
    {
        return $dataTable->render('backend.college.addmissionConfirm.reserved_index');
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
    public function destroy($id)
    {
        //
    }
}
