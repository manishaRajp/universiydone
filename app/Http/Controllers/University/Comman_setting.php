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
    public function __construct(commanSettingContract $collegeRegister)
    {
        $this->collegeRegister = $collegeRegister;
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
        foreach ($request['marks'] as $key => $val) {
            $result = CommonSetting::where('id', $key)->first();
            if (isset($result)) {
                $insertData = [
                    'subject_id' => $key,
                    'marks' => $val,
                ];
                $result->update($insertData);
            } else {
                $insertData = [
                    'subject_id' => $key,
                    'marks' => $val,
                ];
                $result = CommonSetting::insert($insertData);
            }
        }
        return redirect()->back();
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
