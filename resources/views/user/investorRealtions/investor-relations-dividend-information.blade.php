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
        <h1>นโยบายและการจ่ายเงินปันผล</h1>
    </div>
</section>
@endif


<section class="row">
    <div class="col-12 wrap-top-homeir wrap-tophistory wow fadeInDown">
        <div class="container">
            <div class="row">
                <div class="col-12 page-content wow fadeInDown">
                    @if ($dividendpolicyandpayment)
                    <h2 class="topic-irpage">{{ $dividendpolicyandpayment->name_en }}</h2>
                    <div class="ir-content-editor content-editor">
                        <p style="font-size: 1.1rem; color: #000;">{!! $dividendpolicyandpayment->description_en !!}</p>
                        <br>
                    </div>
                    @else
                        
                    
                    <h2 class="topic-irpage">นโยบายและการจ่ายเงินปันผล</h2>
                    <div class="ir-content-editor content-editor">
                        <p style="font-size: 1.1rem; color: #000;">บริษัทฯ มีนโยบายจ่ายเงินปันผลให้แก่ผู้ถือหุ้นในอัตราไม่น้อยกว่าร้อยละ 40 ของกำไรสุทธิภายหลังหักภาษีเงินได้นิติบุคคล เงินสำรองตามกฎหมาย และเงินสำรองอื่นๆ</p>
                        <p>
                        ทั้งนี้ การจ่ายเงินปันผลดังกล่าวอาจเปลี่ยนแปลงได้ ขึ้นอยู่กับผลประกอบการ แผนการขยายธุรกิจ สภาพคล่อง ความจำเป็น และความเหมาะสมอื่นๆ ในอนาคต โดยบริษัทฯ จะให้อำนาจคณะกรรมการของบริษัทฯ ในการพิจารณา ซึ่งการดำเนินการดังกล่าวจะต้องก่อให้เกิดประโยชน์สูงสุดต่อผู้ถือหุ้น
                        </p>
                        <p style="color: #000;">
                            นโยบายการจ่ายเงินปันผลของบริษัทฯ
                        </p>
                        <p>คณะกรรมการบริษัทอาจพิจารณาจ่ายเงินปันผลประจำปีของบริษัทฯ ได้ โดยจะต้องได้รับความเห็นชอบจากที่ประชุมผู้ถือหุ้น เว้นแต่เป็นการจ่ายเงินปันผลระหว่างกาลซึ่งคณะกรรมการบริษัทมีอำนาจอนุมัติให้จ่ายเงินปันผลได้เป็นครั้งคราวเมื่อเห็นว่า บริษัทฯ มีผลกำไรสมควรพอจะทำเช่นนั้น แล้วให้รายงานให้ที่ประชุมผู้ถือหุ้นทราบในการประชุมคราวต่อไป</p>
                        <p>
                        บริษัทฯ มีนโยบายการจ่ายเงินปันผลให้แก่ผู้ถือหุ้นอย่างน้อยปีละ 2 ครั้ง รวมกันเป็นจำนวนไม่น้อยกว่าอัตราร้อยละ 50.0 ของกำไรสุทธิ ตามงบการเงินรวม หลังจากการหักทุนสำรองต่างๆ ทุกประเภทตามข้อบังคับของบริษัทฯ และตามกฎหมายแล้ว โดยจำนวนเงินปันผลที่จ่ายจะต้องไม่เกินกว่ากำไรสะสมของงบการเงินเฉพาะกิจการ ทั้งนี้ คณะกรรมการบริษัทจะพิจารณาการจ่ายเงินปันผลโคยคำนึงถึงปัจจัยต่างๆ เพื่อผลประโยชน์ต่อผู้ถือหุ้นเป็นหลัก เช่น ภาวะเศรษฐกิจ ผลการคำเนินงาน และฐานะทางการเงินของบริษัทฯ กระแสเงินสดของบริษัทฯ แผนการลงทุนของบริษัทฯ ในแต่ละปี และความจำเป็นในการใช้เงินทุนเพื่อขยายธุรกิจในอนาคต การสำรองเงินไว้เพื่อจ่ายชำระคืนเงินกู้ยืม หรือเป็นเงินทุนหมุนเวียนภายในบริษัทฯ เงื่อนไขและข้อจำกัดตามที่กำหนดในสัญญากู้ยืมเงินและการจ่ายเงินปันผลนั้นไม่มีผลกระทบต่อการดำเนินงานปกติของบริษัทฯ อย่างมีนัยสำคัญ ตามความจำเป็น ความเหมาะสม และข้อพิจารณาอื่นๆ ที่คณะกรรมการบริษัทเห็นสมควร
                        </p>
                        <br>
                    </div>
                    @endif
                    <div class="ir-table table-responsive">
                        <table class="table table-striped text-center">
                            <thead class="top-headtable">
                                <tr>
                                    <th scope="col">วันที่ขึ้นเครื่องหมาย</th>
                                    <th scope="col">วันปิดสมุดทะเบียน</th>
                                    <th scope="col">วันกำหนดรายชื่อผู้ถือหุ้น</th>
                                    <th scope="col">วันที่จ่ายเงินปันผล</th>
                                    <th scope="col">ประเภท</th>
                                    <th scope="col">เงินปันผล (ต่อหุ้น)</th>
                                    <th scope="col">หน่วย</th>
                                    <th scope="col">รอบผลประกอบการ</th>
                                    <th scope="col">เงินปันผลจาก</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                @foreach ($dividendDataLists as $dividendDataList)
                                    <tr>
                                        protected $fillable = ['markingdate', 'bookclosingdate', 'determiningdate', 'paymentdate', 'dividendpershare', 'unit', 'turnovercyclefrom', 'turnovercycleto', 'dividendsfrom'];
                                    <th scope="row">{{ $dividendDataList->markingdate }}</th>
                                    <td>{{ $dividendDataList->bookclosingdate }}</td>
                                    <td>{{ $dividendDataList->determiningdate }}</td>
                                    <td>{{ $dividendDataList->paymentdate }}</td>
                                    <td>{{ $dividendDataList->dividendpershare }}</td>
                                    <td>{{ $dividendDataList->unit }}</td>
                                    <td>{{ $dividendDataList->turnovercyclefrom }} - {{ $dividendDataList->turnovercycleto }}</td>
                                    <td>{{ $dividendDataList->dividendsfrom }}</td>
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
