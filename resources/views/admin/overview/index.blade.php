@extends('layout.app')
@section('title') Social Media @endsection

@section('css-place') 
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-9r1xRa+0dCx6qKcIRyVfEZ1VQH/10p+9f7rLD/v6XvI0U7Pl90GK+vA2LIsXqbZfuFzJ+F8sz3gPSJWz5F+VQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
            <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
            <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
            <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
            <link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
            <link rel="stylesheet" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
            <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
            <link rel="stylesheet" href="{{asset('dist/css/custom.css')}}">
@endsection
@section('contents')

@if (isset($notification['message']))
<script>
    alert("{{ $notification['message'] }}");
</script>
@endif

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        
        <div class="col-sm-6">
         
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
 <!-- Main content -->


 <section class="content">
  <div class="container-fluid">
  <div class="row">     
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title">ORGANIZATION OVERVIEW Banner Pannel</h3>
          </div>
       
          <form action='{{route('overview.editTypeOverView')}}' method="post" enctype="multipart/form-data" id='regform'>
            @csrf
            <input type="hidden" name="type_id" value="{{$typeOverView->id}}">
            <div class="card-body">
              <div class="row justify-content-center">
                <img src="{{asset('storage/types/'.$typeOverView->imgname)}}" class="img-fluid mx-auto" alt="..." style="height: 250px; width: 450px;" id="preview">
              </div>
              <div class="form-group">
                <label for="exampleInputFile">File input</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="image" name="image" onchange="updateLabel('image','preview')">
                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                  </div>
                  <div class="input-group-append">
                    <span class="input-group-text">Upload</span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Title Thai</label>
                      <input type="text" class="form-control" id="title" name="title_th" placeholder="Enter.." value="{{$typeOverView->typeTitles[0]->title_th}}">
                    </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Title English</label>
                    <input type="text" class="form-control" id="title" name="title_en" placeholder="Enter.." value="{{$typeOverView->typeTitles[0]->title_en}}">
                  </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="exampleInputEmail1">Title Chinese</label>
                  <input type="text" class="form-control" id="title" name="title_ch" placeholder="Enter.." value="{{$typeOverView->typeTitles[0]->title_ch}}">
                </div>
              </div>
            </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
   
    <div class="row">     
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-dark">
          <div class="card-header">
            <h3 class="card-title">Vision And Mission</h3>
          </div>
       
          <form action='{{route('overview.editVision')}}' method="post" enctype="multipart/form-data" id='regform'>
            @csrf
            <input type="hidden" name="type_id" value="{{$typeVision->id}}">
            <div class="card-body">
              <div class="row justify-content-center">
                <img src="{{asset('storage/types/'.$typeVision->typeImages[count($typeVision->typeImages)-1]->name_en)}}" class="img-fluid mx-auto" alt="..." style="height: 200px; width: 350px;" id="preview">
              </div>
              <div class="form-group">
                <label for="exampleInputFile">File input</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="image" name="image" onchange="updateLabel('image','preview')">
                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                  </div>
                  <div class="input-group-append">
                    <span class="input-group-text">Upload</span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Title Thai</label>
                      <input type="text" class="form-control" id="title" name="title_th" placeholder="Enter.." value="{{$typeVision->typeTitles[0]->title_th}}">
                    </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Title English</label>
                    <input type="text" class="form-control" id="title" name="title_en" placeholder="Enter.." value="{{$typeVision->typeTitles[0]->title_en}}">
                  </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="exampleInputEmail1">Title Chinese</label>
                  <input type="text" class="form-control" id="title" name="title_ch" placeholder="Enter.." value="{{$typeVision->typeTitles[0]->title_ch}}">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="exampleInputPassword1">Caption Thai</label>
                  <textarea name="caption_th" class="form-control" style="width: 100%; height: 100px;" required>{{$typeVision->typeContents[1]->content_th}}</textarea>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="exampleInputPassword1">Caption English</label>
                  <textarea name="caption_en" class="form-control" style="width: 100%; height: 100px;" required>{{$typeVision->typeContents[1]->content_en}}</textarea>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="exampleInputPassword1">Caption Chinese</label>
                  <textarea name="caption_ch" class="form-control" style="width: 100%; height: 100px;" required>{{$typeVision->typeContents[1]->content_ch}}</textarea>
                </div>
              </div>
            </div>
             
             
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="row">     
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-dark">
          <div class="card-header">
            <h3 class="card-title">Corporate Value</h3>
          </div>
       
          <form action='{{route('overview.editCoreValue')}}' method="post" enctype="multipart/form-data" id='regform'>
            @csrf
            <input type="hidden" name="type_id" value="{{$typeCoreValue->id}}">
            <div class="card-body">
              <div class="row justify-content-center">
                <img src="{{asset('storage/types/'.$typeCoreValue->typeImages[count($typeCoreValue->typeImages)-1]->name_en)}}" class="img-fluid mx-auto" alt="..." style="height: 200px; width: 350px;" id="preview5">
              </div>
              <div class="form-group">
                <label for="exampleInputFile">File input</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="image5" name="image" onchange="updateLabel('image5','preview5')">
                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                  </div>
                  <div class="input-group-append">
                    <span class="input-group-text">Upload</span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Title Thai</label>
                      <input type="text" class="form-control" id="title" name="title_th" placeholder="Enter.." value="{{$typeCoreValue->typeTitles[0]->title_th}}">
                    </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Title English</label>
                    <input type="text" class="form-control" id="title" name="title_en" placeholder="Enter.." value="{{$typeCoreValue->typeTitles[0]->title_en}}">
                  </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="exampleInputEmail1">Title Chinese</label>
                  <input type="text" class="form-control" id="title" name="title_ch" placeholder="Enter.." value="{{$typeCoreValue->typeTitles[0]->title_ch}}">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="exampleInputPassword1">Caption Thai</label>
                  <textarea name="caption_th" class="form-control" style="width: 100%; height: 100px;" required>{{$typeCoreValue->typeContents[1]->content_th}}</textarea>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="exampleInputPassword1">Caption English</label>
                  <textarea name="caption_en" class="form-control" style="width: 100%; height: 100px;" required>{{$typeCoreValue->typeContents[1]->content_en}}</textarea>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="exampleInputPassword1">Caption Chinese</label>
                  <textarea name="caption_ch" class="form-control" style="width: 100%; height: 100px;" required>{{$typeCoreValue->typeContents[1]->content_ch}}</textarea>
                </div>
              </div>
            </div>
             
             
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="row">     
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-dark">
          <div class="card-header">
            <h3 class="card-title">History OverView</h3>
          </div>
       
          <form action='{{route('overview.editHistory')}}' method="post" enctype="multipart/form-data" id='regform'>
            @csrf
            <input type="hidden" name="type_id" value="{{$typeHistory->id}}">
            <div class="card-body">
              <div class="row justify-content-center">
                <img src="{{asset('storage/types/'.$typeHistory->typeImages[count($typeHistory->typeImages)-1]->name_en)}}" class="img-fluid mx-auto" alt="..." style="height: 200px; width: 350px;" id="preview">
              </div>
              <div class="form-group">
                <label for="exampleInputFile">File input</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="image" name="image" onchange="updateLabel('image','preview')">
                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                  </div>
                  <div class="input-group-append">
                    <span class="input-group-text">Upload</span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Title Thai</label>
                      <input type="text" class="form-control" id="title" name="title_th" placeholder="Enter.." value="{{$typeHistory->typeTitles[0]->title_th}}">
                    </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Title English</label>
                    <input type="text" class="form-control" id="title" name="title_en" placeholder="Enter.." value="{{$typeHistory->typeTitles[0]->title_en}}">
                  </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="exampleInputEmail1">Title Chinese</label>
                  <input type="text" class="form-control" id="title" name="title_ch" placeholder="Enter.." value="{{$typeHistory->typeTitles[0]->title_ch}}">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="exampleInputPassword1">Caption Thai</label>
                  <textarea name="caption_th" class="form-control" style="width: 100%; height: 100px;" required>{{ $typeHistory->typeContents[4]->content_th }}</textarea>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="exampleInputPassword1">Caption English</label>
                  <textarea name="caption_en" class="form-control" style="width: 100%; height: 100px;" required>{{ $typeHistory->typeContents[4]->content_en }}</textarea>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="exampleInputPassword1">Caption Chinese</label>
                  <textarea name="caption_ch" class="form-control" style="width: 100%; height: 100px;" required>{{ $typeHistory->typeContents[4]->content_ch }}</textarea>
                </div>
              </div>
            </div>
             
             
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="row">     
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-dark">
          <div class="card-header">
            <h3 class="card-title">Pride And Award</h3>
          </div>
       
          <form action='{{route('overview.editAward')}}' method="post" enctype="multipart/form-data" id='regform'>
            @csrf
            <input type="hidden" name="type_id" value="{{$typeAward->id}}">
            <div class="card-body">
              <div class="row justify-content-center">
                <img src="{{asset('storage/types/'.$typeAward->typeImages[count($typeAward->typeImages)-1]->name_en)}}" class="img-fluid mx-auto" alt="..." style="height: 200px; width: 350px;" id="preview1">
              </div>
              <div class="form-group">
                <label for="exampleInputFile">File input</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="image1" name="image" onchange="updateLabel('image1','preview1')">
                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                  </div>
                  <div class="input-group-append">
                    <span class="input-group-text">Upload</span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Title Thai</label>
                      <input type="text" class="form-control" id="title" name="title_th" placeholder="Enter.." value="{{$typeAward->typeTitles[0]->title_th}}">
                    </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Title English</label>
                    <input type="text" class="form-control" id="title" name="title_en" placeholder="Enter.." value="{{$typeAward->typeTitles[0]->title_en}}">
                  </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="exampleInputEmail1">Title Chinese</label>
                  <input type="text" class="form-control" id="title" name="title_ch" placeholder="Enter.." value="{{$typeAward->typeTitles[0]->title_ch}}">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="exampleInputPassword1">Caption Thai</label>
                  <textarea name="caption_th" class="form-control" style="width: 100%; height: 100px;" required>{{ $typeAward->typeContents[1]->content_th}}</textarea>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="exampleInputPassword1">Caption English</label>
                  <textarea name="caption_en" class="form-control" style="width: 100%; height: 100px;" required>{{$typeAward->typeContents[1]->content_en}}</textarea>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="exampleInputPassword1">Caption Chinese</label>
                  <textarea name="caption_ch" class="form-control" style="width: 100%; height: 100px;" required>{{$typeAward->typeContents[1]->content_ch}}</textarea>
                </div>
              </div>
            </div>
             </div>
             <div class="card-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="row">     
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-dark">
          <div class="card-header">
            <h3 class="card-title">Group Structure</h3>
          </div>
       
          <form action='{{route('overview.editGroupStructure')}}' method="post" enctype="multipart/form-data" id='regform'>
            @csrf
            <input type="hidden" name="type_id" value="{{$typeGpStructure->id}}">
            <div class="card-body">
              <div class="row justify-content-center">
                <img src="{{asset('storage/types/'.$typeGpStructure->typeImages[count($typeGpStructure->typeImages)-1]->name_en)}}" class="img-fluid mx-auto" alt="..." style="height: 200px; width: 350px;" id="preview3">
              </div>
              <div class="form-group">
                <label for="exampleInputFile">File input</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="image3" name="image" onchange="updateLabel('image3','preview3')">
                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                  </div>
                  <div class="input-group-append">
                    <span class="input-group-text">Upload</span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Title Thai</label>
                      <input type="text" class="form-control" id="title" name="title_th" placeholder="Enter.." value="{{$typeGpStructure->typeTitles[0]->title_th}}">
                    </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Title English</label>
                    <input type="text" class="form-control" id="title" name="title_en" placeholder="Enter.." value="{{$typeGpStructure->typeTitles[0]->title_en}}">
                  </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="exampleInputEmail1">Title Chinese</label>
                  <input type="text" class="form-control" id="title" name="title_ch" placeholder="Enter.." value="{{$typeGpStructure->typeTitles[0]->title_ch}}">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="exampleInputPassword1">Caption Thai</label>
                  <textarea name="caption_th" class="form-control" style="width: 100%; height: 100px;" required>{{$typeGpStructure->typeContents[2]->content_th}}</textarea>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="exampleInputPassword1">Caption English</label>
                  <textarea name="caption_en" class="form-control" style="width: 100%; height: 100px;" required>{{$typeGpStructure->typeContents[2]->content_en}}</textarea>
                </div>
              </div>
            
              <div class="col-md-4">
                <div class="form-group">
                  <label for="exampleInputPassword1">Caption</label>
                  <textarea name="caption_ch" class="form-control" style="width: 100%; height: 100px;" required>{{ $typeGpStructure->typeContents[2]->content_ch}}</textarea>
              </div>
              </div>
            </div>
             </div>
             <div class="card-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="row">     
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-dark">
          <div class="card-header">
            <h3 class="card-title">Organization Structure</h3>
          </div>
       
          <form action='{{route('overview.editOrgStructure')}}' method="post" enctype="multipart/form-data" id='regform'>
            @csrf
            <input type="hidden" name="type_id" value="{{$typeOrgStructure->id}}">
            <div class="card-body">
              <div class="row justify-content-center">
                <img src="{{asset('storage/types/'.$typeOrgStructure->typeImages[count($typeOrgStructure->typeImages)-1]->name_en)}}" class="img-fluid mx-auto" alt="..." style="height: 200px; width: 350px;" id="preview4">
              </div>
              <div class="form-group">
                <label for="exampleInputFile">File input</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="image4" name="image" onchange="updateLabel('image4','preview4')">
                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                  </div>
                  <div class="input-group-append">
                    <span class="input-group-text">Upload</span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Title Thai</label>
                      <input type="text" class="form-control" id="title" name="title_th" placeholder="Enter.." value="{{$typeOrgStructure->typeTitles[0]->title_th}}">
                    </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Title English</label>
                    <input type="text" class="form-control" id="title" name="title_en" placeholder="Enter.." value="{{$typeOrgStructure->typeTitles[0]->title_en}}">
                  </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="exampleInputEmail1">Title Chinese</label>
                  <input type="text" class="form-control" id="title" name="title_ch" placeholder="Enter.." value="{{$typeOrgStructure->typeTitles[0]->title_ch}}">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="exampleInputPassword1">Caption Thai</label>
                  <textarea name="caption_th" class="form-control" style="width: 100%; height: 100px;" required>{{$typeOrgStructure->typeContents[1]->content_th}}</textarea>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="exampleInputPassword1">Caption English</label>
                  <textarea name="caption_en" class="form-control" style="width: 100%; height: 100px;" required>{{$typeOrgStructure->typeContents[1]->content_en}}</textarea>
                </div>
              </div>
            
              <div class="col-md-4">
                <div class="form-group">
                  <label for="exampleInputPassword1">Caption Chinese</label>
                  <textarea name="caption_ch" class="form-control" style="width: 100%; height: 100px;" required>{{$typeOrgStructure->typeContents[1]->content_ch}}</textarea>
              </div>
              </div>
            </div>
             </div>
             <div class="card-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="row">     
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-dark">
          <div class="card-header">
            <h3 class="card-title">Embryo Network</h3>
          </div>
       
          <form action='{{route('overview.editEmbryoNetwork')}}' method="post" enctype="multipart/form-data" id='regform'>
            @csrf
            <input type="hidden" name="type_id" value="{{$typeNetwork->id}}">
            <div class="card-body">
              <div class="row justify-content-center">
                <img src="{{asset('storage/types/'.$typeNetwork->typeImages[count($typeNetwork->typeImages)-1]->name_en)}}" class="img-fluid mx-auto" alt="..." style="height: 200px; width: 350px;" id="preview2">
              </div>
              <div class="form-group">
                <label for="exampleInputFile">File input</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="image2" name="image" onchange="updateLabel('image2','preview2')">
                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                  </div>
                  <div class="input-group-append">
                    <span class="input-group-text">Upload</span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Title Thai</label>
                      <input type="text" class="form-control" id="title" name="title_th" placeholder="Enter.." value="{{$typeNetwork->typeTitles[0]->title_th}}">
                    </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Title English</label>
                    <input type="text" class="form-control" id="title" name="title_en" placeholder="Enter.." value="{{$typeNetwork->typeTitles[0]->title_en}}">
                  </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="exampleInputEmail1">Title Chinese</label>
                  <input type="text" class="form-control" id="title" name="title_ch" placeholder="Enter.." value="{{$typeNetwork->typeTitles[0]->title_ch}}">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="exampleInputPassword1">Caption Thai</label>
                  <textarea name="caption_th" class="form-control" style="width: 100%; height: 100px;" required>{{ $typeNetwork->typeContents[1]->content_th}}</textarea>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="exampleInputPassword1">Caption English</label>
                  <textarea name="caption_en" class="form-control" style="width: 100%; height: 100px;" required>{{ $typeNetwork->typeContents[1]->content_en }}</textarea>
                </div>
              </div>
            
              <div class="col-md-4">
                <div class="form-group">
                  <label for="exampleInputPassword1">Caption Chinese</label>
                  <textarea name="caption_ch" class="form-control" style="width: 100%; height: 100px;" required>{{ $typeNetwork->typeContents[1]->content_ch}}</textarea>
              </div>
              </div>
            </div>
             </div>
             <div class="card-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
 </section>

 


</div>


<script>


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


</script>

      
      @section('js-place')
      
         
      <script>  

$(document).ready(function() {
$('.dropdown-toggle').dropdown();});

const deleteButtons = document.querySelectorAll('.delete-row');
deleteButtons.forEach(button => {
   button.addEventListener('click', () => {
     const row = button.closest('tr');
     const id = row.querySelector('td:first-child').textContent;
     const title = row.querySelector('td:nth-child(2)').textContent;
     updateFormAction(id);
     $('#inputId').val(id);
     $('#inputTitle').val(title);
     $("#delete-card").show();
     $(".overlay").show();
     console.log(`Row ID: ${id}`);
   });
 });

          $(function() {
              $("#example1").DataTable({
                  "responsive": true,
                  "lengthChange": false,
                  "autoWidth": false,
                  "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
              }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
              $('#example2').DataTable({
                  "paging": true,
                  "lengthChange": false,      
                  "ordering": true,
                  "info": true,
                  "autoWidth": false,
                  "responsive": true,
              });
          });
          $(document).ready(function() {
            // Add a click event listener to each "Delete" button
            $('.delete-row').click(function(event) {
                event.preventDefault();
                var postId = $(this).attr('id').replace('delete-post-', '');
                if (confirm("Are you sure you want to delete this row?")) {
                    // If the user clicks "OK", delete the row
                window.location.href = "{{ route('social.destroy', ':id') }}".replace(':id', postId);
                }
            });
            });


$('#summernote').summernote();
$('#summernote1').summernote();
$('#summernote2').summernote();
$('#summernote3').summernote();
$('#summernote4').summernote();
$('#summernote5').summernote();
$('#summernote6').summernote();
$('#summernote7').summernote();
$('#summernote8').summernote();
$('#summernote9').summernote();
$('#summernote10').summernote();
$('#summernote11').summernote();
$('#summernote12').summernote();

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



          
          </script>
      @endsection
@endsection


