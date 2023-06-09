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
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">IR Credit Rating Information</h3>
                            </div>
                            <form action='{{ route('dividendpolicy.detailstore', ['id' => $post]) }}' method="post"
                                enctype="multipart/form-data" id='regform'>
                                @csrf
                                @method('POST')
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1"> Marking Date </label>
                                                <input type="date" class="form-control" id="markingdate"
                                                    name="markingdate" placeholder="Enter markingdate"
                                                    value="{{ $post->markingdate }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1"> Book Closing Date </label>
                                                <input type="date" class="form-control" id="bookclosingdate"
                                                    name="bookclosingdate" placeholder="Enter bookclosingdate..." value ="{{ $post->bookclosingdate }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1"> Determining Date </label>
                                                <input type="date" class="form-control" id="determiningdate"
                                                    name="determiningdate" placeholder="Enter determiningdate.." value ="{{ $post->determiningdate }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Payment date</label>
                                                <input type="date" class="form-control" id="paymentdate"
                                                    name="paymentdate" placeholder="Enter paymentdate.." value ="{{ $post->paymentdate }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1"> Dividend per Share</label>
                                                <input type="date" class="form-control" id="dividendpershare"
                                                    name="dividendpershare" placeholder="Enter dividend per share..." value ="{{ $post->dividendpershare }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Unit</label>
                                                <input type="text" class="form-control" id="unit" name="unit"
                                                    placeholder="Enter unit.." value ="{{ $post->unit }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Turn Over Cycle From</label>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <input type="date" class="form-control" id="turnovercyclefrom"
                                                            name="turnovercyclefrom"
                                                            placeholder="Enter turnovercyclefrom.." value ="{{ $post->turnovercyclefrom }}">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input type="date" class="form-control" id="turnovercycleto"
                                                            name="turnovercycleto" placeholder="Enter turnovercycleto.." value ="{{ $post->turnovercycleto }}">
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Dividends From</label>
                                                <input type="text" class="form-control" id="dividendsfrom"
                                                    name="dividendsfrom" placeholder="Enter dividendsfrom.." value="{{ $post->dividendsfrom }}">
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
@endsection
