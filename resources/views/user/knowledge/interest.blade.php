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
        <figure><img src=" {{asset('storage/types/'.$type->imgname)}}" alt="">
                </figure>
                <h1 id="mainTitle">{{ strtoupper($type->typeTitles[0]->title_th) }}</h1>
            </div>
        </section>

        <section class="container">
            <div class="row">
                <div class="col-12 knowledge-page page-content wow fadeInDown">
                    <div class="topic-pageinside">สาระน่ารู้จาก <span>EMBRYO</span>
                        <div></div>
                    </div>
                    <div>
                        <a href="{{route('user.detailInterest',$posts[0]->id)}}" class="row item-latestknow">
                            <div class="col-12 col-md-7 cover-latestknow wow fadeInLeft">
                                <figure><img src="{{asset('storage/posts/'.$posts[0]->imgname)}}" alt=""></figure>
                            </div>
                            <div class="col-12 col-md-5 wow fadeInRight bg-know01">
                                <div class="desc-latestknow">
                                    <div class="date-news">post date : {{ $posts[0]->created_at->format('d-m-Y') }}</div>
                                    <h2 id="postTitle">{{$posts[0]->titles[0]->title_th}}</h2>
                                    <div class="shortdesc-latestknow" id="subTitlePost">
                                        {{$posts[0]->titles[1]->title_th}}
                                    </div>
                                    <div class="btn-gold">read more <img src="{{asset('user/images/icon-arrow-gold.svg')}}" alt=""></div>
                                </div>
                            </div>
                        </a>

                        <a href="{{route('user.detailInterest',$posts[1]->id)}}" class="row item-latestknow">
                            <div class="col-12 col-md-7 cover-latestknow wow fadeInLeft">
                                <figure><img src="{{asset('storage/posts/'.$posts[1]->imgname)}}" alt=""></figure>
                            </div>
                            <div class="col-12 col-md-5 wow fadeInRight bg-know02">
                                <div class="desc-latestknow">
                                    <div class="date-news">post date : {{ $posts[1]->created_at->format('d-m-Y') }}</div>
                                    <h2 id="postTitle1">{{$posts[1]->titles[0]->title_th}}</h2>
                                    <div class="shortdesc-latestknow" id="postSubTitle1">
                                        {{$posts[1]->titles[1]->title_th}}
                                    </div>
                                    <div class="btn-gold">read more <img src="{{asset('user/images/icon-arrow-gold.svg')}}" alt=""></div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="row allnews">
                        @if(count($posts)>2)
                        @foreach($posts as $index => $post)
                        @if($index >=2)
                        <div class="col-12 col-md-4 item-allnews wow fadeInDown">
                            <a href="{{route('user.detailInterest',$post->id)}}">
                                <figure>
                                    <div class="cover-news"><img src="{{asset('storage/posts/'.$post->imgname)}}" alt=""></div>
                                    <figcaption class="hello">
                                        <div class="date-news">post date :{{ $post->created_at->format('d-m-Y') }}</div>
                                        <h3 class="postTitle" data-th="{{$post->titles[0]->title_th}}" data-en="{{$post->titles[0]->title_en}}" data-ch="{{$post->titles[0]->title_ch}}">
                                            {{$post->titles[0]->title_th}}
                                        </h3>
                                        <div class="desc-allnews" data-th="{{$post->titles[1]->title_th}}" data-en="{{$post->titles[1]->title_en}}" data-ch="{{$post->titles[1]->title_ch}}">
                                            {{$post->titles[1]->title_th}}
                                        </div>
                                        <div class="icon-arrow-black"><img src="{{asset('user/images/icon-arrow-black.svg')}}" alt=""></div>
                                    </figcaption>
                                </figure>
                            </a>
                        </div>
                        @endif
                        @endforeach
                        @endif




                    </div>
                </div>
            </div>
        </section>
        @include('user.inc_footer')


        <script>
            $(".box-menu > ul > li:nth-child(5) > a").addClass("here");
            $(".box-menu ul li > .submenu ul > li:nth-child(3) > a").addClass("here");
            $(document).ready(function() {
                var lang = localStorage.getItem('activeLang');
                if (lang == null) {
                    lang = th;
                }
                prepareForCoreValues();
                classForeachVal(lang);
                prepareForTitle(lang);
            });

            function prepareForCoreValues() {
                $('.language-link').click(function(e) {
                    e.preventDefault();
                    var lang = $(this).data('lang');
                    prepareForTitle(lang);
                    classForeachVal(lang);


                    $('.language-link').removeClass('active');
                    $(this).addClass('active');
                });
            }

            function classForeachVal(lang) {
                $('.hello').each(function() {
                    var $figcaption = $(this);
                    var $title = $figcaption.find('.postTitle');
                    var $desc = $figcaption.find('.desc-allnews');
                    $title.html($title.data(lang));
                    $desc.html($desc.data(lang));

                });
            }

            function prepareForTitle(lang) {


                var mainTitle = '',
                    postTitle = '',
                    subTitlePost = '',
                    postTitle1 = '',
                    postSubTitle1 = '';
                if (lang === 'th') {
                    mainTitle = '{{ strtoupper($type->typeTitles[0]->title_th) }}';
                    postTitle = '{{$posts[0]->titles[0]->title_th}}';
                    subTitlePost = '{{$posts[0]->titles[1]->title_th}}';
                    postTitle1 = '{{$posts[1]->titles[0]->title_th}}';
                    postSubTitle1 = '{{$posts[1]->titles[1]->title_th}}';

                } else if (lang === 'en') {
                    mainTitle = '{{ strtoupper($type->typeTitles[0]->title_en) }}';
                    postTitle = '{{$posts[0]->titles[0]->title_en}}';
                    subTitlePost = '{{$posts[0]->titles[1]->title_en}}';
                    postTitle1 = '{{$posts[1]->titles[0]->title_en}}';
                    postSubTitle1 = '{{$posts[1]->titles[1]->title_en}}';


                } else if (lang === 'ch') {
                    mainTitle = '{{ strtoupper($type->typeTitles[0]->title_ch) }}';
                    postTitle = '{{$posts[0]->titles[0]->title_ch}}';
                    subTitlePost = '{{$posts[0]->titles[1]->title_ch}}';
                    postTitle1 = '{{$posts[1]->titles[0]->title_ch}}';
                    postSubTitle1 = '{{$posts[1]->titles[1]->title_ch}}';

                }
                $('#mainTitle').text(mainTitle);
                $('#postTitle').html(postTitle);
                $('#subTitlePost').text(subTitlePost);
                $('#postTitle1').text(postTitle1);
                $('#postSubTitle1').text(postSubTitle1);


            }
        </script>


    </div>

</body>

</html>