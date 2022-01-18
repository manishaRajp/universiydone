<?php

namespace App\Http\Controllers\University;

use App\Http\Controllers\Controller;
use App\Http\Requests\University\CommanSettingUpdate;
use App\Models\CommonSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class Comman_setting extends Controller
{

    public function index()
    {
        $comman_setting = CommonSetting::get();
        return view('backend.university.setting.edit', compact('comman_setting'));
    }


    public function create(Request $request, $id)
    {
    }


    public function store(CommanSettingUpdate $request)
    {
        
    }


    public function show($id)
    {
    }


    public function edit()
    {
    }


    public function update(Request $request, $id)
    {
        $countSetting = count($request->id);
        for ($i=0; $i < $countSetting ; $i++) {
            CommonSetting::where('id',$request->id[$i])->update([
                'subject_id'=> $request->subject_id[$i],
                'marks'=>$request->marks[$i]
            ]);
        }
        return redirect()->route('university.comman-setting.index');
    }


    public function destroy($id)
    {
        dd(23234);
    }
}
