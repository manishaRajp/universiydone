<?php
namespace App\Repositories\college;

use App\Contracts\college\MeritContract;
use App\Models\CollegeMerit;
use App\Models\MeritRound;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class  MeritRepository implements  MeritContract
{

    public function store(array $request)
    {
        $meritRound = MeritRound::where('id',$request['course_id'])->pluck('round_no')->first();
        $clg_id = Auth::guard('college')->user()->id;
        $add_merit = new CollegeMerit();
        $add_merit->college_id = $clg_id;
        $add_merit->course_id = $request['course_id'];
        $add_merit->merit_round_id = $meritRound;
        $add_merit->merit = $request['merit'];
        $add_merit->save();
        return redirect()->route('college.merit.index')->with('success', 'Data added succefully');
    }

    public function update(array $request)
    {
        $clg_merit_update = CollegeMerit::where('id', $request['id'])->get()->first();
        $clg_merit_update->course_id = $request['course_id'];
        $clg_merit_update->merit = $request['merit'];
        $clg_merit_update->update();
        return redirect()->route('college.merit.index')->with('info', 'Recoreds Are Updates');
    }
}
