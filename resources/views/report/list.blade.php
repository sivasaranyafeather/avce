@extends('control.app')
@section('content')

<div class="content-wrapper pt-3">
    <section class="content">
        <div class="container">
         <div class="row">
         <div class="col-md-3">
       <label for="name">From Date:</label><br>
     <input type="date" class="form-control"  required name="date" id="start_date">
 </div>
  <div class="col-md-3 mb-3">
     <label for="name">To Date:</label><br>
     <input type="date" class="form-control"  required name="date" id="end_date" >
                <!-- <label for="name">Regular / Lateral:</label><br>
                 <select name="admission_reg" class="form-control" id="regular">
                <option value="" >Please Select</option>
                  <option value="regular">Regular</option>
                  <option value="lateral">Lateral</option>
                 </select>
                </div> -->
  </div>
 <div class="col-md-3">
    <label for="name">Type Of Admission:</label><br>
    <select name="admission_type" class="form-control" id="admission_type">
    <option value="">Please Select</option>
    <option value="counselling">Counselling</option>
    <option value="management">Mangement</option>
    </select>
</div>
<div class="col-md-3">
   <label for="name">Branch Opted(Department):</label><br>
     <select name="department" class="form-control  select2" id="department">
       <option value="">Select Department</option>
          @foreach($department as $dep) 
           <option value="{{$dep->id}}">{{$dep->name}}</option>
         @endforeach
     </select>
</div>
<div class="col-md-3">
   <label for="name">12th Marksheet:</label><br>
     <select name="" class="form-control  select2" id="marksheet_12th">
       <option value="">Please Select</option>
       <option value="yes">Yes</option>
       <option value="no">No</option>
     </select>
</div>
<div class="col-md-3">
   <label for="name">10th Marksheet:</label><br>
     <select name="" class="form-control  select2" id="10th_marksheet">
       <option value="">Please Select</option>
       <option value="yes">Yes</option>
       <option value="no">No</option>
     </select>
</div>
<div class="col-md-3">
   <label for="name">11th Marksheet:</label><br>
     <select name="" class="form-control  select2" id="marksheet_11th">
       <option value="">Please Select</option>
       <option value="yes">Yes</option>
       <option value="no">No</option>
     </select>
</div>
<div class="col-md-3">
   <label for="name">First Graduate:</label><br>
     <select name="" class="form-control  select2" id="graduate">
       <option value="">Please Select</option>
       <option value="yes">Yes</option>
       <option value="no">No</option>
     </select>
</div>
 

        </div>

           <div class="card card-outline card-primary mt-2">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-bordered table-stripped" id="admission-table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Register No</th>
                                        <th>Admission Date</th>
                                        <th>Type Of Admission:</th>
                                        <th>Department</th>
                                        <th>Name</th>
                                        <th>UserId</th>
                                        <th>Password</th>
                                        <th>School Name</th>
                                        <th>Parent Name</th>
                                        <th>Address</th>
                                        <th>Contact No</th>
                                        <th>Alternate No</th>
                                        <th>Referer Name</th>
                                        <th>Bus Route:</th>
                                        <th>FG</th>
                                        <th>BC</th>
                                        <th>MBC</th>
                                        <th>SC</th>
                                        <th>BUS Fees</th>
                                        <th>Tution Fees</th>
                                        <th>Tc</th>
                                        <th>12</th>
                                        <th>11</th>
                                        <th>10</th>
                                        <th>Community</th>
                                        <th>FG</th>
                                        <th>Income</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
</div>







@endsection
@push('scripts')
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">


<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/select/1.6.2/js/dataTables.select.min.js"></script>
<script type="text/javascript">
 (function($) {
    $(document).ready(function() {
        var table = $('#admission-table').DataTable({
            dom: 'Blfrtip',
            buttons: ['copyHtml5', 'excelHtml5', 'csvHtml5', 'pdfHtml5'],
            processing: true,
            serverSide: true,
            lengthMenu: [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, 'All']
            ],
            order: [[0, "asc"]],
            ajax: {
                url: "{{ route('list_ad_student') }}", 
                data: function(d) {
                    d.admission_type = $('#admission_type').val(); 
                    d.department = $('#department').val(); 
                    d.marksheet_12th = $('#marksheet_12th').val(); 
                    d.marksheet_10th = $('#10th_marksheet').val(); 
                    d.marksheet_11th = $('#marksheet_11th').val(); 
                    d.graduate = $('#graduate').val(); 
                    d.start_date = $('#start_date').val(); 
                    d.end_date = $('#end_date').val(); 
                }
            },
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false }, 
                { data: 'reg_no', name: 'reg_no' },
                { data: 'date', name: 'date' },
                { data: 'admission_type', name: 'admission_type' },
                { data: 'departmentname', name: 'departmentname' },
                { data: 'name', name: 'name' },
                { data: 'username', name: 'username' },
                { data: 'password', name: 'password' },
                { data: 'school_polytechnic', name: 'school_polytechnic' },
                { data: 'father_name', name: 'father_name' },
                { data: 'address', name: 'address' },
                { data: 'contact_number', name: 'contact_number' },
                { data: 'alternative_number', name: 'alternative_number' },
                { data: 'reference', name: 'reference' },
                { data: 'boarding_point', name: 'boarding_point' },
                { data: 'fg', name: 'fg' },
                { data: 'bc', name: 'bc' },
                { data: 'mbc', name: 'mbc' },
                { data: 'Sc_st', name: 'Sc_st' }, 
                { data: 'transport_fees', name: 'transport_fees' },
                { data: 'tution_fees', name: 'tution_fees' },
                { data: 'tc', name: 'tc' },
                { data: 'marksheet_12th', name: 'marksheet_12th' },
                { data: '11th_marksheet', name: '11th_marksheet' },
                { data: '10th_marksheet', name: '10th_marksheet' },
                { data: 'community_cer', name: 'community_cer' },
                { data: 'graduate', name: 'graduate' },
                { data: 'income', name: 'income' }
            ]
        });

      
        $("#start_date").change(function() {
            var start_date = $(this).val();
            $("#end_date").attr("min", start_date).val(""); 
            
            table.ajax.reload();
        });

        
        $('#admission_type, #department, #regular, #marksheet_12th, #10th_marksheet, #marksheet_11th, #graduate, #end_date')
            .on('change', function() {
                table.ajax.reload();
        });
    });
})(jQuery);


</script>



@endpush