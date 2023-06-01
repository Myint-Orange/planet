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
            <div class="col-12 wrap-career">
                <div class="container">
                    <div class="row">
                        <div class="col-12 wow fadeInDown">
                            <div class="topic-pageinside">ร่วมงานกับ <span>EMBRYO</span>
                                <div></div>
                            </div>
                            <div class="text-center">
                                <div class="txt-career01">เอ็มบริโอ แพลนเนท และบริษัทในเครือ เปิดรับสมัครเพื่อนร่วมทีมหลายตำแหน่ง</div>
                                <div class="txt-career02">เพราะเราเชื่อว่า <span>“พนักงาน”</span> คือ คนสำคัญที่สุด</div>
                                <div class="txt-career03">มาร่วมเป็นส่วนหนึ่งและเติบโตไปด้วยกันกับเรา</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="row">
            <div class="col-12 career-corevalue">
                <div class="container">
                    <div class="row">
                        <div class="col-12 wow fadeInDown">
                            <div class="box-photocareer"><img src="{{asset('storage/types/'.$benefit->imgname)}}" alt=""></div>
                        </div>
                        @foreach ($corevalue->posts->sortByDesc('created_at') as $post)
                        <div class="col-4 col-md-4 col-lg-2 item-corecareer wow fadeInDown">
                            <figure class="hello2">
                                <div class="icon-corevalue"><img src="{{asset('storage/posts/'.$post->imgname)}}" alt=""></div>
                                <div class="txt-value-en" data-th="{{$post->titles[0]->title_th}}" data-en="{{$post->titles[0]->title_en}}" data-ch="{{$post->titles[0]->title_ch}}">{{$post->titles[0]->title_th}}</div>
                                <div class="txt-value-th" data-th="{{$post->titles[1]->title_th}}" data-en="{{$post->titles[1]->title_en}}" data-ch="{{$post->titles[1]->title_ch}}">{{$post->titles[1]->title_th}}</div>
                            </figure>
                        </div>
                        @endforeach



                    </div>
                </div>
            </div>
        </section>

        <section class="container">
            <div class="row">

                <div class="col-12 page-benefit page-content text-center wow fadeInDown">
                    <div class="title-benefit01" id="benefitTitle">{{$benefit->typeTitles[0]->title_th}}</div>
                    <div class="title-benefit02" id="benefitTitle1">{{$benefit->typeTitles[1]->title_th}}</div>
                    <div class="title-benefit03" id="benefitTitle2">{{$benefit->typeTitles[2]->title_th}}</div>
                    <div class="box-slidebenefit">
                        <div class="owl-benefit owl-carousel owl-theme">
                            @foreach($benefit->posts as $post)
                            <div class="item-benefit">
                                <figure class="hello">
                                    <div class="icon-benefit "><img src="{{asset('storage/posts/'.$post->imgname)}}" alt=""></div>
                                    <span class="benefitTitle" data-th="{{$post->titles[0]->title_th}}" data-en="{{$post->titles[0]->title_en}}" data-ch="{{$post->titles[0]->title_ch}}"> {{$post->titles[0]->title_th}}</span>
                                </figure>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="row">
            <div class="col-12 photo-career-bottom wow fadeInDown">
                <figure>
                    <div class="photo-careerbt"><img src="{{asset('storage/types/'.$findjob->imgname)}}" alt=""></div>
                    <div class="caption-careerbt">
                        <img src="{{asset('user/images/logo-embryo.svg')}}" alt="">
                        <div id="findjobTitle">{{$findjob->typeTitles[1]->title_th}}</div>

                    </div>
                </figure>
            </div>
        </section>

        <section class="row">
            <div class="col-12 wrap-position wow fadeInDown">
                <div class="container">
                    <div class="row">
                        <div class="col-12 text-center">
                            <div class="title-benefit01" id="findjobTitle1">{{$findjob->typeTitles[0]->title_th}}</div>
                            <div class="num-position">ทั้งหมด {{count($findjob->posts)}} ตำแหน่ง</div>
                        </div>
                    </div>
                    <div class="row all-position">
                        @foreach($findjob->posts as $post)
                        <div class="col-12 col-md-6 col-lg-4 hello1">
                            <a href="{{route('user.detailWorkWithUs',$post->id)}}" class="item-position">
                                <div class="position-name" data-th="{{$post->titles[0]->title_th}}" data-en="{{$post->titles[0]->title_en}}" data-ch="{{$post->titles[0]->title_ch}}">{{$post->titles[0]->title_th}}</div>
                                <div class="position-area" data-th="{{$post->titles[1]->title_th}}" data-en="{{$post->titles[1]->title_en}}" data-ch="{{$post->titles[1]->title_ch}}"><i class="bi bi-geo-alt"></i>{{$post->titles[1]->title_th}}</div>
                                <div class="date-news">post date :{{ $post->created_at->format('d-m-Y') }}</div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        @include('user.inc_footer')

        <script>
            $(".box-menu > ul > li:nth-child(6) > a").addClass("here");
            $(document).ready(function() {
                var lang = localStorage.getItem('activeLang');
                if (lang == null) {
                    lang = th;
                }
                prepareForCoreValues();
                changeClassForeachTitle(lang);
                prepareForTitle(lang);
            });

            function prepareForCoreValues() {
                $('.language-link').click(function(e) {
                    e.preventDefault();
                    var lang = $(this).data('lang');
                    prepareForTitle(lang);

                    changeClassForeachTitle(lang);

                    $('.language-link').removeClass('active');
                    $(this).addClass('active');
                });
            }

            function changeClassForeachTitle(lang) {

                $('.hello').each(function() {
                    var $figcaption = $(this);
                    var $benefitTitle = $figcaption.find('.benefitTitle');
                    $benefitTitle.html($benefitTitle.data(lang));
                });
                $('.hello1').each(function() {
                    var $figcaption = $(this);
                    var $title = $figcaption.find('.position-name');
                    var $subtitle = $figcaption.find('.position-area');
                    $title.html($title.data(lang));
                    $subtitle.html('<i class="bi bi-geo-alt"></i>'+$subtitle.data(lang));
                });
                $('.hello2').each(function() {
                    var $figcaption = $(this);
                    var $title = $figcaption.find('.txt-value-en');
                    var $subtitle = $figcaption.find('.txt-value-th');
                    $title.html($title.data(lang));
                    $subtitle.html($subtitle.data(lang));
                });
            }

            function prepareForTitle(lang) {


                var mainTitle = '',
                    benefitTitle = '',
                    benefitTitle1 = '',
                    benefitTitle2 = '',
                    findjobTitle = '',
                    findjobTitle1 = '';
                if (lang === 'th') {
                    mainTitle = '{{$group->gpTitles[0]->title_th}}';
                    benefitTitle = '{{$benefit->typeTitles[0]->title_th}}';
                    benefitTitle1 = '{{$benefit->typeTitles[1]->title_th}}';
                    benefitTitle2 = '{{$benefit->typeTitles[2]->title_th}}';
                    findjobTitle = '{{$findjob->typeTitles[1]->title_th}}';
                    findjobTitle1 = '{{$findjob->typeTitles[0]->title_th}}';

                } else if (lang === 'en') {
                    mainTitle = '{{$group->gpTitles[0]->title_en}}';
                    benefitTitle = '{{$benefit->typeTitles[0]->title_en}}';
                    benefitTitle1 = '{{$benefit->typeTitles[1]->title_en}}';
                    benefitTitle2 = '{{$benefit->typeTitles[2]->title_en}}';
                    findjobTitle = '{{$findjob->typeTitles[1]->title_en}}';
                    findjobTitle1 = '{{$findjob->typeTitles[0]->title_en}}';
                } else if (lang === 'ch') {
                    mainTitle = '{{$group->gpTitles[0]->title_ch}}';
                    benefitTitle = '{{$benefit->typeTitles[0]->title_ch}}';
                    benefitTitle1 = '{{$benefit->typeTitles[1]->title_ch}}';
                    benefitTitle2 = '{{$benefit->typeTitles[2]->title_ch}}';
                    findjobTitle = '{{$findjob->typeTitles[1]->title_ch}}';
                    findjobTitle1 = '{{$findjob->typeTitles[0]->title_ch}}';

                }
                $('#mainTitle').text(mainTitle);
                $('#benefitTitle').html(benefitTitle);
                $('#benefitTitle1').text(benefitTitle1);
                $('#benefitTitle2').text(benefitTitle2);
                $('#findjobTitle').html(findjobTitle);
                $('#findjobTitle1').text(findjobTitle1);

            }
        </script>


    </div>

</body>

</html>