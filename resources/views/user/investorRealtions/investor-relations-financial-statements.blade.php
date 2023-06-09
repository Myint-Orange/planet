<!doctype html>
<html>

<head>
	@include('user.inc_head')
</head>

<body>

<div class="container-fluid">
	
@include('user.inc_menu')


<section class="row">
    <div class="col-12 banner-inside wow fadeInDown">
        <figure><img src="{{ asset('storage/types/'.$type->imgname)}}" alt=""></figure>
        <h1>{{$type->typeTitles[0]->title_en}}</h1>
    </div>
</section>
<section class="row">
    <div class="col-12 wrap-top-homeir wrap-tophistory wow fadeInDown">
        <div class="container">
            <div class="row page-content wow fadeInDown">
                <div class="col-12 col-md-6">
                    <h2 class="topic-irpage">งบการเงิน</h2>
                    <div class="topic-iryear">ปี 2565</div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="ir-boxselect">
                        <span>ปี :</span>
                        <select name="year" class="form-select" id="">
                            <option selected disabled value="">เลือกปี</option>
                            @foreach($type->posts as $post)
                            <option class="selectbox" value="{{ $post->created_at }}">
                                {{ $post->created_at->format('Y') }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-12">
                    <div class="box-ir-download">
                        @foreach ( $type->posts as $post )
                        <div class="row list-ir-download">
                            <div class="col-10 col-md-9">
                                <i class="bi bi-file-earmark-pdf-fill"></i>  {{$post->name}} / {{ $post->created_at->format('Y') }}
                            </div>
                            <div class="col-2 col-md-3"><a href="{{asset('storage/pdf/'.$post->imgname)}}" target="_blank" download><span>ดาวน์โหลด</span>  <i class="bi bi-file-earmark-arrow-down-fill"></i></a></div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@include('user.inc_footer')

<script>
	$( ".box-menu > ul > li:nth-child(7) > a" ).addClass( "here" );
    $( ".box-menu ul li > .submenu ul > li:nth-child(0) > a" ).addClass( "here" );
</script>

		
</div>

</body>

</html>
