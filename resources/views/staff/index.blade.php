@extends('control.app')
@section('content')
<div class="content-wrapper pt-3">
    <section class="content">
        <div class="container">
            <button type="button" class="btn btn-success btn-val" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Add Staff
</button>
            
        </div>

           <div class="card card-outline card-primary mt-2">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-bordered table-stripped" id="staff-table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Contact Number</th>
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
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Staff</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
     <form action="{{ route('staff.store') }}" method="post" enctype="multipart/form-data">
         @csrf
     <div class="form-group">
        <label for="name">Staff Name</label>
      <input type="text" class="form-control" id="name" name="name" required placeholder="--Staff Name ---">
     </div>
     <div class="form-group">
        <label for="name">Contact Number</label>
      <input type="Number" class="form-control" id="contact_number" name="contact_number" required min="0">
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



<!-- Modal Update staff  Details -->
<div class="modal fade" id="staff_model" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabels" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabels">Update Staff</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('staff.update') }}" method="POST">
          @csrf
          <input type="hidden" name="edit_id" id="edit_id">
          <div class="form-group">
            <label for="edit_name">Name:</label>
            <input type="text" class="form-control" name="edit_name" id="edit_name">
          </div>
           <div class="form-group">
        <label for="name">Contact Number</label>
     <input type="number" class="form-control" id="edit_contact" name="contact_number">

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
<script type="text/javascript">
    (function($) {
    $(document).ready(function() {
    
        $(document).on('click', '.editstaff', function() {
    console.log("clicked");
    var id = $(this).data('id');
    console.log(id);
    var url = `/edit_staff/${id}`;
    
    $.get(url, function(data) {
        console.log(data);
        $('#edit_id').val(data.id);  
        $('#edit_name').val(data.name);  
       $('#edit_contact').val(data.contact_number).trigger('change');

      
        var myModal = new bootstrap.Modal(document.getElementById('staff_model'), {
            keyboard: false
        });
        myModal.show();
    })
    .fail(function() {
        alert('Failed to fetch staff details.');
    });
});




// Delete Section
    $(document).on('click', '.deletestaff', function() {
      var id = $(this).data("id");
      var confirmation = confirm("Are You sure want to delete this Staff Details!");
      if (confirmation) {
        var editCategoryUrl = "{{ url('delete_staff') }}/" + id;
        $.get(editCategoryUrl, function(data) {
          location.reload();
        })
      }
         });

        $('#staff-table').DataTable({
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
            order: [
                [0, "asc"]
            ],
            ajax: "{{ route('data_all_staff') }}",
            columns: [
                { data: 'id', name: 'id' },
                { data: 'name', name: 'name' },
                { data: 'contact_number', name: 'contact_number' },
                { data: 'action', name: 'action', orderable: false, searchable: false }
            ]
        });
    });
})(jQuery);
</script>
