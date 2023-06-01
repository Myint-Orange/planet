@extends('layout.app')
@section('title') Group Structure @endsection

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
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title">Company History Banner Panel</h3>
        </div>
        <div class="card-body">
          <div class="row">
          </div>
          <form action='{{route('history.updateType')}}' method="post" enctype="multipart/form-data" id='regform'>
            @csrf
            <input type="hidden" name="type_id" value="{{$type->id}}">
            <div class="row justify-content-center">
              <img src="{{ asset('storage/types/'.$type->imgname)}}" id="preview" class="img-fluid mx-auto" alt="..." style="height: 200px; width: 570px;">
            </div>
            <div class="row justify-content-center mt-3">
              <div class="col-md-6">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="image" name="image" onchange="updateLabel('image','preview')" style="padding: 10px;">
                  <label class="custom-file-label" for="image">Add Banner Photo</label>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="inputTitle">Title Thai</label>
                  <input type="text" class="form-control" name='title_th' id="inputTitle" placeholder="Enter Title..." value="{{$type->typeTitles[0]->title_th}}" required>
                </div>
              </div>
              <div class="col-md-6">
                <!-- /.form-group -->
                <div class="form-group">
                  <label for="inputTitle">Sub Title Thai</label>
                  <input type="text" class="form-control" name='subTitle_th' id="inputTitle" placeholder="Enter Title..." value="{{$type->typeTitles[1]->title_th}}" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="inputTitle">Title English</label>
                  <input type="text" class="form-control" name='title_en' id="inputTitle" placeholder="Enter Title..." value="{{$type->typeTitles[0]->title_en}}" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="inputTitle">Sub Title English</label>
                  <input type="text" class="form-control" name='subTitle_en' id="inputTitle" placeholder="Enter Title..." value="{{$type->typeTitles[1]->title_en}}" required>
                </div>
              </div>

            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="inputTitle">Title Chinese</label>
                  <input type="text" class="form-control" name='title_ch' id="inputTitle" placeholder="Enter Title..." value="{{$type->typeTitles[0]->title_ch}}" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="inputTitle">SubTitle Chinese</label>
                  <input type="text" class="form-control" name='subTitle_ch' id="inputTitle" placeholder="Enter Title..." value="{{$type->typeTitles[1]->title_ch}}" required>
                </div>
              </div>

            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="inputTitle">Content Thai</label>
                  <textarea id="summernote" name="content_th" class="form-control" style="height: 100px" required>{{$type->typeContents[0]->content_th}} </textarea>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="inputTitle">Content Englsih</label>
                  <textarea id="summernote2" name="content_en" class="form-control" style="height: 100px" required>{{$type->typeContents[0]->content_en}} </textarea>
                </div>
                <!-- /.form-group -->
              </div>
              <div class="col-md-6">
                <!-- /.form-group -->
                <div class="form-group">
                  <label for="inputTitle">Content Chinese</label>
                  <textarea id="summernote3" name="content_ch" class="form-control" style="height: 100px" required>{{$type->typeContents[0]->content_ch}} </textarea>
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
          <h3 class="card-title">Founders Objective</h3>
        </div>
        <div class="card-body">
          <div class="row">
          </div>
          <form action='{{route('history.updateObjective')}}' method="post" enctype="multipart/form-data" id='regform'>
            @csrf
            <input type="hidden" name="type_id" value="{{$type->id}}">
            <div class="row justify-content-center">
              <img src="{{asset('storage/types/'.$type->typeImages[0]->name_en)}}" id="preview1" class="img-fluid mx-auto" alt="..." style="height: 200px; width: 570px;">
            </div>
            <div class="row justify-content-center mt-3">
              <div class="col-md-6">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="image1" name="image" onchange="updateLabel('image1','preview1')" style="padding: 10px;">
                  <label class="custom-file-label" for="image">Add Banner Photo</label>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="inputTitle">Content Thai</label>
                  <textarea id="summernote12" name="content_th" class="form-control summernote" style="height: 100px" required>{{$type->typeContents[1]->content_th}} </textarea>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="inputTitle">Content English</label>
                  <textarea id="summernote4" name="content_en" class="form-control summernote" style="height: 100px" required>{{$type->typeContents[1]->content_en}} </textarea>
                </div>
              </div>
              <div class="col-md-6">
                <!-- /.form-group -->
                <div class="form-group">
                  <label for="inputTitle">Content Chinese</label>
                  <textarea id="summernote5" name="content_ch" class="form-control summernote" style="height: 100px" required>{{$type->typeContents[1]->content_ch}} </textarea>
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

  </section>

  <section class="content">
    <div class="container-fluid">
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title">History of Growing Company</h3>
        </div>
        <div class="card-body">
          <div class="row">
          </div>
          <form action='{{route('history.updateHistory')}}' method="post" enctype="multipart/form-data" id='regform'>
            @csrf
            <input type="hidden" name="type_id" value="{{$type->id}}">
            <div class="row justify-content-center">
              <img src="{{ asset('storage/types/'.$type->typeImages[1]->name_en)}}" id="preview2" class="img-fluid mx-auto" alt="..." style="height: 300px; width: 650px;">
            </div>
            <div class="row justify-content-center mt-3">
              <div class="col-md-6">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="image2" name="image" onchange="updateLabel('image2','preview2')" style="padding: 10px;">
                  <label class="custom-file-label" for="image">Add Banner Photo</label>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="inputTitle">Content Thai</label>
                  <textarea id="summernote6" name="content_th" class="form-control summernote" style="height: 100px" required>{{$type->typeContents[2]->content_th}} </textarea>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="inputTitle">Content English</label>
                  <textarea id="summernote7" name="content_en" class="form-control summernote" style="height: 100px" required>{{$type->typeContents[2]->content_en}} </textarea>
                </div>
              </div>
              <div class="col-md-6">
                <!-- /.form-group -->
                <div class="form-group">
                  <label for="inputTitle">Content Chinese</label>
                  <textarea id="summernote8" name="content_ch" class="form-control summernote" style="height: 100px" required>{{$type->typeContents[2]->content_ch}} </textarea>
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
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">

              <a href="{{route('history.create')}}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Add
              </a>

              <div class="card-body">
                <h3 class="card-title">COVID Clinic <b> EMBRYO</b></h3>
                <table id="example2" class="table table-bordered table-hover">

                  <thead>

                    <tr>
                      <th>ID</th>
                      <th>Title Thai</th>
                      <th>Title English</th>
                      <th>Title Chinese</th>
                      <th>Image</th>
                      <th>Language</th>
                      <th>Actions</th>
                    </tr>

                  </thead>
                  <tbody>
                    @foreach($type->posts as $post)
                    <tr>
                      <td>{{ $post->id}}</td>
                      <td>
                        {!! $post->titles[0]->title_th !!}
                      </td>
                      <td>
                        {!! $post->titles[0]->title_en !!}
                      </td>
                      <td>
                        {!! $post->titles[0]->title_ch !!}
                      </td>
                      <td>
                        <img src="{{ asset('storage/posts/'.$post->imgname)}}" alt="Image" width="90" height="60">
                      </td>

                      <td>
                        <div class="form-group clearfix">
                          <div class="icheck-success d-inline">
                            <input type="checkbox" id="checkboxSuccess1" {{ $post->titles[0]->title_en ? 'checked' : '' }}>
                            <label for="checkboxSuccess1">English</label>
                            </label>
                          </div>
                          <div class="icheck-success d-inline">
                            <input type="checkbox" id="checkboxSuccess2" {{ $post->titles[0]->title_th ? 'checked' : '' }}>
                            <label for="checkboxSuccess2">Thai
                            </label>
                          </div>
                          <div class="icheck-success d-inline">
                            <input type="checkbox" id="checkboxSuccess3" {{ $post->titles[0]->title_ch ? 'checked' : '' }}>
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
                            <a class="dropdown-item" href="{{route('history.update',$post->id)}}">Edit</a>
                            <a class="dropdown-item delete-row" href="#" id="delete-post-{{$post->id}}">Delete</a>
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
                      <th>Image</th>
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

  <section class="content">
    <div class="container-fluid">
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title">Conclusion OF Company History</h3>
        </div>
        <div class="card-body">
          <div class="row">
          </div>
          <form action='{{route('history.updateConclusion')}}' method="post" enctype="multipart/form-data" id='regform'>
            @csrf
            <input type="hidden" name="type_id" value="{{$type->id}}">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="inputTitle">Content Thai</label>
                  <textarea id="summernote9" name="content_th" class="form-control summernote" style="height: 100px" required>{{$type->typeContents[3]->content_th}} </textarea>
                </div>
              </div>


            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="inputTitle">Content English</label>
                  <textarea id="summernote10" name="content_en" class="form-control summernote" style="height: 100px" required>{{$type->typeContents[3]->content_en}} </textarea>
                </div>
              </div>
              <div class="col-md-6">
                <!-- /.form-group -->
                <div class="form-group">
                  <label for="inputTitle">Content Chinese</label>
                  <textarea id="summernote11" name="content_ch" class="form-control summernote" style="height: 100px" required>{{$type->typeContents[3]->content_ch}} </textarea>
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


  <div class="overlay hide-element" id="overlay"></div>
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

  $(document).ready(function() {
    // Add a click event listener to each "Delete" button
    $('.delete-row').click(function(event) {
      event.preventDefault();
      var postId = $(this).attr('id').replace('delete-post-', '');
      if (confirm("Are you sure you want to delete this row?")) {
        // If the user clicks "OK", delete the row
        window.location.href = "{{ route('history.destroy', ':id') }}".replace(':id', postId);
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