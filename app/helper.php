<?php

use App\Models\Article;
use App\Models\CommonSetting;
use App\Models\Course;
use App\Models\StudentMark;
use Illuminate\Support\Facades\Auth;

if (!function_exists('uploadFile')) {
    function uploadFile($file, $dir)
    {

        if ($file) {
            $destinationPath =  storage_path('app/public') . DIRECTORY_SEPARATOR . $dir . DIRECTORY_SEPARATOR;
            $media_image = $file->hashName();
            $file->move($destinationPath, $media_image);
            return $media_image;
        }
    }

    if (!function_exists('getRandomString')) {
        function getRandomString($request)
        {
            $randomcode = Course::where('id', $request)->pluck('name')->first();
            $user_id =  Auth::user()->id;
            $randomString = '';
            $randomString .= $randomcode . $user_id;
            return $randomString;
        }
    }

    if (!function_exists('meritCount')) {
        function meritCount($request)
        {
            $student_mark = StudentMark::with('commonSetting')->where('user_id', Auth::user()->id)->get();
            $total_common_setting_mark = CommonSetting::sum('marks');
            $total_marks = 0;
            foreach ($student_mark as $value) {
                $obtain_mark = $value->obtain_mark * $value->commonSetting->marks / 100;

                $total_marks += $obtain_mark;
            }
            $merit = ($total_marks / $total_common_setting_mark) * 100;
            $merit_total = round($merit);
            return $merit_total;
        }
    }

    
}
