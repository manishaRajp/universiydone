<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Addmission extends Model
{
    use HasFactory;
    protected $table = "addmissions";
    protected $fillable = [
        'user_id',
        'college_id',
        'course_id',
        'merit',
        'merit_round_id',
        'addmission_date',
        'addmission_code',
        'status',
        'deleted_at',
    ];

    protected $casts = [
        'college_id' => 'array'
    ];


    

    public function college()
    {
        return $this->hasOne(Collage::class, 'id', 'college_id');
    }


    public function common_round_no()
    {
        return $this->hasOne(CommonSetting::class, 'id', 'course_id');
    }


}
