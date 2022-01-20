<?php

namespace App\Http\Controllers\College;

use App\Http\Controllers\Controller;
use App\Models\College;
use App\Rules\MatchOldPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CollegeController extends Controller
{
    public function changePasswordview()
    {
        return view('backend.college.admin.changePassword');
       
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'oldpassword' => ['required', new MatchOldPassword],
            'newpassword' => ['required'],
            'password_confirmation' => ['same:newpassword'],
        ]);
        College::find(auth()->user()->id)->update(['password' => Hash::make($request->newpassword)]);
        return view('backend.college.admin.dashboard');
    }


    public function profileview()
    {
        return view('backend.college.admin.profile');
    }

    public function profileupdate(Request $request)
    {
        $admin = College::get()->first();
        if (isset($request->logo)) {
            $image = uploadFile($request->logo, 'CollegeLogo');
        } else {
            $image = $admin->getRawOriginal('logo');
        }
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->contact_no = $request->contact_no;
        $admin->address = $request->address;
        $admin->logo = $image;
        $admin->save();
        return view('backend.college.admin.dashboard');
    }


    
}
