@extends('layout.app')
@section('title') Create Financial @endsection
@section('css-place')
<link rel="stylesheet" href="{{asset('dist/css/custom.css')}}"> @endsection
@section('contents')
<div class="content-wrapper">
  <form action='{{route('IRAnalysis.storeFile')}}' method="post" enctype="multipart/form-data" id='regform'>
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
                  Add IR Management & Analysis PDF
                </h3>
              </div>
              <div class="card-body">
        
                <div class="row justify-content-center">
                  <embed id="pdf-preview" src="{{asset('storage/images/pdfupload.png')}}"  width="650" height="300" />
                </div>
        
                <div class="row justify-content-center">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Year</label>
                      <select id="year-select" name="year" class="form-control" required>
                        <option value="">Select Year</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row justify-content-center">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>File Name</label>
                        <input type="text" name="fileName" class="form-control" placeholder="Enter File Name..">
                    </div>
                  </div>
                </div>
        
                <div class="row justify-content-center">
                  <div class="col-md-4">
                    <div class="form-group">
                      <input type="file" class="custom-file-input" id="pdf-file" name="pdf" onchange="previewPDF()" style="padding: 10px;">
                      <label class="custom-file-label" for="pdf-file">Upload PDF</label>
                    </div>
                  </div>
                </div>
        
                <div class="row justify-content-center">
                  <div class="col-md-4">
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary" id="btn-mission">Save</button>
                    </div>
                  </div>
                  <div class="col-sm-1">
                    <div class="form-group">
                      <a href="{{route('IRAnalysis.index')}}" class="btn btn-default " id="btn-mission">Exit</a>
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
  for (let year = currentYear; year >= 1970; year--) {
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