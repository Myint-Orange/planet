@extends('layout.app')
@section('title') Home @endsection

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
          <h3 class="card-title">Embryo Network Banner Panel</h3>
        </div>
        <div class="card-body">
          <div class="row">
          </div>
          <form action='{{route('network.updateType')}}' method="post" enctype="multipart/form-data" id='regform'>
            @csrf
            <input type="hidden" name="type_id" value="{{$type->id}}">
            <div class="row justify-content-center">

              <img src="{{ asset('storage/types/'.$type->imgname)}}" id="preview" class="img-fluid mx-auto" alt="..." style="height: 300px; width: 650px;">
            </div>
            <div class="row justify-content-center mt-3">
              <div class="col-md-6">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="image" name="image" onchange="updateLabel()" style="padding: 10px;">
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
                <!-- /.form-group -->
                <div class="form-group">
                  <label for="inputTitle">Title English</label>
                  <input type="text" class="form-control" name='title_en' id="inputTitle" placeholder="Enter Title..." value="{{$type->typeTitles[0]->title_en}}">
                </div>
                <!-- /.form-group -->
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="inputTitle">Sub Title Thai</label>
                  <input type="text" class="form-control" name='sub_title_th' id="inputTitle" placeholder="Enter Title..." value="{{$type->typeTitles[1]->title_th}}">
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                  <label for="inputTitle">Sub Title English</label>
                  <input type="text" class="form-control" name='sub_title_en' id="inputTitle" placeholder="Enter Title..." value="{{$type->typeTitles[1]->title_en}}">
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->

            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="inputTitle">Title Chinese </label>
                  <input type="text" class="form-control" name='title_ch' id="inputTitle" placeholder="Enter Title..." value="{{$type->typeTitles[0]->title_ch}}">
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="inputTitle">Sub Title Chinese</label>
                  <input type="text" class="form-control" name='sub_title_ch' id="inputTitle" placeholder="Enter Title..." value="{{$type->typeTitles[1]->title_ch}}">
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

            <a href="{{route('network.create')}}" class="btn btn-primary">
              <i class="fas fa-plus"></i> Add
            </a>

            <div class="card-body">
              <h3 class="card-title">Network OF<b> EMBRYO</b></h3>
              <table id="example2" class="table table-bordered table-hover">

                <thead>

                  <tr>
                    <th>ID</th>
                    <th>title Thai</th>
                    <th>title English</th>
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
                      {!! implode('<br>', array_slice(explode('##', $post->contents[0]->content_th), 0, 1)) !!}
                    </td>
                    <td>
                      {!! implode('<br>', array_slice(explode('##', $post->contents[0]->content_en), 0, 1)) !!}
                    </td>

                    <td>
                      <img src="{{ asset('storage/posts/'.$post->imgname)}}" alt="Image" width="90" height="60">
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
                          <a class="dropdown-item" href="{{route('network.update',$post->id)}}">Edit</a>
                          <a class="dropdown-item delete-row" href="{{route('network.destroyPost',$post->id)}}">Delete</a>
                        </div>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <th>ID</th>
                    <th>title Thai</th>
                    <th>title English</th>
                    <th>Image</th>
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

  <div class="overlay hide-element" id="overlay"></div>
</div>

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

  function updateLabel() {
    var input = document.getElementById('image');
    var preview = document.getElementById('preview');
    var file = input.files[0];
    var reader = new FileReader();

    reader.onload = function(e) {
      preview.src = e.target.result;
    };

    reader.readAsDataURL(file);
  }
</script>

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