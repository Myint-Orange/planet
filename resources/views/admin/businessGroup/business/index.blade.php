@extends('layout.app')
@section('title') Business Index @endsection

@section('css-place')
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

        <div class="col-sm-6">

        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- Main content -->


  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">

              <a href="{{route('business.create')}}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Add
              </a>

              <div class="card-body">
                <h3 class="card-title">Business <b> EMBRYO</b></h3>
                <table id="example2" class="table table-bordered table-hover">

                  <thead>

                    <tr>
                      <th>ID</th>
                      <th>title Thai</th>
                      <th>title English</th>
                      <th>title Chinese</th>
                      <th>Banner</th>
                      <th>Language</th>
                      <th>Actions</th>
                    </tr>

                  </thead>
                  <tbody>
                    @foreach($group->types as $type)
                    <tr>
                      <td>{{ $type->id}}</td>
                      <td>
                        {!! $type->typeTitles[0]->title_th !!}
                      </td>
                      <td>
                        {!! $type->typeTitles[0]->title_en !!}
                      </td>
                      <td>
                        {!! $type->typeTitles[0]->title_ch !!}
                      </td>
                      <td>
                        <img src=" {{asset('storage/types/'.$type->imgname)}}" alt="Image" width="90" height="60">
                      </td>
                      <td>
                        <div class="form-group clearfix">
                          <div class="icheck-success d-inline">
                            <input type="checkbox" id="checkboxSuccess1" {{ $type->typeTitles[0]->title_th  ? 'checked' : '' }}>
                            <label for="checkboxSuccess1">English</label>
                          
                          </div>
                          <div class="icheck-success d-inline">
                            <input type="checkbox" id="checkboxSuccess2" {{ $type->typeTitles[0]->title_en ? 'checked' : '' }}>
                            <label for="checkboxSuccess2">Thai</label>
                          </div>
                          <div class="icheck-success d-inline">
                            <input type="checkbox" id="checkboxSuccess3" {{ $type->typeTitles[0]->title_ch  ? 'checked' : '' }}>
                            <label for="checkboxSuccess3">Chinese</label>
                          </div>
                        </div>
                      </td>

                      <td>
                        <div class="btn-group">
                          <button type="button" class="btn btn-info">Action</button>
                          <button type="button" class="btn btn-info dropdown-toggle dropdown-hover dropdown-icon" data-toggle="dropdown">
                            <span class="sr-only">Toggle Dropdown</span>
                          </button>
                          <div class="dropdown-menu" role="menu">
                            <a class="dropdown-item" href="{{route('business.update',$type->id)}}">Edit</a>
                            <a class="dropdown-item delete-row" href="#" id="delete-post-{{$type->id}}">Delete</a>
                          </div>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>ID</th>
                      <th>Title Thai</th>
                      <th>Title English</th>
                      <th>Title Chinese</th>
                      <th>Banner</th>
                      <th>Language</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>

      </div>
      <!-- /.container-fluid -->
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
    // Add a click event listener to each "Delete" button
    $('.delete-row').click(function(event) {
      event.preventDefault();
      var postId = $(this).attr('id').replace('delete-post-', '');
      if (confirm("Are you sure you want to delete this row?")) {
        // If the user clicks "OK", delete the row
        window.location.href = "{{ route('business.destroy', ':id') }}".replace(':id', postId);
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