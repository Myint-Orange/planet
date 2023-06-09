
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
        <h1>ข่าวแจ้งตลาดหลักทรัพย์</h1>
    </div>
</section>
@endif

<section class="row">
    <div class="col-12 wrap-top-homeir wrap-tophistory wow fadeInDown">
        <div class="container">
            <div class="row page-content ir-manytable">
                <div class="col-12 wow fadeInDown">
                    <h2 class="topic-irpage">ข่าวแจ้งตลาดหลักทรัพย์</h2>
                    <form action='{{route('user.news.search')}}' method="post" enctype="multipart/form-data" id='regform'>
                    @csrf
                    @method('POST')
                    <div class="box-search-irnews">
                        <div class="frm-searchnews-select">
                            <span>ค้นหา</span>
                            <select name="created">
                                <option value="" selected disabled>ล่าสุด</option>
                                @foreach ($inContacts as $inContact)
                                <option value="{{ $inContact->created }}" name ="created">
                                <?php
                                     $date = date('Y', strtotime($inContact->created));
                                        echo $date;
                                    ?>
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="frm-searchnews-input">
                            <input type="text" name="headline" placeholder="กรอกคำที่ต้องการค้นหา...">
                        </div>
                        <button class="btn-search"><i class="bi bi-search"></i> ค้นหา</button>
                    </div>
                    </form>
                    <div class="ir-table table-responsive">
                        <table class="table table-striped">
                            <thead class="top-headtable">
                                <tr>
                                    <th scope="col">วันที่</th>
                                    <th scope="col">หัวข้อข่าว</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                @foreach ($inContacts as $inContact)
                                <tr>
                                    <th scope="row" class="txt-nowrap"><?php
                                        $date = date('d M Y', strtotime($inContact->created));
                                        echo $date;
                                        ?></th>
                                    <td>{!! $inContact->headline !!}</td>
                                    <td><a href="#" class="btn-irnews" target="_blank"><span>อ่านเพิ่มเติม</span>  <i class="bi bi-arrow-right-circle"></i></a></td>
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
