<meta charset="utf-8">
<?php
	if(empty($_title)) 			$_title ='Embryo Planet Co., Ltd.';
	if(empty($_keywords)) 		$_keywords ='';
	if(empty($_description)) 	$_description ='';
?>
<meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
        <?php echo $_title;?>
    </title>
    
    <meta name="keywords" content="<?php echo $_keywords;?>" />
    <meta name="description" content="<?php echo $_description;?>" />
    <meta name="robot" content="index, follow" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="format-detection" content="telephone=no">

    <link type="image/ico" rel="shortcut icon" href="{{asset('user/images/favicon.ico')}}">
  
    <link type="text/css" rel="stylesheet" href="{{asset('/user/css/layout.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

    
    
   
    
    