@extends('layout.app')
@section('title') Our Business Group @endsection
@section('contents')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Our Business Group</h1>
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
                Edit Our Business Group Image
              </h3>
            </div>

            <div class="card-body">
              <form action='{{route('businessGroup.editImage')}}' method="post" enctype="multipart/form-data" id='regform'>
                @csrf
                <input type="hidden" name="group_id" value={{$group->id}}>
                <div class="row justify-content-center">
                  <img src="{{ asset('storage/groups/'.$group->imgname)}}" id="preview" class="img-fluid mx-auto" alt="..." style="height: 300px; width: 650px;">
                </div>
                <div class="row">
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Menu Title (English)</label>
                      <input type="text" name="menu_en" class="form-control" placeholder="Enter ..." value="{{$group->gpTitles[1]->title_en}}">
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Menu Title (Thai)</label>
                      <input type="text" name="menu_th" class="form-control" placeholder="Enter ..." value="{{$group->gpTitles[1]->title_th}}">
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Menu Title (Chinese)</label>
                      <input type="text" name="menu_ch" class="form-control" placeholder="Enter ..." value="{{$group->gpTitles[1]->title_ch}}">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Banner Title (English)</label>
                      <input type="text" name="title_en" class="form-control" placeholder="Enter ..." value="{{$group->gpTitles[0]->title_en}}">
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Banner Title (Thai)</label>
                      <input type="text" name="title_th" class="form-control" placeholder="Enter ..." value="{{$group->gpTitles[0]->title_th}}">
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Banner Title (Chinese)</label>
                      <input type="text" name="title_ch" class="form-control" placeholder="Enter ..." value="{{$group->gpTitles[0]->title_ch}}">
                    </div>
                  </div>
                </div>

                <div class="row justify-content-center mt-3">
                  <div class="col-md-6 d-flex align-items-center">
                    <div class="custom-file mr-2">
                      <input type="file" class="custom-file-input" id="image" name="image" onchange="updateLabel('image','preview')" style="padding: 10px;">
                      <label class="custom-file-label" for="image">Choose Image</label>
                    </div>
                    <button type="submit" class="btn btn-primary" id="btn-mission">Save</button>



                  </div>

                  <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box">
                      <span class="info-box-icon bg-info">
                        <a href="{{route('business.index')}}"><i class="ion ion-plus"></i></a>
                      </span>

                      <div class="info-box-content-center" style="text-align: center;">
                        <span class="info-box-text" style="text-align: center; padding:3px"><b>Create New Business</b> </span>
                        <span class="info-box-number">{{count($group->types)}}</span>
                      </div>
                      <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
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

        @foreach($group->types as $index => $type)
        @php
        $bgClasses = [
        'bg-indigo',
        'bg-blue',
        'bg-green',
        'bg-yellow',
        'bg-red',
        ];
        $bgClass = $bgClasses[$index % count($bgClasses)];
        @endphp

        <div class="col-lg-3 col-6">
          <div class="small-box {{$bgClass}}">
            <div class="inner">
              <h3>{{count($type->posts)}}</h3>
              <p>{{$type->typeTitles[0]->title_en}}</p>
            </div>
            <a href="{{route($type->name.'.index',$type->id)}}">
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
            </a>
            <a href="{{route($type->name.'.index',$type->id)}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        @endforeach
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