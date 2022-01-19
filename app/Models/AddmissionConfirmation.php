<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddmissionConfirmation extends Model
{
    use HasFactory;
    protected $table = 'addmission_confirmations';

    protected $fillable = [
        'addmission_id',
        'confirm_college_id',
        'confirm_round_id',
        'confirm_merit',
        'confirmation_type',
    ];


    public function Addmission_id()
    {
       return $this->hasOne(AddmissionConfirmation::class,'id','addmission_id');
    }
}
