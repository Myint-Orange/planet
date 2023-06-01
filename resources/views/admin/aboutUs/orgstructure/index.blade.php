@extends('layout.app')
@section('title') Organizational Structure @endsection

@section('css-place')
<link rel="stylesheet" href="{{asset('plugins/summernote/summernote-bs4.min.css')}}">
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
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title">Organizational Structure Banner Panel</h3>
        </div>
        <div class="card-body">
          <div class="row">
          </div>
          <form action='{{route('orgstructure.updateType')}}' method="post" enctype="multipart/form-data" id='regform'>
            @csrf
            <input type="hidden" name="type_id" value="{{$type->id}}">
            <div class="row justify-content-center">
              <img src="{{ asset('storage/types/'.$type->imgname)}}" id="preview" class="img-fluid mx-auto" alt="..." style="height: 300px; width: 650px;">
            </div>
            <div class="row justify-content-center mt-3">
              <div class="col-md-6">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="image" name="image" onchange="updateLabel('image', 'preview')" style="padding: 10px;">
                  <label class="custom-file-label" for="image">Add Banner Photo</label>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="inputTitle">Title Thai</label>
                  <input type="text" class="form-control" name='title_th' id="inputTitle" placeholder="Enter Title..." value="{{$type->typeTitles[0]->title_th}}">
                </div>
              </div>
              <div class="col-md-6">
                <!-- /.form-group -->
                <div class="form-group">
                  <label for="inputTitle">SubTitle Thai</label>
                  <input type="text" class="form-control" name='subTitle_th' id="inputTitle" placeholder="Enter Title..." value="{{$type->typeTitles[1]->title_th}}">
                </div>
                <!-- /.form-group -->
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="inputTitle">Title English</label>
                  <input type="text" class="form-control" name='title_en' id="inputTitle" placeholder="Enter Title..." value="{{$type->typeTitles[0]->title_en}}">
                </div>
              </div>
              <div class="col-md-6">
                <!-- /.form-group -->
                <div class="form-group">
                  <label for="inputTitle">SubTitle English</label>
                  <input type="text" class="form-control" name='subTitle_en' id="inputTitle" placeholder="Enter Title..." value="{{$type->typeTitles[1]->title_en}}">
                </div>
                <!-- /.form-group -->
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="inputTitle">Title Chinese</label>
                  <input type="text" class="form-control" name='title_ch' id="inputTitle" placeholder="Enter Title..." value="{{$type->typeTitles[0]->title_ch}}">
                </div>
              </div>
              <div class="col-md-6">
                <!-- /.form-group -->
                <div class="form-group">
                  <label for="inputTitle">SubTitle Chinese</label>
                  <input type="text" class="form-control" name='subTitle_ch' id="inputTitle" placeholder="Enter Title..." value="{{$type->typeTitles[1]->title_ch}}">
                </div>
                <!-- /.form-group -->
              </div>
            </div>
            <div class="row">
              <div class="col-12 col-sm-6">
                <div class="form-group">
                  <button type="submit" class="btn btn-primary" id="btn-mission">Save</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

  </section>

  <section class="content">
    <div class="container-fluid">
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title">Organizational Structure Diagram For Three Languages</h3>
        </div>
        <form action='{{route('orgstructure.updateLanguageImages')}}' method="post" enctype="multipart/form-data" id='regform'>
          @csrf
          <div class="card-body">

            <input type="hidden" name="type_id" value="{{$type->id}}">
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <img src="{{ asset('storage/types/'.$type->typeImages[0]->name_en)}}" id="preview2" class="img-fluid mx-auto" alt="..." style="height: 200px; width: 320px;">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <img src="{{ asset('storage/types/'.$type->typeImages[0]->name_th)}}" id="preview3" class="img-fluid mx-auto" alt="..." style="height: 200px; width: 320px;">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <img src="{{ asset('storage/types/'.$type->typeImages[0]->name_ch)}}" id="preview4" class="img-fluid mx-auto" alt="..." style="height: 200px; width: 320px;">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4 d-flex justify-content-center">
                <div class="form-group text-center">
                  <label for="inputTitle">Diagram English</label>
                </div>
              </div>
              <div class="col-md-4 d-flex justify-content-center">
                <!-- /.form-group -->
                <div class="form-group text-center">
                  <label for="inputTitle">Diagram Thai</label>
                </div>
                <!-- /.form-group -->
              </div>
              <div class="col-md-4 d-flex justify-content-center">
                <!-- /.form-group -->
                <div class="form-group text-center">
                  <label for="inputTitle">Diragram Chinese</label>
                </div>
                <!-- /.form-group -->
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="image2" name="image_en" onchange="updateLabel('image2', 'preview2')" style="padding: 10px;">
                  <label class="custom-file-label" for="image">Choose Photo</label>
                </div>
              </div>
              <div class="col-md-4">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="image3" name="image_th" onchange="updateLabel('image3', 'preview3')" style="padding: 10px;">
                  <label class="custom-file-label" for="image">Choose Photo</label>
                </div>
              </div>
              <div class="col-md-4">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="image4" name="image_ch" onchange="updateLabel('image4', 'preview4')" style="padding: 10px;">
                  <label class="custom-file-label" for="image">Choose Photo</label>
                </div>

              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12 d-flex justify-content-center">
              <div class="form-group text-center">
                <button type="submit" class="btn btn-primary px-4 py-2" id="btn-mission">Save</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
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
  $(function() {
    $("#example1").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "ordering": true,
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
        window.location.href = "{{ route('groupstructure.destroy', ':id') }}".replace(':id', postId);
      }
    });
  });

  
</script>

@endsection