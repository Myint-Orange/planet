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
        <h1>อันดับความน่าเชื่อถือ</h1>
    </div>
</section>
@endif
<section class="row">
    <div class="col-12 wrap-top-homeir wrap-tophistory wow fadeInDown">
        <div class="container">
            <div class="row page-content ir-manytable">
                <div class="col-12 wow fadeInDown">
                    <h2 class="topic-irpage">อันดับความน่าเชื่อถือ</h2>
                    <div class="ir-table table-responsive">
                        <table class="table table-striped text-center">
                            <thead class="top-headtable">
                                <tr>
                                    <th scope="col">ประเภทเครดิต</th>
                                    <th scope="col">สถาบันจัดอันดับ</th>
                                    <th scope="col">อันดับเครดิต</th>
                                    <th scope="col">แนวโน้มของอันดับ</th>
                                    <th scope="col">วันที่ออก</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                <tr>
                                    @foreach ($posts as $post)
                                    <th scope="row">{{ $post->credit_type }}</th>
                                    <th scope="row">{{ $post->rating_agency }}</th>
                                    <th scope="row">{{ $post->credit_rating }}</th>
                                    <th scope="row">{{ $post->credit_rating }}</th>
                                    <th scope="row">
                                        <?php
                                        $date = date('d M y', strtotime($post->issue_date));
                                           echo $date;
                                       ?>
                                    </th>
                                    <td><a href="{{ asset('/images/'.$post->pdflink) }}" class="btn-download" target="_blank"><span>ดาวน์โหลด</span>  <i class="bi bi-file-earmark-arrow-down-fill"></i></a></td>
                                    @endforeach
                                    </tr>
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
