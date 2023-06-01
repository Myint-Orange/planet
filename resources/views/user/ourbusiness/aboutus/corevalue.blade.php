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
                <h1 id="typeTitle">{{$type->typeTitles[0]->title_th}}</h1>
            </div>
        </section>

        <section class="row">
            <div class="col-12 wrap-corevalue wow fadeInDown">
                <div class="container">
                    <div class="row">
                        <div class="col-12 page-content wow fadeInDown">
                            <div class="topic-pageinside">ค่านิยมหลัก <span>“EMBRYO”</span>
                                <div></div>
                            </div>
                            <div class="box-corevalue">
                                @foreach($type->posts->sortByDesc('created_at') as $post)
                                <figure class="wow fadeInDown">
                                    <div class="icon-corevalue"><img src="{{ asset('storage/posts/'.$post->imgname)}}" alt=""></div>
                                    <figcaption>
                                        <div class="txt-value-en" data-th="{{$post->titles[0]->title_th}}" data-en="{{$post->titles[0]->title_en}}" data-ch="{{$post->titles[0]->title_ch}}">{{$post->titles[0]->title_th}}</div>
                                        <div class="txt-value-th" data-th="{{$post->titles[1]->title_th}}" data-en="{{$post->titles[1]->title_en}}" data-ch="{{$post->titles[1]->title_ch}}">{{$post->titles[1]->title_th}}</div>
                                        <p class="content" data-th="{{$post->contents[0]->content_th}}" data-en="{{$post->contents[0]->content_en}}" data-ch="{{$post->contents[0]->content_ch}}">
                                            {{$post->contents[0]->content_th}}
                                        </p>
                                    </figcaption>
                                </figure>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @include('user.inc_footer')

        <script>
            $(".box-menu > ul > li:nth-child(3) > a").addClass("here");
            $(".box-menu ul li > .submenu ul > li:nth-child(4) > a").addClass("here");


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

                    // Get the selected language from the data attribute
                    var lang = $(this).data('lang');
                    prepareForTitle(lang);
                    // Update the titles and content based on the selected language
                    classForEachValue(lang);

                    // Remove the "active" class from all language links
                    $('.language-link').removeClass('active');

                    // Add the "active" class to the clicked language link
                    $(this).addClass('active');
                });
            }

            function classForEachValue(lang) {
                $('.wow').each(function() {
                    var $figure = $(this);
                    var $title = $figure.find('.txt-value-en');
                    var $subtitle = $figure.find('.txt-value-th');
                    var $content = $figure.find('.content');

                    $title.text($title.data(lang));
                    $subtitle.text($subtitle.data(lang));
                    $content.text($content.data(lang));
                });
            }

            function prepareForTitle(lang) {
                var title = '';
                if (lang === 'th') {
                    title = '{{$type->typeTitles[0]->title_th}}';
                } else if (lang === 'en') {
                    title = '{{$type->typeTitles[0]->title_en}}';
                } else if (lang === 'ch') {
                    title = '{{$type->typeTitles[0]->title_ch}}';
                }
                $('#typeTitle').text(title);


            }
        </script>


    </div>

</body>

</html>