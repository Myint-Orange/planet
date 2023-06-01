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
                <h1 id="bannerTitle">{{$gpTitle->title_th}}</h1>
            </div>
        </section>


        <section class="row">
            <div class="col-12 page-content">
                <div class="container">
                    <div class="row">
                        <div class="col-12 wow fadeInDown">
                            <div class="topic-pageinside" id="title">{{$type->typeTitles[0]->title_th}}
                                <div></div>
                            </div>
                            <div class="shortdetail-page">
                                <div class="content-editor" id="content">
                                    <p>
                                        {!!$type->typeContents[0]->content_th!!}
                                    </p>
                                </div>
                            </div>
                            {{-- <div class="topic-subtitle">การให้บริการการตรวจวิเคราะห์ มีดังนี้</div> --}}
                        </div>
                    </div>
                    <div class="row all-itembusiness">
                        @foreach ($type->posts as $post)
                        <div class="col-12 col-sm-6 col-lg-4 item-business wow fadeInDown">
                            <div class="box-business">
                                <figure>
                                    <div class="icon-business"><img src="{{asset('storage/posts/'.$post->imgname)}}" alt=""></div>
                                    <figcaption class="hello">
                                        <div class="businessname-en" data-th="{{$post->titles[0]->title_th}}" data-en="{{$post->titles[0]->title_en}}" data-ch="{{$post->titles[0]->title_ch}}">{{$post->titles[0]->title_th}}</div>
                                        <div class="businessname-th" data-th="{{$post->titles[1]->title_th}}" data-en="{{$post->titles[1]->title_en}}" data-ch="{{$post->titles[1]->title_ch}}">{{$post->titles[1]->title_th}}</div>
                                        <p class="content" data-th="{{$post->contents[0]->content_th}}" data-en="{{$post->contents[0]->content_en}}" data-ch="{{$post->contents[0]->content_ch}}">
                                            {{$post->contents[0]->content_th}}
                                        </p>
                                    </figcaption>
                                </figure>
                            </div>
                        </div>
                        @endforeach


                    </div>
                </div>
            </div>
        </section>



        @include('user.inc_footer')

        <script>
            $(".box-menu > ul > li:nth-child(4) > a").addClass("here");
            $(".box-menu ul li > .submenu ul > li:nth-child(2) > a").addClass("here");
            var lang = localStorage.getItem('activeLang');
            $(document).ready(function() {
                prepareForCoreValues();
                prepareForTitle(lang);
                classForEachVal(lang);
            });

            function prepareForCoreValues() {
                $('.language-link').click(function(e) {
                    e.preventDefault();
                    var lang = $(this).data('lang');
                    prepareForTitle(lang);
                    classForEachVal(lang);


                    $('.language-link').removeClass('active');
                    $(this).addClass('active');
                });
            }


            function classForEachVal(lang) {
                $('.hello').each(function() {
                    var $figcaption = $(this);
                    var $title = $figcaption.find('.businessname-en');
                    var $subtitle = $figcaption.find('.businessname-th');
                    var $content = $figcaption.find('.content');
                    $title.html($title.data(lang));
                    $subtitle.html($subtitle.data(lang));
                    $content.html($content.data(lang));

                });
            }

            function prepareForTitle(lang) {
                var title = '',
                    content = '',
                    post_title = '',
                    post_subTitle = '',
                    postContent = '',
                    bannerTitle = '';
                if (lang === 'th') {
                    title = '{{$type->typeTitles[0]->title_th}}';
                    content = '{!!$type->typeContents[0]->content_th!!}';
                    bannerTitle = '{{$gpTitle->title_th}}'

                } else if (lang === 'en') {
                    title = '{{$type->typeTitles[0]->title_en}}';
                    content = '{!!$type->typeContents[0]->content_en!!}';
                    bannerTitle = '{{$gpTitle->title_en}}'

                } else if (lang === 'ch') {
                    title = '{{$type->typeTitles[0]->title_ch}}';
                    content = '{!!$type->typeContents[0]->content_ch!!}';
                    bannerTitle = '{{$gpTitle->title_ch}}'

                }
                $('#title').text(title);
                $('#content').html(content);
                $('#bannerTitle').text(bannerTitle);



            }
        </script>


    </div>

</body>

</html>