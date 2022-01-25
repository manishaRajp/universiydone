<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CommonSetting extends Model
{
    use HasFactory;
    use SoftDeletes;
    
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
