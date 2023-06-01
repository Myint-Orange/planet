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
        <figure><img src=" {{asset('storage/groups/'.$group->imgname)}}" alt="">
                </figure>
              
                <h1 id="mainTitle">{{$group->gpTitles[0]->title_th}}</h1>
            </div>
        </section>

        <section class="row">
            <div class="col-12 wrap-contact">
                <div class="container">
                    <div class="row">
                        <div class="col-12 wow fadeInDown">
                            <div class="topic-pageinside">ติดต่อ <span>EMBRYO</span>
                                <div></div>
                            </div>
                        </div>
                        <div class="col-12 col-md-7 col-xl-6 wow fadeInLeft">
                            <div class="contact-info">
                                <h2>ADDRESS</h2>
                                
                                <h3 id="company">{{$address->typeTitles[0]->title_th}}</h3>
                                <address id="companyAddress">{{$address->typeTitles[1]->title_th}}</address>
                                <div class="info-detail">
                                    <div id="companyTelephone"><span><i class="bi bi-telephone"></i> โทร. </span>{{$address->typeTitles[2]->title_th}}</div>
                                    <div id="companyEmail"><span><i class="bi bi-envelope"></i> อีเมล์ </span> {{$address->typeTitles[3]->title_th}}</div>
                                    <div><a href="{{$address->typeTitles[4]->title_th}}" target="_blank"><i class="bi bi-geo-alt"></i> <span id="viewMap"  data-th="ดูแผนที่" data-en="View Map" data-ch="View Map">ดูแผนที่</span></a></div>
                                </div>
                                <div class="box-follow">
                                    <span>Follow us</span>
                                    <div>
                                        <a href="{{$followus->typeTitles[0]->title_th}}" target="_blank"><img src="{{asset('user/images/icon-fb.svg')}}" alt=""></a>
                                        <a href="{{$followus->typeTitles[1]->title_th}}" target="_blank"><img src="{{asset('user/images/icon-ig.svg')}}" alt=""></a>
                                        <a href="{{$followus->typeTitles[2]->title_th}}" target="_blank"><img src="{{asset('user/images/icon-youtube.svg')}}" alt=""></a>
                                        <a href="{{$followus->typeTitles[3]->title_th}}" target="_blank"><img src="{{asset('user/images/icon-twitter.svg')}}" alt=""></a>
                                        <a href="{{$followus->typeTitles[4]->title_th}}" target="_blank"><img src="{{asset('user/images/icon-line.svg')}}" alt=""></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-5 col-xl-6 wow fadeInRight">
                            <div class="contact-info">
                                <h2 >HOW TO GET THERE</h2>
                                <div class="box-getthere" id="bts">
                                    <h3>รถไฟฟ้า BTS</h3>
                                    
                                    {{$getthere->typeTitles[0]->title_th}}
                                </div>
                                <div class="box-getthere" id="bus">
                                    <h3>รถประจำทาง</h3>
                                    
                                    {{$getthere->typeTitles[1]->title_th}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="row">
            <div class="col-12 wrap-contactform wow fadeInDown">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="topic-cform">CONTACT FORM</div>
                            <div class="topic-cform1" id="formTitle" data-th="เลือกหัวข้อที่ท่านต้องการติดต่อ" data-en="Fill out the form below to submit details." data-ch="">Fill out the form below to submit details.</div>
                            <div class="wrap-boxform">
                                <form action='{{route('user.contactform.store')}}' method="post" enctype="multipart/form-data" id='regform'>
                                    @csrf
                                    <div class="row">
                                        <div class="col-12 frmcontact">
                                            <label id="topicType" data-th="เลือกหัวข้อที่คุณต้องการติดต่อ" data-en="Select the topic you wish to contact." data-ch="">เลือกหัวข้อที่ท่านต้องการติดต่อ</label>
                                            <select name="type_id" class="form-select">
                                                @foreach($topicTypes as $topicType)
                                                <span class="hello">
                                                    <option class="selectbox" value="{{$topicType->id}}" data-th="{{$topicType->topic_name_th}}" data-en="{{$topicType->topic_name_en}}" data-ch="{{$topicType->topic_name_ch}}">{{$topicType->topic_name_th}}
                                                    </option>
                                                </span>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-12 col-lg-4 frmcontact">
                                            <label id="surename" data-th="ชื่อ - นามสกุล" data-en="Name - Surname" data-ch="Name - Surname">ชื่อ - นามสกุล<span>*</span></label>
                                            <input type="text" name="name" class="form-control" required>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4 frmcontact">
                                            <label id="email-lab" data-th="อีเมล" data-en="Email" data-ch="Email">อีเมล<span>*</span></label>
                                            <input type="text" name="email" class="form-control" required>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4 frmcontact">
                                            <label id="phone-lab" data-th="หัวข้อเรื่อง" data-en="Phone number" data-ch="Phone number">เบอร์โทรศัพท์<span>*</span></label>
                                            <input type="text" name="phone" class="form-control" required>
                                        </div>
                                        <div class="col-12 frmcontact">
                                            <label id="topic" data-th="ข้อความของคุณ" data-en="topic" data-ch="Topic">หัวข้อเรื่อง</label>
                                            <input type="text" name="topic" class="form-control" >
                                        </div>
                                        <div class="col-12 frmcontact">
                                            <label id="message" data-th="ข้อความของคุณ" data-en="your message" data-ch="your message">ข้อความของคุณ</label>
                                            <textarea  id="" name="message" rows="4" class="form-control" ></textarea>
                                        </div>
                                        <div class="col-12 col-md-8">
                                            <div class="frm-policy" id="policy" data-th="เพื่อให้ท่านทราบวิธีและกระบวนการ ที่เราดำเนินการจัดเก็บข้อมูล วัตถุประสงค์การใช้ข้อมูล ​
                                    ท่านสามารถศึกษารายละเอียด แบบแจ้งเกี่ยวกับข้อมูลส่วนบุคคล (Privacy Notice) ได้ที่นี่ " 
                                    data-en="so that you know the method and process where we store data Purpose of using information ​ You can study the details. Privacy Notice form here.click" 
                                    data-ch="so that you know the method and process where we store data Purpose of using information ​ You can study the details. Privacy Notice form here.click">
                                                เพื่อให้ท่านทราบวิธีและกระบวนการ ที่เราดำเนินการจัดเก็บข้อมูล วัตถุประสงค์การใช้ข้อมูล ​
                                                ท่านสามารถศึกษารายละเอียด แบบแจ้งเกี่ยวกับข้อมูลส่วนบุคคล (Privacy Notice) ได้ที่นี่ <a href="#" target="_blank">คลิก</a>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4 text-end">
                                            <button button="submit" class="btn-gold" id="sendButton" data-th="ส่งข้อความ" data-en="SEND MESSAGE" data-ch="SEND MESSAGE">ส่งข้อความ</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="row wow fadeInDown">
            <div class="col-12 googlemaps">
                <div class="ratio ratio-21x9">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31002.59129178256!2d100.4967758791016!3d13.759329899999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30e29eb50e15b03b%3A0x25d0be6ed2cd6554!2sEmbryo%20Planet%20Company%20Limited!5e0!3m2!1sth!2sth!4v1680856228730!5m2!1sth!2sth" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </section>

        @include('user.inc_footer')

        <script>
            $(".box-menu > ul > li:nth-child(8) > a").addClass("here");
            $(document).ready(function() {
                var lang = localStorage.getItem('activeLang');
                if (lang == null) {
                    lang = th;
                }
                prepareForCoreValues();
                prepareForTitle(lang);
                changeLanguageForSelectBox(lang);
            });

            function prepareForCoreValues() {
                $('.language-link').click(function(e) {
                    e.preventDefault();
                    var lang = $(this).data('lang');
                    prepareForTitle(lang);
                    changeLanguageForSelectBox(lang);
                    $('.language-link').removeClass('active');
                    $(this).addClass('active');
                });
            }

            function prepareForTitle(lang) {
                
                
                var mainTitle="",company="",companyAddress="",companyTelephone="",companyEmail="",bts="",bus="";
                if(lang=='th'){
                mainTitle="{{$group->gpTitles[0]->title_th}}";
                company="{{$address->typeTitles[0]->title_th}}";
                companyAddress="{{$address->typeTitles[1]->title_th}}";
                companyTelephone="{{$address->typeTitles[2]->title_th}}";
                companyEmail="{{$address->typeTitles[3]->title_th}}";
                bts="<h3>รถไฟฟ้า BTS</h3>{{$getthere->typeTitles[0]->title_th}}";
                bus="<h3>รถประจำทาง</h3>{{$getthere->typeTitles[1]->title_th}}";
                }else if(lang=='en'){
                mainTitle="{{$group->gpTitles[0]->title_en}}";
                company="{{$address->typeTitles[0]->title_en}}";
                companyAddress="{{$address->typeTitles[1]->title_en}}";
                companyTelephone="{{$address->typeTitles[2]->title_en}}";
                companyEmail="{{$address->typeTitles[3]->title_en}}";
                bts="<h3>Sky Train BTS</h3>{{$getthere->typeTitles[0]->title_en}}";
                bus="<h3>BUS</h3>{{$getthere->typeTitles[1]->title_en}}";
                }else if(lang=='ch'){
                mainTitle="{{$group->gpTitles[0]->title_ch}}";
                company="{{$address->typeTitles[0]->title_ch}}";
                companyAddress="{{$address->typeTitles[1]->title_ch}}";
                companyTelephone="{{$address->typeTitles[2]->title_ch}}";
                companyEmail="{{$address->typeTitles[3]->title_ch}}";
                bts="<h3>空中列車 BTS</h3>{{$getthere->typeTitles[0]->title_ch}}";
                bus="<h3>公共汽車</h3>{{$getthere->typeTitles[1]->title_ch}}";
                }
               

                $('#mainTitle').text(mainTitle);
                $('#company').text(company);
                $('#companyAddress').text(companyAddress);
                $('#companyTelephone').text(companyTelephone);
                $('#companyEmail').text(companyEmail);
                $('#bts').html(bts);
                $('#bus').html(bus);
               

                var topicType = $('#topicType').data(lang);
                var surename = $('#surename').data(lang);
                var email = $('#email-lab').data(lang);
                var phone = $('#phone-lab').data(lang);
                var topic = $('#topic').data(lang);
                var message = $('#message').data(lang);
                var policy = $('#policy').data(lang);
                var sendButton = $('#sendButton').data(lang);
                var mainTitle = $('#mainTitle').data(lang);
                var viewMap=$('#viewMap').data(lang);

                $('#topicType').html(topicType);
                $('#surename').html(surename+'<span>*</span>');
                $('#email-lab').html(email+'<span>*</span>');
                $('#phone-lab').html(phone+'<span>*</span>');
                $('#topic').html(topic);
                $('#message').html(message);
                $('#policy').html(policy);
                $('#sendButton').html(sendButton);
                $('#mainTitle').html(mainTitle);
                $('#viewMap').html(viewMap);
            }

            function changeLanguageForSelectBox(lang) {
                console.log("Arrive action");
                $('select option').each(function() {
                    var $option = $(this);
                    $option.attr('data-lang', lang);
                    $option.text($option.data(lang));
                });
            }
        </script>


    </div>

</body>

</html>