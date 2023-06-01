<header class="row">
    <div class="col-12 wrap_menu">

        <div class="top-menu">
            <div class="container">
                <div class="row">
                    <div class="col-4 col-md-9 col-lg-6">
                        <div class="contact-top">
                            <a href="#" target="_blank" ><i class="bi bi-telephone"></i> <span id="phone_menu"></span> </a>
                            <a href="#" target="_blank" ><i class="bi bi-envelope"></i> <span id="email_menu"></span> </a>
                        </div>
                    </div>
                    <div class="col-8 col-md-3 col-lg-6 text-end">
                        <div class="social-top">
                            <a href="#" target="_blank" class="custom-menu"><i class="bi bi-facebook"></i></a>
                            <a href="#" target="_blank" class="custom-menu"><i class="bi bi-instagram"></i></a>
                            <a href="#" target="_blank" class="custom-menu"><i class="bi bi-youtube"></i></a>
                            <a href="#" target="_blank" class="custom-menu"><i class="bi bi-twitter"></i></a>
                            <a href="#" target="_blank" class="custom-menu"><i class="bi bi-line"></i></a>
                        </div>
                        <div class="lang-top">
                            <i class="bi bi-globe"></i>
                            <a href="#" class="language-link" data-lang="th">TH</a>
                            <a href="#" class="language-link active" data-lang="en">EN</a>
                            <a href="#" class="language-link" data-lang="ch">CN</a>



                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="m-mobile">
            <div class="logo-mb logo">
                <a href="{{route('user.index')}}">

                    <img src="{{asset('user/images/logo-embryo.svg')}}" class="svg" alt="">
                </a>
            </div>
            <div class="wrap_btn_menu">
                <div class="btn_menu"><i class="bi bi-list"></i> menu</div>
            </div>
        </div>

        <div class="mainmenu">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-3">
                        <div class="logo">
                            <a href="{{route('user.index')}}">
                                <img src="{{asset('user/images/logo-embryo.svg')}}" alt="" class="svg">
                            </a>
                        </div>
                    </div>
                    <nav class="col-12 col-lg-9 box-menu">
                        <ul>
                            <li class="logo_menuopen">
                                <div class="close_menu"><i class="bi bi-x-circle-fill"></i></div>
                            </li>
                            <li><a href="{{route('user.index')}}" id="mainpage">หน้าหลัก</a></li>

                            <li class="hassub"><a id="about_us">เกี่ยวกับเรา</a>
                                <div class="submenu">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-12 col-lg-7">
                                                <div class="topic-submenu" id="sub_about_us">เกี่ยวกับเรา</div>
                                                <ul>

                                                    <li><a href="{{route('user.indexOverView')}}" id="overview">ประวัติความเป็นมา</a></li>
                                                    <li><a href="{{route('user.history.index')}}" id="history">ประวัติความเป็นมา</a></li>
                                                    <li><a href="{{route('user.vision.index')}}" id="vision">วิสัยทัศน์ และ พันธกิจ</a></li>
                                                    <li><a href="{{route('user.corevalue.index')}}" id="corevalue">ค่านิยมองค์กร</a></li>
                                                    <li><a href="{{route('user.groupstructure.index')}}" id="groupstructure">โครงสร้างกลุ่มบริษัท</a></li>
                                                    <li><a href="{{route('user.orgstructure.index')}}" id="orgstructure">โครงสร้างองค์กร</a></li>
                                                    <li><a href="{{route('user.network')}}" id="network">เครือข่ายของ Embryo</a></li>
                                                    <li><a href="{{route('user.award.index')}}" id="pride">รางวัลและความภาคภูมิใจ</a></li>
                                                </ul>
                                            </div>
                                            <div class="col-12 col-lg-5">
                                                <div class="photo-menu"><img src="" alt="" id="srcAboutUs"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>

                            <li class="hassub"><a id="bus_group">ธุรกิจของเรา</a>
                                <div class="submenu">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-12 col-lg-7">
                                                <div class="topic-submenu" id="sub_bus_group">ธุรกิจของเรา</div>
                                                <ul id="your-list-element"></ul>
                                            </div>
                                            <div class="col-12 col-lg-5">
                                                <div class="photo-menu"><img src="{{asset('user/images/banner-business.webp')}}" alt="" id="srcBusGroup"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>

                            <li class="hassub"><a id="knowledge">ข่าวสารและสาระน่ารู้</a>
                                <div class="submenu">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-12 col-lg-7">
                                                <div class="topic-submenu" id="sub_knowledge">ข่าวสารและสาระน่ารู้</div>
                                                <ul>
                                                    <li><a href="{{route('user.indexActivity')}}" id="activity">ข่าวประชาสัมพันธ์</a></li>
                                                    <li><a href="{{route('user.indexSocial')}}" id="social">Social Media</a></li>
                                                    <li><a href="{{route('user.indexInterest')}}" id="interest">สาระน่ารู้จาก EMBRYO</a></li>
                                                </ul>
                                            </div>
                                            <div class="col-12 col-lg-5">
                                                <div class="photo-menu"><img src="{{asset('user/images/banner-news.webp')}}" alt="" id="srcKnowledge"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>

                            <li><a href="{{route('user.indexWorkWithUs')}}" id="work_with_us">ร่วมงานกับเรา</a></li>
                            <li><a href="#" id="investor">นักลงทุนสัมพันธ์</a></li>
                            <li><a href="{{route('user.indexContact')}}" id="contactus">ติดต่อเรา</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>