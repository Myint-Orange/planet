@extends('layout.app')
@section('title')
    shareholder
@endsection

@section('css-place')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-9r1xRa+0dCx6qKcIRyVfEZ1VQH/10p+9f7rLD/v6XvI0U7Pl90GK+vA2LIsXqbZfuFzJ+F8sz3gPSJWz5F+VQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/custom.css') }}">
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



        {{-- <section class="content">
  <div class="container-fluid">
  <div class="row">     
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title">Add City Information</h3>
          </div>
       
          <form action='{{ route('City.update',['City' => $post]) }}' method="post" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <input type="hidden" name="post_id" value="{{$post->id}}">
            <div class="card-body">
              <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                      <label for="exampleInputEmail1">City Name </label>
                      <input type="text" class="form-control" id="name" name="name" placeholder="Enter Your City Name" value="{{$post->name}}">
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
 </section> --}}


        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">IR Credit Rating Information</h3>
                            </div>
                             <form action='{{ route('creditrating.detailstore', ['id' => $post]) }}' method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1"> Credit Type </label>
                                                    <input type="text" class="form-control" id="credit_type"
                                                        name="credit_type" value="{{ $post->credit_type }}"
                                                        placeholder="Enter credit type..">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1"> Rating Agency </label>
                                                    <input type="text" class="form-control" id="rating_agency"
                                                        name="rating_agency" value="{{ $post->rating_agency }}"
                                                        placeholder="Enter Rating Agency...">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1"> Credit Rating </label>
                                                    <input type="text" class="form-control" id="credit_rating"
                                                        name="credit_rating" value="{{ $post->credit_rating }}"
                                                        placeholder="Enter credit rating..">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1"> Rank Trend</label>
                                                    <input type="text" class="form-control" id="rank_trend"
                                                        name="rank_trend" value="{{ $post->rank_trend }}"
                                                        placeholder="Enter Rank Trend...">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1"> Issue Date</label>
                                                    <input type="date" class="form-control" id="issue_date"
                                                        name="issue_date" value="{{ $post->issue_date }}"
                                                        placeholder="Enter Issue Date...">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1"> PDF </label>
                                                    <input type="file" class="form-control" id="pdflink" name="pdflink"
                                                        value="{{ $post->pdflink }}"
                                                        placeholder="Please Select PDF File..">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                            <a href="{{ route('creditrating.index') }}" class="btn btn-default">Exist</a>
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
