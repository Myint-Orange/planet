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
                <figure><img src="{{asset('storage/types/'.$type->imgname)}}" alt=""></figure>
                <h1 id="mainTitle">{{$type->typeTitles[0]->title_th}}</h1>
            </div>
        </section>

        <section class="container">
            <div class="row">
                <div class="col-12 wow fadeInDown">
                    <div class="wrap-newsdetail">
                        <div class="txt-latestnews" id="smallTitle">{{ strtoupper($type->typeTitles[0]->title_th) }}</div>
                        <h2 id="postTitle">{{$post->titles[0]->title_th}}</h2>
                        <div class="date-news">post date :{{ $post->created_at->format('d-m-Y') }}</div>
                        <div class="content-editor" id="postContent" data-th="{{$post->contents[0]->content_th}}" data-en="{{$post->contents[0]->content_en}}" data-ch="{{$post->contents[0]->content_ch}}">
                            {!!$post->contents[0]->content_th!!}
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="row">
            <div class="col-12 wrap-recentnews wow fadeInDown">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-md-9 wow fadeInLeft">
                            <div class="topic-gold">recent updates</div>
                        </div>
                        <div class="col-12 col-md-3 text-end wow fadeInRight">
                            <div class="btn-homenews"><a href="{{route('user.indexInterest')}}" class="btn-gold">view all <img src="{{asset('images/icon-arrow-gold.svg')}}" alt=""></a></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="owl-recentnews owl-carousel owl-theme">
                                @foreach($posts as $post)
                                <div class="item-news">
                                    <a href="{{ route('user.detailInterest', $post->id) }}">
                                        <figure class="hello">
                                            <img src="{{asset('storage/posts/'.$post->imgname)}}" alt="">
                                            <div class="caption-news">
                                                <div class="date-news">post date :{{ $post->created_at->format('d-m-Y') }}</div>
                                                <div class="title-news" data-th="{{$post->titles[0]->title_th}}" data-en="{{$post->titles[0]->title_en}}" data-ch="{{$post->titles[0]->title_ch}}">{{ $post->titles[0]->title_th }}</div>
                                                <div class="btn-textarrow">view more <img src="{{asset('images/icon-arrow-gold.svg')}}" alt=""></div>
                                            </div>
                                        </figure>
                                    </a>
                                </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="btn-homenews-mb"><a href="{{route('user.indexInterest')}}" class="btn-gold">view all <img src="{{asset('images/icon-arrow-gold.svg')}}" alt=""></a></div>
                        </div>
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
                    //   console.log("Arrive Action ")
                    prepareForTitle(lang);
                    classForeachVal(lang);


                    $('.language-link').removeClass('active');
                    $(this).addClass('active');
                });
            }

            function classForeachVal(lang) {
                $('.hello').each(function() {
                    var $figcaption = $(this);
                    var $title = $figcaption.find('.title-news');
                    $title.html($title.data(lang));
                });
            }

            function prepareForTitle(lang) {
                var mainTitle = '',
                    postTitle = '',
                    smallTitle;
                if (lang === 'th') {
                    mainTitle = '{{ strtoupper($type->typeTitles[0]->title_th) }}';
                    postTitle = '{{$post->titles[0]->title_th}}';
                    smallTitle = '{{ strtoupper($type->typeTitles[0]->title_th) }}';
                } else if (lang === 'en') {
                    mainTitle = '{{ strtoupper($type->typeTitles[0]->title_en) }}';
                    postTitle = '{{$post->titles[0]->title_en}}';
                    smallTitle = '{{ strtoupper($type->typeTitles[0]->title_en) }}';
                } else if (lang === 'ch') {
                    mainTitle = '{{ strtoupper($type->typeTitles[0]->title_ch) }}';
                    postTitle = '{{$post->titles[0]->title_ch}}';
                    smallTitle = '{{ strtoupper($type->typeTitles[0]->title_ch) }}';
                }
                var dataEn = $('#postContent').data(lang);
                $('#postContent').html(dataEn);
                $('#mainTitle').text(mainTitle);
                $('#postTitle').html(postTitle);
                $('#smallTitle').text(smallTitle);

            }
        </script>


    </div>

</body>

</html>