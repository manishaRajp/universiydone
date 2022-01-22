<?php

namespace App\Repositories\university;

use App\Contracts\University\subjectContract;
use App\Models\College;
use App\Models\Subject;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Exception;
use Illuminate\Support\Facades\Hash;


class subjectRepository implements subjectContract
{
    public function update(array $request)
    {
        $sub_update = Subject::where('id',$request['id'])->first();
           $sub_update->name = $request['name'];
           $sub_update->code = $request['code'];
           $sub_update->update();
           return redirect()->route('university.subject.index')->with('info', 'Recoreds Are Updates');
    }


}

