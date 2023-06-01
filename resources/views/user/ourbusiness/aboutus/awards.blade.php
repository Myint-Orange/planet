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
        <figure><img src=" {{asset('storage/types/'.$typeAward->imgname)}}" alt="">
                </figure>
                <h1 id="mainTitle" style="text-transform: uppercase;">{{$typeAward->typeTitles[0]->title_th}}</h1>

            </div>
        </section>

        <section class="row">
            <div class="col-12 wrap-awards">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-md-4 col-xl-3 wow fadeInLeft">
                            <div class="award-mb topic-pageinside" id="subTitles">{!!$typeAward->typeTitles[0]->title_th!!}<div></div>
                            </div>
                            <div class="photo-certificate"><img src="{{asset('storage/types/'.$typeAward->typeImages[0]->name_en)}}" alt=""></div>
                        </div>
                        <div class="col-12 col-md-8 col-xl-9 wow fadeInRight">
                            <div class="desc-awards">
                                <div class="topic-pageinside" id="contentTitle">{!!$typeAward->typeTitles[0]->title_th!!}<div></div>
                                </div>
                                <div class="content-editor" id="content">
                                    {!!$typeAward->typeContents[0]->content_th!!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        @include('user.inc_footer')


        <script>
            $(".box-menu > ul > li:nth-child(3) > a").addClass("here");
            $(".box-menu ul li > .submenu ul > li:nth-child(9) > a").addClass("here");

            $(document).ready(function() {
                var lang = localStorage.getItem('activeLang');
                if (lang == null) {
                    lang = th;
                }
                prepareForTitle(lang);
                prepareForCoreValues();
            });

            function prepareForCoreValues() {
                $('.language-link').click(function(e) {
                    e.preventDefault();
                    var lang = $(this).data('lang');
                    prepareForTitle(lang);
                    $('.language-link').removeClass('active');
                    $(this).addClass('active');
                });
            }


            function prepareForTitle(lang) {
                var mainTitle = '',
                    subTitle = '',
                    contentTitle = '',
                    content = '';
                if (lang === 'th') {

                    mainTitle = '{{$typeAward->typeTitles[0]->title_th}}';
                    subTitle = '{{$typeAward->typeTitles[0]->title_th}}';
                    contentTitle = '{{$typeAward->typeTitles[0]->title_th}}';
                    content = '{{$typeAward->typeContents[0]->content_th}}';
                } else if (lang === 'en') {
                    mainTitle = '{{$typeAward->typeTitles[0]->title_en}}';
                    subTitle = '{{$typeAward->typeTitles[0]->title_en}}';
                    contentTitle = '{{$typeAward->typeTitles[0]->title_en}}';
                    content = '{{$typeAward->typeContents[0]->content_en}}';
                } else if (lang === 'ch') {
                    mainTitle = '{{$typeAward->typeTitles[0]->title_ch}}';
                    subTitle = '{{$typeAward->typeTitles[0]->title_ch}}';
                    contentTitle = '{{$typeAward->typeTitles[0]->title_ch}}';
                    content = '{{$typeAward->typeContents[0]->content_ch}}';
                }
                $('#mainTitle').text(mainTitle);
                $('#subTitle').text(subTitle);
                $('#contentTitle').text(contentTitle);
                $('#content').text(content);


            }
        </script>
    </div>

</body>

</html>