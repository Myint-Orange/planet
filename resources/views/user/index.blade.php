<!doctype html>
<html>

<head>
    @include('user.inc_head')
</head>

<body>

    <div class="container-fluid">
        @include('user.inc_menu')

        <section class="row">
            <div class="col-12 wrapbanner wow fadeInDown"">
        <div class=" owl-bannerslide owl-carousel owl-theme">

                @foreach($group->gpImages as $image)
                <div class="items">
                    <figure><img src="{{asset('storage/groups/'.$image->name_en)}}" alt=""></figure>
                </div>
                @endforeach
            </div>
            <div class="caption-banner">

                <div id="gpWelcome" class="topic-banner01">{{$group->gpTitles[0]->title_th}}</div>
                <div id="gpTitle" class="topic-banner02">{{$group->gpTitles[1]->title_th}}</div>
                <div id="gpSubTitle" class="topic-banner03">{{$group->gpTitles[2]->title_th}}</div>
            </div>
            <div class="wrapbanner-qmenu">
                <div class="row box-quickmenu">
                    <div class="col-12 col-md-3 item-qmenu">
                        <a href="{{route('user.history.index')}}"><img src="{{asset('user/images/icon-company.svg')}}" alt=""> Company Profile</a>
                    </div>
                  
                    <div class="col-12 col-md-3 item-qmenu" id="busMain">
                     
                    </div>
                    <div class="col-12 col-md-3 item-qmenu">
                        <a href="#"><img src="{{asset('user/images/icon-investor.svg')}}" alt=""> Investor Relation</a>
                    </div>
                    <div class="col-12 col-md-3 qmenu-contact">
                        <a href="{{route('user.indexContact')}}" class="row">
                            <div class="col-12 col-lg-10">
                                <span>contact us</span><br>
                                Embryo Planet Co., Ltd.
                            </div>
                            <div class="col-12 col-lg-2">
                                <i class="bi bi-envelope"></i>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="txt-scroll">scroll</div>
            </div>
    </div>
    </section>

    <section class="row">
        <div class="col-12 home-history">
            <div class="container">
                <div class="row wrap-homehistory">
                    <div class="col-12 col-md-4 wow fadeInLeft">

                        <div class="photo-homehistory">
                            <div>company</div>
                            <figure><img src="{{asset('storage/types/'.$typeWelcome->imgname)}}" alt=""></figure>
                        </div>
                    </div>
                    <div class="col-12 col-md-8 wow fadeInRight">
                        <div class="desc-homeabout">
                            <div class="txt-welcome" id="welcome">welcome to</div>
                            <h1 id="welcomeTitle">{{$typeWelcome->typeTitles[0]->title_th}}</h1>
                            <h2 id="welcomeSubTitle">{{$typeWelcome->typeTitles[1]->title_th}}</h2>
                            <p id="welcomeContent">
                                {{$typeWelcome->typeContents[0]->content_th}}
                            </p>
                           
                            <div class="row icon-mcompany">
                                <div class="col-12 col-md-6">
                                    <a href="{{route('user.history.index')}}" id="history-href">
                                        <div class="icon-mcompany" id="history-main"><img src="{{asset('user/images/icon-history.svg')}}" alt=""></div> 
                                    </a>
                                </div>
                                <div class="col-12 col-md-6">
                                    <a href="{{route('user.vision.index')}}" id="vision-href">
                                        <div class="icon-mcompany" id="vision-main"><img src="{{asset('user/images/icon-vision.svg')}}" alt="" ></div> 
                                    </a>
                                </div>
                                <div class="col-12 col-md-6">
                                    <a href="{{route('user.groupstructure.index')}}" id="groupstructure-href">
                                        <div class="icon-mcompany" id="groupstructure-main"><img src="{{asset('user/images/icon-org.svg')}}" alt="" ></div>
                                    </a>
                                </div>
                                <div class="col-12 col-md-6" >
                                    <a href="{{route('user.corevalue.index')}}" id="corevalue-href">
                                        <div class="icon-mcompany" id="corevalue-main"><img src="{{asset('user/images/icon-board.svg')}}" alt=""  ></div>
                                    </a>
                                </div>
                              
                            </div>
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="row">
        <div class="col-12 wrap-homevdo wow fadeInDown">
            <a href="{{$services->vedioTypes[0]->youtube}}" data-fancybox>
                <figure>
                    <img src="{{asset('storage/types/'.$services->imgname)}}" alt="">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="caption-vdohome">
                                    <div class="vdohome-txt01" id="serviceTitle">{{$services->typeTitles[0]->title_th}} <i class="bi bi-play-circle"></i></div>
                                    <div class="vdohome-txt02" id="serviceSubTitle">{{$services->typeTitles[1]->title_th}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </figure>
            </a>
        </div>
    </section>

    <section class="row">
        <div class="col-12 home-business">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-5 wow fadeInLeft">
                        <div class="desc-homebusiness">

                            <div class="topic-gold" id="busTitle">{{$typeOurBus->typeTitles[0]->title_th}}</div>
                            <div class=" topic-business01" id="busSubTitle">{{$typeOurBus->typeTitles[1]->title_th}}</div>
                            <p id="busContent">
                                {{$typeOurBus->typeTitles[2]->title_th}}
                            </p>
                          
                                <div class="link-business" id="link-business">
                                 
                                </div>
                          
                            
                        </div>
                    </div>
                    <div class="col-12 col-lg-7 wow fadeInRight">
                        <figure><img src="{{asset('storage/types/'.$typeOurBus->imgname)}}" alt=""></figure>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="row">
        <div class="col-12 wrap-homeawards wow fadeInDown">
            <a href="{{route('user.award.index')}}">
                <figure>
                    <img src="{{asset('storage/types/'.$typeAward->imgname)}}" alt="">
                    <div class="caption-awards">
                        <div class="txt-awards01" id="awardTitle">{{$typeAward->typeTitles[0]->title_th}}</div>
                        <div class="txt-awards02" id="awardSubTitle">{!!$typeAward->typeTitles[1]->title_th!!}</div>
                        <div class="btn-textarrow">view more <img src="{{asset('user/images/icon-arrow-gold.svg')}}" alt=""></div>
                    </div>
                </figure>
            </a>
        </div>
    </section>

    <!-- <section class="row">
        <div class="col-12 wrap-homeir wow fadeInDown">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-6 wow fadeInLeft">
                        <div class="caption-awards">
                            <div class="txt-awards01">ir notice</div>
                            <div class="topic-gold">investor relation</div>
                            <div class="desc-homeir">Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum has been the industry's.</div>
                            <div class="btn-textarrow">view more <img src="{{asset('user/images/icon-arrow-gold.svg')}}" alt=""></div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="row hide">
                            <div class="col-12 col-md-9">
                                <div class="box-homeset">
                                    <div class="txt-setname">SET : EBP</div>
                                    <div class="txt-settopic">Last Updated 01 Mar 2023 15:27</div>
                                    <div class="set-value">70.25 THB</div>
                                    <div class="box-setvolumn">
                                        <div class="item-setvolumn"><span class="txt-settopic">Change (%)</span> <br>-0.50 (-0.72%)</div>
                                        <div class="item-setvolumn"><span class="txt-settopic">Volume (Shares)</span> <br>939,213</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <a href="#" target="_blank" class="ir-pdfreport">
                                    <figure><img src="{{asset('user/images/banner.webp')}}" alt=""></figure>
                                    Financial Statement 2022
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->

    <section class="row">
        <div class="col-12 wrap-homenews wow fadeInDown">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-9 wow fadeInLeft">
                        <div class="txt-homenews">{{$activity->typeTitles[0]->title_en}}</div>
                        <div class="topic-gold">latest update</div>
                    </div>
                    <div class="col-12 col-md-3 text-end wow fadeInRight">
                        <div class="btn-homenews"><a href="{{route('user.indexActivity')}}" class="btn-gold">view all <img src="{{asset('user/images/icon-arrow-gold.svg')}}" alt=""></a></div>
                    </div>
                </div>
                <div class="row wow fadeInDown">
                   
                    @foreach($posts->sortByDesc('created_at')->take(3) as $post)
                            <div class="col-12 col-md-6 item-news">
                                <a href="{{ route('user.detailActivity', $post->id) }}">
                                    <figure class="hello">
                                        <img src="{{ asset('storage/posts/'.$post->imgname) }}" alt="">
                                        <div class="caption-news">
                                            <div class="date-news">post date: {{ $post->created_at->format('d-m-Y') }}</div>
                                            <div class="title-news" data-th="{{ $post->titles[0]->title_th }}" 
                                                                    data-en="{{ $post->titles[0]->title_en }}" 
                                                                    data-ch="{{ $post->titles[0]->title_ch }}">{{ $post->titles[0]->title_th }}</div>
                                            <div class="btn-textarrow">view more <img src="{{asset('user/images/icon-arrow-gold.svg')}}" alt=""></div>
                                        </div>
                                    </figure>
                                </a>
                            </div>
                    @endforeach
                    @if(count($posts)>=3)
                    @foreach($posts->sortByDesc('created_at')->skip(3)->take(2) as $post)
                            <div class="col-12 col-md-3 item-news-vertical item-news">
                                <a href="{{ route('user.indexActivity') }}">
                                    <figure class="wow">
                                        <img src="{{ asset('storage/posts/'.$post->imgname) }}" alt="">
                                        <div class="caption-news">
                                            <div class="date-news">post date: {{ $post->created_at->format('d-m-Y') }}</div>
                                            <div class="title-news" data-th="{{ $post->titles[0]->title_th }}" 
                                                                    data-en="{{ $post->titles[0]->title_en }}" 
                                                                    data-ch="{{ $post->titles[0]->title_ch }}">
                                                {{ $post->titles[0]->title_th }}
                                            </div>
                                            <div class="btn-textarrow">view more <img src="{{ asset('user/images/icon-arrow-gold.svg') }}" alt=""></div>
                                        </div>
                                    </figure>
                                </a>
                            </div>
                        @endforeach
                   
                    @endif


                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="btn-homenews-mb"><a href="{{route('user.indexActivity')}}" class="btn-gold">view all <img src="{{asset('user/images/icon-arrow-gold.svg')}}" alt=""></a></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="row">
        <div class="col-12 wrap-homecontact wow fadeInDown">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-9 wow fadeInLeft">
                        <div>
                            <div class="txt-contact01" id="titleContact">{{$typeContact->typeTitles[0]->title_th}}</div>
                            <div class="topic-gold" id="subTitleContact">{{$typeContact->typeTitles[1]->title_th}}</div>
                            <p id="contentContact">{{$typeContact->typeTitles[2]->title_th}}</p>
                        </div>
                    </div>

                    <div class="col-12 col-md-3 text-end wow fadeInRight">
                        <a href="{{route('user.indexContact')}}" class="btn-gold">contact <img src="{{asset('user/images/icon-arrow-gold.svg')}}" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('user.inc_footer')
    <script>
        $(".mainmenu ul > li:nth-child(2) > a").addClass("here");
        $(document).ready(function() {
            var lang = localStorage.getItem('activeLang');
            if (lang == null) {
                lang = th;
            }
            prepareForTitle(lang);
            changeTitleByLanguage(lang);
            changeClassForeachTitle(lang);
            prepareForWelcomeToMenu(lang);
            changeClassForeachTitle1(lang);
            prepareDataForBusinessWelcome(lang);
        });

        function changeTitleByLanguage() {
            $('.language-link').click(function(e) {
                e.preventDefault();
                var lang = $(this).data('lang');
                console.log(lang);
                prepareForTitle(lang);
                prepareForWelcomeToMenu(lang);
                changeClassForeachTitle(lang);
                changeClassForeachTitle1(lang);
                $('.language-link').removeClass('active');
                prepareDataForBusinessWelcome(lang);
                $(this).addClass('active');
            });
        }
        function changeClassForeachTitle(lang) {
            $('.wow').each(function() {
                var $figcaption = $(this);
                var $title = $figcaption.find('.title-news');
                $title.html($title.data(lang));
            
            });
            }
            function changeClassForeachTitle1(lang) {
            $('.hello').each(function() {
                var $figcaption = $(this);
                var $title = $figcaption.find('.title-news');
                $title.html($title.data(lang));
            
            });
            }
        function prepareForWelcomeToMenu(lang) {
        $.ajax({
            url: "{{url('/user/prepareForSubMenu')}}/" + lang,
            method: 'GET',
            dataType: 'json',
            success: function(response) {

                var menuBar = response.menuBar;
                console.log(menuBar);
               console.log("Arrive prepare wilcome to");
                $('#corevalue-href').html('<div class="icon-mcompany" ><img src="{{asset("user/images/icon-board.svg")}}" alt=""></div>'+menuBar['corevalue']);
                $('#vision-href').html('<div class="icon-mcompany" ><img src="{{asset("user/images/icon-vision.svg")}}" alt=""></div>'+menuBar['vision']);
                $('#history-href').html(' <div class="icon-mcompany" ><img src="{{asset("user/images/icon-history.svg")}}" alt=""></div>'+menuBar['history']);
                $('#groupstructure-href').html('<div class="icon-mcompany" ><img src="{{asset("user/images/icon-org.svg")}}" alt=""></div>'+menuBar['groupstructure']);
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    }
    function prepareDataForBusinessWelcome(lang) {
        $.ajax({
            url: "{{url('/main_menu/ourbusiness')}}",
            method: 'GET',
            dataType: 'json',
            success: function(response) {
                var types = response.types;
                var typeTitles = response.typeTitles;
                var listItems = '';                           
                for (var i = 0; i < types.length; i++) {
                    var type = types[i];
                    var route = "{{ route('user.businesstype', [':id']) }}";
                    route = route.replace(':id', type.id);
                    title = 'title_' + lang;
                    listItems += '<a href="' + route + '" class="menu_list">' + typeTitles[type.id][title] + '</a>';
                }
                $('#link-business').html(listItems);
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });}


        function prepareForTitle(lang) {
            var gpWelcome = '',
                gpTitle = '',
                gpSubTitle = '',
                welcome = "",
                welcomeTitle = "",
                welcomeSubTitle = "",
                welcomeContent = "",
                busTitle = "",
                busSubTitle = "",
                busContent = "",
                awardTitle="",
                awardSubTitle="",
                serviceTitle="",
                serviceSubTitle="",
                titleContact='',
                subTitleContact='',
                contentContact=''
                ;

            if (lang === 'th') {
                gpWelcome = '{{$group->gpTitles[0]->title_th}}';
                gpTitle = '{{$group->gpTitles[1]->title_th}}';
                gpSubTitle = '{{$group->gpTitles[2]->title_th}}';
                awardTitle='{!!$typeAward->typeTitles[0]->title_th!!}';
                awardSubTitle='{!!$typeAward->typeTitles[1]->title_th!!}';
                serviceTitle='{{$services->typeTitles[0]->title_th}}';
                serviceSubTitle='{!!$services->typeTitles[1]->title_th!!}';

                welcomeTitle = '{{$typeWelcome->typeTitles[0]->title_th}}';
                welcomeSubTitle = '{{$typeWelcome->typeTitles[1]->title_th}}';
                welcomeContent = '{{$typeWelcome->typeContents[0]->content_th}}';

                busTitle = '{{$typeOurBus->typeTitles[0]->title_th}}';
                busSubTitle = '{{$typeOurBus->typeTitles[1]->title_th}}';
                busContent = '{{$typeOurBus->typeTitles[2]->title_th}}';

                titleContact='{{$typeContact->typeTitles[0]->title_th}}';
                subTitleContact='{{$typeContact->typeTitles[1]->title_th}}';
                contentContact='{{$typeContact->typeTitles[2]->title_th}}';

            } else if (lang === 'en') {
                gpWelcome = '{{$group->gpTitles[0]->title_en}}';
                gpTitle = '{{$group->gpTitles[1]->title_en}}';
                gpSubTitle = '{{$group->gpTitles[2]->title_en}}';

                awardTitle='{!!$typeAward->typeTitles[0]->title_en!!}';
                awardSubTitle='{!!$typeAward->typeTitles[1]->title_en!!}';
                serviceTitle='{{$services->typeTitles[0]->title_en}}';
                serviceSubTitle='{!!$services->typeTitles[1]->title_en!!}';

                welcomeTitle = '{{$typeWelcome->typeTitles[0]->title_en}}';
                welcomeSubTitle = '{{$typeWelcome->typeTitles[1]->title_en}}';
                welcomeContent = '{{$typeWelcome->typeContents[0]->content_en}}';

                busTitle = '{{$typeOurBus->typeTitles[0]->title_en}}';
                busSubTitle = '{{$typeOurBus->typeTitles[1]->title_en}}';
                busContent = '{{$typeOurBus->typeTitles[2]->title_en}}';

                titleContact='{{$typeContact->typeTitles[0]->title_en}}';
                subTitleContact='{{$typeContact->typeTitles[1]->title_en}}';
                contentContact='{{$typeContact->typeTitles[2]->title_en}}';

            } else if (lang === 'ch') {
                gpWelcome = '{{$group->gpTitles[0]->title_ch}}';
                gpTitle = '{{$group->gpTitles[1]->title_ch}}';
                gpSubTitle = '{{$group->gpTitles[2]->title_ch}}';

                welcomeTitle = '{{$typeWelcome->typeTitles[0]->title_ch}}';
                welcomeSubTitle = '{{$typeWelcome->typeTitles[1]->title_ch}}';
                welcomeContent = '{{$typeWelcome->typeContents[0]->content_ch}}';

                busTitle = '{{$typeOurBus->typeTitles[0]->title_ch}}';
                busSubTitle = '{{$typeOurBus->typeTitles[1]->title_ch}}';
                busContent = '{{$typeOurBus->typeTitles[2]->title_ch}}';

                awardTitle='{{$typeAward->typeTitles[0]->title_ch}}';
                awardSubTitle='{!!$typeAward->typeTitles[1]->title_ch!!}';
                serviceTitle='{{$services->typeTitles[0]->title_ch}}';
                serviceSubTitle='{!!$services->typeTitles[1]->title_ch!!}';

                titleContact='{{$typeContact->typeTitles[0]->title_ch}}';
                subTitleContact='{{$typeContact->typeTitles[1]->title_ch}}';
                contentContact='{{$typeContact->typeTitles[2]->title_ch}}';
            }

            $('#gpWelcome').text(gpWelcome);
            $('#gpTitle').text(gpTitle);
            $('#gpSubTitle').text(gpSubTitle);
            $('#welcome').text(gpWelcome);

            $('#welcomeTitle').text(welcomeTitle);
            $('#welcomeSubTitle').text(welcomeSubTitle);
            $('#welcomeContent').text(welcomeContent);

            $('#busTitle').text(busTitle);
            $('#busSubTitle').text(busSubTitle);
            $('#busContent').text(busContent);

            $('#awardTitle').html(awardTitle);
            $('#awardSubTitle').html(awardSubTitle);
            $('#serviceTitle').html(serviceTitle+'<i class="bi bi-play-circle"></i>');
            $('#serviceSubTitle').text(serviceSubTitle);


            $('#titleContact').text(titleContact);
            $('#subTitleContact').text(subTitleContact);
            $('#contentContact').text(contentContact);
          

        }
    </script>
    </div>
</body>

</html>