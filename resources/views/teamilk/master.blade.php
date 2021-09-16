<!DOCTYPE html>
<html lang="en">
<head>
   <?php use \App\Http\Controllers\Helper\HelperController; 
     $menu_primary = new HelperController(); 
	$_title = ''; $seo_desc = '';$url_thumbnail = ''; $keyword =''; $author =''; $short_desc = ''; $_template = ''; $_namecattype = 'post'; ?>
  @if(isset($product) and $product[0]['_commit'] > 0)
    <?php 
      $_template = $product[0]['template']; 
      $_commit = $product[0]['_commit']; 
      $idproduct = $product[0]['idproduct'];  
      $_title = $product[0]['namepro']; 
      $url_thumbnail = $product[0]['url_thumbnail'];
      $seo_desc = $product[0]['seo_desc'];
      $short_desc = $product[0]['short_desc'];
      $_namecattype = $product[0]['nametype'];
      if(isset($short_desc) && !empty($short_desc)){
          $short_desc = HelperController::get_the_excerpt_max(200, $short_desc);
      }else{
          $excerpt = $product[0]['description'];
          $short_desc = HelperController::get_the_excerpt_max(200, $excerpt);
      }
      $author = $product[0]['author'];
      $keyword = $product[0]['keyword'];
    ?>
  @endif
  @if(isset($_template) and !empty($_template))
	  <?php $template = $_template; ?>
  @endif
  @if(isset($_title) and !empty($_title))
	  <?php $title = $_title; ?>
  @endif
  <meta charset="utf-8">

  <title>{{ $title }}</title>

  <meta http-equiv="X-UA-Compatible" content="IE=edge">



  <meta content="width=device-width, initial-scale=1.0" name="viewport">



  <meta http-equiv="Content-type" content="text/html; charset=utf-8">

  <meta name=”robots” content=”noindex,nofollow”>

  {{-- <meta name="google-site-verification" content="unAEA_gNRAYrganImLxKkrZ12ZOVPLj3V6NwHUEjLxc" /> --}}

  

  <meta name="csrf-token" content="{{ csrf_token() }}" />

  <!--meta -->

  <meta name="description" content="{{ $short_desc }}"/>

  <meta name="keywords" content="{{ $keyword }}"/>

  <meta name="copyright" content="{{ config('app.name') }}">

  <meta name="author" content="{{ $author }}"/>

  <meta name="application-name" content="@yield('title', config('app.name'))">

  <!--GEO Tags-->

  {{-- <meta name="DC.title" content="Allysfast"/>

  <meta name="geo.region" content="GB-HMF"/>

  <meta name="geo.placename" content="Ho Chi Minh city"/>

  <meta name="geo.position" content="10.789305022725957;106.72047902614904"/>

  <meta name="ICBM" content="10.789305022725957, 106.72047902614904"/>  --}}

  <!--Facebook Tags-->
  <meta property="og:site_name" content="{{ config('app.name') }}">

  <meta property="og:type" content="article"/>

  <meta property="og:url" content="{{ request()->fullUrl() }}"/>

  <meta property="og:title" content="{{ $title }}"/>

  <meta property="og:description" content="{{ $short_desc }}"/>

  <meta property="og:image" content="{{ asset($url_thumbnail) }}"/>

  {{-- <meta property="article:author" content="https://www.facebook.com/Allysfast/"/> --}}
  <meta property="fb:app_id" content="128078052234955" /> 
  <meta property="og:locale" content="en_UK"/>

  <!--Twitter Tags-->

  <meta name="twitter:card" content="summary"/>

  <meta name="twitter:site" content="{{ '@' . config('app.name') }}"/>

  <meta name="twitter:title" content="{{ $title }}"/>

  <meta name="twitter:description" content="{{ $seo_desc }}"/>

  <meta name="twitter:image" content="{{ asset($url_thumbnail) }}"/>

  <script>
        WebFontConfig = {
            google: { families: [ 'Poppins:300,400,500,600,700,800', 'Playball:400' ] }
        };
        ( function ( d ) {
            var wf = d.createElement( 'script' ), s = d.scripts[ 0 ];
            wf.src = '{{ asset('public/riode/js/webfont.js') }}';
            wf.async = true;
            s.parentNode.insertBefore( wf, s );
        } )( document );
    </script>

    <link rel="stylesheet" type="text/css" href="{{ asset('public/riode/vendor/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/riode/vendor/animate/animate.min.css') }}">

    <!-- Plugins CSS File -->
    <link rel="stylesheet" type="text/css" href="{{ asset('public/riode/vendor/magnific-popup/magnific-popup.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/riode/vendor/owl-carousel/owl.carousel.min.css') }}">

	<link href="{{ asset('public/css/main-style.css?v=0.3.8.0') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('public/css/custom-product.css?v=0.3.8.0') }}" rel="stylesheet" type="text/css">
	@if($template == 'home'||$template == 'chat')
		 <!-- Main CSS File -->
		<link rel="stylesheet" type="text/css" href="{{ asset('public/riode/css/demo-food.min.css?v=0.0.1') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('public/css/style-chat.css?v=0.0.4') }}">
	@endif
	
   @yield('other_styles')

</head>
<?php $bodyclass = ''; ?>
@if($template == 'product')
	<?php $bodyclass = 'shop'; ?>
@else
	<?php $bodyclass = 'riode-rounded-skin'; ?>
@endif
<body class="{{ $bodyclass }}">
  <?php $str_profile = session()->get('profile');

        $profile = json_decode($str_profile, true); 

        if(isset($profile)) {



      $sel_sex = 0;



      $url_avatar = "";



      foreach($profile as $row) {



          $idprofile = $row["idprofile"];



          $firstname = $row["firstname"];



          $lastname = $row['lastname'];



          $middlename = $row['middlename'];



          $idsex = $row['idsex'];



          $birthday = $row['birthday'];



          $address = $row['address'];



          $mobile = $row['mobile'];



          $email = $row['email'];



          $url_avatar = $row['url_avatar'];



          $idcountry = $row['idcountry'];

          $idprovince = $row['idprovince'];

          $idcitytown = $row['idcitytown'];

          $iddistrict = $row['iddistrict'];

          $idward = $row['idward'];

       }
       //$url_avartar_sex = ($sel_sex == 0) ? 'dashboard/production/images/avatar/avatar-female.jpg' : 'dashboard/production/images/avatar/avatar-male.jpg';
       //$url_avatar = isset($url_avatar) ? $url_avatar : $url_avartar_sex; 
     } ?>
  <?php 
    //$str_session = session()->get('orderhistory');
    //if(!isset($str_session)||empty($str_session)){
         //$str_item = '{"idorder":0,"idcrosstype":0,"parent":0,"idparentcross":0,"input_quality":0,"idproduct":0,"inp_session":0,"trash":0}';
         //session()->put('orderhistory', $str_item);
    //}
  ?>
<div class="page-wrapper">
        <h1 class="d-none">{{ $title }}</h1>
        <header class="header">
            @include('teamilk.riode.header-top')
            @include('teamilk.riode.header-middle')
            @include('teamilk.riode.header-bottom')
        </header>
        <!-- End Header -->
		
				<!-- BEGIN: PAGE CONTENT -->
				@yield('content')
				<!-- END: PAGE CONTENT -->
			
		<!-- End of Main -->
       @include('teamilk.riode.footer') 
    </div>
    <!-- Sticky Footer -->
    @include('teamilk.riode.sticky') 
    <!-- Scroll Top -->
    <a id="scroll-top" href="#top" title="Top" role="button" class="scroll-top"><i class="d-icon-arrow-up"></i></a>
	@include('teamilk.riode.menu-mobile')
	@include('teamilk.riode.popup')
	@include('teamilk.modal-cart')
	@include('teamilk.riode.popup-process')
	<script type="text/javascript">var url_home = '{{ url('/') }}';</script>
	<!-- Plugins JS File -->
    <script src="{{ asset('public/riode/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('public/riode/vendor/parallax/parallax.min.js') }}"></script>
    <script src="{{ asset('public/riode/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('public/riode/vendor/elevatezoom/jquery.elevatezoom.min.js') }}"></script>
	<script src="{{ asset('public/riode/vendor/magnific-popup/jquery.magnific-popup.js') }}"></script>
    <script src="{{ asset('public/riode/vendor/owl-carousel/owl.carousel.min.js') }}"></script>
    <!-- Main JS File -->
    <script src="{{ asset('public/riode/js/main.js?v=0.0.3') }}"></script>
	<script src="{{ asset('public/riode/js/custom-product.js?v=1.7.1.1') }}"></script>
	<script src="{{ asset('public/riode/js/format-price.js?v=0.0.4') }}"></script>
	@if($template == 'product')
		 <script src="{{ asset('public/riode/vendor/sticky/sticky.min.js') }}"></script>
		 <script src="{{ asset('public/riode/vendor/nouislider/nouislider.min.js') }}"></script>
	@elseif($template == 'chat')
		<!--<script src="https://cdn.socket.io/4.0.1/socket.io.min.js" integrity="sha384-LzhRnpGmQP+lOvWruF/lgkcqD+WDVt9fU3H4BWmwP5u5LTmkUGafMcpZKNObVMLU" crossorigin="anonymous"></script>-->
		 <script src="https://cdn.socket.io/3.1.3/socket.io.min.js" integrity="sha384-cPwlPLvBTa3sKAgddT6krw0cJat7egBga3DJepJyrLl4Q9/5WLra3rrnMcyTyOnh" crossorigin="anonymous"></script>
		<script src="{{ asset('public/js/client_node.js?v=0.4.7') }}"></script>
	@endif
    @yield('other_scripts')
    </body>
</html>




