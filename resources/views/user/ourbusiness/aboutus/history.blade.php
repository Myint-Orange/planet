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
    <figure><img src=" {{ asset('storage/types/'.$typeHistory->imgname)}}" alt="">
                </figure>
                <h1 id="mainTitle">{{$typeHistory->typeTitles[0]->title_th}}</h1>
            </div>
        </section>

        <section class="row">
            <div class="col-12 wrap-tophistory wow fadeInDown">
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
                            <figure>
                                <div class="photo-tophistory wow fadeInLeft"><img src="{{ asset('storage/types/'.$typeHistory->typeImages[0]->name_en)}}" alt=""></div>
                                <figcaption class="wow fadeInRight" id="contentObj">
                                    {!!$typeHistory->typeContents[1]->content_th!!}
                                </figcaption>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="row">
            <div class="col-12 wrap-deschistory wow fadeInDown">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="history-photocenter"><img src="{{ asset('storage/types/'.$typeHistory->typeImages[1]->name_en)}}" alt=""></div>
                            <div id="contentHistory"> {!!$typeHistory->typeContents[2]->content_th!!}</div>
                            <div class="row box-partner justify-content-center">
                                @foreach($typeHistory->posts as $post)
                                <div class="col-12 col-md-6 col-lg-5 item-partner">
                                    <figure>
                                        <div class="photo-partner"><img src="{{ asset('storage/posts/'.$post->imgname)}}" alt=""></div>
                                        <figcaption class="hello">
                                            <div class="title-post" data-th="{{$post->titles[0]->title_th}}" data-en="{{$post->titles[0]->title_en}}" data-ch="{{$post->titles[0]->title_ch}}">{{$post->titles[0]->title_th}}</div>
                                            <div class="subTitle-post" data-th="{{$post->titles[1]->title_th}}" data-en="{{$post->titles[1]->title_en}}" data-ch="{{$post->titles[1]->title_ch}}">{{$post->titles[1]->title_en}}</div>

                                        </figcaption>
                                    </figure>
                                </div>
                                @endforeach

                            </div>
                            <div class="content-editor" id="contentConclusion">
                                {!!$typeHistory->typeContents[3]->content_th!!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @include('user.inc_footer')

        <script>
            $(".box-menu > ul > li:nth-child(3) > a").addClass("here");
            $(".box-menu ul li > .submenu ul > li:nth-child(2) > a").addClass("here");
            $(document).ready(function() {
                var lang = localStorage.getItem('activeLang');
                if (lang == null) {
                    lang = th;
                }
                classForEachValue(lang);
                prepareForTitle(lang);
                prepareForCoreValues();
            });

            function prepareForCoreValues() {
                $('.language-link').click(function(e) {
                    e.preventDefault();
                    console.log('Arrive action');
                    var lang = $(this).data('lang');
                    prepareForTitle(lang);
                    classForEachValue(lang);
                    $('.language-link').removeClass('active');

                    // Add the "active" class to the clicked language link
                    $(this).addClass('active');
                });
            }

            function classForEachValue(lang) {
                $('.hello').each(function() {
                    var $figcaption = $(this);
                    var $title = $figcaption.find('.title-post');
                    var $subtitle = $figcaption.find('.subTitle-post');
                    $title.text($title.data(lang));
                    $subtitle.text($subtitle.data(lang));

                });
            }

            function prepareForTitle(lang) {
                var mainTitle = '',
                    subTitle = '',
                    postTitle = '',
                    contentObj = '',
                    content = '',
                    contentHistory = '',
                    contentConclusion = '';
                if (lang === 'th') {
                    mainTitle = '{{$typeHistory->typeTitles[0]->title_th}}';
                    subTitle = '{{$typeHistory->typeTitles[0]->title_th}}';
                    postTitle = '{{$typeHistory->typeTitles[1]->title_th}}';
                    content = '{!!$typeHistory->typeContents[0]->content_th!!}';
                    contentObj = '{!!$typeHistory->typeContents[1]->content_th!!}'
                    contentHistory = '{!!$typeHistory->typeContents[2]->content_th!!}';
                    contentConclusion = '{!!$typeHistory->typeContents[3]->content_th!!}';

                } else if (lang === 'en') {
                    mainTitle = '{{$typeHistory->typeTitles[0]->title_en}}';
                    subTitle = '{{$typeHistory->typeTitles[0]->title_en}}';
                    postTitle = '{{$typeHistory->typeTitles[1]->title_en}}';
                    content = '{!!$typeHistory->typeContents[0]->content_en!!}';
                    contentObj = '{!!$typeHistory->typeContents[1]->content_en!!}';
                    contentHistory = '{!!$typeHistory->typeContents[2]->content_en!!}';
                    contentConclusion = '{!!$typeHistory->typeContents[3]->content_en!!}';

                } else if (lang === 'ch') {
                    mainTitle = '{{$typeHistory->typeTitles[0]->title_ch}}';
                    subTitle = '{{$typeHistory->typeTitles[0]->title_ch}}';
                    postTitle = '{{$typeHistory->typeTitles[1]->title_ch}}';
                    content = '{!!$typeHistory->typeContents[0]->content_ch!!}';
                    contentObj = '{!!$typeHistory->typeContents[1]->content_ch!!}';
                    contentHistory = '{!!$typeHistory->typeContents[2]->content_th!!}';
                    contentConclusion = '{!!$typeHistory->typeContents[3]->content_th!!}';


                }
                $('#mainTitle').text(mainTitle);
                $('#subTitle').text(subTitle);
                $('#postTitle').text(postTitle);
                $('#content').html(content);
                $('#contentObj').html(contentObj);
                $('#contentHistory').html(contentHistory);
                $('#contentConclusion').html(contentConclusion);


            }
        </script>


    </div>

</body>

</html>