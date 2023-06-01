@extends('layout.app')
@section('title') About Us @endsection
@section('contents')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      
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
              Banner Image For IR Basic Information
              </h3>
            </div>

            <div class="card-body">
              <form action='{{route('IRBasicInfo.edit')}}' method="post" enctype="multipart/form-data" id='regform'>
                @csrf
                <input type="hidden" name="type_id" value={{$type->id}}>
                <div class="row justify-content-center">
                  <img src="{{ asset('storage/types/'.$type->imgname)}}" id="preview" class="img-fluid mx-auto" alt="..." style="height: 300px; width: 650px;">
                </div>
                <div class="row justify-content-center mt-3">
                  <div class="col-md-6 d-flex align-items-center">
                    <div class="custom-file mr-2">
                      <input type="file" class="custom-file-input" id="image" name="image" onchange="updateLabel('image','preview')" style="padding: 10px;">
                      <label class="custom-file-label" for="image">Add Image For IR Basic Informaiton</label>
                    </div>

                    <button type="submit" class="btn btn-primary" id="btn-mission">Save</button>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Banner Title (English)</label>
                      <input type="text" name="menu_en" class="form-control" placeholder="Enter ..." value="{{$type->typeTitles[0]->title_en}}">
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Banner Title (Thai)</label>
                      <input type="text" name="menu_th" class="form-control" placeholder="Enter ..." value="{{$type->typeTitles[0]->title_th}}">
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Banner Title (Chinese)</label>
                      <input type="text" name="menu_ch" class="form-control" placeholder="Enter ..." value="{{$type->typeTitles[0]->title_ch}}">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Sub Title (English)</label>
                      <input type="text" name="subTitle_en" class="form-control" placeholder="Enter ..." value="{{$type->typeTitles[1]->title_en}}">
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Sub Title (Thai)</label>
                      <input type="text" name="subTitle_th" class="form-control" placeholder="Enter ..." value="{{$type->typeTitles[1]->title_th}}">
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Sub Title (Chinese)</label>
                      <input type="text" name="subTitle_ch" class="form-control" placeholder="Enter ..." value="{{$type->typeTitles[1]->title_ch}}">
                    </div>
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
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
       
      
        <div class="col-lg-3 col-6">

          <div class="small-box bg-danger">
            <div class="inner">

              <h3>{{count($group->types[4]->posts)}}</h3>

              <p>{{$group->types[4]->typeTitles[0]->title_en}}</p>
            </div>
            <a href="{{route($group->types[4]->name.'.index')}}">
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
            </a>

            <a href="{{route($group->types[4]->name.'.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>

        </div>

    
        <div class="col-lg-3 col-6">

          <div class="small-box bg-orange">
            <div class="inner">
              <h3>{{count($group->types[6]->posts)}}</h3>
              <p>Company History</p>
            </div>
            <a href="{{route('history.index')}}">
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
            </a>

            <a href="{{route('history.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>

        </div>

    
      </div>

    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
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

@endsection