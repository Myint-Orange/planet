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

        <section class="row">
            <div class="col-12 box-latestnews">
                <div class="container">
                    <a href="{{route('user.detailActivity',$posts[0]->id)}}" class="row">
                        <div class="col-12 col-md-7 wow fadeInLeft">
                            <figure><img src="{{asset('storage/posts/'.$posts[0]->imgname)}}" alt=""></figure>
                        </div>

                        <div class="col-12 col-md-5 wow fadeInRight">
                            <div class="desc-box-latestnews">
                                <div class="txt-latestnews">latest update</div>
                                <h2 id="postTitle">{{$posts[0]->titles[0]->title_th}}</h2>
                                <div class="date-news">post date : {{ $posts[0]->created_at->format('d-m-Y') }}</div>
                                <div class="content-latestnews" id="shortDesc">
                                    {{$posts[0]->titles[1]->title_th}}
                                </div>
                                <div class="btn-gold">read more <img src="{{asset('user/images/icon-arrow-gold.svg')}}" alt=""></div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </section>

        <section class="container">
            <div class="row allnews">

                @foreach ($posts as $index => $post)
                @if ($index >= 1)
                <div class="col-12 col-sm-6 col-lg-4 item-allnews wow fadeInDown">
                    <a href="{{route('user.detailActivity',$post->id)}}">
                        <figure>
                            <div class="cover-news"><img src="{{asset('storage/posts/'.$post->imgname)}}" alt=""></div>
                            <figcaption class="hello">
                                <div class="date-news">post date :{{ $post->created_at->format('d-m-Y') }}</div>
                                <h3 class="postTitle" data-th="{{$post->titles[0]->title_th}}" data-en="{{$post->titles[0]->title_en}}" data-ch="{{$post->titles[0]->title_ch}}">{{$post->titles[0]->title_th}}</h3>
                                <div class="desc-allnews" data-th="{{$post->titles[1]->title_th}}" data-en="{{$post->titles[1]->title_en}}" data-ch="{{$post->titles[1]->title_ch}}">{{$post->titles[1]->title_th}}
                                </div>
                                <div class="icon-arrow-black"><img src="{{asset('user/images/icon-arrow-black.svg')}}" alt=""></div>
                            </figcaption>
                        </figure>
                    </a>
                </div>
                @endif

                @endforeach


            </div>
        </section>

        @include('user.inc_footer')


        <script>
            $(".box-menu > ul > li:nth-child(5) > a").addClass("here");
            $(".box-menu ul li > .submenu ul > li:nth-child(1) > a").addClass("here");
            $(document).ready(function() {
                var lang = localStorage.getItem('activeLang');
                console.log("Local name=" + lang);
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
                    var $title = $figcaption.find('.postTitle');
                    var $subtitle = $figcaption.find('.desc-allnews');
                    $title.html($title.data(lang));
                    $subtitle.html($subtitle.data(lang));
                });
            }



            function prepareForTitle(lang) {


                var mainTitle = '',
                    postTitle = '',
                    shortDesc = '';
                if (lang === 'th') {
                    mainTitle = '{{ strtoupper($type->typeTitles[0]->title_th) }}';
                    postTitle = '{{$posts[0]->titles[0]->title_th}}';
                    shortDesc = '{{$posts[0]->titles[1]->title_th}}'

                } else if (lang === 'en') {
                    mainTitle = '{{ strtoupper($type->typeTitles[0]->title_en) }}';
                    postTitle = '{{$posts[0]->titles[0]->title_en}}';
                    shortDesc = '{{$posts[0]->titles[1]->title_en}}'

                } else if (lang === 'ch') {
                    mainTitle = '{{ strtoupper($type->typeTitles[0]->title_ch) }}';
                    postTitle = '{{$posts[0]->titles[0]->title_ch}}';
                    shortDesc = '{{$posts[0]->titles[1]->title_ch}}'

                }
                $('#mainTitle').text(mainTitle);
                $('#postTitle').html(postTitle);
                $('#shortDesc').text(shortDesc);

            }
        </script>


    </div>

</body>

</html>