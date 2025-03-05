@extends('control.app')
@section('content')
<div class="content-wrapper pt-3">
    <section class="content">
        <div class="container">
            <button type="button" class="btn btn-success btn-val" data-bs-toggle="modal" data-bs-target="#educationModal">
  Add 
</button>
            
        </div>

           <div class="card card-outline card-primary mt-2">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-bordered table-stripped" id="Education-table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Student Name</th>
                                        <th>Username</th>
                                        <th>Mail Id</th>
                                        <th>Phone Number</th>
                                        <th>Action</th>
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




<!-- ModalAdd staff Details -->
<div class="modal fade" id="educationModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
     <form action="{{ route('education.store') }}" method="post" enctype="multipart/form-data">
         @csrf
     <div class="form-group">
        <label for="name">Student Name:</label>
     <select name="student_id" id="student_name" class="form-control select2">
        <option>Please Select</option>
        @foreach($student as $stu)
        <option value="{{$stu->id}}">{{$stu->name}}</option>
        @endforeach
     </select>
     </div>
     <div class="form-group">
        <label for="name">TNEA Username:</label>
      <input type="text" class="form-control" id="username" name="username" required >
     </div>
     <div class="form-group">
        <label for="name">TNEA Password:</label>
      <input type="text" class="form-control" id="password" name="password" required >
     </div>    
     <div class="form-group">
        <label for="name">TNEA Email-id:</label>
      <input type="text" class="form-control" id="mailid" name="mailid" required >
     </div>       
      <div class="form-group">
        <label for="name">Phone Number:</label>
      <input type="Number" class="form-control" id="phone" name="phone" required min="0">
     </div>          
                                
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
      </form>
    </div>
  </div>
</div>


<!-- Modal Update   Details -->
<div class="modal fade" id="education_model" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabels" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabels">Update </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('education.update') }}" method="POST">
          @csrf
          <input type="hidden" name="edit_id" id="edit_id">
          <div class="form-group">
        <label for="name">Student Name:</label>
     <select name="student_id" id="editstudent_name" class="form-control select2">
       
     </select>
     </div>
          <div class="form-group">
            <label for="edit_name">TNEA username:</label>
            <input type="text" class="form-control" name="user_name" value="" id="user_name">
          </div>
           <div class="form-group">
        <label for="name">TNEA Password:</label>
      <input type="text" class="form-control" id="edit_password" value="" name="edit_password" required >
     </div>    
     <div class="form-group">
        <label for="name">TNEA Email-id:</label>
      <input type="text" class="form-control" id="edit_mailid" value="" name="edit_mailid" required >
     </div>   

           <div class="form-group">
        <label for="name">Phone Number</label>
     <input type="number" class="form-control" value="" id="edit_contact" name="contact_number">

     </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Update</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
  </div>
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

<!-- Select2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script type="text/javascript">
    (function($) {
   $(document).ready(function () {
    // Initialize Select2 inside the modal
    $('#student_name').select2({
        placeholder: "Select Student Name",
        // allowClear: true,
        width: "100%",
        dropdownParent: $('#educationModal') 
    });

    // Reinitialize Select2 when modal is opened
    // $('#educationModal').on('shown.bs.modal', function () {
    //     $('#student_name').select2({
    //         placeholder: "Select Student Name",
    //         allowClear: true,
    //         width: "100%",
    //         dropdownParent: $('#educationModal')
    //     });
    // });

    //edit education

//     $(document).on('click', '.editeducation', function() {
//     console.log("clicked");
//     var id = $(this).data('id');
//     console.log(id);
//     var url = `/edit_education/${id}`;
    
//     $.get(url, function(data) {
//         console.log(data);
//         $('#edit_id').val(data.education.id);  
//         $('#user_name').val(data.education.username);  
//         $('#edit_password').val(data.education.password);  
//         $('#edit_mailid').val(data.education.mailid);  
//        $('#edit_contact').val(data.education.phone).trigger('change');

      
//         var myModal = new bootstrap.Modal(document.getElementById('education_model'), {
//             keyboard: false
//         });
//         myModal.show();
//     })
//     .fail(function() {
//         alert('Failed to fetch education details.');
//     });
// });

$(document).on('click', '.editeducation', function() {
    console.log("Edit button clicked");
    var id = $(this).data('id');
    console.log("Editing ID:", id);
    var url = `/edit_education/${id}`;

    $.get(url, function(data) {
        console.log("Received Data:", data);

        if (!data || !data.education) {
            alert('Invalid data received.');
            return;
        }

        $('#edit_id').val(data.education.id);  
        $('#user_name').val(data.education.username);  
        $('#edit_password').val(data.education.password);  
        $('#edit_mailid').val(data.education.mailid);  
        $('#edit_contact').val(data.education.phone).trigger('change');


    var studentSelect = $('#editstudent_name');
    studentSelect.empty(); 
    studentSelect.append('<option value="">Please Select</option>');

        $.each(data.students, function(index, student) {
            let selected = (data.education.student_id == student.id) ? 'selected' : '';
            studentSelect.append(`<option value="${student.id}" ${selected}>${student.name}</option>`);
        });

      
        var myModal = new bootstrap.Modal(document.getElementById('education_model'), {
            keyboard: false
        });
        myModal.show();
    })
    .fail(function(xhr, status, error) {
        console.error("Error:", error);
        alert('Failed to fetch education details.');
    });
});




    // Delete Staff Section
    $(document).on('click', '.deleteeducation', function () {
        var id = $(this).data("id");
        var confirmation = confirm("Are you sure you want to delete this Details?");
        if (confirmation) {
            var deleteUrl = "{{ url('delete_education') }}/" + id;
            $.get(deleteUrl, function (data) {
                location.reload();
            });
        }
    });

    // DataTables Initialization
    $('#Education-table').DataTable({
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
        ajax: "{{ route('data_all_education') }}",
        columns: [
            { data: 'id', name: 'id' },
            { data: 'studentname', name: 'studentname' },
            { data: 'username', name: 'username' },
            { data: 'mailid', name: 'mailid' },
            { data: 'phone', name: 'phone' },
            { data: 'action', name: 'action', orderable: false, searchable: false }
        ]
    });
});

})(jQuery);
</script>
