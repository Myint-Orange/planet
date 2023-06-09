@extends('layout.app')
@section('title') Create Financial @endsection
@section('css-place')
<link rel="stylesheet" href="{{asset('dist/css/custom.css')}}"> @endsection
@section('contents')
<div class="content-wrapper">
  <form action='{{route('annualReport.editFiled')}}' method="post" enctype="multipart/form-data" id='regform'>
    @csrf
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="row">
           
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-edit"></i>
                  Edit IR Management & Analysis PDF 
                </h3>
              </div>
              <div class="card-body">
                <input type="hidden" name="post_id" value="{{$post->id}}">
                <div class="row justify-content-center">
                  <embed id="pdf-preview" src="{{asset('/images/'.$post->image)}}"  width="650" height="300" />
                </div>
        
                <div class="row justify-content-center">
                  <div class="col-md-4">
                      <div class="form-group">
                          <label>Annual Name</label>
                          <input type="text"  value="{{$post->title}}" name="name" class="form-control "
                              placeholder="Enter  Name.." style="">
                      </div>
                  </div>
              </div>
              <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="form-group">
                        <input type="file" class="custom-file-input" id="image-file"
                            name="pdf"  style="padding: 10px;" value="{{ $post->pdflink }}">
                        <label class="custom-file-label" for="image-file" >Upload PDF </label>
                    </div>
                </div>
            </div>
                <div class="row justify-content-center">
                  <div class="col-md-4">
                    <div class="form-group">
                      <input type="file" class="custom-file-input" id="pdf-file" name="iamge" onchange="previewPDF()" style="padding: 10px;">
                      <label class="custom-file-label" for="pdf-file">Upload PDF</label>
                    </div>
                  </div>
                </div>
        
                <div class="row justify-content-center">
                  <div class="col-md-4">
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary" id="btn-mission">Submit</button>
                    </div>
                  </div>
                  <div class="col-sm-1">
                    <div class="form-group">
                      <a href="{{route('user.annualReport.index')}}" class="btn btn-default " id="btn-mission">Exit</a>
                    </div>
                  </div>
                </div>


              </div>
            </div>
          </div>
        </div>
        
        <!-- /.col -->
      </div>

    </section>
  
  </form>
</div>

<script>
  
  const currentYear = new Date().getFullYear();
  const yearSelect = document.getElementById('year-select');
  for (let year = currentYear; year >= 1978; year--) {
    const option = document.createElement('option');
    option.value = year;
    option.textContent = year;
    yearSelect.appendChild(option);
  }
  function previewPDF() {
    const fileInput = document.getElementById('pdf-file');
    const file = fileInput.files[0];
    const reader = new FileReader();
    reader.onload = function (e) {
      const preview = document.getElementById('pdf-preview');
      preview.setAttribute('src', e.target.result);
    };
    reader.readAsDataURL(file);
  }
</script>



@endsection