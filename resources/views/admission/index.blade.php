@extends('control.app')
@section('content')

<!-- <div class="content-wrapper pt-3">
    <section class="content">
        <h2><center>Admission Sheet</center></h2>
        <form>
       <div class="row p-3" style="overflow-x: hidden;">
        <div class="col-md-3">
            <label>Name:</label>
            <input type ="text" class="form-control name" name="name">
        </div>
         <div class="col-md-3 ">
            <label>Father Name:</label>
            <input type="text" class="form-control father_name" name="father_name">
        </div>
         <div class="col-md-3 ">
            <label>Father Occupation:</label>
            <input type ="text" class="form-control father_occupation" name="father_occupation">
        </div>
         <div class="col-md-3 ">
            <label>Mother Name:</label>
            <input type ="text" class="form-control mother_name" name="mother_name">
        </div>
      


       </div>

          </form>
</section>
</div> -->
<div class="content-wrapper pt-3" >
    <section class="content" >
      <div class="container d-flex justify-content-center">
        <div class="login-box" style="width:100%;">
          <!-- /.login-logo -->
        
              <h2 class="login-box-msg">Registration Form</h2>

            <form action="{{ route('admission.store') }}" method="post">
                @csrf
  <div class="card card-outline " >
            
            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <h4 class="text-center">Personal Details</h4>
                <div class="col-md-3 mb-3">
                  <label for="name">EMIS Number:</label><br>
                  <input type="text" class="form-control"   name="reg_no" placeholder="Registration Number">
                </div>
                 <div class="col-md-3 mb-3">
                  <label for="name">Name:</label><br>
                 <input type="text" class="form-control" required  name="name" placeholder="Student Name">
                  
                </div>

                 <div class="col-md-3 mb-3">
                  <label for="name">Admission Date:</label><br>
                  <input type="date" class="form-control"  required name="date" >
                </div>
                 <div class="col-md-3 mb-3">
                <label for="name">Type Of Admission:</label><br>
                 <select name="admission_type" class="form-control" required id="admission_type">
                  <option value="counselling">Counselling</option>
                  <option value="management">Mangement</option>
               
                </select>
                 </div>
                 <div class="col-md-3 mb-3">
                <label for="name">Branch Opted(Department):</label><br>
                
                 <select name="department" required class="form-control  select2" id="department">
                    <option value="">Select Department</option>
                    @foreach($department as $dep) 
                  <option value="{{$dep->id}}">{{$dep->name}}</option>
                  @endforeach
                  
                </select>
                 </div>

                 <div class="col-md-3 mb-3">
                <label for="name">Regular / Lateral:</label><br>
                 <select name="admission_reg" required class="form-control" id="admission_type">
                <option value="" >Please Select</option>
                  <option value="regular">Regular</option>
                  <option value="lateral">Lateral</option>
                 </select>
                </div>

                 <div class="col-md-3 mb-3">
                <label for="name">Status:</label><br>
                 <select name="status" required  class="form-control" id="status">
                <option value="" >Please Select</option>
                  <option value="first graduate">First Graduate</option>
                  <option value="regular">Regular</option>
                 </select>
                </div>

                 <div class="col-md-3 mb-3">
                  <label for="name">Email:</label><br>
                 <input type="mail" class="form-control"  required  name="email" placeholder="Enter Email">
                 </div>
                 <div class="col-md-3 mb-3">
                  <label for="name">Father Name:</label><br>
                 <input type="text" class="form-control"  required  name="father_name" placeholder="Father Name">
                  </div>
                 <div class="col-md-3 mb-3">
                  <label for="name">Father Occupation:</label><br>
                 <input type="text" class="form-control"  name="father_occupation" placeholder="Father Occupation">
                 </div>
                 <div class="col-md-3 mb-3">
                  <label for="name">Mother Name:</label><br>
                 <input type="text" class="form-control" required  name="mother_name" placeholder="Mother Name">
                  </div>
                  <div class="col-md-3 mb-3">
                  <label for="name">Mother Occupation:</label><br>
                 <input type="text" class="form-control"  name="mother_occupation" placeholder="Mother Occupation">
                 </div>
                  
                 <!--annual income-->
                  <div class="col-md-3 mb-3">
                  <label for="name">Annual Income:</label><br>
                 <input type="text" class="form-control"  required  name="annual_income" placeholder="Annual Income">
                 </div>
                 <!-- date of birth -->
                  <div class="col-md-3 mb-3">
                  <label for="name">Date Of Birth:</label><br>
                  <input type="date" class="form-control" required  required name="date_of_birth">
                </div>
                 <!-- gender-->
                  <div class="col-md-3 mb-3">
                  <label for="name">Gender:</label><br>
                   <input type="radio" id="gender" name="gender" value="male">
                   <label>Male</label>
                   <input type="radio" id="gender" name="gender" value="female">
                   <label for="name">Female</label>
                   </div>
                   <!--contact Number-->
                   <div class="col-md-3 mb-3">
                  <label for="name">Contact Number:</label><br>
                  <input type="tel" class="form-control"  required  required name="contact_number">
                </div>
                <!--contact Number-->
                   <div class="col-md-3 mb-3">
                  <label for="name">Alternative Number:</label><br>
                  <input type="tel" class="form-control"  required name="alternative_number">
                </div>
              <!-- Community-->
                <div class="col-md-3 mb-3">
                <label for="name">Community:</label><br>
                 <select name="community" class="form-control" required  id="community">
                <option value="" >Please Select</option>
                  <option value="bc">BC</option>
                  <option value="oc">OC</option>
                  <option value="sc_st">SC/ST</option>
                  <option value="dnc">DNC</option>
                  <option value="mbc">MBC</option>
                  <option value="others">Others</option>
                 </select>
                </div>
                 <!--others-->
                   <div class="col-md-3 mb-3" style="display:none;"id="com_others">
                  <label for="name">Others:</label><br>
                  <input type="text" class="form-control" id="other_community"  name="com_others">
                </div>

                <!--address-->
                <div class="container">
                 <div class="row">
                 <h5 class="">Address:</h5>
                 <!--house no-->
                <div class="col-md-3 mb-3">
                <label for="name">House No:</label><br>
                 <input type="text" class="form-control"  required name="house_no">
                 </div>

                 <!--Street Name-->
                 <div class="col-md-3 mb-3">
                <label for="name">Street Name:</label><br>
                 <input type="text" class="form-control" required  required name="street_name">
                 </div>
                 <!--Place-->
                 <div class="col-md-3 mb-3">
                <label for="name">Place:</label><br>
                 <input type="text" class="form-control"  required name="place">
                 </div>
                 <!--Place-->
                 <div class="col-md-3 mb-3">
                <label for="name">Pincode & District:</label><br>
                 <input type="text" class="form-control" required  required name="pincode">
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
                   <option value="hsc">HSC</option>
                   <option value="ploytechnic">Polytechnic</option>
                </select>
                 </div>
                 <!-- medium of study -->
                   <div class="col-md-4 mb-3">
                   <label for="name">Medium of Study:</label><br>
                   <input type="radio" id="study" name="study" value="tamil">
                   <label>Tamil Medium</label>
                   <input type="radio" id="study" name="study" value="english">
                   <label for="name">English Medium</label>
                    </div>
                    <!-- school/polytechnic -->

                <div class="col-md-4 mb-3">
                <label for="name">School/Polytechnic:</label><br>
                <input type="text" class="form-control" name="school_polytechnic" id="school_polytechnic">
                </div>

                     </div>
                  </div>
                  <!-- HSC -->
                    <div class="container" id="hsc_mark" style="display:none;">
                    <div class="row">
                       
                <div class="col-md-3 mb-3">
                <label for="name">Maths:</label><br>
                 <input type="number" class="form-control" id="maths"  name="maths">
                 </div>
                 <!-- physics -->
                  <div class="col-md-3 mb-3">
                <label for="name">Physics:</label><br>
                 <input type="number" class="form-control" id="physics"  name="physics">
                 </div>
                 <!-- Chemistry -->
                  <div class="col-md-3 mb-3">
                <label for="name">Chemistry:</label><br>
                 <input type="number" class="form-control"  id="chemistry" name="chemistry">
                 </div>
                  <!--percentage -->
                  <div class="col-md-3 mb-3">
    <label for="hsc_percentage">Percentage (%):</label>
    <input type="text" class="form-control" id="hsc_percentage" name="hsc_percentage" readonly>
     <span id="eligible"></span>
</div>
                     </div>
                  </div>
                   <!-- Plytechnic -->
                    <div class="container" id="poly_mark" style="display:none;">
                    <div class="row">
                       
                <div class="col-md-3 mb-3">
                <label for="name">V Semester:</label><br>
                 <input type="number" class="form-control"   name="v_sem">
                 </div>
                 <!-- VI sem -->
                  <div class="col-md-3 mb-3">
                <label for="name">VI Semester:</label><br>
                 <input type="number" class="form-control"   name="vi_sem">
                 </div>
                 <!--semtotal -->
                  <div class="col-md-3 mb-3">
                <label for="name">Total:</label><br>
                 <input type="number" class="form-control"   name="total">
                 </div>
                 <!--percentage -->
                  <div class="col-md-3 mb-3">
                <label for="name">Percentage (%):</label><br>
                 <input type="number" class="form-control"   name="percentage">
                
                 </div>
                 
                     </div>
                  </div>
           <!-- referred by -->

             <div class="container">
                    <div class="row">
                       
                <div class="col-md-3 mb-3">
                <label for="name">Referred By:</label><br>
                <select class="form-control" name="referred_by" id="referred_by">
                   <option value="direct">Direct</option>
                   <option value="website">Website</option>
                   <option value="edu.expo">Edu.Expo</option>
                   <option value="news_paper">NEWS paper</option>
                   <option value="staff">Staff</option>
                   <option value="student">Student</option>
                   <option value="consultancy">Consultancy</option>
                   <option value="media_tv">Media TV</option>
                </select>
                 </div>
                 <!-- VI sem -->
                  <div class="col-md-3 mb-3 ref_detail" style="display:none;"  >
                <label for="name">Referred By(Name):</label><br>
                 <input type="text" class="form-control"   name="ref_name">
                 </div>
                 <!--semtotal -->
                  <div class="col-md-3 mb-3 ref_detail" style="display:none;">
                <label for="name">Contact Number:</label><br>
                 <input type="number" class="form-control"   name="con_number">
                 </div>


                 <div class="col-md-3 mb-3 staff_detail" style="display:none;">
                <label for="name">Referred By(Name):</label><br>
                <select class="form-control" name="staff_name" id="staff_name" >
                   <option value="">Please Select</option>
                   @foreach($staff as $st)
                   <option value="{{$st->id}}" data-number="{{$st->contact_number}}" >{{$st->name}}</option>
                  @endforeach
                </select>
                 </div>

                  <div class="col-md-3 mb-3 staff_detail" style="display:none;">
                <label for="name">Contact Number:</label><br>
                 <input type="number" class="form-control" readonly id="staff_number"  name="staff_number">
                 </div>

                 


                     </div>
                     <hr>
                  </div>

                <!-- ceretificate Deatils -->

            <div class="container">
              <div class="row">
                <h4 class="text-center">Certificate Details</h4>
                <div class="col-md-3 mb-3">
                <!-- <label for="name"></label><br> -->
                 <input type="checkbox" id="12th_marksheet" name="marksheet_12th" value="yes"> <b>12th Marksheet(original)</b>
                 </div>
                 <div class="col-md-3 mb-3">
                <input type="checkbox" id="12th_temp" name="12th_temp" value="yes"> <b>12th Marksheet(Temp)</b>
                 </div>
                 <div class="col-md-3 mb-3">
                <input type="checkbox" id="10th_marksheet" name="10th_marksheet" value="yes">  <b>10th Marksheet</b>
                 </div>
                 <div class="col-md-3 mb-3">
                <input type="checkbox" id="11th_marksheet" name="11th_marksheet" value="yes"> <b>11th Marksheet</b>
                 </div>
                </div>
                <div class="row">
                <div class="col-md-3 mb-3">
                <!-- <label for="name"></label><br> -->
                 <input type="checkbox" id="tc" name="tc" value="yes"> <b>Transfer Certificate</b>
                 </div>
                 <div class="col-md-3 mb-3">
                <input type="checkbox" id="community_cer" name="community_cer" value="yes"> <b>Community</b>
                 </div>
                 <div class="col-md-3 mb-3">
                <input type="checkbox" id="income" name="income" value="yes">  <b>Income</b>
                 </div>
                 <div class="col-md-3 mb-3">
                <input type="checkbox" id="graduate" name="graduate" value="yes"> <b>First Graduate</b>
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
                   <option value="hostel">Hostel</option>
                   <option value="dayscholar">Dayscholar</option>
                   <option value="transport">Transport</option>
                </select>
                 </div>
                 <div class="col-md-3 mb-3">
                   <label for="name">Boarding Point:</label><br>
                <input type="Text" id="boarding_point" class="form-control" name="boarding_point" value=""> 
                 </div>
                  <div class="col-md-3 mb-3">
                <label for="name">FG:</label><br>
                <select class="form-control" name="fg" id="fg">
                   <option value="yes">Yes</option>
                   <option value="no">No</option>
                </select>
                 </div>
                <div class="col-md-3 mb-3">
                <label for="name">SC/ST:</label><br>
                <select class="form-control" name="sc_st" id="Sc_st">
                   <option value="yes">Yes</option>
                   <option value="no">No</option>
                </select>
                 </div>
                 <div class="col-md-3 mb-3">
                <label for="name">BC:</label><br>
                <select class="form-control" name="bc" id="BC">
                   <option value="yes">Yes</option>
                   <option value="no">No</option>
                </select>
                 </div>
                  <div class="col-md-3 mb-3">
                <label for="name">MBC:</label><br>
                <select class="form-control" name="mbc" id="MBC">
                   <option value="yes">Yes</option>
                   <option value="no">No</option>
                </select>
                 </div>
                 <div class="col-md-3 mb-3">
                <label for="name">OC:</label><br>
                <select class="form-control" name="oc" id="oC">
                   <option value="yes">Yes</option>
                   <option value="no">No</option>
                </select>
                 </div>

</div>
<hr>
</div>
<!-- fees -->
   <!-- Scholarship Deatils -->

<div class="container">
    <div class="row">
      <h4 class="text-center">Fees Details</h4>
      <div class="col-md-3 mb-3">
       <label for="name">Tution Fees:</label><br>
       <input type="number" class="form-control"  id="tution_fees"  name="tution_fees" min="0">
      </div>
      <div class="col-md-3 mb-3">
       <label for="name">Stationary Fees:</label><br>
       <input type="number" class="form-control"  id="stationary"  name="stationary" min="0">
      </div>
      <div class="col-md-3 mb-3">
       <label for="name">RRA:</label><br>
       <input type="number" class="form-control"  id="rra"  name="rra" min="0">
      </div>
      <div class="col-md-3 mb-3">
       <label for="name">Exam Fees:</label><br>
       <input type="number" class="form-control"  id="exam_fees"  name="exam_fees" min="0">
      </div>
      <div class="col-md-3 mb-3">
       <label for="name">Transport Fees:</label><br>
       <input type="number" class="form-control"  id="transport_fees"  name="transport_fees" min="0">
      </div>
      <div class="col-md-3 mb-3">
       <label for="name">First Graduate Amount:</label><br>
       <input type="number" class="form-control"  id="fg_fees"  name="fg_fees" min="0">
      </div>
      <div class="col-md-3 mb-3">
       <label for="name">BC Amount:</label><br>
       <input type="number" class="form-control"  id="bc_amount"  name="bc_amount" min="0">
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
 //community
$('#community').on('change',function(){
  var community = $(this).val();
  if(community == 'others')
 {
 $('#com_others').show();
 $("#other_community").prop('required',true);
 }
 else
 {
 $('#com_others').hide();
 $("#other_community").prop('required',false);
 }
 });
//reference
$('#referred_by').on('change',function(){
  var refered_val = $(this).val();
  if(refered_val == 'staff')
 {
 $('.ref_detail').hide();
 $('.staff_detail').show();
 }
 else
 {
 $('.ref_detail').show();
  $('.staff_detail').hide();
 }
 });

$('#staff_name').on('change',function(){
 var con_number = $(this).find(':selected').data('number'); 
$('#staff_number').val(con_number);
  });

  //marks percentage
// Marks percentage calculation
$('#maths, #physics, #chemistry, #community').on('change', function() {
    percentage();
});

function percentage() {
    var maths = parseFloat($('#maths').val()) || 0;
    var physics = parseFloat($('#physics').val()) || 0;
    var chemistry = parseFloat($('#chemistry').val()) || 0;

    var totalMarks = maths + physics + chemistry; 
    var percentage = (totalMarks / 300) * 100; 

    $('#hsc_percentage').val(percentage.toFixed(2)); 

    var community = $('#community').val();
    
    if (community == 'bc' || community == 'mbc' || community == 'dnc') {
        if (percentage >= 40) {
            $("#eligible").text("Eligible for Counseling").css("color", "green");
        } else {
            $("#eligible").text("Not Eligible for Counseling").css("color", "red");
        }
    } 
    else if (community == 'oc') {
        if (percentage >= 45) {
            $("#eligible").text("Eligible for Counseling").css("color", "green");
        } else {
            $("#eligible").text("Not Eligible for Counseling").css("color", "red");
        }
    } 
    else if (community == 'sc_st') {
        if (percentage >= 35) {
            $("#eligible").text("Eligible for Counseling").css("color", "green");
        } else {
            $("#eligible").text("Not Eligible for Counseling").css("color", "red");
        }
    }
}


    
    


    });
</script>



@endpush