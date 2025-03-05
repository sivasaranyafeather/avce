@extends('control.app')
@section('content')


<div class="content-wrapper pt-3" >
    <section class="content" >
      <div class="container d-flex justify-content-center">
        <div class="login-box" style="width:100%;">
          <!-- /.login-logo -->
        
              <h2 class="login-box-msg">Registration Form</h2>

            <form action="{{ route('admission.update') }}" method="post">
                @csrf
  <div class="card card-outline " >
            
            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <h4 class="text-center">Personal Details</h4>
                        <input type="hidden" value="{{$data->id}}" name="id">
                <div class="col-md-3 mb-3">
                  <label for="name">Registration Number:</label><br>
                  <input type="text" class="form-control" value="{{$data->reg_no}}" name="reg_no" placeholder="Registration Number">
                </div>
                 <div class="col-md-3 mb-3">
                  <label for="name">Name:</label><br>
                 <input type="text" class="form-control"  name="name" value="{{$data->name}}" placeholder="Student Name">
                  
                </div>

                 <div class="col-md-3 mb-3">
                  <label for="name">Admission Date:</label><br>
                  <input type="date" class="form-control"  required name="date" value="{{$data->date}}" placeholder="Name of the domain">
                </div>
                 <div class="col-md-3 mb-3">
                <label for="name">Type Of Admission:</label><br>
                 <select name="admission_type" class="form-control" id="admission_type">
                  <option value="counselling"  {{ $data->admission_type == 'counselling' ? 'selected' : '' }}>Counselling</option>
                  <option value="management" {{ $data->admission_type == 'management' ? 'selected' : '' }}>Mangement</option>
               
                </select>
                 </div>
                 <div class="col-md-3 mb-3">
                <label for="name">Branch Opted(Department):</label><br>
                
                 <select name="department" class="form-control  select2" id="department">
                    <option value="">Select Department</option>
                    @foreach($department as $dep) 
                  <option value="{{$dep->id}}" {{ $data->department == $dep->id ? 'selected' : '' }} >{{$dep->name}}</option>
                  @endforeach
                  
                </select>
                 </div>

                 <div class="col-md-3 mb-3">
                <label for="name">Regular / Lateral:</label><br>
                 <select name="admission_reg" class="form-control" id="admission_type">
                <option value="" >Please Select</option>
                  <option value="regular"  {{ $data->admission_reg == 'regular' ? 'selected' : '' }}>Regular</option>
                  <option value="lateral"  {{ $data->admission_reg == 'lateral' ? 'selected' : '' }}>Lateral</option>
                 </select>
                </div>

                 <div class="col-md-3 mb-3">
                <label for="name">Status:</label><br>
                 <select name="status" class="form-control" id="status">
                <option value="" >Please Select</option>
                  <option value="first graduate" {{ $data->status == 'first graduate' ? 'selected' : '' }}>First Graduate</option>
                  <option value="regular" {{ $data->status == 'regular' ? 'selected' : '' }}>Regular</option>
                 </select>
                </div>

                 <div class="col-md-3 mb-3">
                  <label for="name">Email:</label><br>
                 <input type="mail" class="form-control"  name="email" value="{{$data->email}}" placeholder="Enter Email">
                 </div>
                 <div class="col-md-3 mb-3">
                  <label for="name">Father Name:</label><br>
                 <input type="text" class="form-control"  name="father_name" value="{{$data->father_name}}" placeholder="Father Name">
                  </div>
                 <div class="col-md-3 mb-3">
                  <label for="name">Father Occupation:</label><br>
                 <input type="text" class="form-control"  name="father_occupation" value="{{$data->father_occupation}}" placeholder="Father Occupation">
                 </div>
                 <div class="col-md-3 mb-3">
                  <label for="name">Mother Name:</label><br>
                 <input type="text" class="form-control"  name="mother_name" value="{{$data->mother_name}}" placeholder="Mother Name">
                  </div>
                  <div class="col-md-3 mb-3">
                  <label for="name">Mother Occupation:</label><br>
                 <input type="text" class="form-control"  name="mother_occupation" value="{{$data->mother_occupation}}" placeholder="Mother Occupation">
                 </div>
                  
                 <!--annual income-->
                  <div class="col-md-3 mb-3">
                  <label for="name">Annual Income:</label><br>
                 <input type="text" class="form-control"  name="annual_income" value="{{$data->annual_income}}" placeholder="Annual Income">
                 </div>
                 <!-- date of birth -->
                  <div class="col-md-3 mb-3">
                  <label for="name">Date Of Birth:</label><br>
                  <input type="date" class="form-control"  required value="{{$data->date_of_birth}}" name="date_of_birth">
                </div>
                 <!-- gender-->
                  <div class="col-md-3 mb-3">
                  <label for="name">Gender:</label><br>
                   <input type="radio" id="gender" name="gender"  {{ $data->gender == 'male' ? 'checked' : ''}} value="male">
                   <label>Male</label>
                   <input type="radio" id="gender" name="gender" {{ $data->gender == 'female' ? 'checked' : ''}} value="female">
                   <label for="name">Female</label>
                   </div>
                   <!--contact Number-->
                   <div class="col-md-3 mb-3">
                  <label for="name">Contact Number:</label><br>
                  <input type="tel" class="form-control" value="{{$data->contact_number}}"  required name="contact_number">
                </div>
                <!--contact Number-->
                   <div class="col-md-3 mb-3">
                  <label for="name">Alternative Number:</label><br>
                  <input type="tel" class="form-control" value="{{$data->alternative_number}}"  required name="alternative_number">
                </div>
              <!-- Community-->
                <div class="col-md-3 mb-3">
                <label for="name">Community:</label><br>
                 <input type="Text" class="form-control"value="{{$data->community}}"   required name="community">
                </div>

                <!--address-->
                <div class="container">
                 <div class="row">
                 <h5 class="">Address:</h5>
                 <!--house no-->
                <div class="col-md-3 mb-3">
                <label for="name">House No:</label><br>
                 <input type="text" class="form-control" value="{{$data->house_no}}"  required name="house_no">
                 </div>

                 <!--Street Name-->
                 <div class="col-md-3 mb-3">
                <label for="name">Street Name:</label><br>
                 <input type="text" class="form-control" value="{{$data->street_name}}"  required name="street_name">
                 </div>
                 <!--Place-->
                 <div class="col-md-3 mb-3">
                <label for="name">Place:</label><br>
                 <input type="text" class="form-control" value="{{$data->place}}" required name="place">
                 </div>
                 <!--Place-->
                 <div class="col-md-3 mb-3">
                <label for="name">Pincode & District:</label><br>
                 <input type="text" class="form-control" value="{{$data->pincode}}"   required name="pincode">
                 </div>

                </div>
                <hr class="me-3">
                </div>

                <!-- Education Detail -->
                   <div class="container">
                    <div class="row">
                        <h4 class="text-center">Education Details</h4>
                        <div class="col-md-3 mb-3">
                <label for="name">Marks Obtained:</label><br>
                <select class="form-control" name="marks_obtained" id="marks">
                  <option value="">Please Select</option>
                   <option value="hsc" {{ $data->marks == 'hsc' ? 'selected' : '' }}>HSC</option>
                   <option value="ploytechnic" {{ $data->marks == 'ploytechnic' ? 'selected' : '' }}>Polytechnic</option>
                </select>
                 </div>
                 <!-- medium of study -->
                   <div class="col-md-4 mb-3">
                   <label for="name">Medium of Study:</label><br>
                   <input type="radio" id="study" {{ $data->study == 'tamil' ? 'checked' : ''}}  name="study" value="tamil">
                   <label>Tamil Medium</label>
                   <input type="radio" id="study" {{ $data->study == 'english' ? 'checked' : ''}} name="study" value="english">
                   <label for="name">English Medium</label>
                    </div>
                    <!-- school/polytechnic -->

                <div class="col-md-4 mb-3">
                <label for="name">School/Polytechnic:</label><br>
                <input type="text" class="form-control" value="{{$data->school_polytechnic}}" name="school_polytechnic" id="school_polytechnic">
                </div>

                     </div>
                  </div>
                  <!-- HSC -->
                    <div class="container" id="hsc_mark" style="display:none;">
                    <div class="row">
                       
                <div class="col-md-3 mb-3">
                <label for="name">Maths:</label><br>
                 <input type="number" class="form-control" value="{{$data->maths}}"   name="maths">
                 </div>
                 <!-- physics -->
                  <div class="col-md-3 mb-3">
                <label for="name">Physics:</label><br>
                 <input type="number" class="form-control"  value="{{$data->physics}}" name="physics">
                 </div>
                 <!-- Chemistry -->
                  <div class="col-md-3 mb-3">
                <label for="name">Chemistry:</label><br>
                 <input type="number" class="form-control"  value="{{$data->chemistry}}" name="chemistry">
                 </div>
                     </div>
                  </div>
                   <!-- Plytechnic -->
                    <div class="container" id="poly_mark" style="display:none;">
                    <div class="row">
                       
                <div class="col-md-3 mb-3">
                <label for="name">V Semester:</label><br>
                 <input type="number" class="form-control" value="{{$data->v_sem}}"   name="v_sem">
                 </div>
                 <!-- VI sem -->
                  <div class="col-md-3 mb-3">
                <label for="name">VI Semester:</label><br>
                 <input type="number" class="form-control" value="{{$data->vi_sem}}"   name="vi_sem">
                 </div>
                 <!--semtotal -->
                  <div class="col-md-3 mb-3">
                <label for="name">Total:</label><br>
                 <input type="number" class="form-control" value="{{$data->total}}"  name="total">
                 </div>
                 <!--percentage -->
                  <div class="col-md-3 mb-3">
                <label for="name">Percentage (%):</label><br>
                 <input type="number" class="form-control"  value="{{$data->percentage}}"  name="percentage">
                 </div>
                 
                     </div>
                  </div>
           <!-- referred by -->

             <div class="container">
                    <div class="row">
                       
                <div class="col-md-3 mb-3">
                <label for="name">Referred By:</label><br>
                <select class="form-control" name="referred_by" id="referred_by">
                   <option value="direct" {{ $data->referred_by == 'direct' ? 'selected' : '' }}>Direct</option>
                   <option value="website" {{ $data->referred_by == 'website' ? 'selected' : '' }}>Website</option>
                   <option value="edu_expo" {{ $data->referred_by == 'edu_expo' ? 'selected' : '' }}>Edu.Expo</option>
                   <option value="news_paper" {{ $data->referred_by == 'news_paper' ? 'selected' : '' }}>NEWS paper</option>
                   <option value="staff" {{ $data->referred_by == 'staff' ? 'selected' : '' }}>Staff</option>
                   <option value="student" {{ $data->referred_by == 'student' ? 'selected' : '' }}>Student</option>
                   <option value="consultancy" {{ $data->referred_by == 'consultancy' ? 'selected' : '' }}>Consultancy</option>
                   <option value="media_tv" {{ $data->referred_by == 'media_tv' ? 'selected' : '' }}>Media TV</option>
                </select>
                 </div>
                 <!-- VI sem -->
                  <div>
                  <div class="col-md-3 mb-3">
                <label for="name">Referred By(Name):</label><br>
                 <input type="text" class="form-control" value="{{$data->ref_name}}"  name="ref_name">
                 </div>
                 <!--semtotal -->
                  <div class="col-md-3 mb-3">
                <label for="name">Contact Number:</label><br>
                 <input type="number" class="form-control" value="{{$data->con_number}}"   name="con_number">
                 </div>
                 </div>
                 
                     </div>
                     <hr>
                  </div>


                  <!-- Scholarship Deatils -->

<div class="container">
    <div class="row">
      <h4 class="text-center">Scholarship Details</h4>
      <div class="col-md-3 mb-3">
                <label for="name">Transport:</label><br>
                <select class="form-control" name="transport" id="transport">
                   <option value="hostel" {{ $data->transport == 'hostel' ? 'selected' : '' }}>Hostel</option>
                   <option value="dayscholar" {{ $data->transport == 'dayscholar' ? 'selected' : '' }}>Dayscholar</option>
                </select>
                 </div>
                  <div class="col-md-3 mb-3">
                <label for="name">FG:</label><br>
                <select class="form-control" name="fg" id="fg">
                   <option value="yes" {{ $data->fg == 'yes' ? 'selected' : '' }}>Yes</option>
                   <option value="no" {{ $data->fg == 'no' ? 'selected' : '' }}>No</option>
                </select>
                 </div>
                <div class="col-md-3 mb-3">
                <label for="name">SC/ST:</label><br>
                <select class="form-control" name="sc_st" id="Sc_st">
                   <option value="yes" {{ $data->sc_st == 'yes' ? 'selected' : '' }}>Yes</option>
                   <option value="no" {{ $data->sc_st == 'no' ? 'selected' : '' }}>No</option>
                </select>
                 </div>
                 <div class="col-md-3 mb-3">
                <label for="name">BC:</label><br>
                <select class="form-control" name="bc" id="BC">
                   <option value="yes" {{ $data->bc == 'yes' ? 'selected' : '' }}>Yes</option>
                   <option value="no" {{ $data->bc == 'no' ? 'selected' : '' }}>No</option>
                </select>
                 </div>
                  <div class="col-md-3 mb-3">
                <label for="name">MBC:</label><br>
                <select class="form-control" name="mbc" id="MBC">
                   <option value="yes" {{ $data->mbc == 'yes' ? 'selected' : '' }}>Yes</option>
                   <option value="no" {{ $data->mbc == 'no' ? 'selected' : '' }}>No</option>
                </select>
                 </div>
                 <div class="col-md-3 mb-3">
                <label for="name">OC:</label><br>
                <select class="form-control" name="oc" id="oC">
                   <option value="yes" {{ $data->oc == 'yes' ? 'selected' : '' }}>Yes</option>
                   <option value="no" {{ $data->oc == 'no' ? 'selected' : '' }}>No</option>
                </select>
                 </div>

</div>
</div>

<!--card-->
                </div>
            <!-- /.card-body -->
          </div>

             
                
             
               
             
              
                
                 <div class="text-center">
                  <button type="submit" class="btn submit_btn btn-block" style="width:20%;background-color:#0dcaf0;">Save</button>
                </div>

              </form>
              <!-- /.social-auth-links -->
           
          <!-- /.card -->
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

<script>
    $(document).ready(function() {
    $("#department").select2({
        placeholder: "Select Department",
        multiple: false
    });
$('#marks').on('change', function() {
 var marks = $(this).val();
 if(marks == 'hsc')
 {
 $('#hsc_mark').show();
 $('#poly_mark').hide();
 }
 else
 {
 $('#hsc_mark').hide();
 $('#poly_mark').show();
 }
 

});
    });
</script>



@endpush