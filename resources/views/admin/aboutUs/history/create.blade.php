@extends('layout.app')
@section('title') History @endsection
@section('css-place')
<link rel="stylesheet" href="{{asset('dist/css/custom.css')}}"> @endsection
@section('contents')
<div class="content-wrapper">
  <form action='{{route('history.store')}}' method="post" enctype="multipart/form-data" id='regform'>
    @csrf
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="row">
            <div class="col-12">
              <h4>Add Clinic For Company History </h4>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-edit"></i>
                  Add Clinic Profile Image
                </h3>
              </div>
              <div class="card-body">

                <div class="row justify-content-center">
                  <img src="{{ asset('storage/img/default.png')}}" class="img-fluid mx-auto" alt="..." style="height: 300px; width: 650px;" id="preview">
                </div>


                <div class="row justify-content-center mt-3">
                  <div class="col-md-6 d-flex align-items-center">
                    <div class="custom-file mr-2">
                      <input type="file" class="custom-file-input" id="image" name="image" onchange="updateLabel()" style="padding: 10px;">
                      <label class="custom-file-label" for="image">Add Image For Clinic Profile</label>
                    </div>

                  </div>
                </div>


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
          <div class="card-body">
            <div class="card card-primary card-tabs">
              <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Add Clinic for History</a>
                  </li>


                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-one-tabContent">


                  <div class="tab-pane fade show active" id="custom-tabs-one-messages" role="tabpanel" aria-labelledby="custom-tabs-one-messages-tab">

                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Title (Thai)</label>
                          <input type="text" name="title_th" class="form-control" placeholder="Enter ...">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>SubTitle (Thai)</label>
                          <textarea name="subTitle_th" class="form-control summernote" style="height: 100px" required></textarea>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="inputSubTitle">Title (English)</label>
                          <input type="text" name="title_en" class="form-control" placeholder="Enter ...">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="inputSubTitle">SubTitle (English)</label>
                          <textarea name="subTitle_en" class="form-control summernote" style="height: 100px" required></textarea>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="inputSubTitle">Title (Chinese)</label>
                          <input type="text" name="title_ch" class="form-control" placeholder="Enter ...">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="inputSubTitle">SubTitle (Chinese)</label>
                          <textarea name="subTitle_ch" class="form-control summernote" style="height: 100px" required></textarea>
                        </div>
                      </div>
                    </div>


                  </div>
                </div>
                <div class="row">
                  <div class="col-12 col-sm-6">
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary" id="btn-mission">Save</button>
                      <a href="{{route('history.index')}}" class="btn btn-default " id="btn-mission"> Exit </a>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card -->
            </div>

          </div>
        </div>
      </div>
    </section>
  </form>
</div>

<script>
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



@endsection