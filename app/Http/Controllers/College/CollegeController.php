<?php

namespace App\Http\Controllers\College;

use App\Http\Controllers\Controller;
use App\Http\Requests\college\ProfileRequest;
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

    public function profileupdate(ProfileRequest $request)
    {

        $college = College::get()->first();
        if (isset($request->logo)) {
            $image = uploadFile($request->logo, 'CollegeLogo');
        } else {
            $image = $college->getRawOriginal('logo');
        }
        $college->name = $request->name;
        $college->email = $request->email;
        $college->contact_no = $request->contact_no;
        $college->address = $request->address;
        $college->logo = $image;
        $college->save();
        return redirect()->route('college.dasboard');
    }


    
}
