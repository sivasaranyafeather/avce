<?php

namespace App\Http\Controllers;

use App\Models\Admission;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use App\Models\College;
use Carbon\Carbon;

class AdmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    $active = "admission";
    $department = College::get();
    return view('admission.index')->with(compact('active','department'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
    $request->validate([
      'reg_no'   => 'required',
      'name'     => 'required',

    ]);

    $data  = $request->all();
    Admission::create([
        'reg_no'   => $data['reg_no'],
        'name'   => $data['name'],
        'date' => Carbon::parse($data['date'])->format('Y-m-d'),
        'admission_type'   => $data['admission_type'],
        'department'   => $data['department'],
        'admission_reg'   => $data['admission_reg'],
        'status'   => $data['status'],
        'email'   => $data['email'],
        'father_name'   => $data['father_name'],
        'father_occupation'   => $data['father_occupation'],
        'mother_name'   => $data['mother_name'],
        'mother_occupation'   => $data['mother_occupation'],
        'annual_income'   => $data['annual_income'],
        'date_of_birth'   => Carbon::parse($data['date_of_birth'])->format('Y-m-d'),
        'gender'   => $data['gender'],
        'contact_number'   => $data['contact_number'],
        'alternative_number'   => $data['alternative_number'],
        'community'   => $data['community'],
        'house_no'   => $data['house_no'],
        'street_name'   => $data['street_name'],
        'place'   => $data['place'],
        'pincode'   => $data['pincode'],
        'marks'   => $data['marks_obtained'],
        'study'   => $data['study'],
        'school_polytechnic'   => $data['school_polytechnic'],
        'maths'   => $data['maths'],
        'physics'   => $data['physics'],
        'chemistry'   => $data['chemistry'],
        'v_sem'   => $data['v_sem'],
        'vi_sem'   => $data['vi_sem'],
        'total'   => $data['total'],
        'percentage'   => $data['percentage'],
        'referred_by'   => $data['referred_by'],
        'ref_name'   => $data['ref_name'],
        'con_number'   => $data['con_number'],
        'transport'   => $data['transport'],
        'fg'   => $data['fg'],
        'Sc_st'   => $data['sc_st'],
        'bc'   => $data['bc'],
        'mbc'   => $data['mbc'],
        'oc'   => $data['oc'],

    
    ]);

    Session::flash('successmessage', "College Added Successfully !");
    return redirect()->back();
    
    }
    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
    $active = "list_admission";
    $department = College::get();

     return view('admission.list')->with(compact('active','department'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admission $admission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Admission $admission)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admission $admission)
    {
        //
    }
     public function list_admission(Request $request)
    {
      
   if ($request->ajax()) {
    $query = Admission::leftJoin('colleges', function($join) {
                    $join->on('admissions.department', '=', 'colleges.id'); 
                 })
                ->select('admissions.*', 'colleges.name as departmentname');

               if (!empty($request->admission_type)) {
                $query->where('admissions.admission_type', $request->admission_type);
               }
                if (!empty($request->department)) {
                $query->where('admissions.department', $request->department);
               }
               if (!empty($request->regular)) {
                $query->where('admissions.admission_reg', $request->regular);
               }

    return DataTables::of($query) 
        ->addColumn('action', function ($result) {
            return '
                <a href="javascript:void(0)" data-id="' . $result->id . '" class="showcollege btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit!">
                    <i class="fa fa-edit"></i>
                </a>
                &nbsp;
                <a href="javascript:void(0)" data-id="' . $result->id . '" class="deletecollege btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Delete!">
                    <i class="fa fa-trash"></i>
                </a>
                &nbsp;';
        })
        ->make(true);
}



     }
}
