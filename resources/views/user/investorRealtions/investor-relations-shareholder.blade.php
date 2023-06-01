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
        <h1>โครงสร้างผู้ถือหุ้น</h1>
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
                                <tr>
                                    <th scope="row">1</th>
                                    <td>บริษัท เอ็มบริโอ แพลนเนท จำกัด</td>
                                    <td>326,355,876</td>
                                    <td class="text-right">38.51%</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>King's Eye Investments Ltd.</td>
                                    <td>296,450,000</td>
                                    <td class="text-right">34.99%</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>BNP PARIBAS HONG KONG BRANCH</td>
                                    <td>42,489,513</td>
                                    <td class="text-right">5.01%</td>
                                </tr>
                                <tr>
                                    <th scope="row">4</th>
                                    <td>บริษัท ไทยเอ็นวีดีอาร์ จำกัด</td>
                                    <td>13,936,483</td>
                                    <td class="text-right">1.64%</td>
                                </tr>
                                <tr>
                                    <th scope="row">5</th>
                                    <td>กองกุนเปิดเคเคพี หุ้นระยะยาวปันผล</td>
                                    <td>12,623,700</td>
                                    <td class="text-right">1.49%</td>
                                </tr>
                                <tr>
                                    <th scope="row">6</th>
                                    <td>N.C.B.TRUST LIMITED-NORGES BANK 1</td>
                                    <td>7,224,500</td>
                                    <td class="text-right">0.85%</td>
                                </tr>
                                <tr>
                                    <th scope="row">7</th>
                                    <td>น.ส.สุธิดา มงคลสุธี</td>
                                    <td>5,757,839</td>
                                    <td class="text-right">0.68%</td>
                                </tr>
                                <tr>
                                    <th scope="row">8</th>
                                    <td>กองทุนเปิด เคเคพี หุ้นทุนเพื่อการเลี้ยงชีพ</td>
                                    <td>3,900,320</td>
                                    <td class="text-right">0.66%</td>
                                </tr>
                                <tr>
                                    <th scope="row">9</th>
                                    <td>นายสุระ คณิตทวีกุล</td>
                                    <td>3,110,110</td>
                                    <td class="text-right">0.37%</td>
                                </tr>
                                <tr>
                                    <th scope="row">10</th>
                                    <td>นายพิชญ์ เทวอักษร</td>
                                    <td>2,725,100</td>
                                    <td class="text-right">0.32%</td>
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
