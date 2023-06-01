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
                <div class="col-12 wow fadeInDown">
                    <div class="wrap-newsdetail">
                        <div class="txt-latestnews" id="smallTitle">{{ strtoupper($type->typeTitles[0]->title_th) }}</div>
                        <h2 id="postTitle">{{$post->titles[0]->title_th}}</h2>
                        <div class="date-news">post date : {{ $post->created_at->format('d-m-Y') }}</div>
                        <div class="content-editor" id="postContent" data-th="{{$post->contents[0]->content_th}}" data-en="{{$post->contents[0]->content_en}}" data-ch="{{$post->contents[0]->content_ch}}">
                            {!!$post->contents[0]->content_th!!}
                        </div>
                    </div>
                    <div class="row wrap-photogall wow fadeInDown">
                        @if(count($post->postImages)>4)
                        @for($i = 0; $i < count($post->postImages) && $i < 3; $i++) <div class="col-6 col-md-3 item-photogall">
                                <a href="{{asset('storage/posts/'.$post->postImages[$i]->name_en)}}" data-fancybox="gallery">
                                    <figure><img src="{{asset('storage/posts/'.$post->postImages[$i]->name_en)}}" alt=""></figure>
                                </a>
                    </div>
                    @endfor
                    <div class="col-6 col-md-3 item-photogall more-photogall">
                        <a href="{{asset('storage/posts/'.$post->postImages[4]->name_en)}}" data-fancybox="gallery">
                            <figure><img src="{{asset('storage/posts/'.$post->postImages[4]->name_en)}}" alt=""></figure>
                            <div class="txt-allphoto"><span>{{count($post->postImages) }}+</span>photo gallery</div>
                        </a>
                    </div>
                    @else
                    @foreach($post->postImages as $image)
                    <div class="col-6 col-md-3 item-photogall">
                        <a href="{{asset('storage/posts/'.$image->name_en) }}" data-fancybox="gallery">
                            <figure><img src="{{asset('storage/posts/'.$image->name_en) }}" alt=""></figure>
                        </a>
                    </div>
                    @endforeach
                    @endif


                    <div class="col-12 hide-photogall">
                        @for($i = 4; $i < count($post->postImages); $i++)
                            <a href="{{asset('storage/posts/'.$post->postImages[$i]->name_en)}}" data-fancybox="gallery">
                                <figure><img src="{{asset('storage/posts/'.$post->postImages[$i]->name_en)}}" alt=""></figure>
                            </a>
                            @endfor

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
                        <div class="topic-gold">recent news</div>
                    </div>
                    <div class="col-12 col-md-3 text-end wow fadeInRight">
                        <div class="btn-homenews"><a href="{{route('user.indexActivity')}}" class="btn-gold">view all <img src="{{asset('user/images/icon-arrow-gold.svg')}}" alt=""></a></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="owl-recentnews owl-carousel owl-theme">

                            @php
                            $count = min(count($posts), 4);
                            @endphp

                            @for($i = 0; $i < $count; $i++) <div class="item-news">
                                <a href="{{ route('user.detailActivity', $posts[$i]->id) }}">
                                    <figure class="hello">
                                        <img src="{{asset('storage/posts/'.$posts[$i]->imgname) }}" alt="">
                                        <div class="caption-news">
                                            <div class="date-news">post date: {{ $posts[$i]->created_at->format('d-m-Y') }}</div>
                                            <div class="title-news" data-th="{{$posts[$i]->titles[0]->title_th}}" data-en="{{$posts[$i]->titles[0]->title_en}}" data-ch="{{$posts[$i]->titles[0]->title_ch}}">{{ $posts[$i]->titles[0]->title_th }}</div>
                                            <div class="btn-textarrow">view more <img src="{{asset('storage/images/icon-arrow-gold.svg')}}" alt=""></div>
                                        </div>
                                    </figure>
                                </a>
                        </div>
                        @endfor

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="btn-homenews-mb"><a href="{{route('user.indexActivity')}}" class="btn-gold">view all <img src="{{asset('user/images/icon-arrow-gold.svg')}}" alt=""></a></div>
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