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
        <figure><img src=" {{ asset('storage/types/'.$type->imgname)}}" alt="">
                </figure>
                <h1 id="mainTitle">{{$type->typeTitles[0]->title_th}}</h1>
            </div>
        </section>

        <section class="row">
            <div class="col-12 wrap-companypartner wrap-tophistory wow fadeInDown">
                <div class="container">
                    <div class="row">
                        <div class="col-12 wow fadeInDown">
                            <div class="topic-history">เครือข่ายของ</div>
                            <div class="topic-pageinside">เอ็มบริโอ แพลนเนท<div></div>
                            </div>
                            <div class="topic-partner" id="subTitle">{{$type->typeTitles[1]->title_th}}</div>
                        </div>
                    </div>
                </div>
                <div>
                    @foreach ($type->posts as $post)
                    <div class="company-partner wow fadeInDown">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 col-lg-6 wow fadeInLeft">
                                    <div class="photo-cpartner"><img src="{{ asset('storage/posts/'.$post->imgname)}}" alt=""></div>
                                </div>
                                <div class="col-12 col-lg-6 wow fadeInRight">
                                    <div class="desc-cpartner">
                                        <div class="name-cpartner" data-th="{!! array_slice(explode('##', $post->contents[0]->content_th), 0, 1)[0] !!}" data-en="{!! array_slice(explode('##', $post->contents[0]->content_en), 0, 1)[0] !!}" data-ch="{!! array_slice(explode('##', $post->contents[0]->content_ch), 0, 1)[0] !!}">
                                            {!! array_slice(explode('##', $post->contents[0]->content_th), 0, 1)[0]!!} </div>
                                        <div class="content-editor">
                                            <span style="color: #000;" class="clinic-lab" data-th="ชื่อคลินิก :" data-en="Clinic name :" data-ch="">ชื่อคลินิก :</span> <span class="clinic" data-th="{!! array_slice(explode('##', $post->contents[0]->content_th), 1, 1)[0] !!}" data-en="{!! array_slice(explode('##', $post->contents[0]->content_en), 1, 1)[0] !!}" data-ch="{!! array_slice(explode('##', $post->contents[0]->content_ch), 1, 1)[0] !!}">
                                                {!! array_slice(explode('##', $post->contents[0]->content_th), 1, 1)[0] !!}</span> <br>
                                            <span style="color: #000;" class="typeBus-lab" data-th="ประเภทธุรกิจ :" data-en="Type Of Business :" data-ch="">ประเภทธุรกิจ :</span><span class="typeBus" data-th="{!! array_slice(explode('##', $post->contents[0]->content_th), 2, 1)[0] !!}" data-en="{!! array_slice(explode('##', $post->contents[0]->content_en), 2, 1)[0] !!}" data-ch="{!! array_slice(explode('##', $post->contents[0]->content_ch), 2, 1)[0] !!}">
                                                {!! array_slice(explode('##', $post->contents[0]->content_th), 2, 1)[0] !!}</span> <br>
                                            <span style="color: #000;" class="date-of-op-lab" data-th="วันเดือนปีที่เปิดดำเนินการ :" data-en="Date Of Operation :" data-ch="">วันเดือนปีที่เปิดดำเนินการ :</span><span class="date-of-op" data-th="{!! array_slice(explode('##', $post->contents[0]->content_th), 3, 1)[0] !!}" data-en="{!! array_slice(explode('##', $post->contents[0]->content_en), 3, 1)[0] !!}" data-ch="{!! array_slice(explode('##', $post->contents[0]->content_ch), 3, 1)[0] !!}">
                                                {!! array_slice(explode('##', $post->contents[0]->content_th), 3, 1)[0] !!} </span><br>
                                            <span style="color: #000;" class="branch-lab" data-th="ชื่อสาขา :" data-en="Branch Name :" data-ch="">ชื่อสาขา :</span><span class="branch" data-th="{!! array_slice(explode('##', $post->contents[0]->content_th), 4, 1)[0] !!}" data-en="{!! array_slice(explode('##', $post->contents[0]->content_en), 4, 1)[0] !!}" data-ch="{!! array_slice(explode('##', $post->contents[0]->content_ch), 4, 1)[0] !!}">
                                                {!! array_slice(explode('##', $post->contents[0]->content_th), 4, 1)[0] !!}</span> <br>
                                            <span style="color: #000;" class="location-lab" data-th="เว็บไซต์ :" data-en="Location :" data-ch="">สถานที่ตั้ง :</span><span class="location" data-th="{!! array_slice(explode('##', $post->contents[0]->content_th), 5, 1)[0] !!}" data-en="{!! array_slice(explode('##', $post->contents[0]->content_en), 5, 1)[0] !!}" data-ch="{!! array_slice(explode('##', $post->contents[0]->content_ch), 5, 1)[0] !!}">
                                                {!! array_slice(explode('##', $post->contents[0]->content_th), 5, 1)[0] !!}</span> <br>
                                            <span style="color: #000;" class="website-lab" data-th="เว็บไซต์ :" data-en="Website :" data-ch="">เว็บไซต์ :</span><span class="website" data-th="{!! array_slice(explode('##', $post->contents[0]->content_th), 6, 1)[0] !!}" data-en="{!! array_slice(explode('##', $post->contents[0]->content_en), 6, 1)[0] !!}" data-ch="{!! array_slice(explode('##', $post->contents[0]->content_ch), 6, 1)[0] !!}">
                                                {!! array_slice(explode('##', $post->contents[0]->content_th), 6, 1)[0] !!} </span><br>
                                            <span style="color: #000;" class="telephone-lab" data-th="เบอร์โทรศัพท์ :" data-en="Telephone Number :" data-ch="">เบอร์โทรศัพท์ :</span><span class="telephone" data-th="{!! array_slice(explode('##', $post->contents[0]->content_th), 7, 1)[0] !!}" data-en="{!! array_slice(explode('##', $post->contents[0]->content_en), 7, 1)[0] !!}" data-ch="{!! array_slice(explode('##', $post->contents[0]->content_ch), 7, 1)[0] !!}">
                                                {!! array_slice(explode('##', $post->contents[0]->content_th), 7, 1)[0] !!}</span> <br>
                                            <span style="color: #000;" class="email-lab" data-th="อีเมล :" data-en="E-mail :" data-ch="">อีเมล :</span> <span class="email" data-th="{!! array_slice(explode('##', $post->contents[0]->content_th), 8, 1)[0] !!}" data-en="{!! array_slice(explode('##', $post->contents[0]->content_en), 8, 1)[0] !!}" data-ch="{!! array_slice(explode('##', $post->contents[0]->content_ch), 8, 1)[0] !!}">
                                                {!! array_slice(explode('##', $post->contents[0]->content_th), 8, 1)[0] !!} </span><br>
                                            <span style="color: #000;" class="officehour-lab" data-th="เวลาทำการ :" data-en="Office Hours :" data-ch="">เวลาทำการ :</span><span class="officehour" data-th="{!! array_slice(explode('##', $post->contents[0]->content_th), 9, 1)[0] !!}" data-en="{!! array_slice(explode('##', $post->contents[0]->content_en), 9, 1)[0] !!}" data-ch="{!! array_slice(explode('##', $post->contents[0]->content_ch), 9, 1)[0] !!}">
                                                {!! array_slice(explode('##', $post->contents[0]->content_th), 9, 1)[0] !!}</span> <br>
                                            <span style="color: #000;" class="area-lab" data-th="ขนาดพื้นที่ :" data-en="Area Size :" data-ch="">ขนาดพื้นที่ :</span><span class="area" data-th="{!! array_slice(explode('##', $post->contents[0]->content_th), 10, 1)[0] !!}" data-en="{!! array_slice(explode('##', $post->contents[0]->content_en), 10, 1)[0] !!}" data-ch="{!! array_slice(explode('##', $post->contents[0]->content_ch), 10, 1)[0] !!}">
                                                {!! array_slice(explode('##', $post->contents[0]->content_th), 10, 1)[0] !!} </span><br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach


                </div>
            </div>
        </section>

        @include('user.inc_footer')


        <script>
            $(".box-menu > ul > li:nth-child(3) > a").addClass("here");
            $(".box-menu ul li > .submenu ul > li:nth-child(7) > a").addClass("here");
            $(document).ready(function() {
                var lang = localStorage.getItem('activeLang');
                if (lang == null) {
                    lang = th;
                }
                prepareForTitle(lang);
                classForEachValue(lang);
                prepareForCoreValues();
            });

            function prepareForCoreValues() {
                $('.language-link').click(function(e) {
                    e.preventDefault();


                    var lang = $(this).data('lang');

                    prepareForTitle(lang);
                    classForEachValue(lang);

                    // Remove the "active" class from all language links
                    $('.language-link').removeClass('active');

                    // Add the "active" class to the clicked language link
                    $(this).addClass('active');
                });
            }

            function classForEachValue(lang) {
                $('.company-partner').each(function() {
                    var $figure = $(this);

                    var $cpartner = $figure.find('.name-cpartner');
                    var $clinic = $figure.find('.clinic');
                    var $typeBus = $figure.find('.typeBus');
                    var $dateOfOp = $figure.find('.date-of-op');
                    var $branch = $figure.find('.branch');
                    var $location = $figure.find('.location');
                    var $website = $figure.find('.website');
                    var $telephone = $figure.find('.telephone');
                    var $email = $figure.find('.email');
                    var $officehour = $figure.find('.officehour');
                    var $area = $figure.find('.area');

                    var $clinic_lab = $figure.find('.clinic-lab');
                    var $typeBus_lab = $figure.find('.typeBus-lab');
                    var $dateOfOp_lab = $figure.find('.date-of-op-lab');
                    var $branch_lab = $figure.find('.branch-lab');
                    var $location_lab = $figure.find('.location-lab');
                    var $website_lab = $figure.find('.website-lab');
                    var $telephone_lab = $figure.find('.telephone-lab');
                    var $email_lab = $figure.find('.email-lab');
                    var $officehour_lab = $figure.find('.officehour-lab');
                    var $area_lab = $figure.find('.area-lab');


                    $clinic_lab.text($clinic_lab.data(lang));
                    $typeBus_lab.text($typeBus_lab.data(lang));
                    $dateOfOp_lab.text($dateOfOp_lab.data(lang));
                    $branch_lab.text($branch_lab.data(lang));
                    $location_lab.text($location_lab.data(lang));
                    $website_lab.text($website_lab.data(lang));
                    $telephone_lab.text($telephone_lab.data(lang));
                    $email_lab.text($email_lab.data(lang));
                    $officehour_lab.text($officehour_lab.data(lang));
                    $area_lab.text($area_lab.data(lang));

                    $cpartner.text($cpartner.data(lang));
                    $clinic.text($clinic.data(lang));
                    $typeBus.text($typeBus.data(lang));
                    $dateOfOp.text($dateOfOp.data(lang));
                    $branch.text($branch.data(lang));
                    $location.text($location.data(lang));
                    $website.text($website.data(lang));
                    $telephone.text($telephone.data(lang));
                    $email.text($email.data(lang));
                    $officehour.text($officehour.data(lang));
                    $area.text($area.data(lang));
                });
            }

            function prepareForTitle(lang) {
                var mainTitle = '',
                    subTitle = '';
                if (lang === 'th') {
                    mainTitle = '{{$type->typeTitles[0]->title_th}}';
                    subTitle = '{{$type->typeTitles[1]->title_th}}';
                } else if (lang === 'en') {
                    mainTitle = '{{$type->typeTitles[0]->title_en}}';
                    subTitle = '{{$type->typeTitles[1]->title_en}}';
                } else if (lang === 'ch') {
                    mainTitle = '{{$type->typeTitles[0]->title_ch}}';
                    subTitle = '{{$type->typeTitles[1]->title_ch}}';
                }
                $('#mainTitle').text(mainTitle);
                $('#subTitle').text(subTitle);


            }
        </script>


    </div>

</body>

</html>