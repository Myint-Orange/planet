<!doctype html>
<html>

<head>
    @include('user.inc_head')

</head>

<body>

<div class="container-fluid">
    @include('user.inc_menu')	
<section class="row">
    <div class="col-12 banner-brief banner-inside wow fadeInDown"">
        <figure><img src="{{asset('storage/types/'.$typeOverView->imgname)}}" alt=""></figure>
        <h1 id="mainTitle">{{$typeOverView->typeTitles[0]->title_th}}</h1>
    </div>
</section>

<section class="row">
    <div class="col-12 wrap-brief">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-4 itembrief-top item-brief wow fadeInDown">
                    <a href="{{route('user.history.index')}}">
                        <figure>
                            <div class="cover-brief"><img src="{{asset('storage/types/'.$typeHistory->typeImages[count($typeHistory->typeImages)-1]->name_en)}}" alt=""></div>
                            <figcaption>
                                <div class="brief-title" id='titleHistory'>{{$typeHistory->typeTitles[0]->title_th}}</div>
                                <div class="brief-caption">
                                    <div class="brief-title-hover" id='subTitleHistory'>{{$typeHistory->typeTitles[0]->title_th}}</div>
                                    <div class="box-briefcaption" id="descHistory">
                                    {{ $typeHistory->typeContents[4]->content_th }}...
                                    </div>
                                    <div class="btn-textarrow">ดูรายละเอียด <img src="images/icon-arrow-gold.svg" alt=""></div>
                                </div>
                            </figcaption>
                        </figure>
                    </a>
                </div>
              
                <div class="col-12 col-md-4 itembrief-top item-brief wow fadeInDown">
                    <a href="{{route('user.vision.index')}}">
                      
                        <figure>
                            <div class="cover-brief"><img  src="{{asset('storage/types/'.$typeVision->typeImages[count($typeVision->typeImages)-1]->name_en)}}" alt=""></div>
                            <figcaption>
                            
                            
                                <div class="brief-title" id="titleVision">{{$typeVision->typeTitles[0]->title_th}}</div>
                                <div class="brief-caption">
                                    <div class="brief-title-hover" id="subTitleVision">{{$typeVision->typeTitles[0]->title_th}}</div>
                                    <div class="box-briefcaption" id="descVision">
                                        {{$typeVision->typeContents[1]->content_th}}...
                                    </div>
                                    <div class="btn-textarrow">ดูรายละเอียด <img src="images/icon-arrow-gold.svg" alt=""></div>
                                </div>
                            </figcaption>
                        </figure>
                    </a>
                </div>
                <div class="col-12 col-md-4 itembrief-top item-brief wow fadeInDown">
                    <a href="{{route('user.corevalue.index')}}">
                        <figure>
                            <div class="cover-brief"><img src="{{asset('storage/types/'.$typeCoreValue->typeImages[count($typeCoreValue->typeImages)-1]->name_en)}}" alt=""></div>
                            <figcaption>
                                                          <div class="brief-title" id="titleCorevalue">{{$typeCoreValue->typeTitles[0]->title_th}}</div>
                                <div class="brief-caption">
                                    <div class="brief-title-hover" id="subTitleCoreValue">{{$typeCoreValue->typeTitles[0]->title_th}}</div>
                                    <div class="box-briefcaption" id="descCoreValue">
                                        {{$typeCoreValue->typeContents[1]->content_th}}...
                                    </div>
                                    <div class="btn-textarrow" id>ดูรายละเอียด<img src="images/icon-arrow-gold.svg" alt=""></div>
                                </div>
                            </figcaption>
                        </figure>
                    </a>
                </div>
            </div>
        </div>
        <div class="brief-full item-brief wow fadeInDown">
            <a href="{{route('user.groupstructure.index')}}">
                <figure>
                    <div class="cover-brief"><img src="{{asset('storage/types/'.$typeGpStructure->typeImages[count($typeGpStructure->typeImages)-1]->name_en)}}" alt=""></div>
                    <figcaption>
                        <div class="brief-title" id="titleGroup">{{$typeGpStructure->typeTitles[0]->title_th}}</div>
                        <div class="brief-caption">
                            <div class="brief-title-hover" id="subTitleGroup">{{$typeGpStructure->typeTitles[0]->title_th}}</div>
                            <div class="box-briefcaption" id="descGroup">
                            {{ $typeGpStructure->typeContents[2]->content_th}}...
                            </div>
                            <div class="btn-textarrow">ดูรายละเอียด <img src="images/icon-arrow-gold.svg" alt=""></div>
                        </div>
                    </figcaption>
                </figure>
            </a>
        </div>
    </div>
</section>

<section class="container wrap-brief-bottom">
    <div class="row">
        <div class="col-12 col-md-6 col-brief-bottom item-brief wow fadeInLeft">
            <a href="{{route('user.orgstructure.index')}}">
                <figure>
                    <div class="cover-brief"><img src="{{asset('storage/types/'.$typeOrgStructure->typeImages[count($typeOrgStructure->typeImages)-1]->name_en)}}" alt=""></div>
                    <figcaption>
                        <div class="brief-title" id="titleOrg">{{$typeOrgStructure->typeTitles[0]->title_th}}</div>
                        <div class="brief-caption">
                            <div class="brief-title-hover" id="subTitleOrg">{{$typeOrgStructure->typeTitles[0]->title_th}}</div>
                            <div class="box-briefcaption" id="descOrg">
                                {{$typeOrgStructure->typeContents[1]->content_th }}....
                            </div>
                            <div class="btn-textarrow">ดูรายละเอียด<img src="images/icon-arrow-gold.svg" alt=""></div>
                        </div>
                    </figcaption>
                </figure>
            </a>
        </div>
        <div class="col-12 col-md-6 col-brief-bottom wow fadeInRight">
            <div class="row">
                <div class="col-12 brief-full-bottom item-brief wow fadeInDown">
                    <a href="{{route('user.network')}}">
                        <figure>
                      
                            <div class="cover-brief"><img src="{{asset('storage/types/'.$typeGpStructure->typeImages[count($typeNetwork->typeImages)-1]->name_en)}}" alt=""></div>
                            <figcaption>
                                <div class="brief-title" id="titleNetwork ">{{$typeNetwork->typeTitles[0]->title_th}}</div>
                                <div class="brief-caption">
                                    <div class="brief-title-hover" id="subTitleNetwork">{{$typeNetwork->typeTitles[0]->title_th}}</div>
                                    <div class="box-briefcaption" id="descNetwork">
                                        {{ mb_substr(str_replace('&nbsp;', '', strip_tags($typeNetwork->typeContents[1]->content_th)), 0, 100) }}...
                                    </div>
                                    <div class="btn-textarrow">ดูรายละเอียด <img src="images/icon-arrow-gold.svg" alt=""></div>
                                </div>
                            </figcaption>
                        </figure>
                    </a>
                </div>
                <div class="col-12 brief-full-bottom item-brief wow fadeInDown">
                    <a href="{{route('user.award.index')}}">
                        <figure>
                            <div class="cover-brief"><img src="{{asset('storage/types/'.$typeAward->typeImages[count($typeAward->typeImages)-1]->name_en)}}" alt=""></div>
                            <figcaption>
                                <div class="brief-title" id="titleAward">{{$typeAward->typeTitles[0]->title_th}}</div>
                                <div class="brief-caption">
                                    <div class="brief-title-hover" id="subTitleAward">{{$typeAward->typeTitles[0]->title_th}}</div>
                                    <div class="box-briefcaption" id="descAward">
                                        {{ mb_substr(str_replace('&nbsp;', '', strip_tags($typeAward->typeContents[1]->content_th)), 0, 100) }}...
                                    </div>
                                    <div class="btn-textarrow">ดูรายละเอียด <img src="images/icon-arrow-gold.svg" alt=""></div>
                                </div>
                            </figcaption>
                        </figure>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@include('user.inc_footer')	
<script>
	$( ".box-menu > ul > li:nth-child(3) > a" ).addClass( "here" );
    $( ".box-menu ul li > .submenu ul > li:nth-child(1) > a" ).addClass( "here" );

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

                    // Add the "active" class to the clicked language link
                    $(this).addClass('active');
                });
            }

    function prepareForTitle(lang) {
                var titleHistory = '',subTitleHistory='',descHistory='',
                   titleVision='',subTitleVision='',descVision='',
                   titleCorevalue='',subTitleCoreValue='',descCoreValue='',
                   titleGroup='',subTitleGroup='',descGroup='',
                   titleOrg='',subTitleOrg='',descOrg='',
                   titleNetwork='',subTitleNetwork='',descNetwork='',
                   titleAward='',subTitleAward='',descAward='',mainTitle='';
                if (lang === 'en') {
                 
                            titleHistory="{{$typeHistory->typeTitles[0]->title_en}}";
                            subTitleHistory="{{$typeHistory->typeTitles[0]->title_en}}";
                            descHistory="{{$typeHistory->typeContents[4]->content_en}}...";
                            mainTitle="{{$typeOverView->typeTitles[0]->title_en}}";

                            titleVision="{{$typeVision->typeTitles[0]->title_en}}";
                            subTitleVision="{{$typeVision->typeTitles[0]->title_en}}";
                            descVision="{{$typeVision->typeContents[1]->content_en }}...";

                            titleCorevalue="{{$typeCoreValue->typeTitles[0]->title_en}}";
                            subTitleCoreValue="{{$typeCoreValue->typeTitles[0]->title_en}}"
                            descCoreValue="{{$typeCoreValue->typeContents[1]->content_en }}...";

                            titleGroup="{{$typeGpStructure->typeTitles[0]->title_en}}";
                            subTitleGroup="{{$typeGpStructure->typeTitles[0]->title_en}}";
                            descGroup="{{$typeGpStructure->typeContents[2]->content_en}}...";

                            titleOrg="{{$typeOrgStructure->typeTitles[0]->title_en}}";
                            subTitleOrg="{{$typeOrgStructure->typeTitles[0]->title_en}}";
                            descOrg="{{ $typeOrgStructure->typeContents[1]->content_en}}...";

                            titleNetwork="{{$typeNetwork->typeTitles[0]->title_en}}";
                            subTitleNetwork="{{$typeNetwork->typeTitles[0]->title_en}}";
                            descNetwork="{{ $typeNetwork->typeContents[1]->content_en}}...";

                            titleAward="{{$typeAward->typeTitles[0]->title_en}}";
                            subTitleAward="{{$typeAward->typeTitles[0]->title_en}}";
                            descAward="{{ $typeAward->typeContents[1]->content_en}}...";
                }else if(lang === 'th'){
                            titleHistory="{{$typeHistory->typeTitles[0]->title_th}}";
                            subTitleHistory="{{$typeHistory->typeTitles[0]->title_th}}";
                            descHistory="{{$typeHistory->typeContents[4]->content_th}}...";
                            mainTitle="{{$typeOverView->typeTitles[0]->title_th}}";


                            titleVision="{{$typeVision->typeTitles[0]->title_th}}";
                            subTitleVision="{{$typeVision->typeTitles[0]->title_th}}";
                            descVision="{{$typeVision->typeContents[1]->content_th }}...";

                            titleCorevalue="{{$typeCoreValue->typeTitles[0]->title_th}}";
                            subTitleCoreValue="{{$typeCoreValue->typeTitles[0]->title_th}}"
                            descCoreValue="{{$typeCoreValue->typeContents[1]->content_th }}...";

                            titleGroup="{{$typeGpStructure->typeTitles[0]->title_th}}";
                            subTitleGroup="{{$typeGpStructure->typeTitles[0]->title_th}}";
                            descGroup="{{$typeGpStructure->typeContents[2]->content_th}}...";

                            titleOrg="{{$typeOrgStructure->typeTitles[0]->title_th}}";
                            subTitleOrg="{{$typeOrgStructure->typeTitles[0]->title_th}}";
                            descOrg="{{ $typeOrgStructure->typeContents[1]->content_th}}...";

                            titleNetwork="{{$typeNetwork->typeTitles[0]->title_th}}";
                            subTitleNetwork="{{$typeNetwork->typeTitles[0]->title_th}}";
                            descNetwork="{{ $typeNetwork->typeContents[1]->content_th}}...";

                            titleAward="{{$typeAward->typeTitles[0]->title_th}}";
                            subTitleAward="{{$typeAward->typeTitles[0]->title_th}}";
                            descAward="{{ $typeAward->typeContents[1]->content_th}}...";

                }else if(lang === 'ch'){
                    titleHistory="{{$typeHistory->typeTitles[0]->title_ch}}";
                            subTitleHistory="{{$typeHistory->typeTitles[0]->title_ch}}";
                            descHistory="{{$typeHistory->typeContents[4]->content_ch}}...";
                            mainTitle="{{$typeOverView->typeTitles[0]->title_ch}}";


                            titleVision="{{$typeVision->typeTitles[0]->title_ch}}";
                            subTitleVision="{{$typeVision->typeTitles[0]->title_ch}}";
                            descVision="{{$typeVision->typeContents[1]->content_ch }}...";

                            titleCorevalue="{{$typeCoreValue->typeTitles[0]->title_ch}}";
                            subTitleCoreValue="{{$typeCoreValue->typeTitles[0]->title_ch}}"
                            descCoreValue="{{$typeCoreValue->typeContents[1]->content_ch }}...";

                            titleGroup="{{$typeGpStructure->typeTitles[0]->title_ch}}";
                            subTitleGroup="{{$typeGpStructure->typeTitles[0]->title_ch}}";
                            descGroup="{{$typeGpStructure->typeContents[2]->content_ch}}...";

                            titleOrg="{{$typeOrgStructure->typeTitles[0]->title_ch}}";
                            subTitleOrg="{{$typeOrgStructure->typeTitles[0]->title_ch}}";
                            descOrg="{{ $typeOrgStructure->typeContents[1]->content_ch}}...";

                            titleNetwork="{{$typeNetwork->typeTitles[0]->title_ch}}";
                            subTitleNetwork="{{$typeNetwork->typeTitles[0]->title_ch}}";
                            descNetwork="{{ $typeNetwork->typeContents[1]->content_ch}}...";

                            titleAward="{{$typeAward->typeTitles[0]->title_ch}}";
                            subTitleAward="{{$typeAward->typeTitles[0]->title_ch}}";
                            descAward="{{ $typeAward->typeContents[1]->content_ch}}...";
                }
           
                $('#titleHistory').text(titleHistory);
                $('#subTitleHistory').text(subTitleHistory);
                $('#descHistory').text(descHistory);
                $('#titleVision').text(titleVision);
                $('#subTitleVision').text(subTitleVision);
                $('#descVision').text(descVision);
                $('#titleCorevalue').text(titleCorevalue);
                $('#subTitleCoreValue').text(subTitleCoreValue);
                $('#descCoreValue').text(descCoreValue);
                $('#titleGroup').text(titleGroup);
                $('#subTitleGroup').text(subTitleGroup);
                $('#descGroup').text(descGroup);
                $('#titleOrg').text(titleOrg);
                $('#subTitleOrg').text(subTitleOrg);
                $('#descOrg').text(descOrg);
                $('#titleNetwork').text(titleNetwork);
                $('#subTitleNetwork').text(subTitleNetwork);
                $('#descNetwork').text(descNetwork);
                $('#titleAward').text(titleAward);
                $('#subTitleAward').text(subTitleAward);
                $('#descAward').text(descAward);
                $('#mainTitle').text(mainTitle);

            }
    
</script>


		
</div>

</body>

</html>
