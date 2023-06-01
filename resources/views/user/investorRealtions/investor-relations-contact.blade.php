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
        <figure><img src="images/banner-contact.webp" alt=""></figure>
        <h1>ติดต่อนักลงทุนสัมพันธ์</h1>
    </div>
</section>

<section class="row">
    <div class="col-12 home-history wrap-contact">
        <div class="container">
            <div class="row wrap-homehistory">
                <div class="col-12 col-md-5 col-lg-4 wow fadeInLeft">
                    <div class="photo-homehistory">
                        <div>CONTACT</div>
                        <figure><img src="images/Rectangle 1926.png" alt=""></figure>
                    </div>
                </div>
                <div class="col-12 col-md-7 col-lg-8 wow fadeInRight">
                    <div class="ir-contact contact-info">
                        <h2>ติดต่อนักลงทุนสัมพันธ์</h2>
                        <h3>บริษัท เอ็มบริโอ แพลนเนท จำกัด</h3>
                        <address>361/3-4 ​ ถนน ศรีอยุธยา แขวง ทุ่งพญาไท เขตราชเทวี กรุงเทพมหานคร ประเทศไทย 10400</address>
                        <div class="info-detail">
                            <div><span><i class="bi bi-telephone"></i> โทร. </span> +66 02 116 5905</div>
                            <div><span><i class="bi bi-envelope"></i> อีเมล์ </span> info@embryoplanet.co.th</div>
                            <div><a href="#" target="_blank"><i class="bi bi-geo-alt"></i> <span>ดูแผนที่</span></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="row wow fadeInDown">
    <div class="col-12 googlemaps">
        <div class="ratio ratio-21x9">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31002.59129178256!2d100.4967758791016!3d13.759329899999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30e29eb50e15b03b%3A0x25d0be6ed2cd6554!2sEmbryo%20Planet%20Company%20Limited!5e0!3m2!1sth!2sth!4v1680856228730!5m2!1sth!2sth" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</section>


@include('user.inc_footer')

<script>
	$( ".box-menu > ul > li:nth-child(7) > a" ).addClass( "here" );
    $( ".box-menu ul li > .submenu ul > li:nth-child(0) > a" ).addClass( "here" );
</script>

		
</div>

</body>

</html>
