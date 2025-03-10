@extends('control.app')
@section('content')

<div class="content-wrapper pt-3">
    <section class="content">
        <div class="container">
         <div class="row">
         <div class="col-md-3">
         <a href="{{ route('index_admission') }}" class="btn btn-success btn-val"> Add Admission </a>
   
</button>
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
  <div class="col-md-3 mb-3">
                <label for="name">Regular / Lateral:</label><br>
                 <select name="admission_reg" class="form-control" id="regular">
                <option value="" >Please Select</option>
                  <option value="regular">Regular</option>
                  <option value="lateral">Lateral</option>
                 </select>
                </div>
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
                                         <th>Action</th>
                                        <th>Name</th>
                                        <th>Register No</th>
                                        <th>Admission Date</th>
                                        <th>Type Of Admission:</th>
                                        <th>Department</th>
                                        <th>Regular / Lateral</th>
                                        <th>Status</th>
                                        <th>Marks Obtained</th>
                                        <th>Referred By</th>
                                        <th>Referred By(Name):</th>
                                        <th>Transport</th>
                                       
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
            buttons: [  
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ],
            processing: true,
            serverSide: true,
            lengthMenu: [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, 'All']
            ],
            order: [[0, "asc"]],
            ajax: {
                url: "{{ route('list_admission') }}",
                data: function(d) {
                    d.admission_type = $('#admission_type').val(); 
                    d.department = $('#department').val(); 
                    d.regular = $('#regular').val();
                }
            },
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false }, 
                { data: 'action', name: 'action', orderable: false, searchable: false },
                { data: 'name', name: 'name' },
                { data: 'reg_no', name: 'reg_no' },
                { data: 'date', name: 'date' },
                { data: 'admission_type', name: 'admission_type' },
                { data: 'departmentname', name: 'departmentname' },
                { data: 'admission_reg', name: 'admission_reg' },
                { data: 'status', name: 'status' },
                { data: 'marks', name: 'marks' },
                { data: 'referred_by', name: 'referred_by' },
                { data: 'ref_name', name: 'ref_name' },
                { data: 'transport', name: 'transport' },
                
            ]
        });

      
        $('#admission_type,#department,#regular').on('change', function() {
            table.ajax.reload();
        });
    });
})(jQuery);

</script>



@endpush