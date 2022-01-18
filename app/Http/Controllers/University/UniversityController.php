<?php

namespace App\Http\Controllers\University;

use App\Http\Controllers\Controller;
use App\Http\Requests\University\ProfileUpdate;
use App\Models\University;
use App\Rules\MatchOldPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UniversityController extends Controller
{
    public function changePasswordview()
    {
        return view('backend.university.admin.changePassword');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'oldpassword' => ['required', new MatchOldPassword],
            'newpassword' => ['required'],
            'password_confirmation' => ['same:newpassword'],
        ]);
        University::find(auth()->user()->id)->update(['password' => Hash::make($request->newpassword)]);
        return redirect()->route('university.dasboard');
    }


    public function profileview()
    {
        return view('backend.university.admin.profile');
    }

    public function profileupdate(ProfileUpdate $request)
    {
        $admin = University::get()->first();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->save();
        return redirect()->route('university.dasboard');
    }
   
}

