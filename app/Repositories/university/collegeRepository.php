<?php

namespace App\Repositories\university;

use App\Contracts\University\collegeContract;
use App\Models\College;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use Exception;
use Illuminate\Support\Facades\Hash;

class collegeRepository implements collegeContract
{
    public function store(array $request)
    {
        $images = uploadFile($request['logo'], 'CollegeLogo');
        $clg = new College();
        $clg->name = $request['name'];
        $clg->email = $request['email'];
        $clg->contact_no = $request['contact_no'];
        $clg->address = $request['address'];
        $clg->password = Hash::make($request['password']);
        $clg->logo = $images;
        $clg->status = 1;
        $clg->save();

        // Mail::to($clg->email)->send(new registermail($request->all()));
        return redirect()->route('university.college.index')->with('success', 'Data is successfully added!');
    }


    public function update(array $request)
    {
        $clg_update = College::where('id', $request['id'])->get()->first();
        if (isset($request['logo'])) {
            $image = uploadFile($request['logo'], 'CollegeLogo');
        } else {
            $image = $clg_update->getRawOriginal('logo');
        }
        $clg_update->name = $request['name'];
        $clg_update->email = $request['email'];
        $clg_update->contact_no = $request['contact_no'];
        $clg_update->address = $request['address'];
        $clg_update->logo = $image;
        $clg_update->update();
        return redirect()->route('university.college.index')->with('info', 'Recoreds Are Updates');
    }
   
}
