<?php

namespace App\Http\Controllers;

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
use App\Models\Staff;
use App\Models\Admission;

class ReportController extends Controller
{
    
     /**
     * Display the specified resource.
     */
    public function show(Request $request)
     {
       $active = "list_student";
       $department = College::get();
       return view('report.list')->with(compact('active' ,'department'));
    }


public function list_ad_student(Request $request)
{
    if ($request->ajax()) {
        $role = Auth::user()->role;
        $id = Auth::user()->id;

        $query = Admission::leftJoin('colleges', function ($join) {
                    $join->on('admissions.department', '=', 'colleges.id');
                })
                ->leftJoin('education', function ($join) {
                    $join->on('admissions.id', '=', 'education.student_id');
                })
                ->select(
                    'admissions.*', 
                    'colleges.name as departmentname',
                    \DB::raw('COALESCE(education.username, "N/A") as username'),
                    \DB::raw('COALESCE(education.password, "N/A") as password')
                );

        if ($role != 'admin') {
            $query->where('admissions.user_id', $id);
        }

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
            ->addIndexColumn()
            ->addColumn('address', function ($result) {
                return $result->house_no . ', ' . $result->street_name . ', ' . $result->place . ', ' . $result->pincode;
            })
            ->addColumn('reference', function ($result) {
                if ($result->referred_by == 'staff') {
                    $staff = Staff::find($result->staff_name);
                    return $staff ? $staff->name : 'Unknown Staff';
                }
                return $result->ref_name ?? 'N/A';
            })
            ->addColumn('action', function ($result) {
                return '<a href="edit/' . $result->id . '" class="btn btn-sm btn-primary">Edit</a>';
            })
            ->rawColumns(['action']) 
            ->make(true);
    }
}



}
