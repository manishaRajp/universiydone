<?php

namespace App\Repositories\university;

use App\Contracts\University\commanSettingContract;
use App\Models\CommonSetting;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use Exception;
use Illuminate\Support\Facades\Hash;

class commanSettingRepository implements commanSettingContract
{
    public function store(array $request)
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
}
