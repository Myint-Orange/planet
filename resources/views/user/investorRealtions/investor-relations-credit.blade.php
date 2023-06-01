<!doctype html>
<html>

<head>
	@include('user.inc_head')
</head>

<body>

<div class="container-fluid">
	
@include('user.inc_menu')


<section class="row">
    <div class="col-12 banner-inside wow fadeInDown"">
        <figure><img src="images/banner-shareholder.webp" alt=""></figure>
        <h1>อันดับความน่าเชื่อถือ</h1>
    </div>
</section>

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
                                    <th scope="row">อันดับบริษัท</th>
                                    <th scope="row">TRIS</th>
                                    <th scope="row">BBB</th>
                                    <th scope="row">Stable</th>
                                    <th scope="row">29 มิถุนายน 2565</th>
                                    <td><a href="#" class="btn-download" target="_blank"><span>ดาวน์โหลด</span>  <i class="bi bi-file-earmark-arrow-down-fill"></i></a></td>
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
