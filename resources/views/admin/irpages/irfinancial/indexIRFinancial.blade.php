@extends('layout.app')
@section('title')IR Financial @endsection
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
              Banner Image For IR Financial
              </h3>
            </div>

            <div class="card-body">
              <form action='{{route('IRFinancial.editBanner')}}' method="post" enctype="multipart/form-data" id='regform'>
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
                      <label class="custom-file-label" for="image">Add Image For IR Basic Informaiton</label>
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
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">

              <a href="{{route('IRFinancial.createFile')}}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Add
              </a>

              <div class="card-body">
                <h3 class="card-title"><b>Financial Statement</b></h3>
                <table id="example2" class="table table-bordered table-hover">

                  <thead>

                    <tr>
                      <th>ID</th>
                      <th>Statement PDF</th>
                      <th>Year</th>
                      <th>Action</th>
                     
                    </tr>

                  </thead>
                  <tbody>
                    @foreach($type->posts as $post)
                    <tr>
                      <td>{{ $post->id}}</td>
                      <td>
                        <a href="{{ asset('storage/pdf/'.$post->imgname)}}">
                          <img src="{{ asset('storage/images/pdflogo.png')}}" alt="PDF Logo" class="pdflogo">
                        </a>
                        {{$post->name}}
                      </td>
                      <td>
                        {{ $post->created_at->format('Y') }}
                      </td>
                     
                      <td>
                        <div class="btn-group">
                          <button type="button" class="btn btn-info">Action</button>
                          <button type="button" class="btn btn-info dropdown-toggle dropdown-hover dropdown-icon" data-toggle="dropdown">
                            <span class="sr-only">Toggle Dropdown</span>
                          </button>
                          <div class="dropdown-menu" role="menu">
                            <a class="dropdown-item" href="{{route('IRFinancial.updateFile',$post->id)}}">Edit</a>
                            <a class="dropdown-item delete-row" href="" id="delete-post-{{$post->id}}">Delete</a>
                          </div>
                      </td>

                     
                    </tr>
                    @endforeach
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>ID</th>
                      <th>Statement PDF</th>
                      <th>Year</th>
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

$('#example2').DataTable({
  "paging": true,
  "lengthChange": true,
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
      if (confirm("Are you sure you sure to delete this row?")) {
        window.location.href = "{{ route('IRFinancial.destroyFile', ':id') }}".replace(':id', postId);
      }
    });
  });
  

</script>

@endsection