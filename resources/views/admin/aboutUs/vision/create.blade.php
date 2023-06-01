
@extends('layout.app')
@section('title') Network  @endsection
@section('css-place') <link rel="stylesheet" href="{{asset('dist/css/custom.css')}}"> @endsection
@section('contents')
<div class="content-wrapper">
  
  <section class="content">
    <div class="container-fluid">
    
      <!-- ./row -->
      <div class="row">
        <div class="col-12">
          <h4>Add Mission For Embryo Network</h4>
        </div>
      </div>
      <!-- ./row -->
      <div class="row">
        <div class="card-body">
          <div class="card card-primary card-tabs">
            <div class="card-header p-0 pt-1">
              <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Mission</a>
                </li>              
              </ul>
            </div>
            <div class="card-body">
              <div class="tab-content" id="custom-tabs-one-tabContent">
                
                <div class="tab-pane fade show active" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                  <form action='{{route('vision.store')}}' method="post" enctype="multipart/form-data" id='regform'>
                    @csrf 
                   
                   
                  
                
                    <div class="row">
                      <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                          <label>Content Thai</label>
                          <textarea id="compose-textarea" name="content_th" class="form-control"style="height: 60px" required>  
                          </textarea>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Content English</label>
                          <textarea id="compose-textarea" name="content_en" class="form-control"style="height: 60px" >  
                          </textarea>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <!-- textarea -->
                        <div class="form-group">
                          <label>Content Chinese</label>
                          <textarea id="compose-textarea" name="content_ch" class="form-control"style="height: 60px" >  
                          </textarea>
                        </div>
                      </div>
                     
                    </div>
                  
                     
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary" id="btn-mission">Save</button>
                          <a href="{{route('vision.index')}}" type="submit" class="btn btn-default" id="btn-mission">  Exit  </a>
                        </div>
                              
                    </div>
                    
                  </form>
                </div>
                 
              </div>
            </div>
          </div>
        </div>  
      
    
      </div>
      <!-- /.card -->
    </div>
    <!-- /.container-fluid -->
  </section>
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
