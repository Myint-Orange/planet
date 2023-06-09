@extends('layout.app')
@section('title') IR Contact Us @endsection
@section('contents')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">IR Contact Us</h1>
        </div><!-- /.col -->

      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <section class="content">
    <div class="container-fluid">

      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">
                <i class="fas fa-edit"></i>
                Edit About Us Image
              </h3>
            </div>

            <div class="card-body">
              @if ($type) 
              <form action='{{route('contact.editBanner')}}' method="post" enctype="multipart/form-data" id='regform'>
                @csrf
                <div class="row justify-content-center">
                  <input type="hidden" name="id" value="{{$type->id}}"/>
                  <img src="{{ asset('/images/'.$type->image)}}" id="previewd" class="img-fluid mx-auto" alt="..." style="height: 300px; width: 650px;">
                </div>
                <div class="row">
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Menu Title (English)</label>
                      <input type="text" name="menu_en" class="form-control" placeholder="Enter ..." value="{{$type->name_en}}">
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Menu Title (Thai)</label>
                      <input type="text" name="menu_th" class="form-control" placeholder="Enter ..." value="{{$type->name_th}}">
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Menu Title (Chinese)</label>
                      <input type="text" name="menu_ch" class="form-control" placeholder="Enter ..." value="{{$type->name_ch}}">
                    </div>
                  </div>
                </div>
                <div class="row justify-content-center mt-3">
                  <div class="col-md-6 d-flex align-items-center">
                    <div class="custom-file mr-2">
                      <input type="file" class="custom-file-input" id="image" name="image" onchange="updateLabel('image','preview')" style="padding: 10px;">
                      <label class="custom-file-label" for="image">Add Image For About Us</label>
                    </div>

                    <button type="submit" class="btn btn-primary" id="btn-mission">Save</button>
                  </div>
                </div>


              </form>

              @else
              <form action='{{route('contact.store')}}' method="post" enctype="multipart/form-data" id='regform'>
                @csrf
                <div class="row justify-content-center">
                  <img src="{{ asset('storage/img/default.png')}}"  id="preview" class="img-fluid mx-auto" alt="..." style="height: 300px; width: 650px;">
                </div>
                <div class="row">
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Banner Title (English)</label>
                      <input type="text" name="menu_en" class="form-control" placeholder="Enter ..." value="">
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Banner Title (Thai)</label>
                      <input type="text" name="menu_th" class="form-control" placeholder="Enter ..." value="">
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Banner Title (Chinese)</label>
                      <input type="text" name="menu_ch" class="form-control" placeholder="Enter ..." value="">
                    </div>
                  </div>
                </div>

                <div class="row justify-content-center mt-3">
                  <div class="col-md-6 d-flex align-items-center">
                    <div class="custom-file mr-2">
                      <input type="file" class="custom-file-input" id="image" name="image" onchange="updateLabel('image','preview')" style="padding: 10px;">
                      <label class="custom-file-label" for="image">Add Image For ShareHolderBanner</label>
                    </div>
                    <button type="submit" class="btn btn-primary" id="btn-mission">Save</button>
                  </div>
                </div>
              </form>

              @endif
            
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- ./row -->

      <!-- /.card -->
    </div>
  </section>
  <section class="content">
    <div class="container-fluid">

      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">
                <i class="fas fa-edit"></i>
                Contact Information
              </h3>
            </div>

            <div class="card-body">
              @if ($contactInformation) 
              <form action='{{route('contact.detailedit')}}' method="post" enctype="multipart/form-data" id='regform'>
                @csrf
                @method('POST')
                <div class="row justify-content-center">

                  <input type="hidden" name="id" value="{{ $contactInformation->id }}"/>
                  <img src="{{ asset('/images/'.$contactInformation->image)}}"  id="preview" class="img-fluid mx-auto" alt="..." style="height: 300px; width: 650px;">
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label> Title </label>
                      <input type="text" name="title" class="form-control" placeholder="Enter Title" value="{{ $contactInformation->title }}">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>SubTitle</label>
                      <input type="text" name="subtitle" class="form-control" placeholder="Enter Subtitle" value="{{ $contactInformation->subtitle }}">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Phone Number</label>
                      <input type="text" name="phone" class="form-control" placeholder="Enter Phone Number" value="{{ $contactInformation->phone }}">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Email</label>
                      <input type="email" name="email" class="form-control" placeholder="Enter Email" value="{{ $contactInformation->email }}">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Address</label>
                      <input type="text" name="address" class="form-control" placeholder="Enter Address" value="{{ $contactInformation->address }}">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Location </label>
                      <input type="url" name="location" class="form-control" placeholder="Enter Location" value="{{ $contactInformation->locationmap }}">
                    </div>
                  </div>
                </div>
                <div class="row justify-content-center mt-3">
                  <div class="col-md-6 d-flex align-items-center">
                    <div class="custom-file mr-2">
                      <input type="file" class="custom-file-input" id="contactimage" name="image" onchange="updateLabelcontact('contactimage','preview')" style="padding: 10px;">
                      <label class="custom-file-label" for="image">Add Image For ShareHolderBanner</label>
                    </div>
                    <button type="submit" class="btn btn-primary" id="btn-mission">Save</button>
                  </div>
                </div>
              </form>
              @else
              <form action='{{route('contact.detailstore')}}' method="post" enctype="multipart/form-data" id='regform'>
                @csrf
                <div class="row justify-content-center">
                  <img src="{{ asset('storage/img/default.png')}}"  id="preview" class="img-fluid mx-auto" alt="..." style="height: 300px; width: 650px;">
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label> Title </label>
                      <input type="text" name="title" class="form-control" placeholder="Enter Title" value="">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>SubTitle</label>
                      <input type="text" name="subtitle" class="form-control" placeholder="Enter Subtitle" value="">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Phone Number</label>
                      <input type="text" name="phone" class="form-control" placeholder="Enter Phone Number" value="">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Email</label>
                      <input type="email" name="email" class="form-control" placeholder="Enter Email" value="">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Address</label>
                      <input type="text" name="address" class="form-control" placeholder="Enter Address" value="">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Location </label>
                      <input type="url" name="location" class="form-control" placeholder="Enter Location" value="">
                    </div>
                  </div>
                </div>
                <div class="row justify-content-center mt-3">
                  <div class="col-md-6 d-flex align-items-center">
                    <div class="custom-file mr-2">
                      <input type="file" class="custom-file-input" id="contactimage" name="image" onchange="updateLabelcontact('contactimage','preview')" style="padding: 10px;">
                      <label class="custom-file-label" for="image">Add Image For ShareHolderBanner</label>
                    </div>
                    <button type="submit" class="btn btn-primary" id="btn-mission">Save</button>
                  </div>
                </div>
              </form>

              @endif
            
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- ./row -->

      <!-- /.card -->
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
  function updateLabelcontact(inputId, previewId) {
    var input = document.getElementById(inputId);
    var previewd = document.getElementById(previewId);
    var file = input.files[0];
    var reader = new FileReader();

    reader.onload = function(e) {
      previewd.src = e.target.result;
    };

    reader.readAsDataURL(file);
  }
</script>

@endsection