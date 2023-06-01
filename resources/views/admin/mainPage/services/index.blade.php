@extends('layout.app')
@section('title') Welcome Post @endsection
@section('css-place')
<meta name="csrf-token" content="{{ csrf_token() }}">
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
      <form action='{{route('service.servicesEdit')}}' method="post" enctype="multipart/form-data" id='regform'>
        @csrf
        <input type="hidden" name="type_id" value="{{$type->id}}">
        <div class="col-md-12">
          <div class="card card-default">
            <div class="card-header">
              <h3 class="card-title">Create Welcome Page Service Vedio</h3>
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
                  <div class="step" data-target="#gallery-part">
                    <button type="button" class="step-trigger" role="tab" aria-controls="information-part" id="information-part-trigger">
                      <span class="bs-stepper-circle">2</span>
                      <span class="bs-stepper-label">Add Vedio File</span>
                    </button>
                  </div>
                </div>
                <div class="bs-stepper-content">

                  <div id="profile-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                    <div class="card-body">
                      <div class="row justify-content-center">
                        <img src="{{asset('storage/types/'.$type->imgname)}}" class="img-fluid mx-auto" alt="..." style="height: 300px; width: 650px;" id="preview">
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
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="inputTitle">Title Thai</label>
                          <textarea id="compose-textarea" name="title_th" class="form-control">{{$type->typeTitles[0]->title_th}} </textarea>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="inputTitle">Title English</label>
                          <textarea id="compose-textarea" name="title_en" class="form-control">{{$type->typeTitles[0]->title_en}} </textarea>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="inputTitle">Title Chinese</label>
                          <textarea id="compose-textarea" name="title_ch" class="form-control">{{$type->typeTitles[0]->title_ch}} </textarea>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="inputTitle">SubTitle Thai</label>
                          <textarea id="compose-textarea" name="subTitle_th" class="form-control">{{$type->typeTitles[1]->title_th}} </textarea>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="inputTitle">SubTitle English</label>
                          <textarea id="compose-textarea" name="subTitle_en" class="form-control">{{$type->typeTitles[1]->title_en}} </textarea>
                        </div>
                        <!-- /.form-group -->
                      </div>
                      <div class="col-md-4">
                        <!-- /.form-group -->
                        <div class="form-group">
                          <label for="inputTitle">SubTitle Chinese</label>
                          <textarea id="compose-textarea" name="subTitle_ch" class="form-control">{{$type->typeTitles[1]->title_ch}} </textarea>
                        </div>
                        <!-- /.form-group -->
                      </div>

                    </div>

                    <div class="row">
                      <div class="col-sm-10">
                        <button type="button" class="btn btn-primary" onclick="stepper.previous()">Previous</button>
                        <button type="button" class="btn btn-primary" onclick="stepper.next()">Next</button>
                      </div>
                      <div class="col-sm-2">
                        <div class="form-group">
                          <a href="{{route('mainpage.index')}}" class="btn btn-default btn-lg " id="btn-mission">Exit</a>
                        </div>
                      </div>
                    </div>

                  </div>


                  <div id="gallery-part" class="content" role="tabpanel" aria-labelledby="information-part-trigger">
                    <div class="row">
                      <div class="col-md-12 text-center">
                        <div class="card-body table-responsive pad">
                         
                        </div>
                      </div>
                    </div>


                    <div class="row">
                    
                      <div class="col-sm-12" id="youtube">
                        <div class="card card-default">
                          <div class="card-header">
                            <div class="row">
                              <div class="col-sm-4">
                                <h4 class="card-title">YouTube For Media</h4>
                              </div>

                              <div class="col-sm-6">
                                <input type="text" class="form-control" name='youtube' id="inputTitle" placeholder="Enter YouTube link...">
                              </div>
                              <div class="col-sm-2">
                                <button type="button" class="btn btn-primary btn-sm" onclick="previewYouTube()">Preview</button>
                              </div>
                            </div>
                          </div>
                          <div class="card-body">
                            <div class="row">

                              <div class="col-sm-12 text-center">
                                <div id="youtube-preview-container">
                                  <i class="fas fa-times-circle fa-2x" data-vid-id="{{$type->vedioTypes[0]->id}}" style="color: red;" onclick="deleteYouTubelink({{$type->id}})"></i>
                                  <iframe id="youtube-preview" width="600" height="400" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen @if(isset($type->vedioTypes)&&count($type->vedioTypes) > 0)
                                    src="{{ $type->vedioTypes[0]->youtube }}"
                                    @endif
                                    ></iframe>
                                </div>
                              </div>
                            </div>
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
                          <a href="{{route('mainpage.index')}}" class="btn btn-default btn-lg " id="btn-mission">Exit</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
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
  $('#vedio').hide();
  $('#youtube').show();
  $(document).ready(function() {
    $('#gallery-part input[type="radio"]').click(function() {
      var value = $(this).attr('id');
      if (value == 'option_a1') {
        $('#vedio').show();
        $('#youtube').hide();

      } else if (value == 'option_a2') {
        $('#vedio').hide();
        $('#youtube').show();

      }
    });
  });

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
  const youtubePreview = document.getElementById('youtube-preview');

  videoInput.addEventListener('change', () => {
    const file = videoInput.files[0];
    const url = URL.createObjectURL(file);
    videoPreview.setAttribute('src', url);
  });

  function deleteYouTubelink(type_id) {
    alert("Are you sure to delete!");
    $.ajax({
      url: '/mainpage/destroyYouTubeLink', // Replace with the actual URL to delete the video
      type: 'POST', // or 'DELETE' based on your server-side implementation
      data: {
        type_id: type_id
      },
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      success: function(response) {
        alert("Deleted YouTubeLink successfully!");

        youtubePreview.setAttribute('src', '');

      },
      error: function(xhr) {
        alert("Error deleting  YouTubeLink !");

        console.log("Error deleting video: " + xhr.responseText);
      }
    });

  }

  function deleteVedio(type_id) {
    alert("Are you sure to delete!");
    $.ajax({
      url: '/mainpage/destroyVedio', // Replace with the actual URL to delete the video
      type: 'POST', // or 'DELETE' based on your server-side implementation
      data: {
        type_id: type_id
      },
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      success: function(response) {
        alert("Video deleted successfully!");
        console.log("Video deleted successfully.");
        videoPreview.setAttribute('src', '');

      },
      error: function(xhr) {
        alert("Error deleting video!");

        console.log("Error deleting video: " + xhr.responseText);
      }
    });
  }


  function getYouTubeVideoId(url) {
  // Regular expression to extract the YouTube video ID from various YouTube link formats
  var regExp = /^(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/(?:embed\/|v\/|watch\?v=|watch\?.+&v=|[^\/]+.+\/[^\s]+)|youtu\.be\/)([\w-]{11})(?:[\?\&]?.*)?$/;
  var match = url.match(regExp);
  
  if (match && match[1]) {
    return match[1];
  } else {
    return null;
  }
}

function previewYouTube() {
  console.log("you tube main Arrive");
  var inputTitle = document.getElementById('inputTitle');
  console.log("inputTitle=" + inputTitle);
  
  var youtubePreview = document.getElementById('youtube-preview');
  var youtubePreviewContainer = document.getElementById('youtube-preview-container');
  var youtubeId = getYouTubeVideoId(inputTitle.value);
  console.log("youtubeId=" + youtubeId);
  
  if (youtubeId !== null) {
   
    youtubePreviewContainer.style.display = 'block';
    youtubePreview.src = "https://www.youtube.com/embed/" + youtubeId;
    console.log(youtubeId);
  } else {
    // If no valid YouTube ID was found, display the video preview instead
    videoPreview.style.display = 'block';
    youtubePreviewContainer.style.display = 'none';
  }
}


  videoInput.addEventListener('change', () => {
    const file = videoInput.files[0];
    const url = URL.createObjectURL(file);
    videoPreview.setAttribute('src', url);
  });

  function deleteYouTubelink(post_id) {
    alert("Are you sure to delete!");
    $.ajax({
      url: '/social/destroyYouTubeLink', // Replace with the actual URL to delete the video
      type: 'POST', // or 'DELETE' based on your server-side implementation
      data: {
        post_id: post_id
      },
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      success: function(response) {
        alert("Deleted YouTubeLink successfully!");

        youtubePreview.setAttribute('src', '');

      },
      error: function(xhr) {
        alert("Error deleting  YouTubeLink !");

        console.log("Error deleting video: " + xhr.responseText);
      }
    });

  }

  function deleteVedio(post_id) {
    alert("Are you sure to delete!");
    $.ajax({
      url: '/social/destroyVedio',
      type: 'POST',
      data: {
        post_id: post_id
      },
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      success: function(response) {
        alert("Video deleted successfully!");
        console.log("Video deleted successfully.");
        videoPreview.setAttribute('src', '');

      },
      error: function(xhr) {
        alert("Error deleting video!");

        console.log("Error deleting video: " + xhr.responseText);
      }
    });
  }

</script>
@endsection


@endsection