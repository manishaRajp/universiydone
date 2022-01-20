<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Http\Requests\Student\Marksstore;
use App\Models\StudentMark;
use App\Models\Subject;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class MarkController extends Controller
{
    public function index()
    {
        return view('frontend.dashboard.welcome');
    }


    public function create()
    {
        $student_marks = StudentMark::where('user_id', [Auth::user()->id])->first();
        $sub = Subject::all();
        return view('frontend.marks.add', compact('sub', 'student_marks'));
    }


    public function store(Request $request)
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
               return redirect()->back();
            }
        } catch (Exception $e) {
            Log::info($e);
            DB::rollBack();
        }
    }

    public function show($id)
    {
        
    }


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
        dd(232);
    }
}
