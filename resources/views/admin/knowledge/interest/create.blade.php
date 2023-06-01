
@extends('layout.app')
@section('title') Interest  @endsection
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
          <div class="col-12">
            <h4>Create Interesting Fact For Embryo Planet </h4>
          </div>
        </div>
      </div>
      <form action='{{route('interest.store')}}' method="post" enctype="multipart/form-data" id='regform'>
        @csrf
  
          <div class="col-md-12">
            <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title">Create Activity </h3>
              </div>
              <div class="card-body p-0">
                <div class="bs-stepper">
                  <div class="bs-stepper-header" role="tablist">
                    <!-- your steps here -->
                    <div class="step" data-target="#profile-part">
                      <button type="button" class="step-trigger" role="tab" aria-controls="logins-part" id="logins-part-trigger">
                        <span class="bs-stepper-circle">1</span>
                        <span class="bs-stepper-label">Add Profile </span>
                      </button>
                    </div>
                    <div class="line"></div>
                    <div class="step" data-target="#title-part">
                      <button type="button" class="step-trigger" role="tab" aria-controls="information-part" id="information-part-trigger">
                        <span class="bs-stepper-circle">2</span>
                        <span class="bs-stepper-label">Add Title</span>
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
                        <div class="row justify-content-center mt-3">
                          <div class="col-md-6 d-flex align-items-center">
                              <div class="custom-file mr-2">
                                <label>Create Date</label>
                                <input type="date" name="date" class="form-control" required>
                              
                              </div>
                          </div>
                      </div>
                       </div>
                        <div class="row">
                            <div class="col-sm-10">
                                <button type="button"class="btn btn-primary" onclick="stepper.previous()">Previous</button>
                                <button type="button"class="btn btn-primary" onclick="stepper.next()">Next</button>
                            </div>
                            <div class="col-sm-2">
                              <div class="form-group">
                                <a href="{{route('interest.index')}}" class="btn btn-default btn-lg " id="btn-mission">Exit</a>
                              </div>
                          </div>
                        </div>
                         
                        </div>
                    <div id="title-part" class="content" role="tabpanel" aria-labelledby="information-part-trigger">
                      <div class="form-group">
                        <label for="exampleInputFile">Add Activity Title</label>
                        <div class="input-group">
                          <div class="card-body">
                            <div class="tab-content" id="custom-tabs-one-tabContent">
                              <div class="tab-pane fade show active" id="custom-tabs-one-messages" role="tabpanel" aria-labelledby="custom-tabs-one-messages-tab">           
                                     <div class="row">   
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Title (Thai)</label>
                                                <textarea  name="title_th" class="form-control"required  ></textarea>
                                              </div>
                                            </div>
                                            <div class="col-sm-6">
                                              <div class="form-group">
                                                  <label>Shot Description (Thai)</label>
                                                  <textarea  name="desc_th" class="form-control"required  ></textarea>
                                                </div>
                                              </div>
                                        </div>
                                        <div class="row">   
                                          <div class="col-sm-6">
                                              <div class="form-group">
                                                  <label>Title (English)</label>
                                                  <textarea  name="title_en" class="form-control"required  ></textarea>
                                                </div>
                                              </div>
                                              <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Shot Description (English)</label>
                                                    <textarea  name="desc_en" class="form-control"required  ></textarea>
                                                  </div>
                                                </div>
                                          </div>
                                          <div class="row">
                                            
                                            <div class="col-sm-6">
                                              <div class="form-group">
                                                <label for="inputSubTitle">Title (Chinese)</label>
                                                <textarea  name="title_ch" class="form-control" required  ></textarea>
                                              </div> 
                                            </div>                          
                                          
                                              
                                            <div class="col-sm-6">
                                              <div class="form-group">
                                                <label for="inputSubTitle">Short escription (Chinese)</label>
                                                <textarea  name="desc_ch" class="form-control" required  ></textarea>
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
                            <button type="button"class="btn btn-primary" onclick="stepper.previous()">Previous</button>
                            <button type="button"class="btn btn-primary" onclick="stepper.next()">Next</button>
                        </div>
                        <div class="col-sm-2">
                          <div class="form-group">
                            <a href="{{route('interest.index')}}" class="btn btn-default btn-lg " id="btn-mission">Exit</a>
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
                                                <textarea id="summernote3" name="content_th" class="form-control"required  ></textarea>
                                              </div>
                                            </div>
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-sm-12">
                                          <div class="form-group">
                                            <label for="inputSubTitle">Content (English)</label>
                                            <textarea id="summernote4" name="content_en" class="form-control" required  ></textarea>
                                          </div> 
                                        </div> 
                                      </div>
                                      <div class="row">                         
                                        <div class="col-sm-12">
                                          <div class="form-group">
                                            <label for="inputSubTitle">Content (Chinese)</label>
                                            <textarea id="summernote5" name="content_ch" class="form-control" required  ></textarea>
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
                            <button type="button"class="btn btn-primary" onclick="stepper.previous()">Previous</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        <div class="col-sm-2">
                          <div class="form-group">
                            <a href="{{route('interest.index')}}" class="btn btn-default btn-lg " id="btn-mission">Exit</a>
                          </div>
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
$('#summernote').summernote();
$('#summernote1').summernote();
$('#summernote2').summernote();
$('#summernote3').summernote();
$('#summernote4').summernote();
$('#summernote5').summernote();
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

  function updateGalleryImages(input) {
    var gallery = document.getElementById('gallery');
   // gallery.innerHTML = ''; // clear existing gallery images

    if (input.files && input.files.length > 0) {
      for (var i = 0; i < input.files.length; i++) {
        var reader = new FileReader();
        reader.onload = (function (index) {
          return function (e) {
            var div = document.createElement('div');
            div.classList.add('col-sm-2');

            var a = document.createElement('a');
            a.setAttribute('href', e.target.result);
            a.setAttribute('data-toggle', 'lightbox');
            a.setAttribute('data-gallery', 'gallery');
            a.setAttribute('data-title', input.files[index].name);

            var img = document.createElement('img');
            img.setAttribute('src', e.target.result);
            img.setAttribute('alt', input.files[index].name);
            img.classList.add('img-fluid');
            img.classList.add('mb-2');
            img.classList.add('gallery-image');

            var removeBtn = document.createElement('button');
            var icon=document.createElement('i');
            icon.classList.add('fas','fa-trash');
            removeBtn.classList.add('btn', 'btn-danger', 'btn-sm', 'remove-btn');
            removeBtn.appendChild(icon);
            removeBtn.addEventListener('click', function() {
              div.remove();
            });

            a.appendChild(img);
            div.appendChild(a);
            div.appendChild(removeBtn);
            gallery.appendChild(div);
          };
        })(i);
        reader.readAsDataURL(input.files[i]);
      }
    }
  }
  document.addEventListener('DOMContentLoaded', function () {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
})


</script>
@endsection

   
@endsection
