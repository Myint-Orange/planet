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
        <figure><img src="{{Storage::url('types/'.$type->imgname)}}" alt=""></figure>
        <h1 id="mainTitle">{{ strtoupper($type->typeTitles[0]->title_th) }}</h1>
    </div>
</section>
@if(count($posts)>=1)
<section class="row">
    <div class="col-12 wrap-latestmedia wow fadeInDown">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <figure>
                        <figcaption>
                            <div class="txt-latestmedia">latest update</div>
                            <h2 id="postTitle">{{$posts[0]->titles[0]->title_th}}</h2>
                            <div class="content-editor">
                                <p style="color: #000; font-weight: 500; font-size: 1.25rem;" id="postSubTitle">{{$posts[0]->titles[1]->title_th}}</p>
                                <p id="postContent">
                                    {{$posts[0]->contents[0]->content_th}}
                                </p>
                            </div>
                        </figcaption>
                    @php
                            $videoLink = '';
                            if ($posts[0]->vedios[0]->name != null) {
                                    $videoLink = Storage::url('vedios/'.$posts[0]->vedios[0]->name);
                            } elseif ($posts[0]->vedios[0]->youtube != null) {
                                $videoLink = $posts[0]->vedios[0]->youtube;
                            }
                    @endphp
                        <a href="{{ $videoLink }}" data-fancybox class="cover-media" title="Play Video">
                            <div class="photo-media"><img src="{{ Storage::url('posts/'.$posts[0]->imgname) }}" alt=""></div>
                            <div class="icon-playtext"><img src="{{ asset('user/images/icon-play.svg') }}" alt=""></div>
                        </a>
                  
                    </figure>
                </div>
            </div>
        </div>
    </div>
</section>
@endif
@if(count($posts)>=2)
                @php
                        $videoLink = '';
                        if ($posts[1]->vedios[0]->name != null) {
                                $videoLink = Storage::url('vedios/'.$posts[1]->vedios[0]->name);
                        } elseif ($posts[1]->vedios[0]->youtube != null) {
                            $videoLink = $posts[1]->vedios[0]->youtube;
                        }
                @endphp
<section class="container">
    <div class="row media-post2">
        <div class="col-12 col-lg-6 wow fadeInLeft">
            <a href="{{$videoLink}}" data-fancybox class="cover-media-all" title="Play Video">
                <div class="photo-media"><img src="{{ Storage::url('posts/'.$posts[1]->imgname) }}" alt=""></div>
                <div class="icon-play"><i class="bi bi-play-circle"></i></div>
            </a>
        </div>
      

        <div class="col-12 col-lg-6 wow fadeInRight">
            <div class="desc-postmedia">
                <h3 id="postTitle1">{{$posts[1]->titles[0]->title_th}}</h3>
                <div class="content-editor">
                    <p style="color: #000; font-weight: 500; font-size: 1.2rem;" id="postSubTitle1">{{$posts[1]->titles[1]->title_th}}</p>
                    <p id="postContent1">
                        {{$posts[1]->contents[0]->content_th}}
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
@endif
@if(count($posts)>=3)
                    @php
                            $videoLink = '';
                            if ($posts[2]->vedios[0]->name != null) {
                                    $videoLink = Storage::url('vedios/'.$posts[2]->vedios[0]->name);
                            } elseif ($posts[2]->vedios[0]->youtube != null) {
                                $videoLink = $posts[2]->vedios[0]->youtube;
                            }
                    @endphp
<section class="row">
    <div class="col-12 media-post3">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6 wow fadeInLeft">
                    <div class="desc-postmedia">
                      
                        <h3 id="postTitle2">{{$posts[2]->titles[0]->title_th}}</h3>
                        <div class="content-editor">
                            <p style="color: #000; font-weight: 500; font-size: 1.2rem;" id="postSubTitle2">{{$posts[2]->titles[1]->title_th}}</p>
                            <p id="postContent2">
                                {{$posts[2]->contents[0]->content_th}}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 wow fadeInRight">
                    <a href="{{$videoLink}}" data-fancybox class="cover-media-all" title="Play Video">
                        <div class="photo-media"><img src="{{ Storage::url('posts/'.$posts[2]->imgname) }}" alt=""></div>
                        <div class="icon-play"><i class="bi bi-play-circle"></i></div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endif

@if(count($posts)>=4)
<section class="container">
    <div class="row all-media">
        @foreach($posts as $index => $post)
            @if($index >= 3)
            @php
                    $videoLink = '';
                    if ($post->vedios[0]->name != null) {
                            $videoLink = Storage::url('vedios/'.$post->vedios[0]->name);
                    } elseif ($post->vedios[0]->youtube != null) {
                            $videoLink = $post->vedios[0]->youtube;
                    }
            @endphp
                <div class="col-12 col-md-6 wow fadeInDown item-media">
                    <figure>
                        <a href="{{$videoLink}}" data-fancybox class="cover-media-all" title="Play Video">
                            <div class="photo-media"><img src="{{ Storage::url('posts/'.$post->imgname) }}" alt=""></div>
                            <div class="icon-play"><i class="bi bi-play-circle"></i></div>
                        </a>
                        <figcaption class="hello">
                            <div class="desc-postmedia">
                                <h3 class="postTitle"
                                data-th="{{$post->titles[0]->title_th}}"
                                data-en="{{$post->titles[0]->title_en}}"
                                data-ch="{{$post->titles[0]->title_ch}}"
                                >{{$post->titles[0]->title_th}}</h3>
                                <div class="content-editor">
                                    <p style="color: #000; font-weight: 500; font-size: 1.1rem;" class="postSubTitle"
                                            data-th="{{$post->titles[1]->title_th}}"
                                            data-en="{{$post->titles[1]->title_en}}"
                                            data-ch="{{$post->titles[1]->title_ch}}">
                                        {{$post->titles[1]->title_th}}</p>
                                    <p class="postContent"
                                            data-th="{{$post->contents[0]->content_th}}"
                                            data-en="{{$post->contents[0]->content_en}}"
                                            data-ch="{{$post->contents[0]->content_ch}}">
                                        {{$post->contents[0]->content_th}}
                                    </p>
                                </div>
                            </div>
                        </figcaption>
                    </figure>
                </div>
            @endif
        @endforeach
       
    </div>
</section>
@endif

@include('user.inc_footer')	

<script>
	$( ".box-menu > ul > li:nth-child(5) > a" ).addClass( "here" );
    $( ".box-menu ul li > .submenu ul > li:nth-child(2) > a" ).addClass( "here" );
    $(document).ready(function() {
        var lang = "{{ session('lang') }}";
        if(lang==null){
        lang=th;
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

            function prepareForTitle(lang){
                var mainTitle='',postTitle='',postSubTitle="",postContent="",
                                 postTitle1='',postSubTitle1="",postContent1="",
                                 postTitle2='',postSubTitle2="",postContent2="";
               
                if (lang === 'th') {
                        mainTitle="{{ strtoupper($type->typeTitles[0]->title_th) }}";
                        postTitle="{{$posts[0]->titles[0]->title_th}}";
                        postSubTitle='{{$posts[0]->titles[1]->title_th}}';
                        postContent='{{$posts[0]->contents[0]->content_th}}';
                        postTitle1='{{$posts[1]->titles[0]->title_th}}';
                        postSubTitle1='{{$posts[1]->titles[1]->title_th}}';
                        postContent1='{{$posts[1]->contents[0]->content_th}}';
                        postTitle2='{{$posts[2]->titles[0]->title_th}}';
                        postSubTitle2='{{$posts[2]->titles[1]->title_th}}';
                        postContent2='{{$posts[2]->contents[0]->content_th}}';
                   
                 } else if (lang === 'en') {             
                        mainTitle="{{ strtoupper($type->typeTitles[0]->title_en) }}";
                        postTitle="{{$posts[0]->titles[0]->title_en}}";
                        postSubTitle='{{$posts[0]->titles[1]->title_en}}';
                        postContent='{{$posts[0]->contents[0]->content_en}}';
                        postTitle1='{{$posts[1]->titles[0]->title_en}}';
                        postSubTitle1='{{$posts[1]->titles[1]->title_en}}';
                        postContent1='{{$posts[1]->contents[0]->content_en}}';
                        postTitle2='{{$posts[2]->titles[0]->title_en}}';
                        postSubTitle2='{{$posts[2]->titles[1]->title_en}}';
                        postContent2='{{$posts[2]->contents[0]->content_en}}';
               
                } else if (lang === 'ch') {          
                        mainTitle="{{ strtoupper($type->typeTitles[0]->title_ch) }}";
                        postTitle="{{$posts[0]->titles[0]->title_ch}}";
                        postSubTitle='{{$posts[0]->titles[1]->title_ch}}';
                        postContent='{{$posts[0]->contents[0]->content_ch}}';
                        postTitle1='{{$posts[1]->titles[0]->title_ch}}';
                        postSubTitle1='{{$posts[1]->titles[1]->title_ch}}';
                        postContent1='{{$posts[1]->contents[0]->content_ch}}';
                        postTitle2='{{$posts[2]->titles[0]->title_ch}}';
                        postSubTitle2='{{$posts[2]->titles[1]->title_ch}}';
                        postContent2='{{$posts[2]->contents[0]->content_ch}}';
    
                }
                $('#mainTitle').text(mainTitle);     
                $('#postTitle').html(postTitle);   
                $('#postSubTitle').text(postSubTitle);  
                $('#postContent').text(postContent); 

                $('#postTitle1').html(postTitle1); 
                $('#postSubTitle1').text(postSubTitle1);  
                $('#postContent1').text(postContent1);    

                $('#postTitle2').html(postTitle2);   
                $('#postSubTitle2').text(postSubTitle2);  
                $('#postContent2').text(postContent2);  
        }
        function classForeachVal(lang){
        $('.hello').each(function() {
                var $figcaption = $(this);
                var $title = $figcaption.find('.postTitle');
                var $subTitle = $figcaption.find('.postSubTitle');
                var $postContent = $figcaption.find('.postContent');
                $title.html($title.data(lang));
                $subTitle.html($subTitle.data(lang));
                $postContent.html($postContent.data(lang));
                });
    }

</script>

		
</div>

</body>

</html>
