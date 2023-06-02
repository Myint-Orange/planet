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
            <div class="row">
                <div class="col-12 page-content wow fadeInDown">
                    <h2 class="topic-irpage">โครงสร้างผู้ถือหุ้น</h2>
                    <p>รายชื่อผู้ถือหุ้นสูงสุด 10 รายแรก ณ วันที่ 30 ธันวาคม 2565 มีดังนี้</p>
                    <div class="ir-table table-responsive">
                        <table class="table table-striped">
                            <thead class="top-headtable">
                                <tr>
                                    <th scope="col">ลำดับที่</th>
                                    <th scope="col">รายชื่อผู้ถือหุ้น</th>
                                    <th scope="col">จำนวนหุ้น (หุ้น)</th>
                                    <th scope="col" class="text-right">สัดส่วนการถือหุ้น (%)</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                @foreach($type->posts as $post)
                                <tr>
                                    <th scope="row">{{ $post->id}}</th>
                                    <td>{{$post->titles[0]->title_en}}</td>
                                    <td> {{$post->titles[1]->title_en}}</td>
                                    <td class="text-right"> {{$post->titles[2]->title_en}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
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
