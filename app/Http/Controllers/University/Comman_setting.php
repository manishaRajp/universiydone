<?php

namespace App\Http\Controllers\University;

use App\Http\Controllers\Controller;
use App\Http\Requests\University\CommanSettingUpdate;
use App\Models\CommonSetting;
use Illuminate\Http\Request;

class Comman_setting extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comman_setting = CommonSetting::get();
        return view('backend.university.setting.edit', compact('comman_setting'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, $id)
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommanSettingUpdate $request)
    {

        $comman_setting = new CommonSetting;
        $comman_setting->subject_id = $request->subject_id;
        $comman_setting->marks = $request->marks;
        $comman_setting->update();
        return redirect()->route('university.dasboard');
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
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd(23234);
    }
}
