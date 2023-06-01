@extends('layout.app')
@section('title') Social Media @endsection
@section('css-place')
<meta name="csrf-token" content="{{ csrf_token() }}">
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
    </div>
  </section>
  <section class="content">
    <div class="container-fluid">
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title">Welcome To Panel</h3>
        </div>
        <div class="card-body">
          <div class="row">
          </div>
          <form action='{{route('welcome.editWelcomeTo')}}' method="post" enctype="multipart/form-data" id='regform'>
            @csrf
            <input type="hidden" name="type_id" value="{{$type->id}}">
            <div class="row justify-content-center">
              <img src="{{asset('storage/types/'.$type->imgname)}}" id="preview" class="img-fluid mx-auto" alt="..." style="height: 300px; width: 650px;">
            </div>
            <div class="row justify-content-center mt-3">
              <div class="col-md-6 d-flex align-items-center">
                <div class="custom-file mr-2">
                  <input type="file" class="custom-file-input" id="image" name="image" onchange="updateLabel('image','preview')" style="padding: 10px;">
                  <label class="custom-file-label" for="image">Choose Image</label>
                </div>

              </div>
            </div>

            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="inputTitle">Title Thai</label>
                  <input type="text" class="form-control" name='title_th' id="inputTitle" placeholder="Enter Title..." value="{{$type->typeTitles[0]->title_th}}" required>
                </div>
              </div>
              <div class="col-md-4">
                <!-- /.form-group -->
                <div class="form-group">
                  <label for="inputTitle">Title English</label>
                  <input type="text" class="form-control" name='title_en' id="inputTitle" placeholder="Enter Title..." value="{{$type->typeTitles[0]->title_en}}" required>
                </div>
                <!-- /.form-group -->
              </div>
              <div class="col-md-4">
                <!-- /.form-group -->
                <div class="form-group">
                  <label for="inputTitle">Title Chinese</label>
                  <input type="text" class="form-control" name='title_ch' id="inputTitle" placeholder="Enter Title..." value="{{$type->typeTitles[0]->title_ch}}" required>
                </div>
                <!-- /.form-group -->
              </div>

            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="inputTitle">SubTitle Thai</label>
                  <textarea id="compose-textarea" name="subTitle_th" class="form-control">{{$type->typeTitles[1]->title_th}} </textarea>
                </div>
              </div>
              <div class="col-md-4">
                <!-- /.form-group -->
                <div class="form-group">
                  <label for="inputTitle">SubTitle English</label>
                  <textarea id="compose-textarea" name="subTitle_en" class="form-control">{{$type->typeTitles[1]->title_en}} </textarea>
                </div>
                <!-- /.form-group -->
              </div>
              <div class="col-md-4">
                <!-- /.form-group -->
                <div class="form-group">
                  <label for="inputTitle">SubTitle Chinese</label>
                  <textarea id="compose-textarea" name="subTitle_ch" class="form-control">{{$type->typeTitles[1]->title_ch}} </textarea>
                </div>
                <!-- /.form-group -->
              </div>

            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="inputTitle">Content Thai</label>
                  <textarea id="compose-textarea" name="content_th" class="form-control" rows="5" cols="50">{{$type->typeContents[0]->content_th}} </textarea>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="inputTitle">Content English</label>
                  <textarea id="compose-textarea" name="content_en" class="form-control" rows="5" cols="50">{{$type->typeContents[0]->content_en}} </textarea>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="inputTitle">Content Chinese</label>
                  <textarea id="compose-textarea" name="content_ch" class="form-control" rows="5" cols="50">{{$type->typeContents[0]->content_ch}} </textarea>
                </div>
              </div>

            </div>
            <div class="row">
              <div class="col-12 col-sm-6">
                <div class="form-group">
                  <button type="submit" class="btn btn-primary" id="btn-mission">Save</button>
                  <a href="{{route('mainpage.index')}}" class="btn btn-default " id="btn-mission">Exit</a>
                </div>
              </div>
            </div>
          </form>
        </div>
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
<script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
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
  


  function updateGalleryImages(input) {
    var gallery = document.getElementById('gallery');
    // gallery.innerHTML = ''; // clear existing gallery images

    if (input.files && input.files.length > 0) {
      for (var i = 0; i < input.files.length; i++) {
        var reader = new FileReader();
        reader.onload = (function(index) {
          return function(e) {
            var div = document.createElement('div');
            div.classList.add('col-sm-2');

            var a = document.createElement('a');
            a.setAttribute('href', e.target.result);
            a.setAttribute('data-toggle', 'lightbox');
            a.setAttribute('data-gallery', 'gallery');
            a.setAttribute('data-title', input.files[index].name);

            var img = document.createElement('img');
            img.width = 300; // set width to 100 pixels
            img.height = 200;
            img.setAttribute('src', e.target.result);
            img.setAttribute('alt', input.files[index].name);
            img.classList.add('img-fluid');
            img.classList.add('mb-2');
            img.classList.add('gallery-image');

            var removeBtn = document.createElement('button');
            var icon = document.createElement('i');
            icon.classList.add('fas', 'fa-trash');
            removeBtn.classList.add('btn', 'btn-danger', 'btn-sm', 'remove-btn');
            removeBtn.appendChild(icon);
            removeBtn.addEventListener('click', function() {
              div.remove();
            });

            a.appendChild(img);
            div.appendChild(a);
            div.appendChild(removeBtn);
            gallery.appendChild(div);
          };
        })(i);
        reader.readAsDataURL(input.files[i]);
      }
    }
  }


  const trashIcons = document.querySelectorAll('.fas.fa-trash');
  trashIcons.forEach(icon => {
    icon.addEventListener('click', () => {
      var imgId = $('i.fas.fa-trash').data('img-id');
      var postId = $('i.fas.fa-trash').data('post-id');
      //console.log(`Deleting post with ID ${postId}`);
      if (confirm("Are you sure you want to delete this photo?")) {
       // deleteImageFromAjax(imgId, icon);
        //  window.location.href = "{{ route('activity.destroyImage', [':imgId',':postId']) }}".replace(':imgId', imgId).replace(':postId', postId);
      }
    });
  });

 
</script>
@endsection
@endsection