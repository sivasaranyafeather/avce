<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admission extends Model
{

    use HasFactory;
    protected $fillable = [
    'reg_no',
    'name',
    'date',
    'admission_type',
    'department',
    'admission_type',
    'status',
    'email',
    'father_name',
    'father_occupation',
    'mother_name',
    'mother_occupation',
    'annual_income',
    'date_of_birth',
    'gender',
    'contact_number',
    'alternative_number',
    'community',
    'house_no',
    'street_name',
    'place',
    'pincode',
    'marks',
    'study',
    'school_polytechnic',
    'maths',
    'physics',
    'chemistry',
    'v_sem',
    'vi_sem',
    'total',
    'percentage',
    'referred_by',
    'ref_name',
    'con_number',
    'transport',
    'fg',
    'Sc_st',
    'bc',
    'mbc',
    'oc'
    ];
}
