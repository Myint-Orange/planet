@extends('layout.app')
@section('title') About Us @endsection
@section('contents')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">About Us</h1>
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
              <form action='{{route('aboutus.editImage')}}' method="post" enctype="multipart/form-data" id='regform'>
                @csrf
                <input type="hidden" name="group_id" value={{$group->id}}>
                <div class="row justify-content-center">
                  <img src="{{ asset('storage/groups/'.$group->imgname)}}" id="preview" class="img-fluid mx-auto" alt="..." style="height: 300px; width: 650px;">
                </div>

                <div class="row">
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Menu Title (English)</label>
                      <input type="text" name="menu_en" class="form-control" placeholder="Enter ..." value="{{$group->gpTitles[0]->title_en}}">
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Menu Title (Thai)</label>
                      <input type="text" name="menu_th" class="form-control" placeholder="Enter ..." value="{{$group->gpTitles[0]->title_th}}">
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Menu Title (Chinese)</label>
                      <input type="text" name="menu_ch" class="form-control" placeholder="Enter ..." value="{{$group->gpTitles[0]->title_ch}}">
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
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>{{count($group->types[0]->posts)}}</h3>
              <p>{{$group->types[0]->typeTitles[0]->title_en}}</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{route($group->types[0]->name.'.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>{{count($group->types[1]->posts)}}</h3>
              <p>{{$group->types[1]->typeTitles[0]->title_en}}</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{route($group->types[1]->name.'.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>{{count($group->types[3]->posts)}}</h3>
              <p>{{$group->types[2]->typeTitles[0]->title_en}}</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{route($group->types[2]->name.'.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
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

          <div class="small-box bg-secondary">
            <div class="inner">

              <h3>{{count($group->types[5]->posts)}}</h3>

              <p>Organizational Structure</p>
            </div>
            <a href="{{route('orgstructure.index')}}">
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
            </a>

            <a href="{{route('orgstructure.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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

        <div class="col-lg-3 col-6">

          <div class="small-box bg-pink">
            <div class="inner">
              <h3>{{count($group->types[7]->posts)}}</h3>
              <p>Pride And Award</p>
            </div>
            <a href="{{route('pride.index')}}">
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
            </a>

            <a href="{{route('pride.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>

        </div>
        <!-- ./col -->
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