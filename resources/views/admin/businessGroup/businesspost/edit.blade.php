@extends('layout.app')
@section('title') OurBusiness @endsection
@section('css-place')
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/ekko-lightbox/ekko-lightbox.css')}}">
<link rel="stylesheet" href="{{asset('plugins/summernote/summernote-bs4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/bs-stepper/css/bs-stepper.min.css')}}">
<link rel="stylesheet" href="{{asset('dist/css/custom.css')}}"> @endsection
@section('contents')
<div class="content-wrapper">

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="row">

        </div>
      </div>
      <form action="{{route('businesspost.edit')}}" method="post" enctype="multipart/form-data" id='regform'>
        @csrf
        <input type="hidden" name="type_id" value="{{$type->id}}">
        <input type="hidden" name="post_id" value="{{$post->id}}">
        <div class="col-md-12">
          <div class="card card-default">
            <div class="card-header">
              <h3 class="card-title">Create Post For Business</h3>
            </div>
            <div class="card-body p-0">
              <div class="bs-stepper">
                <div class="bs-stepper-header" role="tablist">
                  <!-- your steps here -->
                  <div class="step" data-target="#profile-part">
                    <button type="button" class="step-trigger" role="tab" aria-controls="logins-part" id="logins-part-trigger">
                      <span class="bs-stepper-circle">1</span>
                      <span class="bs-stepper-label">Add Cover Photo </span>
                    </button>
                  </div>
                  <div class="line"></div>
                  <div class="step" data-target="#title-part">
                    <button type="button" class="step-trigger" role="tab" aria-controls="information-part" id="information-part-trigger">
                      <span class="bs-stepper-circle">2</span>
                      <span class="bs-stepper-label">Add Title And SubTitle</span>
                    </button>
                  </div>
                  <div class="line"></div>
                  <div class="step" data-target="#content-part">
                    <button type="button" class="step-trigger" role="tab" aria-controls="information-part" id="information-part-trigger">
                      <span class="bs-stepper-circle">3</span>
                      <span class="bs-stepper-label">Add Content</span>
                    </button>
                  </div>

                </div>
                <div class="bs-stepper-content">
                  <!-- your steps content here -->
                  <div id="profile-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                    <div class="card-body">
                   
                    @if(isset($message))
                        <div class="message">{{ $message }}</div>
                    @endif
                      <div class="row justify-content-center">
                        <img src="{{ asset('storage/posts/'.$post->imgname)}}" class="img-fluid mx-auto" alt="..." style="height: 300px; width: 650px;" id="preview">
                      </div>
                      <div class="row justify-content-center mt-3">
                        <div class="col-md-6 d-flex align-items-center">
                          <div class="custom-file mr-2">
                            <input type="file" class="custom-file-input" id="image" name="image" onchange="updateLabel()" style="padding: 10px;">
                            <label class="custom-file-label" for="image">Choose Photo</label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-10">
                        <button type="button" class="btn btn-primary" onclick="stepper.previous()">Previous</button>
                        <button type="button" class="btn btn-primary" onclick="stepper.next()">Next</button>
                      </div>
                      <div class="col-sm-2">
                        <div class="form-group">
                          <a href="{{route('businesspost.index',$type->id)}}" class="btn btn-default btn-lg " id="btn-mission">Exit</a>
                        </div>
                      </div>
                    </div>

                  </div>
                  <div id="title-part" class="content" role="tabpanel" aria-labelledby="information-part-trigger">
                    <div class="form-group">
                      <label for="exampleInputFile">Add Title And SubTitle</label>
                      <div class="input-group">
                        <div class="card-body">
                          <div class="tab-content" id="custom-tabs-one-tabContent">
                            <div class="tab-pane fade show active" id="custom-tabs-one-messages" role="tabpanel" aria-labelledby="custom-tabs-one-messages-tab">
                              <div class="row">
                                <div class="col-sm-6">
                                  <div class="form-group">
                                    <label>Title (Thai)</label>
                                    <textarea name="title_th" class="form-control" required>{{$post->titles[0]->title_th}}</textarea>
                                  </div>
                                </div>

                                <div class="col-sm-6">
                                  <div class="form-group">
                                    <label>SubTitle (Thai)</label>
                                    <textarea name="subTitle_th" class="form-control" required>{{$post->titles[1]->title_th}}</textarea>
                                  </div>
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-sm-6">
                                  <div class="form-group">
                                    <label>Title (English)</label>
                                    <textarea name="title_en" class="form-control" required>{{$post->titles[0]->title_en}}</textarea>
                                  </div>
                                </div>
                                <div class="col-sm-6">
                                  <div class="form-group">
                                    <label>SubTitle (English)</label>
                                    <textarea name="subTitle_en" class="form-control" required>{{$post->titles[1]->title_en}}</textarea>
                                  </div>
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-sm-6">
                                  <div class="form-group">
                                    <label>Title (Chinese)</label>
                                    <textarea name="title_ch" class="form-control" required>{{$post->titles[0]->title_ch}}</textarea>
                                  </div>
                                </div>

                                <div class="col-sm-6">
                                  <div class="form-group">
                                    <label>SubTitle (Chinese)</label>
                                    <textarea name="subTitle_ch" class="form-control" required>{{$post->titles[1]->title_ch}}</textarea>
                                  </div>
                                </div>
                              </div>

                            </div>
                          </div>
                          <div class="row">

                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-10">
                        <button type="button" class="btn btn-primary" onclick="stepper.previous()">Previous</button>
                        <button type="button" class="btn btn-primary" onclick="stepper.next()">Next</button>
                      </div>
                      <div class="col-sm-2">
                        <div class="form-group">
                          <a href="{{route('businesspost.index',$type->id)}}" class="btn btn-default btn-lg " id="btn-mission">Exit</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div id="content-part" class="content" role="tabpanel" aria-labelledby="information-part-trigger">
                    <div class="form-group">
                      <label for="exampleInputFile">Add Activity Content</label>
                      <div class="input-group">
                        <div class="card-body">
                          <div class="tab-content" id="custom-tabs-one-tabContent">
                            <div class="tab-pane fade show active" id="custom-tabs-one-messages" role="tabpanel" aria-labelledby="custom-tabs-one-messages-tab">
                              <div class="row">
                                <div class="col-sm-12">
                                  <div class="form-group">
                                    <label>Content (Thai)</label>
                                    <textarea id="summernote1" name="content_th" class="form-control" required>{{$post->contents[0]->content_th}}</textarea>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-sm-12">
                                <div class="form-group">
                                  <label for="inputSubTitle">Content (English)</label>
                                  <textarea id="summernote2" name="content_en" class="form-control" required>{{$post->contents[0]->content_en}}</textarea>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-sm-12">
                                <div class="form-group">
                                  <label for="inputSubTitle">Content (Chinese)</label>
                                  <textarea id="summernote3" name="content_ch" class="form-control" required>{{$post->contents[0]->content_ch}}</textarea>
                                </div>
                              </div>
                            </div>

                          </div>
                          <div class="row">

                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-10">
                        <button type="button" class="btn btn-primary" onclick="stepper.previous()">Previous</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                      <div class="col-sm-2">
                        <div class="form-group">
                          <a href="{{route('businesspost.index',$type->id)}}" class="btn btn-default btn-lg " id="btn-mission">Exit</a>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>
            <!-- /.card-body -->

          </div>
          <!-- /.card -->
        </div>
      </form>
    </div>




  </section>




</div>
@section('js-place')
<script src="{{asset('plugins/bs-stepper/js/bs-stepper.min.js')}}"></script>
<script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
<script src="{{asset('plugins/ekko-lightbox/ekko-lightbox.min.js')}}"></script>
<script src="{{asset('plugins/filterizr/jquery.filterizr.min.js')}}"></script>

<script>
  $('#summernote3').summernote();
  $('#summernote1').summernote();
  $('#summernote2').summernote();
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
  $(function() {
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox({
        alwaysShowClose: true
      });
    });

    $('.filter-container').filterizr({
      gutterPixels: 3
    });
    $('.btn[data-filter]').on('click', function() {
      $('.btn[data-filter]').removeClass('active');
      $(this).addClass('active');
    });
  });
  document.addEventListener('DOMContentLoaded', function() {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
  });
  

  const videoInput = document.getElementById('video');
  const videoPreview = document.getElementById('video-preview');

  videoInput.addEventListener('change', () => {
    const file = videoInput.files[0];
    const url = URL.createObjectURL(file);
    videoPreview.setAttribute('src', url);
  });

  function previewYouTube() {
    console.log("Arrive");
    var inputTitle = document.getElementById('inputTitle');
    console.log("inputTitle=" + inputTitle);
    var videoPreview = document.getElementById('video-preview');

    var youtubePreview = document.getElementById('youtube-preview');
    var youtubePreviewContainer = document.getElementById('youtube-preview-container');
    var youtubeId = inputTitle.value;
    console.log("youtubeId=" + youtubeId);
    if (youtubeId !== '') {

      //videoPreview.style.display = 'none';
      youtubePreviewContainer.style.display = 'block';
      youtubePreview.src = youtubeId;
      console.log(youtubeId);
    } else {
      // If no valid YouTube ID was found, display the video preview instead
      videoPreview.style.display = 'block';
      youtubePreviewContainer.style.display = 'none';
    }
  }
</script>
@endsection


@endsection