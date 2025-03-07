<?php

namespace App\Http\Controllers;

use App\Models\Education;
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
use App\models\Admission;
use App\Models\Staff;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $active = "education";
      $student = Admission::get();
      return view('education.index')->with(compact('active','student'));
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
    $user_id = Auth::user()->id;
    $data  = $request->all();
    Education::create([
        'student_id'   => $data['student_id'],
        'username'   => $data['username'],
        'password'   => $data['password'],
        'mailid'   => $data['mailid'],
        'phone'   => $data['phone'],
        'user_id' => $user_id,
    
    ]);

    Session::flash('successmessage', "TNEA Details Added Successfully !");
    return redirect()->back();
    }
public function data_all_education(Request $request)
{
if ($request->ajax()) {
     $role = Auth::user()->role;
     $id = Auth::user()->id;
    if ($role == 'admin') {
    $query = Education::leftJoin('admissions', 'education.student_id', '=', 'admissions.id')
             ->select('education.*', 'admissions.name as studentname');
     } else {
    $query = Education::leftJoin('admissions', 'education.student_id', '=', 'admissions.id')
             ->where('education.user_id', $id) 
             ->select('education.*', 'admissions.name as studentname');
    }


        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('action', function ($query) {
                return '
                    <a href="javascript:void(0)" data-id="' . $query->id . '" class="editeducation btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit!">
                        <i class="fa fa-edit"></i>
                    </a>
                    &nbsp;
                    <a href="javascript:void(0)" data-id="' . $query->id . '" class="deleteeducation btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Delete!">
                        <i class="fa fa-trash"></i>
                    </a>
                    &nbsp;';
            })
            ->make(true);
    }
}
    /**
     * Display the specified resource.
     */
    public function show(Education $education)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
public function edit($id)
{
    $data = Education::find($id);
    $student = Admission::all(); 

    return response()->json([
        'education' => $data,
        'students' => $student
    ]);
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
  
    $data = Education::find($request->edit_id);
    
    $data->student_id = $request->student_id;
    $data->username = $request->user_name;
    $data->password = $request->edit_password;
    $data->mailid = $request->edit_mailid;
    $data->phone = $request->contact_number;
    $data->save();

    // Flash success message and redirect
    Session::flash('successmessage', "TNEA  Details Updated Successfully!");
    return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
    Education::find($id)->delete(); 
    Session::flash('infomessage', "TNEA Details Deleted Successfully");
    return response()->json(['success' => 'TNEA Details Deleted Successfully.']);
    }
}
