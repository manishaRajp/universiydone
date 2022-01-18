<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommonSetting extends Model
{
    use HasFactory;
    protected $table = "common_settings";

    protected $fillable = [
        'id',
        'subject_id',
        'marks',
        'deleted_at',
    ];

    public function subject()
    {
        return $this->hasOne(Subject::class, 'id', 'subject_id');
    }
}
