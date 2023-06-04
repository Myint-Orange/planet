<!doctype html>
<html>

<head>
	@include('user.inc_head')
</head>

<body>

<div class="container-fluid">
	
@include('user.inc_menu')


@if ($type)
<section class="row">
    <div class="col-12 banner-inside wow fadeInDown">
        <figure><img src="{{ asset('/images/'.$type->image)}}" alt=""></figure>
        <h1>{{ $type->name_en }}</h1>
    </div>
</section>
@else
<section class="row">
    <div class="col-12 banner-inside wow fadeInDown">
        <figure><img src="images/banner-irnews.webp" alt=""></figure>
        <h1>เอกสารเผยแพร่</h1>
    </div>
</section>
@endif

<section class="row">
    <div class="col-12 wrap-top-homeir wrap-tophistory wow fadeInDown">
        <div class="container">
            <div class="row page-content text-center">
                <div class="col-12 wow fadeInDown">
                    <h2 class="topic-irpage">รายงานประจำปี</h2>
                </div>
                @foreach ($annualreports as $annualReport)
                <div class="col-12 col-sm-6 col-md-4">
                    <a href="{{ asset('/images/'.$annualReport->pdflink)}}" target="_blank" class="item-report">
                        <figure>
                            <div class="cover-report"><img src="{{ asset('/images/'.$annualReport->image)}}" alt=""></div>
                            <figcaption>
                                <h4>{{$annualReport->title }}</h4>
                                ขนาดไฟล์ : {{ $annualReport->filesize }} MB.
                            </figcaption>
                        </figure>
                    </a>
                </div>
                @endforeach
                <div class="col-12 col-sm-6 col-md-4">
                    <a href="#" target="_blank" class="item-report">
                        <figure>
                            <div class="cover-report"><img src="images/Rectangle 2293.jpg" alt=""></div>
                            <figcaption>
                                <h4>รายงานประจำปี 2565</h4>
                                ขนาดไฟล์ : 5.81 MB.
                            </figcaption>
                        </figure>
                    </a>
                </div>
                <div class="col-12 col-sm-6 col-md-4">
                    <a href="#" target="_blank" class="item-report">
                        <figure>
                            <div class="cover-report"><img src="images/Rectangle 2294.jpg" alt=""></div>
                            <figcaption>
                                <h4>รายงานประจำปี 2565</h4>
                                ขนาดไฟล์ : 5.81 MB.
                            </figcaption>
                        </figure>
                    </a>
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
