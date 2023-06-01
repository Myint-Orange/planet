@extends('layout.app')
@section('title') Network @endsection
@section('css-place')
<link rel="stylesheet" href="{{asset('dist/css/custom.css')}}"> @endsection
@section('contents')
<div class="content-wrapper">
  <form action="{{route('network.store')}}" method="post" enctype="multipart/form-data" id='regform'>
    @csrf
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <h4>Add Data For Embryo Network</h4>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-edit"></i>
                  Edit Profile Image
                </h3>
              </div>
              <div class="card-body">


                <div class="row justify-content-center">
                  <img src="{{ asset('storage/img/default.png')}}" class="img-fluid mx-auto" alt="..." style="height: 300px; width: 650px;" id="preview">
                </div>
                <div class="row justify-content-center mt-3">
                  <div class="col-md-6 d-flex align-items-center">
                    <div class="form-group">
                      <label>Date Of Operation (Thai)</label>
                      <input type="date" name="date_of_op" class="form-control" placeholder="Enter ..." required>
                    </div>

                  </div>
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

        <!-- ./row -->
        <div class="row">

        </div>
        <!-- ./row -->
        <div class="row">
          <div class="card-body">
            <div class="card card-primary card-tabs">
              <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Thai</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">English</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#custom-tabs-one-messages" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="false">Chinese</a>
                  </li>

                </ul>
              </div>
              <div class="card-body">

                <div class="tab-content" id="custom-tabs-one-tabContent">
                  <div class="tab-pane fade show active" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">



                    <div class="row">
                      <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                          <label>Company Name (Thai)</label>
                          <input type="text" name="company_name_th" class="form-control" placeholder="Enter ..." >
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Typ Of Business (Thai)</label>
                          <input type="text" name="business_type_th" class="form-control" placeholder="Enter ..." >
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Clinic Name (Thai)</label>
                          <input type="text" name="clinic_name_th" class="form-control" placeholder="Enter ..." >
                        </div>

                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Branch Name (Thai)</label>
                          <input type="text" name="branch_name_th" class="form-control" placeholder="Enter ..." >
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <!-- textarea -->
                        <div class="form-group">
                          <label>Website:: (Thai)</label>
                          <input type="text" name="website_th" class="form-control" placeholder="Enter ..." >
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Location:: (Thai)</label>
                          <input type="text" name="location_th" class="form-control" placeholder="Enter ..." >
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <!-- textarea -->
                        <div class="form-group">
                          <label>Telephone number:: (Thai)</label>
                          <input type="text" name="tel_number_th" class="form-control" placeholder="Enter ..." >
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Email:: (Thai)</label>
                          <input type="text" name="email_th" class="form-control" placeholder="Enter ..." >
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <!-- textarea -->
                        <div class="form-group">
                          <label>Office hours:: (Thai)</label>
                          <input type="text" name="office_hour_th" class="form-control" placeholder="Enter ..." >
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Area size:: (Thai)</label>
                          <input type="text" name="area_size_th" class="form-control" placeholder="Enter ..." >
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12 col-sm-6">
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary" id="btn-mission">Save</button>
                          <a href="{{route('network.index')}}" class="btn btn-default " id="btn-mission"> Exit </a>
                        </div>
                      </div>
                    </div>

                  </div>
                  <div class="tab-pane fade " id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">


                   
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Company Name (English)</label>
                          <input type="text" name="company_name_en" class="form-control" placeholder="Enter ..." >
                        </div>

                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Typ Of Business (English)</label>
                          <input type="text" name="business_type_en" class="form-control" placeholder="Enter ..." >
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <!-- textarea -->
                        <div class="form-group">
                          <label>Clinic Name (English)</label>
                          <input type="text" name="clinic_name_en" class="form-control" placeholder="Enter ..." >
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Branch Name (English)</label>
                          <input type="text" name="branch_name_en" class="form-control" placeholder="Enter ..." >
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <!-- textarea -->
                        <div class="form-group">
                          <label>Website:: (English)</label>
                          <input type="text" name="website_en" class="form-control" placeholder="Enter ..." >
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Location:: (English)</label>
                          <input type="text" name="location_en" class="form-control" placeholder="Enter ..." >
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <!-- textarea -->
                        <div class="form-group">
                          <label>Telephone number:: (English)</label>
                          <input type="text" name="tel_number_en" class="form-control" placeholder="Enter ..." >
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Email:: (English)</label>
                          <input type="text" name="email_en" class="form-control" placeholder="Enter ..." >
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <!-- textarea -->
                        <div class="form-group">
                          <label>Office hours:: (English)</label>
                          <input type="text" name="office_hour_en" class="form-control" placeholder="Enter ..." >
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Area size:: (English)</label>
                          <input type="text" name="area_size_en" class="form-control" placeholder="Enter ..." >
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12 col-sm-6">
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary" id="btn-mission">Save</button>
                          <a href="{{route('network.index')}}" class="btn btn-default " id="btn-mission"> Exit </a>
                        </div>
                      </div>
                    </div>

                  </div>
                  <div class="tab-pane fade " id="custom-tabs-one-messages" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">


                    
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Company Name (Chinese)</label>
                          <input type="text" name="company_name_ch" class="form-control" placeholder="Enter ..." >
                        </div>
                        <!-- text input -->
                      
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Typ Of Business (Chinese)</label>
                          <input type="text" name="business_type_ch" class="form-control" placeholder="Enter ..." >
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <!-- textarea -->
                        <div class="form-group">
                          <label>Clinic Name (Chinese)</label>
                          <input type="text" name="clinic_name_ch" class="form-control" placeholder="Enter ..." >
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Branch Name (Chinese)</label>
                          <input type="text" name="branch_name_ch" class="form-control" placeholder="Enter ..." >
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <!-- textarea -->
                        <div class="form-group">
                          <label>Website:: (Chinese)</label>
                          <input type="text" name="website_ch" class="form-control" placeholder="Enter ..." >
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Location:: (Chinese)</label>
                          <input type="text" name="location_ch" class="form-control" placeholder="Enter ..." >
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <!-- textarea -->
                        <div class="form-group">
                          <label>Telephone number:: (Chinese)</label>
                          <input type="text" name="tel_number_ch" class="form-control" placeholder="Enter ..." >
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Email:: (Chinese)</label>
                          <input type="text" name="email_ch" class="form-control" placeholder="Enter ..." >
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <!-- textarea -->
                        <div class="form-group">
                          <label>Office hours:: (Chinese)</label>
                          <input type="text" name="office_hour_ch" class="form-control" placeholder="Enter ..." >
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Area size:: (Chinese)</label>
                          <input type="text" name="area_size_ch" class="form-control" placeholder="Enter ..." >
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12 col-sm-6">
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary" id="btn-mission">Save</button>
                          <a href="{{route('network.index')}}" class="btn btn-default " id="btn-mission"> Exit </a>
                        </div>
                      </div>
                    </div>

                  </div>



                </div>

              </div>
              <!-- /.card -->
            </div>
          </div>


        </div>
        <!-- /.card -->
      </div>
      <!-- /.container-fluid -->
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