<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
<script src="{{asset('user/js/jquery.min.js')}}"></script>
<script src="{{asset('user/js/jquery-ui.min.js')}}"></script>
<script src="{{asset('user/js/bootstrap.min.js')}}"></script>
<script src="{{asset('user/js/owl.carousel.js')}}"></script>
<script src="{{asset('user/js/wow.min.js')}}"></script>
<script src="{{asset('user/js/fancybox.umd.js')}}"></script>
<script src="{{asset('user/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('user/js/bootstrap-datepicker.th.min.js')}}"></script>
<script src="{{asset('user/js/modernizr.custom.js')}}"></script>
<script src="{{asset('user/js/script.js')}}"></script>

<script>
    $(document).ready(function() {
        var lang = localStorage.getItem('activeLang');
        if (lang == null) {
            lang = 'th';
        }
        prepareMenuForLanguageChange();
        prepareForMenu(lang);
        prepareForSubMenu(lang);
        prepareDataForBusiness(lang);
        prepareForAddress(lang);
        prepareForLink('th');
        $('.language-link').removeClass('active');
        $('.language-link[data-lang="' + lang + '"]').addClass('active');
    });

    function prepareMenuForLanguageChange() {
        $('.language-link').click(function(e) {
            e.preventDefault();
            lang = $(this).data('lang');
            // setSession(lang);
            localStorage.setItem('activeLang', lang);
            prepareDataForBusiness(lang);
            prepareForMenu(lang);
            prepareForSubMenu(lang);
            prepareForAddress(lang);
        });

    }

    function prepareForMenu(lang) {
        $.ajax({
            url: "{{url('/user/prepareForMenu')}}/" + lang,
            method: 'GET',
            dataType: 'json',
            success: function(response) {
                // console.log("Success to group menu");
                console.log(response);
                var menuBar = response.menuBar;
                var imgMenu = response.imgMenu;
                console.log("img Menu=" + imgMenu);
                //console.log(menuBar); 
                $('#about_us').html(menuBar['about_us']);
                $('#sub_about_us').html(menuBar['about_us']);
                $('#bus_group').html(menuBar['bus_group']);
                $('#sub_bus_group').html(menuBar['bus_group']);
                $('#contactus').html(menuBar['contactus']);
                $('#knowledge').html(menuBar['knowledge']);
                $('#sub_knowledge').html(menuBar['knowledge']);
                $('#sub_bus_group').html(menuBar['bus_group']);
                $('#mainpage').html(menuBar['mainpage']);
                $('#work_with_us').html(menuBar['work_with_us']);
                $('#investor').html(menuBar['investor']);
                var img1="{{ asset('storage/groups')}}/" + imgMenu.aboutus;
                var img2="{{ asset('storage/groups')}}/" + imgMenu.busgroup;
                var img3="{{ asset('storage/groups')}}/" + imgMenu.knowledge;

                $('#srcAboutUs').attr('src',img1);
                $('#srcBusGroup').attr('src',img2);
                $('#srcKnowledge').attr('src',img3);


            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    }

    function prepareForSubMenu(lang) {
        $.ajax({
            url: "{{url('/user/prepareForSubMenu')}}/" + lang,
            method: 'GET',
            dataType: 'json',
            success: function(response) {

                var menuBar = response.menuBar;

                $('#network').html(menuBar['network']);
                $('#corevalue').html(menuBar['corevalue']);
                $('#vision').html(menuBar['vision']);
                $('#groupstructure').html(menuBar['groupstructure']);
                $('#orgstructure').html(menuBar['orgstructure']);
                $('#history').html(menuBar['history']);
                $('#pride').html(menuBar['pride']);
                $('#overview').html(menuBar['overview']);
                $('#manstructure').html(menuBar['manstructure']);
                $('#activity').html(menuBar['activity']);
                $('#social').html(menuBar['social']);
                $('#interest').html(menuBar['interest']);


            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    }

    function prepareForAddress(lang) {

        $.ajax({
            url: "{{url('/user/prepareForAddress')}}/" + lang,
            method: 'GET',
            dataType: 'json',
            success: function(response) {
                var address = response.address;
                // console.log(address[0]['title_'+lang]); 
                $('#address').text(address[1]['title_' + lang]);
                $('#phone').html(address[2]['title_' + lang]);
                $('#email').html(address[3]['title_' + lang]);
                $('#phone').attr('href', 'tel:' + address[2]['title_' + lang]);
                $('#email').attr('href', 'mailto:' + address[3]['title_' + lang]);

                $('#phone_menu').html(address[2]['title_' + lang]);
                $('#email_menu').html(address[3]['title_' + lang]);
                $('#phone_menu').attr('href', 'tel:' + address[2]['title_' + lang]);
                $('#email_menu').attr('href', 'mailto:' + address[3]['title_' + lang]);
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    }

    function prepareForLink(lang) {
        $.ajax({
            url: "{{url('/user/prepareForLink')}}/" + lang,
            method: 'GET',
            dataType: 'json',
            success: function(response) {
                console.log("Success to load Link");
                var link = response.link;

                $('.custom-link').each(function(index) {
                    //console.log( link[index].title_en);
                    $(this).attr('href', link[index].title_en);
                });
                $('.custom-menu').each(function(index) {
                    //console.log( link[index].title_en);
                    $(this).attr('href', link[index].title_en);
                });


            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    }

    function prepareDataForBusiness(lang) {
        $.ajax({
            url: "{{url('/main_menu/ourbusiness')}}",
            method: 'GET',
            dataType: 'json',
            success: function(response) {
                //console.log("Success to load group");
                var types = response.types;
                var typeTitles = response.typeTitles;
                var listItems = '';
                    var type = types[0];
                    var route = "{{ route('user.businesstype', [':id']) }}";
                    route = route.replace(':id', type.id);
                    title = 'title_' + lang;
                  
                    $('#busFoot').html('<li><a href="' + route + '" class="menu_list">Our Business</a></li>');
          
                        var routeImg="{{asset('user/images/icon-business.svg')}}";
                        $('#busMain').html('<a href="' + route + '" alt=""><img src="'+routeImg+'" alt="">Our Business</a>');
                
            
               
                for (var i = 0; i < types.length; i++) {
                    var type = types[i];

                    var route = "{{ route('user.businesstype', [':id']) }}";
                    route = route.replace(':id', type.id);
                    title = 'title_' + lang;
                    listItems += '<li><a href="' + route + '" class="menu_list">' + typeTitles[type.id][title] + '</a></li>';
                }
                $('#your-list-element').html(listItems);
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });


    }

    function setSession(lang) {
        $.ajax({
            url: "{{ route('setLang', ['lang' => ':lang']) }}".replace(':lang', lang),
            type: "GET",
            success: function(response) {
                console.log("success to sent lang=" + lang);
            },
            error: function(xhr, status, error) {

            }
        });
    }
</script>




<section class="row">
    <div class="col-12 wrap-footer">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-4 footer-logo">
                    <div class="logo-footer"><img src="{{asset('user/images/logo-embryo.svg')}}" alt=""></div>
                </div>
                <div class="col-12 col-md-6 col-lg-4 box-footermenu">
                    <div class="footer-menu">
                        <ul>
                            <li><a href="{{route('user.history.index')}}">Company Profile</a></li>
                            <li id="busFoot"></li>
                            <li><a href="{{route('user.indexActivity')}}">News & Activities</a></li>
                            <li><a href="{{route('user.indexWorkWithUs')}}">Career</a></li>
                            <li><a href="#">Investor Relation</a></li>
                            <li><a href="{{route('user.indexContact')}}">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-12 col-lg-4 footer-address">
                    <div class="box-addressinfo">
                        <div class="icon-address"><i class="bi bi-geo-alt-fill"></i></div>
                        <div class="addres-info">
                            <address id="address"></address>
                            <a href="tel:+662116905" target="_blank" id="phone"></a>
                            <a href="mailto:E-mail : info@embryoplanet.co.th" target="_blank" id="email"></a>
                        </div>
                    </div>
                    <div class="footer-social">
                        Follow Us
                        <div>
                            <a href="#" target="_blank" class="custom-link"><i class="bi bi-facebook"></i></a>
                            <a href="#" target="_blank" class="custom-link"><i class="bi bi-instagram"></i></a>
                            <a href="#" target="_blank" class="custom-link"><i class="bi bi-youtube"></i></a>
                            <a href="#" target="_blank" class="custom-link"><i class="bi bi-twitter"></i></a>
                            <a href="#" target="_blank" class="custom-link"><i class="bi bi-line"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="row footer-cc">
    <div class="col-12">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <div>
                        <a href="#">Privacy Policy</a>
                        <span>|</span>
                        <a href="#">Terms & Conditions</a>
                        <span>|</span>
                        <a href="#">Cookie Policy</a>
                    </div>
                </div>
                <div class="col-12 col-lg-6 text-end">© Copyright 2023 Embryo Planet Co., Ltd. All rights reserved.</div>
            </div>
        </div>
    </div>
</section>