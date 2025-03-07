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
    'admission_reg',
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
    'com_others',
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
    'hsc_percentage',
    'v_sem',
    'vi_sem',
    'total',
    'percentage',
    'referred_by',
    'ref_name',
   'con_number',
    'staff_name',
    'staff_number',
    'marksheet_12th',
    '12th_temp',
    '10th_marksheet',
    '11th_marksheet',
    'tc',
    'community_cer',
    'income',
    'graduate',
    'transport',
    'boarding_point',
    'fg',
    'Sc_st',
    'bc',
    'mbc',
    'oc',
    'tution_fees',
    'stationary',
    'rra',
    'exam_fees',
    'transport_fees',
    'fg_fees',
    'bc_amount',
    'user_id'
    ];
}
