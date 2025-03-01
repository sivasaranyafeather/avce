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
    public function edit(Request $request,$id)
    {
       $active = 'list_admission';
       $data = Admission::find($id);
     $department = College::get();
      return view('admission.edit')->with(compact('active','department','data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Admission $admission)
    {
    Admission::where('id',$request->id)
           ->update([
        'reg_no'   => $request['reg_no'],
        'name'   => $request['name'],
        'date' => Carbon::parse($request['date'])->format('Y-m-d'),
        'admission_type'   => $request['admission_type'],
        'department'   => $request['department'],
        'admission_reg'   => $request['admission_reg'],
        'status'   => $request['status'],
        'email'   => $request['email'],
        'father_name'   => $request['father_name'],
        'father_occupation'   => $request['father_occupation'],
        'mother_name'   => $request['mother_name'],
        'mother_occupation'   => $request['mother_occupation'],
        'annual_income'   => $request['annual_income'],
        'date_of_birth'   => Carbon::parse($request['date_of_birth'])->format('Y-m-d'),
        'gender'   => $request['gender'],
        'contact_number'   => $request['contact_number'],
        'alternative_number'   => $request['alternative_number'],
        'community'   => $request['community'],
        'house_no'   => $request['house_no'],
        'street_name'   => $request['street_name'],
        'place'   => $request['place'],
        'pincode'   => $request['pincode'],
        'marks'   => $request['marks_obtained'],
        'study'   => $request['study'],
        'school_polytechnic'   => $request['school_polytechnic'],
        'maths'   => $request['maths'],
        'physics'   => $request['physics'],
        'chemistry'   => $request['chemistry'],
        'v_sem'   => $request['v_sem'],
        'vi_sem'   => $request['vi_sem'],
        'total'   => $request['total'],
        'percentage'   => $request['percentage'],
        'referred_by'   => $request['referred_by'],
        'ref_name'   => $request['ref_name'],
        'con_number'   => $request['con_number'],
        'transport'   => $request['transport'],
        'fg'   => $request['fg'],
        'Sc_st'   => $request['sc_st'],
        'bc'   => $request['bc'],
        'mbc'   => $request['mbc'],
        'oc'   => $request['oc'],

    
    ]);
    // Flash success message and redirect
    Session::flash('successmessage', "Admission  Details Updated Successfully!");
    return redirect()->back();
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
     Admission::find($id)->delete(); 
     Session::flash('infomessage', "Admission Deleted Successfully");
     return redirect()->back();
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
        <a href="' . url('/edit_register/' . $result->id) . '" class="btn btn-primary" 
            data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit!">
            <i class="fa fa-edit"></i>
        </a>
        &nbsp;&nbsp; 
        <a href="' . url('/delete_register/' . $result->id) . '" class="btn btn-danger" 
            data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Delete!" 
            onclick="return confirm(\'Are you sure you want to delete this record?\');">
            <i class="fa fa-trash"></i>
        </a>
        &nbsp;';
})
->make(true);

}



     }
}
