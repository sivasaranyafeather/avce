<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{

    use HasFactory;
    protected $fillable = [
    'student_id',
    'username',
    'password',
    'mailid',
    'phone',
    'user_id'
    ];
}
