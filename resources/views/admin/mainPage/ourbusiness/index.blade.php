@extends('layout.app')
@section('title') Main Page @endsection

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
             <h3 class="card-title">Our Business Panel</h3>
           </div>
           <div class="card-body">
            <div class="row"> 
              </div>
              <form action='{{route('ourBusiness.editOurBusiness')}}' method="post" enctype="multipart/form-data" id='regform'>
                @csrf  
                        <input type="hidden" name="type_id" value="{{$type->id}}">
                        <div class="row justify-content-center">

                          <img src="{{asset('storage/types/'.$type->imgname)}}" id="preview" class="img-fluid mx-auto" alt="..." style="height: 200px; width: 570px;">
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
                              <textarea id="compose-textarea" name="content_th" class="form-control" rows="5" cols="50">{{$type->typeTitles[2]->title_th}} </textarea>
                            </div>
                          </div>
                          <div class="col-md-4">
                              <div class="form-group">
                                <label for="inputTitle">Content English</label>
                                <textarea id="compose-textarea" name="content_en" class="form-control" rows="5" cols="50">{{$type->typeTitles[2]->title_en}}  </textarea>
                              </div>
                          </div>
                          <div class="col-md-4">
                                <div class="form-group">
                                  <label for="inputTitle">Content Chinese</label>
                                  <textarea id="compose-textarea" name="content_ch" class="form-control" rows="5" cols="50">{{$type->typeTitles[2]->title_ch}}  </textarea>
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
$('.dropdown-toggle').dropdown();});
const type = {!! json_encode($type)!!};
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
            // Add a click event listener to each "Delete" button
            $('.delete-row').click(function(event) {
                event.preventDefault();
                var postId = $(this).attr('id').replace('delete-post-', '');
                if (confirm("Are you sure you want to delete this row?")) {
                    // If the user clicks "OK", delete the row
                window.location.href = "{{ route('social.destroy', ':id') }}".replace(':id', postId);
                }
            });
            });






          
          </script>
      @endsection
@endsection


