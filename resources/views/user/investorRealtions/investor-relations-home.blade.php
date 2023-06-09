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
        <h1>{{ $type->typeTitles[0]->title_en }}</h1>
    </div>
</section>

{{-- company-history --}}
@if ($typeHistory)
<section class="row">
    <div class="col-12 wrap-top-homeir wrap-tophistory wow fadeInDown">
        <div class="container">
            <div class="row">
                <div class="col-12 page-content wow fadeInDown">
                    <div class="topic-history" id="subTitle">{{$typeHistory->typeTitles[0]->title_th}}</div>
                    <div class="topic-pageinside" id="postTitle">{{$typeHistory->typeTitles[1]->title_th}}
                        <div></div>
                    </div>
                    <div class="content-editor" id="content">
                        {!!$typeHistory->typeContents[0]->content_th!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@else
<section class="row">
    <div class="col-12 wrap-top-homeir wrap-tophistory wow fadeInDown">
        <div class="container">
            <div class="row">
                <div class="col-12 page-content wow fadeInDown">
                    <div class="topic-history">ข้อมูลบริษัท</div>
                    <div class="topic-pageinside">เอ็มบริโอ แพลนเนท จำกัด<div></div></div>
                    <div class="content-editor">
                        <p>
                        <span style="color: #000;">บริษัท เอ็มบริโอ แพลนเนท จำกัด</span>  ได้จดทะเบียนก่อตั้งบริษัท เมื่อวันที่ 19 เมษายน 2559 ด้วยทุนจดทะเบียนเริ่มต้น 1 ล้านบาท โดยกลุ่มผู้บริหารชาวไทยที่มีความรู้ ความสามารถและประสบการณ์ในธุรกิจด้านการรักษาผู้มีบุตรยากโดยการใช้เทคโนโลยีช่วยการเจริญพันธุ์ มากกว่า 10 ปี ซึ่งประกอบไปด้วย ทนพญ. ธิดา รัตนะจิตร ผู้เชี่ยวชาญด้านการเพาะเลี้ยงตัวอ่อนที่มีประสบการณ์ และ นายแพทย์สุรชัย พรวิรุฬห์ แพทย์ผู้เชี่ยวชาญด้านการรักษาผู้มีบุตรยากและเทคโนโลยีช่วยการเจริญพันธุ์
                        </p>
                        <p style="color: #827974; font-size: 1.1rem; font-weight: 500;">
                        ผู้ก่อตั้งทั้ง 2 ท่าน ได้เล็งเห็นถึงความสำคัญของการใช้เทคโนโลยีการเจริญพันธุ์มาช่วยเติมเต็มความสมบูรณ์ให้กับทุกๆ ครอบครัว
                        </p>
                        <p>
                        อีกทั้งยังเล็งเห็นโอกาสทางธุรกิจในอนาคตที่สามารถเติบโตอย่างรวดเร็ว จึงเริ่มต้นก่อตั้งบริษัทฯ ขึ้น โดยใช้ชื่อคลินิกว่า <span style="color: #000;"> สยาม เฟอร์ทิลิตี้ คลินิก (Siam Fertility Clinic)</span> ตั้งอยู่ที่ ถนนศรีอยุธยา เขตราชเทวี กรุงเทพฯ ในเดือนตุลาคม 2559 ให้บริการตรวจทางนรีเวช การรักษาภาวะมีบุตรยากด้วยเทคโนโลยีการเจริญพันธุ์ และการตรวจคัดกรองโรคทางพันธุกรรม โดยมีกลุ่มลูกค้าหลักเป็นชาวต่างชาติ และชาวไทย
                        </p>
                        <p style="color: #827974; font-size: 1.1rem; font-weight: 500;">
                        หลังจากเปิดดำเนินธุรกิจมาประมาณ 1 ปี สยาม เฟอร์ทิลิตี้ คลินิก ได้รับการตอบรับเป็นอย่างดี และเติบโตขึ้นอย่างต่อเนื่อง
                        </p>
                        <p>
                        บริษัทฯ จึงได้มีการร่วมทุน จัดตั้ง บริษัท ไอ สยาม โฮลดิ้ง จำกัด เปิดสถานพยาบาล ภายใต้ชื่อ สไมล์ ไอวีเอฟ คลินิก (Smile IVF Clinic)  เพื่อรองรับกลุ่มลูกค้าคนไทยเป็นหลักหลังมองเห็นโอกาสการเติบโตในตลาด รักษาผู้มีบุตรยากของกลุ่มลูกค้าในประเทศ  โดยบริษัทฯ ถือหุ้นในสัดส่วน 75%
                        </p>
                        <p>
                        ภายหลังจากสถานการณ์โควิด เริ่มคลี่คลาย  บริษัทฯ ได้มีการร่วมทุนก่อตั้งบริษัทในเครือเพื่อเปิดคลินิกใหม่อีก 2 แห่ง ในปี 2565 ได้แก่
                        </p>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif

@if ($typeHistory)   
<section class="container">
    <div class="row">
        <div class="col-12 wow fadeInDown">
            <div class="row box-partner-ir box-partner justify-content-center">
                @foreach($typeHistory->posts as $post)
                    <div class="col-12 col-md-6 col-lg-5 item-partner">
                        <figure>
                            <div class="photo-partner"><img src="{{ asset('storage/posts/'.$post->imgname)}}" alt=""></div>
                            <figcaption class="hello">
                                <div class="title-post" data-th="{{$post->titles[0]->title_th}}" data-en="{{$post->titles[0]->title_en}}" data-ch="{{$post->titles[0]->title_ch}}">{{$post->titles[0]->title_th}}</div>
                                <span class="subTitle-post" data-th="{{$post->titles[1]->title_th}}" data-en="{{$post->titles[1]->title_en}}" data-ch="{{$post->titles[1]->title_ch}}">{{$post->titles[1]->title_en}}</span>

                            </figcaption>
                        </figure>
                    </div>
                    @endforeach
            </div>
            <div class="content-editor">
                <p>
                    {!!$typeHistory->typeContents[3]->content_th!!}

                </p>
            </div>
        </div>
    </div>
</section>
@else
<section class="container">
    <div class="row">
        <div class="col-12 wow fadeInDown">
            <div class="row box-partner-ir box-partner justify-content-center">
                <div class="col-12 col-md-6 col-lg-5 item-partner">
                    <figure>
                        <div class="photo-partner"><img src="images/Rectangle 1992.webp" alt=""></div>
                        <figcaption>
                            <div>บริษัท เออีเอ็ม 2022 จำกัด</div>
                            เปิด สยาม เฟอร์ทิลิตี้ คลินิก แอท เกษตร-นวมินทร์ <br>
                            (Siam Fertility Clinic @Kaset Nawamin)
                        </figcaption>
                    </figure>
                </div>
                <div class="col-12 col-md-6 col-lg-5 item-partner">
                    <figure>
                        <div class="photo-partner"><img src="images/Rectangle 1993.webp" alt=""></div>
                        <figcaption>
                            <div>บริษัท เบบี้ ครีเอเตอร์ จำกัด</div>
                            เปิด สยาม เฟอร์ทิลิตี้ คลินิก แอท ถนนวิทยุ <br>
                            (Siam Fertility Clinic @Wireless Road)
                        </figcaption>
                    </figure>
                </div>
            </div>
            <div class="content-editor">
                <p>
                ปัจจุบัน บริษัท เอ็มบริโอ แพลนเนท จำกัด และบริษัทในเครือ มีคลินิกทั้งหมด 4 สาขา ครอบคลุมพื้นที่ธุรกิจใจกลางกรุงเทพ 3 แห่ง ได้แก่ พญาไท อารีย์ ถนนวิทยุ และคลินิกย่านเกษตรนวมินทร์ เพื่อรองรับกลุ่มลูกค้าในย่านที่อยู่อาศัยที่มีกำลังซื้อสูง 

                </p>
            </div>
        </div>
    </div>
</section>
@endif
@if ($typeGpStructure)
<section class="row">
    <div class="col-12 ir-wrap-deschistory wrap-deschistory wrap-structure wrap-tophistory wow fadeInDown">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="history-photocenter"><img src="{{ asset('storage/types/'.$typeHistory->typeImages[1]->name_en)}}" alt=""></div>
                    <div class="topic-pageinside">เอ็มบริโอ แพลนเนท จำกัด<div></div></div>
                    {{-- <div class="topic-pageinside" id="companyName">{{$typeGpStructure->typeTitles[1]->title_th}}
                        <div></div>
                    </div> --}}
                    <div class="content-editor" id="content">
                        {!!$typeGpStructure->typeContents[0]->content_th!!}
                    </div>
                    <div class="company-structure">
                        <div class="owl-structure owl-carousel owl-theme">
                            @foreach($typeGpStructure->posts as $post)
                            <div class="item-structure">
                                <figure>
                                    <div class="photo-structure"><img src="{{ asset('storage/posts/'.$post->imgname)}}" alt=""></div>
                                    <figcaption class="hello">
                                        <div class="figTitle" data-th="{!!$post->titles[0]->title_th!!}" data-en="{!!$post->titles[0]->title_en!!}" data-ch="{!!$post->titles[0]->title_ch!!}">{!!$post->titles[0]->title_th!!}</div>
                                        <p class="figSubTitle" data-th="{!!$post->titles[1]->title_th!!}" data-en="{!!$post->titles[1]->title_en!!}" data-ch="{!!$post->titles[1]->title_ch!!}"> {!!$post->titles[1]->title_th!!}</p>

                                    </figcaption>
                                </figure>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif

	
@include('user.inc_footer')

<script>
	$( ".box-menu > ul > li:nth-child(7) > a" ).addClass( "here" );
    $( ".box-menu ul li > .submenu ul > li:nth-child(0) > a" ).addClass( "here" );
</script>

		
</div>

</body>

</html>
