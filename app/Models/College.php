<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class College extends Authenticatable
{
    use HasFactory;
    protected $table = "colleges";


    protected $fillable = [
        'name',
        'email',
        'password',
        'contact_no',
        'address',
        'logo',
        'status'
    ];

    protected $hidden = [
        'password'
    ];


    public function college()
    {
        return $this->hasOne(College::class, 'id', 'college_id');
    }
}
