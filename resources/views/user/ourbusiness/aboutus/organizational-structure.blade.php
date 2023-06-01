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
        <figure><img src=" {{asset('storage/types/'.$typeOrgStructure->imgname)}}" alt="">
                </figure>
                <h1 id="mainTitle">{{$typeOrgStructure->typeTitles[0]->title_th}}</h1>
            </div>
        </section>
        <section class="row">
            <div class="col-12 chart-structure wrap-tophistory wow fadeInDown">
                <div class="container">
                    <div class="row">
                        <div class="col-12 wow fadeInDown">
                            <div class="topic-history" id="subTitle">{{$typeOrgStructure->typeTitles[0]->title_th}}</div>
                            <div class="topic-pageinside" id="diagramTitle">{{$typeOrgStructure->typeTitles[1]->title_th}}
                                <div></div>
                            </div>
                            <figure><img src="{{asset('storage/types/'.$typeOrgStructure->typeImages[0]->name_th)}}" alt="" id="diagram_image"></figure>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        @include('user.inc_footer')


        <script>
            $(".box-menu > ul > li:nth-child(3) > a").addClass("here");
            $(".box-menu ul li > .submenu ul > li:nth-child(6) > a").addClass("here");
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
                const typeImage = document.getElementById('diagram_image');
                var mainTitle = '',
                    subTitle = '',
                    diagramTitle = '';
                if (lang === 'th') {
                    typeImage.src = "{{asset('storage/types/'.$typeOrgStructure->typeImages[0]->name_th)}}";

                    mainTitle = '{{$typeOrgStructure->typeTitles[0]->title_th}}';
                    subTitle = '{{$typeOrgStructure->typeTitles[0]->title_th}}';
                    diagramTitle = '{{$typeOrgStructure->typeTitles[1]->title_th}}';


                } else if (lang === 'en') {
                    typeImage.src = "{{asset('storage/types/'.$typeOrgStructure->typeImages[0]->name_en)}}";

                    mainTitle = '{{$typeOrgStructure->typeTitles[0]->title_en}}';
                    subTitle = '{{$typeOrgStructure->typeTitles[0]->title_en}}';
                    diagramTitle = '{{$typeOrgStructure->typeTitles[1]->title_en}}';
                } else if (lang === 'ch') {
                    typeImage.src = "{{ asset('storage/'.$typeOrgStructure->typeImages[0]->name_ch)}}";

                    mainTitle = '{{$typeOrgStructure->typeTitles[0]->title_ch}}';
                    subTitle = '{{$typeOrgStructure->typeTitles[0]->title_ch}}';
                    diagramTitle = '{{$typeOrgStructure->typeTitles[1]->title_ch}}';
                }
                $('#mainTitle').text(mainTitle);
                $('#subTitle').text(subTitle);
                $('#diagramTitle').text(diagramTitle);





            }
        </script>


    </div>

</body>

</html>