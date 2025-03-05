<?php

namespace App\Http\Controllers;

use App\Models\Staff;
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

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $active = "staff";
   return view('staff.index')->with(compact('active'));
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
      'name'     => 'required',
      ]);

    $data  = $request->all();
    Staff::create([
        'name'   => $data['name'],
        'contact_number'   => $data['contact_number'],
    
    ]);

    Session::flash('successmessage', "Staff Added Successfully !");
    return redirect()->back();
    }
 public function data_all_staff(Request $request)
{
    if ($request->ajax()) {
        $result = Staff::query(); 

        return DataTables::of($result)
            ->addColumn('action', function ($result) {
                return '
                    <a href="javascript:void(0)" data-id="' . $result->id . '" class="editstaff btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit!">
                        <i class="fa fa-edit"></i>
                    </a>
                    &nbsp;
                    <a href="javascript:void(0)" data-id="' . $result->id . '" class="deletestaff btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Delete!">
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
    public function show(Staff $staff)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
      $data = Staff::find($id);
      return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Staff $staff)
    {
     $validatedData = $request->validate([
      'edit_name' => 'required|string|max:255'
    ]);

    $data = Staff::find($request->edit_id);
    
    $data->name = $request->edit_name;
    $data->contact_number = $request->contact_number;
    $data->save();

    // Flash success message and redirect
    Session::flash('successmessage', "Staff  Details Updated Successfully!");
    return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
    Staff::find($id)->delete(); 
    Session::flash('infomessage', "Staff Deleted Successfully");
    return response()->json(['success' => 'Staff Deleted Successfully.']);
    }
}
