@extends('layout.app')
@section('title') History @endsection
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
  {{-- <form action='{{route('activity.store')}}' method="post" enctype="multipart/form-data" id='regform'>
  @csrf --}}
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="row">
          <div class="col-12">

          </div>
        </div>
      </div>

    </div>
    <form action='{{route('activity.edit')}}' method="post" enctype="multipart/form-data" id='regform'>
      @csrf
      <input type="hidden" name="post_id" value="{{$post->id}}">

      <div class="col-md-12">
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Edit New And Activity </h3>
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
                <div class="line"></div>
                <div class="step" data-target="#gallery-part">
                  <button type="button" class="step-trigger" role="tab" aria-controls="information-part" id="information-part-trigger">
                    <span class="bs-stepper-circle">4</span>
                    <span class="bs-stepper-label">Add Gallery Photo</span>
                  </button>
                </div>
              </div>
              <div class="bs-stepper-content">
                <!-- your steps content here -->
                <div id="profile-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                  <div class="card-body">
                    <div class="row justify-content-center">
                      <img src="{{asset('storage/posts/'.$post->imgname)}}" class="img-fluid mx-auto" alt="..." style="height: 300px; width: 650px;" id="preview">
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
                          <input type="date" name="date" class="form-control" required value="{{ $post->created_at->format('Y-m-d') }}">

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
                        <a href="{{route('activity.index')}}" class="btn btn-default btn-lg " id="btn-mission">Exit</a>
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
                                  <textarea name="title_th" class="form-control" required>{{$post->titles[0]->title_th}}</textarea>
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <label>Short Description (Thai)</label>
                                  <textarea name="desc_th" class="form-control" required>{{$post->titles[1]->title_th}}</textarea>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <label for="inputSubTitle">Title (English)</label>
                                  <textarea name="title_en" class="form-control" required>{{$post->titles[0]->title_en}}</textarea>
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <label for="inputSubTitle">Short Description (English)</label>
                                  <textarea name="desc_en" class="form-control" required>{{$post->titles[1]->title_en}}</textarea>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <label for="inputSubTitle">Title (Chinese)</label>
                                  <textarea name="title_ch" class="form-control" required>{{$post->titles[0]->title_ch}}</textarea>
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <label for="inputSubTitle">Short Description (Chinese)</label>
                                  <textarea name="desc_ch" class="form-control" required>{{$post->titles[1]->title_ch}}</textarea>
                                </div>
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
                      <button type="button" class="btn btn-primary" onclick="stepper.next()">Next</button>
                    </div>
                    <div class="col-sm-2">
                      <div class="form-group">
                        <a href="{{route('activity.index')}}" class="btn btn-default btn-lg " id="btn-mission">Exit</a>
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
                                  <textarea id="summernote3" name="content_th" class="form-control" required>{{$post->contents[0]->content_th}}</textarea>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm-12">
                              <div class="form-group">
                                <label for="inputSubTitle">Content (English)</label>
                                <textarea id="summernote4" name="content_en" class="form-control" required>{{$post->contents[0]->content_en}}</textarea>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm-12">
                              <div class="form-group">
                                <label for="inputSubTitle">Content (Chinese)</label>
                                <textarea id="summernote5" name="content_ch" class="form-control" required>{{$post->contents[0]->content_ch}}</textarea>
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
                        <a href="{{route('activity.index')}}" class="btn btn-default btn-lg " id="btn-mission">Exit</a>
                      </div>
                    </div>
                  </div>

                </div>
                <div id="gallery-part" class="content" role="tabpanel" aria-labelledby="information-part-trigger">
                  <div class="card card-default">
                    <div class="card-header">
                      <div class="row">
                        <div class="col-sm-4">
                          <h4 class="card-title">Photo Gallery</h4>
                        </div>
                        <div class="col-sm-4">
                          <input type="file" class="custom-file-input" id="image" name="images[]" onchange="updateGalleryImages(this)" multiple>
                          <label class="custom-file-label" for="image">Add Image For Photo Gallery</label>
                        </div>

                      </div>
                    </div>
                    <div class="card-body">

                      <div class="row" id="gallery">

                      </div>
                      <div class="row">
                        @foreach($post->postImages as $image)
                        <div class="col-sm-2">
                       
                          <a href="{{ asset('storage/posts/'.$image->name_en)}}" data-toggle="lightbox" data-title="sample 8 - black" data-gallery="gallery">
                            <img src="{{ asset('storage/posts/'.$image->name_en)}}" class="img-fluid mb-2" alt="black sample" style="height: 100px; width: 350px;" />
                            <i class="fas fa-trash"data-img-id="{{ $image->id }}" onclick="deleteImageFromAjax({{ $image->id }})"></i>
                          </a>
                       
                         

                        </div>
                        @endforeach
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
                        <a href="{{route('activity.index')}}" class="btn btn-default btn-lg " id="btn-mission">Exit</a>
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

  </section>




</div>
@section('js-place')
<script src="{{asset('plugins/bs-stepper/js/bs-stepper.min.js')}}"></script>
<script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
<script src="{{asset('plugins/ekko-lightbox/ekko-lightbox.min.js')}}"></script>
<script src="{{asset('plugins/filterizr/jquery.filterizr.min.js')}}"></script>
<script src="{{asset('plugins/dropzone/min/dropzone.min.js')}}"></script>

<script>
  $('#summernote').summernote();
  $('#summernote1').summernote();
  $('#summernote2').summernote();
  $('#summernote3').summernote();
  $('#summernote4').summernote();
  $('#summernote5').summernote();
  $('#summernote6 ').summernote();
  $('#summernote7').summernote();
  $('#summernote8').summernote();
  // BS-Stepper Init

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

  function updateGalleryImages(input) {
    var gallery = document.getElementById('gallery');
    // gallery.innerHTML = ''; // clear existing gallery images

    if (input.files && input.files.length > 0) {
      for (var i = 0; i < input.files.length; i++) {
        var reader = new FileReader();
        reader.onload = (function(index) {
          return function(e) {
            var div = document.createElement('div');
            div.classList.add('col-sm-2');

            var a = document.createElement('a');
            a.setAttribute('href', e.target.result);
            a.setAttribute('data-toggle', 'lightbox');
            a.setAttribute('data-gallery', 'gallery');
            a.setAttribute('data-title', input.files[index].name);

            var img = document.createElement('img');
            img.width = 300; // set width to 100 pixels
            img.height = 200;
            img.setAttribute('src', e.target.result);
            img.setAttribute('alt', input.files[index].name);
            img.classList.add('img-fluid');
            img.classList.add('mb-2');
            img.classList.add('gallery-image');

            var removeBtn = document.createElement('button');
            var icon = document.createElement('i');
            icon.classList.add('fas', 'fa-trash');
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

  // DropzoneJS Demo Code End
  document.addEventListener('DOMContentLoaded', function() {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
  })




  const trashIcons = document.querySelectorAll('.fas.fa-trash');
  trashIcons.forEach(icon => {
    icon.addEventListener('click', () => {
      var imgId = $('i.fas.fa-trash').data('img-id');
      var postId = $('i.fas.fa-trash').data('post-id');

      console.log(`Deleting post with ID ${postId}`);
      if (confirm("Are you sure you want to delete this photo?")) {
      //  deleteImageFromAjax(imgId);
        icon.closest('.col-sm-2').remove();

      }
    });
  });

  function deleteImageFromAjax(imgId) {
    console.log("Delete img arrive+" + imgId);
    $.ajax({
      url: "{{url('/activity/images')}}/" + imgId,
      type: 'GET',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      success: function(response) {
      },
      error: function(xhr) {
        console.log(xhr.responseText);
      }
    });
  }
</script>
@endsection


@endsection