
@extends('layout.app')
@section('title') Social Media  @endsection
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
      <form action='{{route('benefit.store')}}' method="post" enctype="multipart/form-data" id='regform'>
        @csrf
  
          <div class="col-md-12">
            <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title">Create Post welfare benefit</h3>
              </div>
              <div class="card-body p-0">
                <div class="bs-stepper">
                  <div class="bs-stepper-header" role="tablist">
                    <!-- your steps here -->
                    <div class="step" data-target="#profile-part">
                      <button type="button" class="step-trigger" role="tab" aria-controls="logins-part" id="logins-part-trigger">
                        <span class="bs-stepper-circle">1</span>
                        <span class="bs-stepper-label">Add Post Photo And Title  </span>
                      </button>
                    </div>
                   
                   
                    
                  </div>
                  <div class="bs-stepper-content">
                    <!-- your steps content here -->
                    <div id="profile-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                      <div class="card-body">
                          <div class="row justify-content-center">
                            <img src="{{asset('storage/img/default.png')}}" class="img-fluid mx-auto" alt="..." style="height: 300px; width: 650px;" id="preview">
                          </div>
                          <div class="row justify-content-center mt-3">
                            <div class="col-md-6 d-flex align-items-center">
                                <div class="custom-file mr-2">
                                    <input type="file" class="custom-file-input" id="image" name="image" onchange="updateLabel()" style="padding: 10px;">
                                    <label class="custom-file-label" for="image">Choose Photo</label>
                                </div>
                            </div>
                         </div>
                         <div class="row">   
                          <div class="col-sm-4">
                              <div class="form-group">
                                  <label>Title (Thai)</label>
                                  <input type="text" class="form-control" name='title_th' id="inputTitle" placeholder="Enter Title..."  required>
                                </div>
                              </div>   
                            <div class="col-sm-4">
                              <div class="form-group">
                                  <label>Title (English)</label>
                                  <input type="text" class="form-control" name='title_en' id="inputTitle" placeholder="Enter Title..." required>
                                </div>
                              </div>
                            <div class="col-sm-4">
                              <div class="form-group">
                                  <label>Title (Chinese)</label>
                                  <input type="text" class="form-control" name='title_ch' id="inputTitle" placeholder="Enter Title..." required>
                                </div>
                              </div>
                        </div>
                       </div>
                        <div class="row">
                            <div class="col-sm-10">
                            
                                <button type="submit"class="btn btn-primary">Submit</button>
                            </div>
                            <div class="col-sm-2">
                              <div class="form-group">
                                <a href="{{route('benefit.index')}}" class="btn btn-default btn-lg " id="btn-mission">Exit</a>
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
$(function () {
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox({
        alwaysShowClose: true
      });
    });

    $('.filter-container').filterizr({gutterPixels: 3});
    $('.btn[data-filter]').on('click', function() {
      $('.btn[data-filter]').removeClass('active');
      $(this).addClass('active');
    });
});
    document.addEventListener('DOMContentLoaded', function () {
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
    console.log("inputTitle="+inputTitle);
    var videoPreview = document.getElementById('video-preview');
    
    var youtubePreview = document.getElementById('youtube-preview');
    var youtubePreviewContainer = document.getElementById('youtube-preview-container');
    var youtubeId =inputTitle.value;
    console.log("youtubeId="+youtubeId);
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
