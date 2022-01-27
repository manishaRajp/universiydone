<?php

namespace App\Repositories\student;

use App\Contracts\student\AddmissionContract;
use App\Mail\AddmisionConfirmationMAil;
use App\Models\Addmission;
use App\Models\MeritRound;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AddmissionRepository implements AddmissionContract
{
   public function store(array $request)
   {
      $merit_round = MeritRound::with('common_round_no')->where('id', $request['course_id'])->pluck('round_no')->first();
      $total_merit = meritcount($request['merit']);
      $code = getRandomString($request['course_id']);
      $user_id = Auth::user()->id;
      $addmission = new Addmission();
      $addmission->user_id = $user_id;
      $addmission->college_id = $request['college_id'];
      $addmission->course_id = $request['course_id'];
      $addmission->merit = $total_merit;
      $addmission->addmission_date = Carbon::now()->format('d-m-Y');
      $addmission->addmission_code = $code;
      $addmission->merit_round_id = $merit_round;
      $addmission->status = 1;
      $addmission->save();
      Mail::to(Auth::user('web')->id->email)->send(new AddmisionConfirmationMAil($request));
      return redirect()->route('home')->with('success', 'Your Addmission Data Saved....Now You Go For admission confirm');
   }
}
