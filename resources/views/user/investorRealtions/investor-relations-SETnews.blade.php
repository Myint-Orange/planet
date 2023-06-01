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
        <figure><img src="images/banner-irnews.webp" alt=""></figure>
        <h1>ข่าวแจ้งตลาดหลักทรัพย์</h1>
    </div>
</section>

<section class="row">
    <div class="col-12 wrap-top-homeir wrap-tophistory wow fadeInDown">
        <div class="container">
            <div class="row page-content ir-manytable">
                <div class="col-12 wow fadeInDown">
                    <h2 class="topic-irpage">ข่าวแจ้งตลาดหลักทรัพย์</h2>
                    <div class="box-search-irnews">
                        <div class="frm-searchnews-select">
                            <span>ค้นหา</span>
                            <select>
                                <option value="">ล่าสุด</option>
                                <option value="">2565</option>
                                <option value="">2564</option>
                            </select>
                        </div>
                        <div class="frm-searchnews-input">
                            <input type="text" placeholder="กรอกคำที่ต้องการค้นหา...">
                        </div>
                        <button class="btn-search"><i class="bi bi-search"></i> ค้นหา</button>
                    </div>
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
                                <tr>
                                    <th scope="row" class="txt-nowrap">08 พฤษภาคม 2566</th>
                                    <td>การลงทุนเพิ่มเติมในหุ้นสามัญของบริษัท ไอเทล คอร์ปอเรชั่น จำกัด (มหาชน) (ITC)</td>
                                    <td><a href="#" class="btn-irnews" target="_blank"><span>อ่านเพิ่มเติม</span>  <i class="bi bi-arrow-right-circle"></i></a></td>
                                </tr>
                                <tr>
                                    <th scope="row" class="txt-nowrap">08 พฤษภาคม 2566</th>
                                    <td>รายงานผลการซื้อคืนกรณีเพื่อการบริหารทางการเงิน</td>
                                    <td><a href="#" class="btn-irnews" target="_blank"><span>อ่านเพิ่มเติม</span>  <i class="bi bi-arrow-right-circle"></i></a></td>
                                </tr>
                                <tr>
                                    <th scope="row" class="txt-nowrap">03 พฤษภาคม 2566</th>
                                    <td>รายงานผลการซื้อคืนกรณีเพื่อการบริหารทางการเงิน</td>
                                    <td><a href="#" class="btn-irnews" target="_blank"><span>อ่านเพิ่มเติม</span>  <i class="bi bi-arrow-right-circle"></i></a></td>
                                </tr>
                                <tr>
                                    <th scope="row" class="txt-nowrap">03 พฤษภาคม 2566</th>
                                    <td>การแต่งตั้งกรรมการใหม่แทนกรรมการเดิมที่ขอลาออก</td>
                                    <td><a href="#" class="btn-irnews" target="_blank"><span>อ่านเพิ่มเติม</span>  <i class="bi bi-arrow-right-circle"></i></a></td>
                                </tr>
                                <tr>
                                    <th scope="row" class="txt-nowrap">03 พฤษภาคม 2566</th>
                                    <td>คำอธิบายและวิเคราะห์ของฝ่ายจัดการ ไตรมาสที่ 1 สิ้นสุดวันที่ 31 มี.ค. 2566</td>
                                    <td><a href="#" class="btn-irnews" target="_blank"><span>อ่านเพิ่มเติม</span>  <i class="bi bi-arrow-right-circle"></i></a></td>
                                </tr>
                                <tr>
                                    <th scope="row" class="txt-nowrap">03 พฤษภาคม 2566</th>
                                    <td>สรุปผลการดำเนินงานของ บจ. ไตรมาสที่ 1 (F45) (สอบทานแล้ว)</td>
                                    <td><a href="#" class="btn-irnews" target="_blank"><span>อ่านเพิ่มเติม</span>  <i class="bi bi-arrow-right-circle"></i></a></td>
                                </tr>
                                <tr>
                                    <th scope="row" class="txt-nowrap">03 พฤษภาคม 2566</th>
                                    <td>งบการเงิน ไตรมาสที่ 1/2566 (สอบทานแล้ว)</td>
                                    <td><a href="#" class="btn-irnews" target="_blank"><span>อ่านเพิ่มเติม</span>  <i class="bi bi-arrow-right-circle"></i></a></td>
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
