<!doctype html>
<html>

<head>
	@include('user.inc_head')
   {!! htmlScriptTagJsApi() !!} 
</head>

<body>

<div class="container-fluid">
	
@include('user.inc_menu')


<section class="row">
    <div class="col-12 banner-inside wow fadeInDown">
        <figure><img src="images/banner-irnews.webp" alt=""></figure>
        <h1>อีเมลรับข่าวสาร</h1>
    </div>
</section>

<section class="row">
    <div class="col-12 wrap-ir-newsletter wow fadeInDown">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="topic-cform">อีเมลรับข่าวสาร</div>
                    <div class="topic-cform1">ท่านสามารถลงทะเบียนเพื่อรับข่าวสารอิเล็กทรอนิกส์ได้ <br> โดยเราจะส่งข้อมูลรายงานต่อตลาดหลักทรัพย์ฯ และงบการเงิน ที่ประกาศผ่านเว็บไซต์นี้ให้ท่าน</div>
                    <div class="txt-newsletter">เพื่อลงทะเบียนรับข้อมูลข่าวสารอิเล็กทรอนิกส์กรุณากรอกรายละเอียด ของท่านและคลิกปุ่ม <span>“สมัครสมาชิกรับข่าวสาร”</span> </div>
                    <div class="wrap-boxform">
                        <form method="POST" action="{{route('user.emailnotification.store') }}" enctype="multipart/form-data">
                            @csrf   
                            <div class="row">
                                <div class="col-12 col-md-6 frmcontact">
                                    <label>อีเมล<span>*</span></label>
                                    <input type="email" class="form-control" name="email" placeholder="Enter your Email">
                                </div>
                                <div class="col-12 col-md-6 frmcontact">
                                    <label>ชื่อ - นามสกุล</label>
                                    <input type="text" class="form-control" name="surname" placeholder="Enter your Surname">
                                </div>
                                <div class="col-12 col-md-6 frmcontact">
                                    <label>ประเทศ</label>
                                    <select name="country" id="" class="form-select">
                                        <option value="" selected disabled>กรุณาเลือก</option>
                                        @foreach ($cities as $city)
                                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12 col-md-6 frmcontact">
                                    <label>อาชีพ</label>
                                    <input type="text" class="form-control" name="occupation" placeholder="Enter your occupation">
                                </div>
                                <div class="col-12 col-md-6 frmcontact">
                                    <label>ตำแหน่งงาน</label>
                                    <input type="text" class="form-control" name="jobposition" placeholder="Enter your job position">
                                </div>
                                <div class="col-12 col-md-6 frmcontact">
                                    <label>อุตสาหกรรม</label>
                                    <input type="text" class="form-control" name="industry" placeholder="Enter your industry">
                                </div>
                                <div class="col-12 form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" name="accept" for="exampleCheck1">ข้าพเจ้าให้ความยินยอมแก่ บริษัท เอ็มบริโอ แพลนเนท จำกัด ในการเก็บ และใช้ ข้อมูลส่วนบุคคล ของข้าพเจ้า เพื่อส่งข่าวสารผ่านอีเมลที่ข้าพเจ้าได้ให้ไว้ เมื่อกรอกแบบฟอร์มการลงทะเบียนครบถ้วนแล้ว ระบบจะดำเนินการส่งอีเมล์ตามที่อยู่อีเมลระบุไว้ โดยท่านสามารถคลิกที่ลิงค์สำหรับยืนยันการรับข้อมูลข่าวสารจากเรา</label>
                                </div>
                                <div class="col-12 col-md-6">
                                    {!! htmlFormSnippet() !!}
                                    @if($errors->has('g-recaptcha-response'))
                                    <div>
                                       <small class="text-danger">{{ $errors->first('g-recaptcha-response') }}</small>
                                    </div>
                                  @endif
                                </div>
                                <div class="col-12 col-md-6 text-end">
                                    <button class="btn-gold"><i class="bi bi-envelope"></i> สมัครสมาชิกรับข่าวสาร</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="frm-boxnote"><span>หมายเหตุ:</span>  หากท่านต้องการยกเลิกข่าวสารอิเล็กทรอนิกส์จาก บริษัท เอ็มบริโอ แพลนเนท จำกัด โปรดคลิกที่นี่</div>
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
