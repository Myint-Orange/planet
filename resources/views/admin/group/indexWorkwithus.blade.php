@extends('layout.app')
@section('title') Work With Us @endsection
@section('contents')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0"> Work With Us</h1>
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
                Edit Work With Us Title and Group Photo
              </h3>
            </div>

            <div class="card-body">
              <form action='{{route('workwithus.editGroup')}}' method="post" enctype="multipart/form-data" id='regform'>
                @csrf
                <input type="hidden" name="group_id" value={{$group->id}}>
                <div class="row justify-content-center">
                  
                  <img src="{{ asset('storage/groups/'.$group->imgname)}}" id="preview" class="img-fluid mx-auto" alt="..." style="height: 300px; width: 650px;">
                </div>


                <div class="row justify-content-center mt-3">
                  <div class="col-md-6 d-flex align-items-center">
                    <div class="custom-file mr-2">
                      <input type="file" class="custom-file-input" id="image" name="image" onchange="updateLabel('image','preview')" style="padding: 10px;">
                      <label class="custom-file-label" for="image">Choose Image</label>
                    </div>

                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Title (Thai)</label>
                      <input type="text" name="title_th" class="form-control" placeholder="Enter ..." value="{{$group->gpTitles[0]->title_th}}">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>SubTitle (Thai)</label>
                      <input type="text" name="subTitle_th" class="form-control" placeholder="Enter ..." value="{{$group->gpTitles[1]->title_th}}">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Title (English)</label>
                      <input type="text" name="title_en" class="form-control" placeholder="Enter ..." value="{{$group->gpTitles[0]->title_en}}">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>SubTitle (English)</label>
                      <input type="text" name="subTitle_en" class="form-control" placeholder="Enter ..." value="{{$group->gpTitles[1]->title_en}}">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Title (Chinese)</label>
                      <input type="text" name="title_ch" class="form-control" placeholder="Enter ..." value="{{$group->gpTitles[0]->title_ch}}">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>SubTitle (Chinese)</label>
                      <input type="text" name="subTitle_ch" class="form-control" placeholder="Enter ..." value="{{$group->gpTitles[1]->title_ch}}">
                    </div>
                  </div>
                </div>
                <div class="row justify-content-center mt-3">
                  <div class="col-sm-12 d-flex align-items-center">
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
        {{-- <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">                
                <h3>{{count($group->types[0]->posts)}}</h3>
        <p>New And Activity</p>
      </div>
      <a href="{{route('activity.index')}}">
        <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>
      </a>
      <a href="{{route('activity.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
<div class="col-lg-3 col-6">
  <!-- small box -->
  <div class="small-box bg-success">
    <div class="inner">
      <h3>{{count($group->types[1]->posts)}}</h3>
      <p>Social Media</p>
    </div>
    <a href="{{route('social.index')}}">
      <div class="icon">
        <i class="ion ion-stats-bars"></i>
      </div>
    </a>
    <a href="{{route('social.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
  </div>
</div>
<div class="col-lg-3 col-6">
  <!-- small box -->
  <div class="small-box bg-yellow">
    <div class="inner">
      <h3>{{count($group->types[2]->posts)}}</h3>
      <p>Interesting Facts</p>
    </div>
    <a href="{{route('interest.index')}}">
      <div class="icon">
        <i class="ion ion-stats-bars"></i>
      </div>
    </a>
    <a href="{{route('interest.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
  </div>
</div> --}}

@foreach($group->types as $index => $type)
@php
$bgClasses = [
'bg-indigo',
'bg-success',
'bg-red',
'bg-green',
'bg-yellow',
'bg-blue',
];
$bgClass = $bgClasses[$index % count($bgClasses)];
@endphp
<div class="col-lg-3 col-6">
  <div class="small-box {{$bgClass}}">
    <div class="inner">
      <h3>{{count($type->posts)}}</h3>
      <p>{{ $type->typeTitles[0] ? $type->typeTitles[0]->title_en : 0 }}</p>
    </div>
    <a href="{{route($type->name.'.index')}}">
      <div class="icon">
        <i class="ion ion-stats-bars"></i>
      </div>
    </a>
    <a href="{{route($type->name.'.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
  </div>
</div>
@endforeach
{{-- <div class="col-lg-3 col-6">
      
        <div class="small-box bg-secondary">            
          <div class="inner">
            
            <h3>1</h3>

            <p>Contact For Job</p>
          </div>
          <a href="{{route('findjob.index')}}">
<div class="icon">
  <i class="ion ion-stats-bars"></i>
</div>
</a>

<a href="{{route('findjob.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
</div>

</div> --}}


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