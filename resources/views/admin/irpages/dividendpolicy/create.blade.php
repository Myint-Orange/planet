@extends('layout.app')
@section('title') shareholder @endsection

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
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">IR Dividen Policy Data Create Information</h3>
                            </div>
                            <form action='{{ route('dividend.store') }}' method="post" enctype="multipart/form-data"
                                id='regform'>
                                @csrf
                                @method('post')
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1"> Marking Date </label>
                                                <input type="date" class="form-control" id="markingdate"
                                                    name="markingdate" placeholder="Enter markingdate">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1"> Book Closing Date </label>
                                                <input type="date" class="form-control" id="bookclosingdate"
                                                    name="bookclosingdate" placeholder="Enter bookclosingdate...">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1"> Determining Date </label>
                                                <input type="date" class="form-control" id="determiningdate"
                                                    name="determiningdate" placeholder="Enter determiningdate..">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Payment date</label>
                                                <input type="date" class="form-control" id="paymentdate"
                                                    name="paymentdate" placeholder="Enter paymentdate..">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1"> Dividend per Share</label>
                                                <input type="date" class="form-control" id="dividendpershare"
                                                    name="dividendpershare" placeholder="Enter dividend per share...">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Unit</label>
                                                <input type="text" class="form-control" id="unit" name="unit"
                                                    placeholder="Enter unit..">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Turn Over Cycle From</label>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <input type="date" class="form-control" id="turnovercyclefrom"
                                                            name="turnovercyclefrom"
                                                            placeholder="Enter turnovercyclefrom..">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input type="date" class="form-control" id="turnovercycleto"
                                                            name="turnovercycleto" placeholder="Enter turnovercycleto..">
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Dividends From</label>
                                                    <input type="text" class="form-control" id="dividendsfrom"
                                                        name="dividendsfrom" placeholder="Enter dividendsfrom..">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <a href="{{ route('dividendpolicy.index') }}" class="btn btn-default">Exist</a>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </div>

@section('js-place')
    <script src="{{ asset('plugins/bs-stepper/js/bs-stepper.min.js') }}"></script>
    <script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('plugins/ekko-lightbox/ekko-lightbox.min.js') }}"></script>
    <script src="{{ asset('plugins/filterizr/jquery.filterizr.min.js') }}"></script>
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
