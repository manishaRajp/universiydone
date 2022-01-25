<?php

namespace App\Repositories\student;

use App\Contracts\student\MarksContract;
use App\Models\StudentMark;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MarksRepository implements MarksContract
{
    public function store(array $request)
    {
        DB::beginTransaction();
        try {
            $total_marks = 0;
            $total_obtain_mark = 0;
            $totalMarksMerit = 0;
            $id = StudentMark::whereIn('user_id', [Auth::user()->id])->count();
            if (
                $id < 1
            ) {
                foreach ($request['sub'] as $key => $val) {
                    $value = StudentMark::create([
                        'user_id' => Auth::user()->id,
                        'subject_id' => $key,
                        'total_mark' => '100',
                        'obtain_mark' => $val,
                    ]);
                    $total_marks += $value->total_mark;
                    $total_obtain_mark += $value->obtain_mark;
                }
                $merit = ($total_obtain_mark / $total_marks) * 100;
                $student_merit_total = round($merit);
                DB::commit();
                return view('frontend.marks.data', compact('student_merit_total', 'total_marks', 'total_obtain_mark'));
            } else {
                return redirect()->back()->with('info','Marks Are added sussefully');
            }
        } catch (Exception $e) {
            Log::info($e);
            DB::rollBack();
        }
    }
}
