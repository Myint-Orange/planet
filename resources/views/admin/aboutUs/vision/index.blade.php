@extends('layout.app')
@section('title') Mission And Vision @endsection

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
          <h3 class="card-title">Vission And Mission Banner Panel</h3>
        </div>
        <div class="card-body">
          <div class="row">
          </div>
          <form action='{{route('vision.updateVisionAndMission')}}' method="post" enctype="multipart/form-data" id='regform'>
            @csrf
            <input type="hidden" name="type_id" value="{{$type->id}}">
            <div class="row justify-content-center">
              <img src="{{ asset('storage/types/'.$type->imgname)}}" id="preview3" class="img-fluid mx-auto" alt="..." style="height: 200px; width: 550px;">
            </div>
            <div class="row justify-content-center mt-3">
              <div class="col-md-6">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="image3" name="image" onchange="updateLabel('image3','preview3')" style="padding: 10px;">
                  <label class="custom-file-label" for="image">Add Image For Clinic Profile</label>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="inputTitle">Title Thai</label>
                  <input type="text" class="form-control" name='title_th' id="inputTitle" placeholder="Enter Title..." value="{{$type->typeTitles[0]->title_th}}">
                </div>
                <div class="form-group">
                  <label for="inputTitle">Title English</label>
                  <input type="text" class="form-control" name='title_en' id="inputTitle" placeholder="Enter Title..." value="{{$type->typeTitles[0]->title_en}}">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="inputTitle">Title Chinese</label>
                  <input type="text" class="form-control" name='title_ch' id="inputTitle" placeholder="Enter Title..." value="{{$type->typeTitles[0]->title_ch}}">
                </div>
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
    <div class="container-fluid">
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title">Vision Panel</h3>
        </div>
        <div class="card-body">
          <div class="row">
          </div>
          <form action='{{route('vision.updateVision')}}' method="post" enctype="multipart/form-data" id='regform'>
            @csrf
            <input type="hidden" name="type_id" value="{{$type->id}}">
            <div class="row justify-content-center">
              <img src="{{ asset('storage/types/'.$type->typeImages[0]->name_en)}}" id="preview2" class="img-fluid mx-auto" alt="..." style="height: 200px; width: 550px;">
            </div>
            <div class="row justify-content-center mt-3">
              <div class="col-md-6">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="image2" name="image" onchange="updateLabel('image2','preview2')" style="padding: 10px;">
                  <label class="custom-file-label" for="image2">Add Image For Clinic Profile</label>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="inputTitle">Title Thai</label>
                  <input type="text" class="form-control" name='title_th' id="inputTitle" placeholder="Enter Title..." value="{{$type->typeTitles[1]->title_th}}" required>
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                  <label for="inputTitle">Title English</label>
                  <input type="text" class="form-control" name='title_en' id="inputTitle" placeholder="Enter Title..." value="{{$type->typeTitles[1]->title_en}}" required>
                </div>
                <div class="form-group">
                  <label for="inputTitle">Title Chinese</label>
                  <input type="text" class="form-control" name='title_ch' id="inputTitle" placeholder="Enter Title..." value="{{$type->typeTitles[1]->title_ch}}" required>
                </div>
                <!-- /.form-group -->
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="inputTitle">Content Thai</label>
                  <textarea id="compose-textarea" name="content_th" class="form-control" style="height: 60px"> {{$type->typeContents[0]->content_th}} </textarea>
                </div>
                <div class="form-group">
                  <label for="inputTitle">Content English</label>
                  <textarea id="compose-textarea" name="content_en" class="form-control" style="height: 60px"> {{$type->typeContents[0]->content_en}} </textarea>
                </div>
                <div class="form-group">
                  <label for="inputTitle">Content Chinese</label>
                  <textarea id="compose-textarea" name="content_ch" class="form-control" style="height: 60px"> {{$type->typeContents[0]->content_ch}} </textarea>
                </div>
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


    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">

            <a href="{{route('vision.create')}}" class="btn btn-primary">
              <i class="fas fa-plus"></i> Add
            </a>

            <div class="card-body">
              <h3 class="card-title">Mission OF<b> EMBRYO</b></h3>
              <table id="example2" class="table table-bordered table-hover">

                <thead>

                  <tr>
                    <th>ID</th>
                    <th>Content Thai</th>
                    <th>Content English</th>
                    <th>Language</th>
                    <th>Actions</th>
                  </tr>

                </thead>
                <tbody>
                  @foreach($typeMission->posts as $post)
                  <tr>
                    <td>{{ $post->id}}</td>
                    <td>
                      {!! $post->contents[0]->content_th!!}
                    </td>
                    <td>
                      {!! $post->contents[0]->content_en!!}
                    </td>
                    <td>
                      <div class="form-group clearfix">
                        <div class="icheck-success d-inline">
                          <input type="checkbox" id="checkboxSuccess1" {{ $post->contents[0]->content_en ? 'checked' : '' }}>
                          <label for="checkboxSuccess1">English</label>
                          </label>
                        </div>
                        <div class="icheck-success d-inline">
                          <input type="checkbox" id="checkboxSuccess2" {{ $post->contents[0]->content_th ? 'checked' : '' }}>
                          <label for="checkboxSuccess2">Thai
                          </label>
                        </div>
                        <div class="icheck-success d-inline">
                          <input type="checkbox" id="checkboxSuccess3" {{ $post->contents[0]->content_ch ? 'checked' : '' }}>
                          <label for="checkboxSuccess3">Chinese
                          </label>
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
                          <a class="dropdown-item" href="{{route('vision.update',$post->id)}}">Edit</a>
                          <a class="dropdown-item delete-row" href="#" id="delete-post-{{$post->id}}">Delete</a>
                        </div>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Language</th>
                    <th>Action</th>
                  </tr>
                </tfoot>
              </table>
            </div>

            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>

    </div>

    <!-- /.container-fluid -->
  </section>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">
                <i class="fas fa-edit"></i>
                Edit Mission Image
              </h3>
            </div>
            <div class="card-body">
              <form action='{{route('vision.editMissionImage')}}' method="post" enctype="multipart/form-data" id='regform'>
                @csrf
                <input type="hidden" name="type_id" value="{{$typeMission->id}}">
                <div class="row justify-content-center">
                  <img src="{{ asset('storage/types/'.$typeMission->imgname)}}" class="img-fluid mx-auto" alt="..." style="height: 200px; width: 450px;" id="preview1">
                </div>
                <div class="row">
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Title (Thai)</label>
                      <input type="text" name="title_th" class="form-control" placeholder="Enter ..." value="{{$typeMission->typeTitles[0]->title_th}}">
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Title (English)</label>
                      <input type="text" name="title_en" class="form-control" placeholder="Enter ..." value="{{$typeMission->typeTitles[0]->title_en}}">
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Title (Chinese)</label>
                      <input type="text" name="title_ch" class="form-control" placeholder="Enter ..." value="{{$typeMission->typeTitles[0]->title_ch}}">
                    </div>
                  </div>
                </div>
                <div class="row justify-content-center mt-3">
                  <div class="col-md-6 d-flex align-items-center">
                    <div class="custom-file mr-2">
                      <input type="file" class="custom-file-input" id="image1" name="image" onchange="updateLabel('image1','preview1')" style="padding: 10px;">
                      <label class="custom-file-label" for="image">Add Image For Clinic Profile</label>
                    </div>
                    <button type="submit" class="btn btn-primary" id="btn-mission">Save</button>
                  </div>
                </div>



              </form>

            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- ./row -->

      <!-- /.card -->
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

  $(document).ready(function() {

    $('.delete-row').click(function(event) {
      event.preventDefault();
      var postId = $(this).attr('id').replace('delete-post-', '');
      if (confirm("Are you sure you want to delete this row?")) {

        window.location.href = "{{ route('vision.destroyMission', ':id') }}".replace(':id', postId);
      }
    });
  });
</script>
@section('js-place')

<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<script src="{{asset('/dist/js/adminlte.min.js')}}"></script>
<script>
  $(function() {

    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "ordering": false,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
@endsection
@endsection