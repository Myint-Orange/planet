@extends('layout.app')
@section('title') shareholder @endsection

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



 <section class="content">
  <div class="container-fluid">
  <div class="row">     
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title">Add Shareholder Information</h3>
          </div>
       
          <form action='{{route('shareholder.editPost')}}' method="post" enctype="multipart/form-data" id='regform'>
            @csrf
            <input type="hidden" name="post_id" value="{{$post->id}}">
            <div class="card-body">
              
              <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Shareholder Name Thai</label>
                      <input type="text" class="form-control" id="title" name="name_th" placeholder="Enter.." value="{{$post->titles[0]->title_th}}">
                    </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Shareholder Name English</label>
                    <input type="text" class="form-control" id="title" name="name_en" placeholder="Enter.." value="{{$post->titles[0]->title_th}}">
                  </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="exampleInputEmail1">Shareholder Name Chinese</label>
                  <input type="text" class="form-control" id="title" name="name_ch" placeholder="Enter.." value="{{$post->titles[0]->title_th}}">
                </div>
              </div>
            </div>

              <div class="row">
                  <div class="col-md-4">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Number Of Share Holder</label>
                        <input type="text" class="form-control" id="title" name="num_holder" placeholder="Enter.." oninput="formatNumber(this)" value="{{$post->titles[1]->title_th}}">

                      </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Shareholding Proportion(%)</label>
                      <input type="text" class="form-control" id="title" name="proportion" placeholder="Enter.." value="{{$post->titles[2]->title_th}}">
                    </div>
                </div>
                
              </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
              <a href="{{route('shareholder.index')}}"  class="btn btn-default">Exist</a>
            </div>
          </form>
        </div>
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
function formatNumber(input) {
    // Remove existing commas and non-numeric characters from the input value
    var value = input.value.replace(/,/g, '').replace(/\D/g, '');
  
    // Add commas as thousands separators
    var formattedValue = value.replace(/\B(?=(\d{3})+(?!\d))/g, ',');
  
    // Set the formatted value back to the input
    input.value = formattedValue;
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
      @endsection
@endsection


