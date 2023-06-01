@extends('layout.app')
@section('title') Social Media @endsection

@section('css-place')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-9r1xRa+0dCx6qKcIRyVfEZ1VQH/10p+9f7rLD/v6XvI0U7Pl90GK+vA2LIsXqbZfuFzJ+F8sz3gPSJWz5F+VQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
<link rel="stylesheet" href="{{asset('dist/css/custom.css')}}">
@endsection
@section('contents')

@if (isset($notification['message']))
<script>
  alert("{{ $notification['message'] }}");
</script>
@endif

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">

        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">



                <div class="card-body">
                  <h3 class="card-title">Contacts Forms Of<b> EMBRYO</b></h3>
                  <table id="example2" class="table table-bordered table-hover">

                    <thead>

                      <tr>
                        <th>ID</th>
                        <th>Name </th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Lopic</th>
                        <th>Message</th>
                        <th>Action</th>
                      </tr>

                    </thead>
                    <tbody>
                      @foreach($contactForms as $contactForm)
                      <tr>
                        <td>{{ $contactForm->id}}</td>
                        <td>
                          {!! $contactForm->name !!}
                        </td>
                        <td>
                          {!! $contactForm->email !!}
                        </td>
                        <td>
                          {!! $contactForm->phone !!}
                        </td>
                        <td>
                          {!! $contactForm->topic !!}
                        </td>
                        <td>
                          {!! $contactForm->message !!}
                        </td>

                        <td>
                          <div class="btn-group">
                            <button type="button" class="btn btn-info">Action</button>
                            <button type="button" class="btn btn-info dropdown-toggle dropdown-hover dropdown-icon" data-toggle="dropdown">
                              <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu" role="menu">
                              <a class="dropdown-item" href="{{route('vision.update',$contactForm->id)}}">Edit</a>
                              <a class="dropdown-item delete-row" href="#" id="delete-post-{{$contactForm->id}}">Delete</a>
                            </div>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>ID</th>
                        <th>Name </th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Lopic</th>
                        <th>Message</th>
                        <th>Action</th>
                      </tr>
                    </tfoot>
                  </table>
                </div>

                <!-- /.card -->
              </div>
              <!-- /.col -->
            </div>
          </div>
        </div><!-- /.container-fluid -->
  </section>
</div>
<script>
  function updateLabel(inputId, previewId) {
    var input = document.getElementById(inputId);
    var preview = document.getElementById(previewId);
    var file = input.files[0];
    var reader = new FileReader();
    reader.onload = function(e) {
      preview.src = e.target.result;
    };
    reader.readAsDataURL(file);
  }
</script>


@section('js-place')


<script>
  $(document).ready(function() {
    $('.dropdown-toggle').dropdown();
  });

  const deleteButtons = document.querySelectorAll('.delete-row');
  deleteButtons.forEach(button => {
    button.addEventListener('click', () => {
      const row = button.closest('tr');
      const id = row.querySelector('td:first-child').textContent;
      const title = row.querySelector('td:nth-child(2)').textContent;
      updateFormAction(id);
      $('#inputId').val(id);
      $('#inputTitle').val(title);
      $("#delete-card").show();
      $(".overlay").show();
      console.log(`Row ID: ${id}`);
    });
  });


  $('#example2').DataTable({
  "paging": true,
  "lengthChange": false,
  "ordering": false,
  "info": true,
  "autoWidth": false,
  "responsive": true,
  });
  });
  $(document).ready(function() {
    $('.delete-row').click(function(event) {
      event.preventDefault();
      var postId = $(this).attr('id').replace('delete-post-', '');
      if (confirm("Are you sure you want to delete this row?")) {
        window.location.href = "{{ route('social.destroy', ':id') }}".replace(':id', postId);
      }
    });
  });
  $('#summernote').summernote();
  $('#summernote1').summernote();
  $('#summernote2').summernote();
  $('#summernote3').summernote();
  $('#summernote4').summernote();
  $('#summernote5').summernote();
  $('#summernote6').summernote();
  $('#summernote7').summernote();
  $('#summernote8').summernote();
  $('#summernote9').summernote();
  $('#summernote10').summernote();
  $('#summernote11').summernote();
  $('#summernote12').summernote();
</script>
@endsection
@endsection