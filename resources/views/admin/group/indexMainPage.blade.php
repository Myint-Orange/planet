@extends('layout.app')
@section('title') About Us @endsection
@section('contents')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">


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
                Edit Main Page Banner
              </h3>
            </div>

            <div class="card-body">
              <form action="{{route('mainpage.editBanner')}}" method="post" enctype="multipart/form-data" id='regform'>
                @csrf
                <input type="hidden" name="group_id" value='{{$group->id}}'>

                <div id="gallery-part" class="content" role="tabpanel" aria-labelledby="information-part-trigger">
                  <div class="card card-default">
                    <div class="card-header">
                      <div class="row">
                        <div class="col-sm-4">
                          <h4 class="card-title">Photo Slide Show</h4>
                        </div>
                        <div class="col-sm-4">
                          <input type="file" class="custom-file-input" id="image" name="images[]" onchange="updateGalleryImages(this)" multiple>
                          <label class="custom-file-label" for="image">Add Image For Photo Slide Show</label>
                        </div>

                      </div>
                    </div>
                    <div class="card-body">

                      <div class="row" id="gallery">

                      </div>
                      <div class="row">
                        @foreach($group->gpImages as $image)
                        <div class="col-sm-2">

                          <a href="{{ asset('storage.groups/'.$image->name_en)}}" data-toggle="lightbox" data-title="sample 8 - black" data-gallery="gallery">
                            <img src="{{ asset('storage/groups/'.$image->name_en)}}" class="img-fluid mb-2" alt="black sample" style="height: 100px; width: 350px;" />
                            <i class="fas fa-trash" data-img-id="{{ $image->id }}" onclick="deleteImageFromAjax({{ $image->id }})"></i>
                          </a>

                        </div>
                        @endforeach
                      </div>


                    </div>
                  </div>



                </div>
                <div class="row">
                  <div class="col-sm-4">

                    <div class="form-group">
                      <label>Menu Title(English)</label>
                      <input type="text" name="menu_en" class="form-control" placeholder="Enter ..." value="{{$group->gpTitles[3]->title_en}}">
                    </div>
                  </div>
                  <div class="col-sm-4">

                    <div class="form-group">
                      <label>Menu Title(Thai)</label>
                      <input type="text" name="menu_th" class="form-control" placeholder="Enter ..." value="{{$group->gpTitles[3]->title_th}}">
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Menu Title(Chinese)</label>
                      <input type="text" name="menu_ch" class="form-control" placeholder="Enter ..." value="{{$group->gpTitles[3]->title_ch}}">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-4">

                    <div class="form-group">
                      <label>Title (English)</label>
                      <input type="text" name="title_en" class="form-control" placeholder="Enter ..." value="{{$group->gpTitles[0]->title_en}}">
                    </div>
                  </div>
                  <div class="col-sm-4">

                    <div class="form-group">
                      <label>Title (Thai)</label>
                      <input type="text" name="title_th" class="form-control" placeholder="Enter ..." value="{{$group->gpTitles[0]->title_th}}">
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Title (Chinese)</label>
                      <input type="text" name="title_ch" class="form-control" placeholder="Enter ..." value="{{$group->gpTitles[0]->title_ch}}">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-4">

                    <div class="form-group">
                      <label>SubTitle (English)</label>
                      <input type="text" name="subTitle_en" class="form-control" placeholder="Enter ..." value="{{$group->gpTitles[1]->title_en}}">
                    </div>
                  </div>
                  <div class="col-sm-4">

                    <div class="form-group">
                      <label>SubTitle (Thai)</label>
                      <input type="text" name="subTitle_th" class="form-control" placeholder="Enter ..." value="{{$group->gpTitles[1]->title_th}}">
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>SubTitle (Chinese)</label>
                      <input type="text" name="subTitle_ch" class="form-control" placeholder="Enter ..." value="{{$group->gpTitles[1]->title_ch}}">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label for="inputSubTitle">Short Description (English)</label>
                      <textarea id="compose-textarea" name="desc_en" class="form-control">{{$group->gpTitles[2]->title_en}}</textarea>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label for="inputSubTitle">Short Description (Thai)</label>
                      <textarea id="compose-textarea" name="desc_th" class="form-control">{{$group->gpTitles[2]->title_th}} </textarea>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label for="inputSubTitle">Short Description (Chinese)</label>
                      <textarea id="compose-textarea" name="desc_ch" class="form-control">{{$group->gpTitles[2]->title_ch}} </textarea>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary" id="btn-mission">Save</button>
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
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>Welcome To</h3>
              <p>Company</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{route('welcome.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>Photo Video</h3>
              <p>Home</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{route('service.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>Our Business</h3>
              <p>World-Class</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{route('ourBusiness.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">

          <div class="small-box bg-danger">
            <div class="inner">

              <h3>Awards</h3>
              <p>Banner</p>
            </div>
            <a href="{{route('awards.index')}}">
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
            </a>

            <a href="{{route('awards.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>

        </div>

        <div class="col-lg-3 col-6">

          <div class="small-box bg-secondary">
            <div class="inner">

              <h3>Contact</h3>

              <p>Get In Touch</p>
            </div>
            <a href="{{route('mainpage.contact.index')}}">
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
            </a>

            <a href="{{route('mainpage.contact.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>

        </div>



      </div>

    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<script>
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


  const trashIcons = document.querySelectorAll('.fas.fa-trash');
  trashIcons.forEach(icon => {
    icon.addEventListener('click', () => {
      var imgId = $('i.fas.fa-trash').data('img-id');
      console.log("imgId=" + imgId);
      if (confirm("Are you sure you want to delete this photo?")) {
        icon.closest('.col-sm-2').remove();
        console.log("Success To Delete");
        //  window.location.href = "{{ route('activity.destroyImage', [':imgId',':postId']) }}".replace(':imgId', imgId).replace(':postId', postId);
      }
    });
  });

  function deleteImageFromAjax(imgId, icon) {
    console.log("Arriving dele img ajaz");
    $.ajax({
      url: "{{url('/mainpage/group/destroyGroupImage')}}/" + imgId,
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