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
        <figure><img src=" {{ asset('storage/types/'.$typeVision->imgname) }}" alt="">
                </figure>
                <h1 id="mainTitle">{{$typeVision->typeTitles[0]->title_th}}</h1>
            </div>
        </section>

        <section class="row">
            <div class="col-12 wrap-vision wow fadeInDown">
                <div class="container">
                    <div class="row">

                        <div class="col-12 wow fadeInDown">
                            <div class="topic-pageinside" id="titleVision">{{$typeVision->typeTitles[1]->title_th}}
                                <div></div>
                            </div>
                            <div class="topic-vision" id="content">{{$typeVision->typeContents[0]->content_th}}</div>
                            <div class="photo-vision"><img src="{{ asset('storage/types/'.$typeVision->typeImages[0]->name_en)}}" alt=""></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="container">
            <div class="row wrap-mission">
                <div class="col-12 col-lg-6 wow fadeInLeft">
                    <div class="photo-mission"><img src="{{ asset('storage/types/'.$typeMission->imgname)}}" alt=""></div>
                </div>
                <div class="col-12 col-lg-6 wow fadeInRight">
                    <div class="mission-list">
                        <div class="topic-pageinside" id="titleMission">{{$typeMission->typeTitles[0]->title_th}}
                            <div></div>
                        </div>
                        <div class="list-descmission">
                            <div class="box-mission">
                                @foreach($typeMission->posts as $post)
                                <div class="num-mission">0{{$loop->index+1}}.</div>
                                <div class="desc-mission" data-th="{{$post->contents[0]->content_th}}" data-en="{{$post->contents[0]->content_en}}" data-ch="{{$post->contents[0]->content_ch}}">{{$post->contents[0]->content_th}}
                                    <!-- Content here -->
                                </div>
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
            $(".box-menu ul li > .submenu ul > li:nth-child(3) > a").addClass("here");


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
                    var lang = $(this).data('lang');
                    prepareForTitle(lang);
                    classForEachValue(lang);
                });
            }

            function classForEachValue(lang) {
                $('.desc-mission').each(function() {
                    var content = '';
                    content = $(this).data(lang);
                    $(this).text(content);
                });
            }

            function prepareForTitle(lang) {
                var titleMission = '',
                    titleVision = '',
                    mainTitle = '',
                    visionContent = '';
                if (lang === 'th') {
                    titleMission = '{{$typeMission->typeTitles[0]->title_th}}';
                    titleVision = '{{$typeVision->typeTitles[1]->title_th}}';
                    mainTitle = '{{$typeVision->typeTitles[0]->title_th}}';
                    visionContent = '{{$typeVision->typeContents[0]->content_th}}';

                } else if (lang === 'en') {
                    titleMission = '{{$typeMission->typeTitles[0]->title_en}}';
                    titleVision = '{{$typeVision->typeTitles[1]->title_en}}';
                    mainTitle = '{{$typeVision->typeTitles[0]->title_en}}';
                    visionContent = '{{$typeVision->typeContents[0]->content_en}}';
                } else if (lang === 'ch') {
                    titleMission = '{{$typeMission->typeTitles[0]->title_ch}}';
                    titleVision = '{{$typeVision->typeTitles[1]->title_ch}}';
                    mainTitle = '{{$typeVision->typeTitles[0]->title_ch}}';
                    visionContent = '{{$typeVision->typeContents[0]->content_ch}}';
                }
                $('#titleMission').text(titleMission);
                $('#titleVision').text(titleVision);
                $('#mainTitle').text(mainTitle);
                $('#content').text(visionContent);


            }
        </script>


    </div>

</body>

</html>