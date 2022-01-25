<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MeritRound extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "merit_rounds";

    protected $fillable = [
        'course_id',
        'round_no',
        'start_date',
        'end_date',
        'merit_result_declare_date',
        'status',
        'deleted_at'
    ];
    public function course()
    {
        return $this->hasOne(Course::class, 'id', 'course_id');
    }
}

