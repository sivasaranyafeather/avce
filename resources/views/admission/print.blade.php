@extends('control.app')
@section('content')

<div class="content-wrapper pt-3" >
    <section class="content" >
      <div class="container d-flex justify-content-center">
        <div class="login-box" style="width:100%;">
              <div class="heading text-center">
                  <h3 style="color:blue">ANNAI VAILANKANNI COLLEGE OF ENGINEERING</h3>
                  <p style="font-size:0.8rem">AVK Nager, Potaiyadi Salai, PottalKulam, Azhagappapuram Post <br>
                 Kanyakumari District, Tamil Nadu -629 401 - <span class="text-danger"><b>Admission Helpline: </span><i>9841011760, 9841017396</i> | <span class="text-primary">For Counselling: </span><i>9841017399</i></b>
                </p>
              </div>
              <main>
                <div class="table print_table">
                  <table class="table table-bordered" id="table">
                    <tr class="text-center">
                      <th colspan="3" class="bg-danger text-white">DATA SHEET</th>
                      <th class="bg-warning" colspan="2">Regular/Lateral</th>
                      <th class="text-danger" colspan="3">
                        {{$data->admission_reg}}
                      </th>
                    </tr>
                    <tr>
                      <th>NAME: </th>
                      <td class="text-primary" colspan="2">
                        {{$data->name}}
                      </td>
                      <th colspan="2">Father Name: </th>
                      <td class="text-primary" colspan="3">{{$data->father_name}}</td>
                    </tr>
                    <tr>
                      <th>Address: </th>
                      <th></th>
                      <td class="text-primary">{{$data->house_no}}</td>
                      <th colspan="2">Occupation: </th>
                      <td class="text-primary" colspan="3">{{$data->father_occupation}}</td>
                    </tr>
                    <tr>
                      <th>Street Name: </th>
                      <td class="text-primary" colspan="2">{{$data->street_name}}</td>
                      <th colspan="2">Mother Name: </th>
                      <td class="text-primary" colspan="3">{{$data->mother_name}}</td>
                    </tr>
                    <tr>
                      <th>Place: </th>
                      <td class="text-primary" colspan="2">{{$data->place}}</td>
                      <th>Occupation: </th>
                      <th></th>
                      <td class="text-primary" colspan="3">{{$data->mother_occupation}}</td>
                    </tr>
                    <tr>
                      <th>Pin & Dist: </th>
                      <th></th>
                      <td class="text-primary">{{$data->pincode}}</td>
                      <th colspan="2">Annual Income: </th>
                      <td class="text-primary" colspan="3">{{$data->annual_income}}</td>
                    </tr>
                    <tr>
                      <th colspan="2">Contact No(Whatsapp): </th>
                      <td class="text-primary">{{$data->contact_number}}</td>
                      <th>Email: </th>
                      <td class="text-primary text-center" colspan="4">{{$data->email}}</td>
                    </tr>
                    <tr>
                      <th colspan="2">Alternative Contact No: </th>
                      <td class="text-primary">{{$data->alternative_number}}</td>
                      <th rowspan="2" class="text-center">Staus: </th>
                      <th>First Graduate</th>
                      <th>Regular</th>
                      <th colspan="2">Gender</th>
                    </tr>
                    <tr>
                      <th colspan="2">Date of Birth: </th>
                      <td class="text-primary">{{ date('d-m-Y', strtotime($data->date_of_birth)) }}</td>
                      <td>
                        <center>
                        <input type="checkbox" {{ $data->status == 'first_graduate' ? 'checked' : ''}}>
                        </center>
                      </td>
                      <td>
                      <center>
                        <input type="checkbox" {{ $data->status == 'regular' ? 'checked' : ''}}>
                        </center>
                      </td>
                      <td class="text-primary" colspan="2">{{$data->gender}}</td>
                    </tr>
                    <tr>
                      <th rowspan="3" class="text-center">Marks Obtained: </th>
                      <th colspan="3" class="text-center">HSC</th>
                      <th colspan="4" class="text-center">POLYTECHNIC</th>
                    </tr>
                    <tr>
                      <th>Maths</th>
                      <th>Physics</th>
                      <th>Chemistry</th>
                      <th>V Sem</th>
                      <th></th>
                      <th>Total</th>
                      <th>%</th>
                    </tr>
                    <tr>
                      <td>{{$data->maths}}</td>
                      <td>{{$data->physics}}</td>
                      <td>{{$data->chemistry}}</td>
                      <td colspan="2" class="bg-warning">{{$data->v_sem}}</td>
                      <td>{{$data->total}}</td>
                      <td>{{$data->percentage}}</td>
                    </tr>
                    <tr>
                      <th style="border:2px solid #67ff20;border-bottom:none">Community</th>
                      <th colspan="2" style="border:2px solid #67ff20;border-bottom:none">BC/MBC/SC/ST/OC/Others</th>
                      <td colspan="3" class="text-center" style="font-weight:900;border:2px solid #67ff20;border-bottom:none">
                        @if($data->community == 'others')
                          {{ strtoupper($data->com_others) }}
                       @else
                         {{strtoupper($data->community) }}
                         @endif
                     </td>
                      <td colspan="2"></td>
                    </tr>
                    <tr>
                      <th colspan="2" style="border:2px solid #190a5e">Branch Opted: (Department)</th>
                      <td class="text-primary text-center" colspan="2" style="border:2px solid #190a5e">
                        <?php
                        $dep = DB::table('colleges')->where('id',$data->department)->first();
                        ?>
                        {{$dep->name}}</td>
                      <th colspan="2" style="border:2px solid red">Quota: Management/Counselling</th>
                      <td colspan="2" class="text-danger"style="font-weight:700;border:2px solid red">{{ strtoupper($data->admission_type)}}</td>
                    </tr>
                    <tr>
                      <th colspan="2">School/Polytechnic</th>
                      <td class="text-primary text-center" colspan="6">{{$data->school_polytechnic}}</td>
                    </tr>
                    <tr>
                      <th colspan="2">Medium of Study: </th>
                      <td class="text-center" colspan="2">Tamil Medium: </td>
                      <th>
                      <center>
                        <input type="checkbox" {{ $data->study == 'tamil' ? 'checked' : ''}}>
                        </center>
                      </th>
                      <td class="text-center" colspan="2">English Medium: </td>
                      <th>
                      <center>
                        <input type="checkbox" {{ $data->study == 'english' ? 'checked' : ''}}>
                        </center>
                      </th>
                    </tr>
                    <tr>
                      <th colspan="2" style="background-color:#f5b041">Refered By: </th>
                      <td class="text-center" colspan="3" style="font-weight:700;color:#c52c09;background-color:#f5b041">{{$data->ref_name}}</td>
                      <th style="background-color:#f5b041;background-color:#f5b041">Contact Number</th>
                      <td colspan="3" style="font-weight:700;color:#c52c09;background-color:#f5b041">{{$data->con_number}}</td>
                    </tr>
                    <tr class="text-center">
                      <th>Direct</th>
                      <th>Website</th>
                      <th>Edu.Expo</th>
                      <th>Newspaper</th>
                      <th>Staff</th>
                      <th>Student</th>
                      <th>Consultancy</th>
                      <th>Media TV</th>
                    </tr>
                    <tr>
                      <th><center>
                        <input type="checkbox" {{ $data->referred_by == 'direct' ? 'checked' : ''}}>
                        </center></th>
                      <th><center>
                        <input type="checkbox" {{ $data->referred_by == 'website' ? 'checked' : ''}}>
                        </center></th>
                      <th><center>
                        <input type="checkbox" {{ $data->referred_by == 'edu.expo' ? 'checked' : ''}}>
                        </center></th>
                      <th><center>
                        <input type="checkbox" {{ $data->referred_by == 'news_paper' ? 'checked' : ''}}>
                        </center></th>
                      <th><center>
                        <input type="checkbox" {{ $data->referred_by == 'staff' ? 'checked' : ''}}>
                        </center></th>
                      <th><center>
                        <input type="checkbox" {{ $data->referred_by == 'student' ? 'checked' : ''}}>
                        </center></th>
                      <th><center>
                        <input type="checkbox" {{ $data->referred_by == 'consultancy' ? 'checked' : ''}}>
                        </center></th>
                      <th><center>
                        <input type="checkbox" {{ $data->referred_by == 'media_tv' ? 'checked' : ''}}>
                        </center></th>
                    </tr>
                      
                    <tr>
                      <th colspan="8" class="text-center" style="font-weight:400;">
                      <h5 class="text-center">Declaration</h5>
                      <p>
                        All the information furnished in the form are true to the best of my knowledge & belief. I have undertake that it I fail to obtain mark in the +2/Diploma Examination. I will withdraw from the institution without claiming any refund.
                      </p>
                      <p><span class="float-left">Signature of the Parent</span><span class="float-end">Signature of the Candidate</span></p>
                      </th>
                    </tr>
                    <tr>
                      <th colspan="8" class="text-center" style="font-weight:400;">
                      <p class="text-center"><u>For Office Use Only</u></p>
                      <p class="float-left" style="font-weight:bold">Fees Structure: </p>
                      </th>
                    </tr>
                    <tr>
                      <th rowspan="3">Tution: </th>
                      <td colspan="2" rowspan="3">Rs.<span>{{$data->tution_fees}}</span>/- per year</td>
                      <th colspan="5">Scholarship:(Yes/No)</th>
                    </tr>
                    <tr>
                      <th>FG</th>
                      <th>SC/SCT</th>
                      <th>BC</th>
                      <th>MBC</th>
                      <th>OC</th>
                    </tr>
                    <tr>
                      <th>{{$data->fg_fees}}</th>
                      <th></th>
                      <th>{{$data->bc_amount}}</th>
                      <th></th>
                      <th></th>
                    </tr>
                    <tr>
                      <th colspan="3">Transport/Hostel: </th>
                      <th colspan="5" class="text-center">Stationary,RRA & Exam Fees Mandatory</th>
                    </tr>
                    <tr>
                      <th>Transport Fees: </th>
                      <th colspan="2" class="text-center bg-danger">Rs.<span>{{$data->transport_fees}}</span>/- PER MONTH</th>
                      <th colspan="5"></th>
                    </tr>
                    <tr>
                      <th>Total: </th>
                      <th colspan="7" class="text-center bg-success">Scholarship + Exam Fees + RRA + Stationary({{$data->stationary}}) + Admission Fees</th>
                    </tr>
                    <tr>
                      <th colspan="2">Hostel Facility Required: </th>
                      <td></td>
                      <td></td>
                      <th colspan="2">Room No: </th>
                      <td colspan="2"></td>
                    </tr>
                    <tr>
                      <th colspan="2">Bus Facility Required: </th>
                      <td>YES</td>
                      <td></td>
                      <th colspan="2">Boarding Point: </th>
                      <td colspan="2">Nagercoil</td>
                    </tr>
                    <tr>
                      <th colspan="8">
                        <br>
                        <p class="float-end">Management</p>
                      </th>
                    </tr>
                  </table>
                </div>
              </main>

              <center><button class="btn btn-primary no-print" onclick="window.print()">Print</button></center>

</div>
</div>
</section>
</div>



@endsection

@push('scripts')
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">




<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Select2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<!-- jQuery (required for Select2) -->
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

<!-- Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>





@endpush