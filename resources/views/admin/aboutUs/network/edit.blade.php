@extends('layout.app')
@section('title') Network @endsection
@section('css-place')
<link rel="stylesheet" href="{{asset('dist/css/custom.css')}}"> @endsection
@section('contents')
<div class="content-wrapper">
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <h4>Edit Information Image For Network</h4>
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
              <form action="{{route('network.editImage')}}" method="post" enctype="multipart/form-data" id='regform'>
                @csrf
                <input type="hidden" name="post_id" value="{{$post->id}}">
                <div class="row justify-content-center">
                  <img src="{{ asset('storage/posts/'.$post->imgname)}}" class="img-fluid mx-auto" alt="..." style="height: 300px; width: 650px;" id="preview">
                </div>
                       
                <div class="row justify-content-center mt-3">
                  <div class="col-md-6 d-flex align-items-center">
                     <div class="form-group">
                          <label>Date Of Operation</label>
                          <input type="date" name="date_of_op" class="form-control" placeholder="Enter ..." required value="{{ $post->created_at->format('Y-m-d') }}">
                        </div>
                    
                  </div>
                </div>

                <div class="row justify-content-center mt-3">
                  <div class="col-md-6 d-flex align-items-center">
                    <div class="custom-file mr-2">
                      <input type="file" class="custom-file-input" id="image" name="image" onchange="updateLabel()" style="padding: 10px;">
                      <label class="custom-file-label" for="image">Add Profile</label>
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

      <!-- ./row -->
     
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
                <div class="tab-pane fade" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                  <form action="{{route('network.edit','en')}}" method="post" enctype="multipart/form-data" id='regform'>
                    @csrf
                    <input type="hidden" name="post_id" value="{{$post->id}}">
                   
                    <div class="row">
                      <div class="col-sm-6">
                            <!-- text input -->
                        <div class="form-group">
                          <label>Company Name (English)</label>
                          <input type="text" name="company_name" class="form-control" placeholder="Enter ..." value="{{$clinic_en['company_name']}}">
                        </div>
                       
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Typ Of Business (English)</label>
                          <input type="text" name="business_type" class="form-control" placeholder="Enter ..." value="{{$clinic_en['business_type']}}">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <!-- textarea --> <div class="form-group">
                          <label>Clinic Name (English)</label>
                          <input type="text" name="clinic_name" class="form-control" placeholder="Enter ..." value="{{$clinic_en['clinic_name']}}">
                        </div>
                       
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Branch Name (English)</label>
                          <input type="text" name="branch_name" class="form-control" placeholder="Enter ..."  value="{{$clinic_en['branch_name']}}">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <!-- textarea -->
                        <div class="form-group">
                          <label>Website:: (English)</label>
                          <input type="text" name="website" class="form-control" placeholder="Enter ..."  value="{{$clinic_en['website']}}">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Location:: (English)</label>
                          <input type="text" name="location" class="form-control" placeholder="Enter ..."  value="{{$clinic_en['location']}}">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <!-- textarea -->
                        <div class="form-group">
                          <label>Telephone number:: (English)</label>
                          <input type="text" name="tel_number" class="form-control" placeholder="Enter ..."  value="{{$clinic_en['tel_number']}}">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Email:: (English)</label>
                          <input type="text" name="email" class="form-control" placeholder="Enter ..."  value="{{$clinic_en['email']}}">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <!-- textarea -->
                        <div class="form-group">
                          <label>Office hours:: (English)</label>
                          <input type="text" name="office_hour" class="form-control" placeholder="Enter ..."  value="{{$clinic_en['office_hour']}}">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Area size:: (English)</label>
                          <input type="text" name="area_size" class="form-control" placeholder="Enter ..."  value="{{$clinic_en['area_size']}}">
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

                  </form>
                </div>
                <div class="tab-pane fade show active" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                  <form action='{{route('network.edit','th')}}' method="post" enctype="multipart/form-data" id='regform'>
                    @csrf
                    <input type="hidden" name="post_id" value="{{$post->id}}">
                    
                    <div class="row">
                      <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                          <label>Company Name (Thai)</label>
                          <input type="text" name="company_name" class="form-control" placeholder="Enter ..." value="{{$clinic_th['company_name']}}" required>
                        </div>
                       
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Typ Of Business (Thai)</label>
                          <input type="text" name="business_type" class="form-control" placeholder="Enter ..." required value="{{$clinic_th['business_type']}}">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                         <div class="form-group">
                            <label>Clinic Name (Thai)</label>
                            <input type="text" name="clinic_name" class="form-control" placeholder="Enter ..." required value="{{$clinic_th['clinic_name']}}">
                          </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Branch Name (Thai)</label>
                          <input type="text" name="branch_name" class="form-control" placeholder="Enter ..." required value="{{$clinic_th['branch_name']}}">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <!-- textarea -->
                        <div class="form-group">
                          <label>Website:: (Thai)</label>
                          <input type="text" name="website" class="form-control" placeholder="Enter ..." required value="{{$clinic_th['website']}}">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Location:: (Thai)</label>
                          <input type="text" name="location" class="form-control" placeholder="Enter ..." required value="{{$clinic_th['location']}}">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <!-- textarea -->
                        <div class="form-group">
                          <label>Telephone number:: (Thai)</label>
                          <input type="text" name="tel_number" class="form-control" placeholder="Enter ..." required value="{{$clinic_th['tel_number']}}">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Email:: (Thai)</label>
                          <input type="email" name="email" class="form-control" placeholder="Enter ..." required value="{{$clinic_th['email']}}">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <!-- textarea -->
                        <div class="form-group">
                          <label>Office hours:: (Thai)</label>
                          <input type="text" name="office_hour" class="form-control" placeholder="Enter ..." required value="{{$clinic_th['office_hour']}}">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Area size:: (Thai)</label>
                          <input type="text" name="area_size" class="form-control" placeholder="Enter ..." required value="{{$clinic_th['area_size']}}">
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

                  </form>
                </div>
                <div class="tab-pane fade" id="custom-tabs-one-messages" role="tabpanel" aria-labelledby="custom-tabs-one-messages-tab">
                  <form action='{{route('network.edit','ch')}}' method="post" enctype="multipart/form-data" id='regform'>
                    @csrf
                    <input type="hidden" name="post_id" value="{{$post->id}}">
                    
                    <div class="row">
                      <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                          <label>Company Name (Chinese)</label>
                          <input type="text" name="company_name" class="form-control" placeholder="Enter ..." value="{{$clinic_ch['company_name']}}" required>
                        </div>
                      
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Typ Of Business (Chinese)</label>
                          <input type="text" name="business_type" class="form-control" placeholder="Enter ..." required value="{{$clinic_ch['business_type']}}">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <!-- textarea -->
                        <div class="form-group">
                          <label>Clinic Name (Chinese)</label>
                          <input type="text" name="clinic_name" class="form-control" placeholder="Enter ..." required value="{{$clinic_ch['clinic_name']}}">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Branch Name (Chinese)</label>
                          <input type="text" name="branch_name" class="form-control" placeholder="Enter ..." required value="{{$clinic_ch['branch_name']}}">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <!-- textarea -->
                        <div class="form-group">
                          <label>Website:: (Chinese)</label>
                          <input type="text" name="website" class="form-control" placeholder="Enter ..." required value="{{$clinic_ch['website']}}">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Location:: (chinese)</label>
                          <input type="text" name="location" class="form-control" placeholder="Enter ..." required value="{{$clinic_ch['location']}}">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <!-- textarea -->
                        <div class="form-group">
                          <label>Telephone number:: (Chinese)</label>
                          <input type="text" name="tel_number" class="form-control" placeholder="Enter ..." required value="{{$clinic_ch['tel_number']}}">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Email:: (Chinese)</label>
                          <input type="text" name="email" class="form-control" placeholder="Enter ..." required value="{{$clinic_ch['email']}}">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <!-- textarea -->
                        <div class="form-group">
                          <label>Office hours:: (Chinese)</label>
                          <input type="text" name="office_hour" class="form-control" placeholder="Enter ..." required value="{{$clinic_ch['office_hour']}}">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Area size:: (Chinese)</label>
                          <input type="text" name="area_size" class="form-control" placeholder="Enter ..." required value="{{$clinic_ch['area_size']}}">
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


                  </form>
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