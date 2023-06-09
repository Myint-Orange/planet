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
        <h1>การซื้อหุ้นสามัญเพิ่มทุน</h1>
    </div>
</section>
@endif

<section class="row">
    <div class="col-12 wrap-top-homeir wrap-tophistory wow fadeInDown">
        <div class="container">
            <div class="row page-content ir-manytable">
                <div class="col-12 wow fadeInDown">
                    <h2 class="topic-irpage">การซื้อหุ้นสามัญเพิ่มทุน</h2>
                    <div class="ir-table table-responsive">
                        <table class="table table-striped">
                            <thead class="top-headtable">
                                <tr>
                                    <th scope="col">การซื้อหุ้นสามัญเพิ่มทุน</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                @if (count($inContacts) > 0)
                                @foreach ($inContacts as $inContact)
                                <tr>
                                    <th scope="row">{{  $inContact->name }}</th>
                                    <td><a href="{{ asset('/images/'.$inContact->pdflink)}}" class="btn-download" target="_blank"><span>ดาวน์โหลด</span>  <i class="bi bi-file-earmark-arrow-down-fill"></i></a></td>
                                </tr>  
                                @endforeach
                                @else
                                <th>There is no data exit </th>
                                @endif
                               
                        
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
