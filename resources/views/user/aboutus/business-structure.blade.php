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
                <figure><img src="{{ asset('storage/types/'.$typeGpStructure->imgname)}}" alt=""></figure>
                <h1 id="mainTitle">{{$typeGpStructure->typeTitles[0]->title_th}}</h1>
            </div>
        </section>
        <section class="row">
            <div class="col-12 wrap-structure wrap-tophistory wow fadeInDown">
                <div class="container">
                    <div class="row">
                        <div class="col-12 page-content wow fadeInDown">
                            <div class="topic-history" id="subTitle">{{$typeGpStructure->typeTitles[0]->title_th}}</div>
                            <div class="topic-pageinside" id="companyName">{{$typeGpStructure->typeTitles[1]->title_th}}
                                <div></div>
                            </div>
                            <div class="content-editor" id="content">
                                {!!$typeGpStructure->typeContents[0]->content_th!!}
                            </div>
                            <div class="company-structure">
                                <div class="owl-structure owl-carousel owl-theme">
                                    @foreach($typeGpStructure->posts as $post)
                                    <div class="item-structure">
                                        <figure>
                                            <div class="photo-structure"><img src="{{ asset('storage/posts/'.$post->imgname)}}" alt=""></div>
                                            <figcaption class="hello">
                                                <div class="figTitle" data-th="{!!$post->titles[0]->title_th!!}" data-en="{!!$post->titles[0]->title_en!!}" data-ch="{!!$post->titles[0]->title_ch!!}">{!!$post->titles[0]->title_th!!}</div>
                                                <p class="figSubTitle" data-th="{!!$post->titles[1]->title_th!!}" data-en="{!!$post->titles[1]->title_en!!}" data-ch="{!!$post->titles[1]->title_ch!!}"> {!!$post->titles[1]->title_th!!}</p>

                                            </figcaption>
                                        </figure>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="row">
            <div class="col-12 chart-structure wrap-tophistory wow fadeInDown">
                <div class="container">
                    <div class="row">
                        <div class="col-12 wow fadeInDown">
                            <div class="topic-history" id="diagramTitle">{{$typeDiagram->typeTitles[0]->title_th}}</div>
                            <div class="topic-pageinside" id="diagramSubTitle">{{$typeDiagram->typeTitles[1]->title_th}}
                                <div></div>
                            </div>
                            <figure><img src="{{asset('storage/types/'.$typeDiagram->typeImages[0]->name_th)}}" alt="" id="diagram_image"></figure>
                        </div>
                    </div>
                </div>
                <div class="photo-team wow fadeInDown"><img src="{{asset('storage/types/'. $typeGpStructure->typeImages[0]->name_en)}}" alt=""></div>
            </div>
        </section>

        <section class="row">
            <div class="col-12 wrap-shareholder wow fadeInDown">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="topic-shareholder" id="contentEnd">
                                {!!$typeGpStructure->typeContents[1]->content_th!!}
                            </div>
                            <div class="photo-holder"><img src="{{ asset('storage/types/'. $typeGpStructure->typeImages[1]->name_en)}}" alt="" id="chart_image"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @include('user.inc_footer')
        <script>
            $(".box-menu > ul > li:nth-child(3) > a").addClass("here");
            $(".box-menu ul li > .submenu ul > li:nth-child(5) > a").addClass("here");
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
                    var lang = $(this).data('lang');
                    prepareForTitle(lang);
                    classForEachValue(lang);


                    $('.language-link').removeClass('active');
                    $(this).addClass('active');
                });
            }

            function classForEachValue(lang) {
                $('.hello').each(function() {
                    var $figcaption = $(this);
                    var $title = $figcaption.find('.figTitle');
                    var $subtitle = $figcaption.find('.figSubTitle');
                    $title.html($title.data(lang));
                    $subtitle.html($subtitle.data(lang));

                });
            }

            function prepareForTitle(lang) {

                const chratImage = document.getElementById('chart_image');
                const typeImage = document.getElementById('diagram_image');
                var mainTitle = '',
                    subTitle = '',
                    companyName = '',
                    content = '',
                    diagramTitle = '',
                    diagramSubTitle = '',
                    contentEnd = '';
                if (lang === 'th') {
                    typeImage.src = "{{asset('storage/types/'.$typeDiagram->typeImages[0]->name_th)}}";

                    chratImage.src = "{{asset('storage/types/'.$typeGpStructure->typeImages[1]->name_th)}}";

                    mainTitle = '{{$typeGpStructure->typeTitles[0]->title_th}}';
                    companyName = '{{$typeGpStructure->typeTitles[1]->title_th}}';
                    subTitle = '{{$typeGpStructure->typeTitles[0]->title_th}}';
                    content = '{!!$typeGpStructure->typeContents[0]->content_th!!}';
                    diagramTitle = '{{$typeDiagram->typeTitles[0]->title_th}}';
                    diagramSubTitle = '{{$typeDiagram->typeTitles[1]->title_th}}';
                    contentEnd = '{!!$typeGpStructure->typeContents[1]->content_th!!}';

                } else if (lang === 'en') {
                    typeImage.src = "{{asset('storage/types/'.$typeDiagram->typeImages[0]->name_en)}}";

                    chratImage.src = "{{asset('storage/types/'.$typeGpStructure->typeImages[1]->name_en)}}";

                    mainTitle = '{{$typeGpStructure->typeTitles[0]->title_en}}';
                    companyName = '{{$typeGpStructure->typeTitles[1]->title_en}}';
                    subTitle = '{{$typeGpStructure->typeTitles[0]->title_en}}';
                    content = '{!!$typeGpStructure->typeContents[0]->content_en!!}';
                    diagramTitle = '{{$typeDiagram->typeTitles[0]->title_en}}';
                    diagramSubTitle = '{{$typeDiagram->typeTitles[1]->title_en}}';
                    contentEnd = '{!!$typeGpStructure->typeContents[1]->content_en!!}';
                } else if (lang === 'ch') {
                    typeImage.src = "{{asset('storage/types/'.$typeDiagram->typeImages[0]->name_ch)}}";

                    chratImage.src = "{{asset('storage/types/'.$typeGpStructure->typeImages[1]->name_ch)}}";

                    mainTitle = '{{$typeGpStructure->typeTitles[0]->title_ch}}';
                    companyName = '{{$typeGpStructure->typeTitles[1]->title_ch}}';
                    subTitle = '{{$typeGpStructure->typeTitles[0]->title_ch}}';
                    content = '{!!$typeGpStructure->typeContents[0]->content_ch!!}';
                    diagramTitle = '{{$typeDiagram->typeTitles[0]->title_ch}}';
                    diagramSubTitle = '{{$typeDiagram->typeTitles[1]->title_ch}}';
                    contentEnd = '{!!$typeGpStructure->typeContents[1]->content_ch!!}';
                }
                $('#mainTitle').text(mainTitle);
                $('#companyName').text(companyName);
                $('#subTitle').text(subTitle);
                $('#content').html(content);
                $('#diagramTitle').text(diagramTitle);
                $('#diagramSubTitle').text(diagramSubTitle);
                $('#contentEnd').html(contentEnd);


            }
        </script>


    </div>

</body>

</html>