<?php

namespace App\Http\Controllers\University;

use App\Contracts\University\commanSettingContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\University\CommanSettingUpdate;
use App\Models\CommonSetting;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class Comman_setting extends Controller
{
    public function __construct(commanSettingContract $comaanservice)
    {
        $this->commanservice = $comaanservice;
    }

    public function index()
    {
        $comman_setting = CommonSetting::get();
        $subject = Subject::get();
        return view('backend.university.setting.edit',compact('comman_setting','subject'));
    }


    public function create(Request $request, $id)
    {
    }


    public function store(Request $request)
    {
        return $this->commanservice->store($request->all());
    }


    public function show($id)
    {
    }


    public function edit()
    {
    }


    public function update(Request $request, $id)
    {

    }



    public function destroy($id)
    {
        dd(23234);
    }
}
