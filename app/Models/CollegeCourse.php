<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CollegeCourse extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "college_courses";

    protected $fillable = [
        'college_id',
        'course_id',
        'seat_no',
        'reserved_seat',
        'merit_seat',
        'deleted_at',
    ];
    public function course()
    {
        return $this->hasOne(Course::class, 'id', 'course_id');
    }

    public function college()
    {
        return $this->hasOne(College::class, 'id', 'college_id');
    }
}

