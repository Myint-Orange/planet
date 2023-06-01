@extends('layout.app')
@section('title') Network @endsection
@section('css-place')
<link rel="stylesheet" href="{{asset('dist/css/custom.css')}}"> @endsection
@section('contents')
<div class="content-wrapper">
  <form action='{{route('corevalue.edit','ch')}}' method="post" enctype="multipart/form-data" id='regform'>
    @csrf
    <input type="hidden" name="post_id" value="{{$post->id}}">
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <h4>Profile Image For Clinic</h4>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-edit"></i>
                  Edit Clinic Profile Image
                </h3>
              </div>
              <div class="card-body">

                <input type="hidden" name="post_id" value="{{$post->id}}">
                <div class="row justify-content-center">
                  <img src="{{asset('storage/posts/'.$post->imgname)}}" class="img-fluid mx-auto" alt="..." style="height: 300px; width: 650px;" id="preview">
                </div>

                <div class="row justify-content-center">
                  <div class="col-md-4 ">
                    <div class="form-group">
                      <label>Create Date</label>
                      <input type="date" name="created_at" class="form-control" required value="{{ $post->created_at->format('Y-m-d') }}">
                    </div>
                  </div>
                </div>


                <div class="row justify-content-center">
                  <div class="col-md-4">
                    <div class="form-group">
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
          <div class="col-12">
            <h4>Add Corporate Values For Embryo Network</h4>
          </div>
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
                  <div class="tab-pane fade" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">


                    <div class="row">
                      <div class="col-sm-6">

                        <div class="form-group">
                          <label>Title (English)</label>
                          <input type="text" name="title_en" class="form-control" placeholder="Enter ..." required value="{{$value_en['title']}}">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>SubTitle (English)</label>
                          <input type="text" name="subTitle_en" class="form-control" placeholder="Enter ..." required value="{{$value_en['subTitle']}}">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="inputSubTitle">Content (English)</label>
                          <textarea id="compose-textarea" name="content_en" class="form-control" style="height: 120px" value="{{$value_en['content']}}" required> {{$value_en['content']}} </textarea>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12 col-sm-6">
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary" id="btn-mission">Save</button>
                          <a href="{{route('corevalue.index')}}" class="btn btn-default " id="btn-mission"> Exit </a>
                        </div>

                      </div>
                    </div>

  </form>
</div>
<div class="tab-pane fade show active" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">


  <div class="row">
    <div class="col-sm-6">

      <div class="form-group">
        <label>Title (Thai)</label>
        <input type="text" name="title_th" class="form-control" placeholder="Enter ..." required value="{{$value_th['title']}}">
      </div>
    </div>
    <div class="col-sm-6">
      <div class="form-group">
        <label>SubTitle (Thai)</label>
        <input type="text" name="subTitle_th" class="form-control" placeholder="Enter ..." required value="{{$value_th['subTitle']}}">
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-6">
      <div class="form-group">
        <label for="inputSubTitle">Content (Thai)</label>
        <textarea id="compose-textarea" name="content_th" class="form-control" style="height: 120px" required> {{$value_th['content']}}</textarea>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-12 col-sm-6">
      <div class="form-group">
        <button type="submit" class="btn btn-primary" id="btn-mission">Save</button>
        <a href="{{route('corevalue.index')}}" class="btn btn-default " id="btn-mission"> Exit </a>
      </div>

    </div>
  </div>

</div>
<div class="tab-pane fade" id="custom-tabs-one-messages" role="tabpanel" aria-labelledby="custom-tabs-one-messages-tab">


  <div class="row">
    <div class="col-sm-6">

      <div class="form-group">
        <label>Title (Chinese)</label>
        <input type="text" name="title_ch" class="form-control" placeholder="Enter ..." required value="{{$value_ch['title']}}">
      </div>
    </div>
    <div class="col-sm-6">
      <div class="form-group">
        <label>SubTitle (Chinese)</label>
        <input type="text" name="subTitle_ch" class="form-control" placeholder="Enter ..." required value="{{$value_ch['subTitle']}}">
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-6">
      <div class="form-group">
        <label for="inputSubTitle">Content (Chinese)</label>
        <textarea id="compose-textarea" name="content_ch" class="form-control" style="height: 120px" required value=""> {{$value_ch['content']}} </textarea>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-12 col-sm-6">
      <div class="form-group">
        <button type="submit" class="btn btn-primary" id="btn-mission">Save</button>
        <a href="{{route('corevalue.index')}}" class="btn btn-default " id="btn-mission"> Exit </a>
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