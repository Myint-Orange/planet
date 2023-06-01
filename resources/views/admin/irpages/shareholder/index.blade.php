@extends('layout.app')
@section('title')ShareHolder @endsection
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
  <div class="content-header">
    <div class="container-fluid">
      
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <section class="content">
    <div class="container-fluid">

      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">
                <i class="fas fa-edit"></i>
              Banner Image For ShareHolderr Structure
              </h3>
            </div>

            <div class="card-body">
              <form action='{{route('shareholder.editBanner')}}' method="post" enctype="multipart/form-data" id='regform'>
                @csrf
                <input type="hidden" name="type_id" value={{$type->id}}>
                <div class="row justify-content-center">
                  <img src="{{ asset('storage/types/'.$type->imgname)}}" id="preview" class="img-fluid mx-auto" alt="..." style="height: 300px; width: 650px;">
                </div>
             

                <div class="row">
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Banner Title (English)</label>
                      <input type="text" name="menu_en" class="form-control" placeholder="Enter ..." value="{{$type->typeTitles[0]->title_en}}">
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Banner Title (Thai)</label>
                      <input type="text" name="menu_th" class="form-control" placeholder="Enter ..." value="{{$type->typeTitles[0]->title_th}}">
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Banner Title (Chinese)</label>
                      <input type="text" name="menu_ch" class="form-control" placeholder="Enter ..." value="{{$type->typeTitles[0]->title_ch}}">
                    </div>
                  </div>
                </div>

                <div class="row justify-content-center mt-3">
                  <div class="col-md-6 d-flex align-items-center">
                    <div class="custom-file mr-2">
                      <input type="file" class="custom-file-input" id="image" name="image" onchange="updateLabel('image','preview')" style="padding: 10px;">
                      <label class="custom-file-label" for="image">Add Image For ShareHolderBanner</label>
                    </div>
                    <button type="submit" class="btn btn-primary" id="btn-mission">Save</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
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

              <a href="{{route('shareholder.createPost')}}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Add
              </a>

              <div class="card-body">
                <h3 class="card-title"><b>Shareholder Structure</b></h3>
                <table id="example2" class="table table-bordered table-hover">

                  <thead>

                    <tr>
                      <th>ID</th>
                      <th>Name Of Shareholders</th>
                      <th>Number Of Shares</th>
                      <th>Shareholding Proportion(%)</th>
                      <th>Action</th>
                    </tr>

                  </thead>
                  <tbody>
                    @foreach($type->posts as $post)
                    <tr>
                      <td>{{ $post->id}}</td>
                      <td>
                        {{$post->titles[0]->title_en}}
                      </td>
                      <td>
                        {{$post->titles[1]->title_en}}
                      </td>
                      <td>
                        {{$post->titles[2]->title_en}}
                      </td>
                    
                      <td>
                        <div class="btn-group">
                          <button type="button" class="btn btn-info">Action</button>
                          <button type="button" class="btn btn-info dropdown-toggle dropdown-hover dropdown-icon" data-toggle="dropdown">
                            <span class="sr-only">Toggle Dropdown</span>
                          </button>
                          <div class="dropdown-menu" role="menu">
                            <a class="dropdown-item" href="{{route('shareholder.updatePost',$post->id)}}">Edit</a>
                            <a class="dropdown-item delete-row" href="" id="delete-post-{{$post->id}}">Delete</a>
                          </div>
                      </td>

                     
                    </tr>
                    @endforeach
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>ID</th>
                      <th>Name Of Shareholders</th>
                      <th>Number Of Shares</th>
                      <th>Shareholding Proportion(%)</th>
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
    </div>
  </section>

</div>

<script>
   $(document).ready(function() {
    $('.dropdown-toggle').dropdown();
  });
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
  $(function() {
    $("#example2").DataTable({
      "responsive": true,
      "lengthChange": true,
      "ordering": true,
      "autoWidth": true,
      "info": true,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  
  });

  $(document).ready(function() {
    $('.delete-row').click(function(event) {
      event.preventDefault();
      var postId = $(this).attr('id').replace('delete-post-', '');
      if (confirm("Are you sure you sure to delete this row?")) {
        window.location.href = "{{ route('shareholder.destroyPost', ':id') }}".replace(':id', postId);
      }
    });
  });
  

</script>

@endsection