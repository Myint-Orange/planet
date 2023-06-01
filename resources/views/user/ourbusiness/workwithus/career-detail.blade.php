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


        <section class="container">
            <div class="row">
                <div class="col-12 wrap-jobdetail page-content wow fadeInDown">
                    <div class="jop-position">
                        <div class="position-name" id="position">{{$post->titles[0]->title_th}}</div>
                        <div class="position-area" id="location"> <i class="bi bi-geo-alt"></i> {{$post->titles[1]->title_th}}</div>
                    </div>
                    <div class="content-editor" id="postContent" data-th="{{$post->contents[0]->content_th}}" data-en="{{$post->contents[0]->content_en}}" data-ch="{{$post->contents[0]->content_ch}}">
                        {!!$post->contents[0]->content_th!!}
                    </div>
                </div>
            </div>
        </section>

        <section class="row">
            <div class="col-12 wrap-hrcontact wow fadeInDown">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-4 wow fadeInLeft">
                            <figure><img src="{{asset('storage/types/'.$contact->imgname)}}" alt=""></figure>
                        </div>

                        <div class="col-12 col-md-6 col-lg-8 wow fadeInRight">
                            <div class="desc-hrcontact">
                                <div class="txt-hrcontact">Contact</div>
                                <div class="name-hrcontact" id="nameContact">{{$contact->typeTitles[0]->title_th}}</div>
                                <address id="addressContact">{{$contact->typeTitles[1]->title_th}}</address>
                                <div class="info-hrcontact">
                                    <a href="tel:{{$contact->typeTitles[2]->title_th}}" target="_blank">Tel: {{$contact->typeTitles[2]->title_th}}</a>
                                    <a href="mailto:{{$contact->typeTitles[3]->title_th}}" target="_blank">E-Mail: {{$contact->typeTitles[3]->title_th}}</a>
                                </div>
                            </div>
                        </div>
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
                    var $title = $figcaption.find('.title-news');

                    $title.html($title.data(lang));

                });
            }

            function prepareForTitle(lang) {
                var mainTitle = '',
                    name = '',
                    address = "",
                    position = "",
                    location = "";

                if (lang === 'th') {

                    mainTitle = '{{$group->gpTitles[0]->title_th}}';
                    position = '{{$post->titles[0]->title_th}}';
                    location = '{{$post->titles[1]->title_th}}';
                    name = '{{$contact->typeTitles[0]->title_th}}';
                    address = '{{$contact->typeTitles[1]->title_th}}';
                } else if (lang === 'en') {
                    mainTitle = '{{$group->gpTitles[0]->title_en}}';
                    position = '{{$post->titles[0]->title_en}}';
                    location = '{{$post->titles[1]->title_en}}';
                    name = '{{$contact->typeTitles[0]->title_en}}';
                    address = '{{$contact->typeTitles[1]->title_en}}';
                } else if (lang === 'ch') {
                    mainTitle = '{{$group->gpTitles[0]->title_ch}}';
                    location = '{{$post->titles[1]->title_ch}}';
                    position = '{{$post->titles[0]->title_ch}}';
                    name = '{{$contact->typeTitles[0]->title_ch}}';
                    address = '{{$contact->typeTitles[1]->title_ch}}';

                }

                var dataEn = $('#postContent').data(lang); // Retrieve the value of data-en attribute

                $('#postContent').html(dataEn);
                $('#position').html(position);
                $('#location').html(' <i class="bi bi-geo-alt"></i>' + location);
                $('#mainTitle').text(mainTitle);
                $('#addressContact').text(address);
                $('#nameContact').text(name);




            }
        </script>


    </div>

</body>

</html>