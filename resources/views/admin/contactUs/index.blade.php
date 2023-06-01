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
             <h3 class="card-title">Company Address</h3>
           </div>
           <div class="card-body">
            <div class="row"> 
              </div>
              <form action='{{route('contactus.editAddress')}}' method="post" enctype="multipart/form-data" id='regform'>
                @csrf    
                      <input type="hidden" name="type_id" value="{{$typeAddress->id}}">
                        <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="inputTitle">Company Name Thai</label>
                              <input type="text" class="form-control" name='name_th' id="inputTitle" placeholder="Enter Title..." value="{{$typeAddress->typeTitles[0]->title_th}}" required>
                           </div>
                          </div>
                          <div class="col-md-4">
                              <div class="form-group">
                                <label for="inputTitle">Company Name English</label>
                                <input type="text" class="form-control" name='name_en' id="inputTitle" placeholder="Enter Title..." value="{{$typeAddress->typeTitles[0]->title_en}}" required>
                              </div>
                          </div>
                          <div class="col-md-4">
                                <div class="form-group">
                                  <label for="inputTitle">Company Name Chinese</label>
                                  <input type="text" class="form-control" name='name_ch' id="inputTitle" placeholder="Enter Title..." value="{{$typeAddress->typeTitles[0]->title_ch}}" required>
                                </div>
                            </div>
                        </div> 
                        <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="inputTitle">Company Address Thai</label>
                              <textarea  name="address_th" class="form-control"required  >{{$typeAddress->typeTitles[1]->title_th}}</textarea>
                           </div>
                          </div>
                          <div class="col-md-4">
                              <div class="form-group">
                                <label for="inputTitle">Company Address English</label>
                                <textarea  name="address_en" class="form-control"required  >{{$typeAddress->typeTitles[1]->title_en}}</textarea>
                              </div>
                          </div>
                          <div class="col-md-4">
                                <div class="form-group">
                                  <label for="inputTitle">Company Address Chinese</label>
                                  <textarea  name="address_ch" class="form-control"required  >{{$typeAddress->typeTitles[1]->title_ch}}</textarea>
                                </div>
                            </div>
                        </div> 
                        <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="inputTitle">Telephone</label>
                              <input type="text" class="form-control" name='telephone' id="inputTitle" placeholder="Enter Telephone..." value="{{$typeAddress->typeTitles[2]->title_en}}" required>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="inputTitle">Email</label>
                              <input type="text" class="form-control" name='email' id="inputTitle" placeholder="Enter Email..." value="{{$typeAddress->typeTitles[3]->title_en}}" required>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="inputTitle">Link Google Map</label>
                              <input type="text" class="form-control" name='latlong' id="inputTitle" placeholder="Link Google Map..." value="{{$typeAddress->typeTitles[4]->title_en}}" required>
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

</section>

 
 <div class="row">
    <div class="col-md-6">
      <section class="content">
        <div class="container-fluid">
          <div class="card card-default">
                <div class="card-header">
                  <h3 class="card-title">Social Media Link</h3>
                </div>
                <div class="card-body">
                  <div class="row"> 
                    </div>
                    <form action='{{route('contactus.editFollowUs')}}' method="post" enctype="multipart/form-data" id='regform'>
                      @csrf    
                            <input type="hidden" name="type_id" value="{{$typeFollowUs->id}}">
                              <div class="row">
                                <div class="col-md-1">
                                  <i class="fab fa-facebook  fa-2x"></i>
                                </div>
                                <div class="col-md-11">
                                  <div class="form-group">                                    
                                    <input type="text" class="form-control" name='facebook' id="inputTitle" placeholder="Enter Title..." value="{{$typeFollowUs->typeTitles[0]->title_th}}" required>
                                </div>
                                </div>
                                
                              </div> 
                              <div class="row">
                                <div class="col-md-1">
                                  <i class="fab fa-instagram  fa-2x"></i></label>
                                </div>
                                <div class="col-md-11">
                                  <div class="form-group">
                                    <input type="text" class="form-control" name='ig' id="inputTitle" placeholder="Enter Telephone..." value="{{$typeFollowUs->typeTitles[1]->title_en}}" required>
                                </div>
                                </div>
                                
                              </div> 
                              <div class="row">
                                <div class="col-md-1">
                                  <i class="fab fa-youtube  fa-2x" aria-hidden="true"></i>
                                </div>
                                <div class="col-md-11">
                                  <div class="form-group">
                                    <input type="text" class="form-control" name='youtube' id="inputTitle" placeholder="Enter Telephone..." value="{{$typeFollowUs->typeTitles[2]->title_en}}" required>
                                  </div>
                                </div>
                              </div> 
                              <div class="row">
                                <div class="col-md-1">
                                  <i class="fab fa-twitter fa-2x" aria-hidden="true"></i>
                                </div>
                                <div class="col-md-11">
                                  <div class="form-group">
                                  
                                    <input type="text" class="form-control" name='twitter' id="inputTitle" placeholder="Enter Telephone..." value="{{$typeFollowUs->typeTitles[3]->title_en}}" required>
                                  </div>
                                </div>
                              </div> 
                              <div class="row">
                                <div class="col-md-1">
                                </label><i class="fab fa-line fa-2x"></i>
                                </div>
                                <div class="col-md-11">
                                  <div class="form-group">
                                     
                                    <input type="text" class="form-control" name='line' id="inputTitle" placeholder="Enter Telephone..." value="{{$typeFollowUs->typeTitles[4]->title_en}}" required>
                                  </div>
                                </div>
                              </div> 
                              <div class="row">
                                <div class="col-12 col-sm-12">
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
    </div>

    <div class="col-md-6">
      <section class="content">
        <div class="container-fluid">
          <div class="card card-default">
                <div class="card-header">
                  <h3 class="card-title">HOW TO GET THERE</h3>
                </div>
                <div class="card-body">
                  <div class="row"> 
                    </div>
                    <form action='{{route('contactus.editGetThere')}}' method="post" enctype="multipart/form-data" id='regform'>
                      @csrf    
                            <input type="hidden" name="type_id" value="{{$typeGetThere->id}}">
                              <div class="row">
                                <div class="col-md-2">
                                 BTS
                                </div>
                                <div class="col-md-10">
                                  <div class="form-group">                                    
                                    <input type="text" class="form-control" name='bts' id="inputTitle" placeholder="Enter Title..." value="{{$typeGetThere->typeTitles[0]->title_en}}" required>
                                </div>
                                </div>
                                
                              </div> 
                              <div class="row">
                                <div class="col-md-2">
                                  BUS
                                </div>
                                <div class="col-md-10">
                                  <div class="form-group">                                    
                                    <input type="text" class="form-control" name='bus' id="inputTitle" placeholder="Enter Title..." value="{{$typeGetThere->typeTitles[1]->title_en}}" required>
                                </div>
                                </div>
                                
                              </div> 
                               <div class="row">
                                <div class="col-12 col-sm-12">
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
    </div>
 </div>
 
 



 


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
$('.dropdown-toggle').dropdown();});

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


