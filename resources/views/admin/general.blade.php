<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <!-- Favicon icon -->
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('dashboard/production/images/favicon.ico') }}">
		
        <title>Dashboard</title>
         <!-- Bootstrap -->
      <link href="{{ asset('gentelella/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
      <!-- Font Awesome -->

      <link href="{{ asset('gentelella/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
      <!-- NProgress -->
      <link href="{{ asset('gentelella/vendors/nprogress/nprogress.css') }}" rel="stylesheet">
      <!-- iCheck -->
      <link href="{{ asset('gentelella/vendors/iCheck/skins/flat/green.css') }}" rel="stylesheet">
    
      <!-- bootstrap-progressbar -->
      <link href="{{ asset('gentelella/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet">
      <!-- JQVMap -->
      <link href="{{ asset('gentelella/vendors/jqvmap/dist/jqvmap.min.css') }}" rel="stylesheet"/>
      
       <link href="{{ asset('dashboard/production/css/custom.css?v=0.4.2.7') }}" rel="stylesheet">
      <link href="{{ asset('dashboard/production/css/custom-home.css?v=0.0.6.1') }}" rel="stylesheet">
      <!-- bootstrap-daterangepicker -->
      <link href="{{ asset('gentelella/vendors/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">
      <!-- Custom Theme Style -->
      <link href="{{ asset('gentelella/build/css/custom.min.css') }}" rel="stylesheet">
      <link href="{{ asset('gentelella/build/css/main-style.css?v=0.3.8.0') }}" rel="stylesheet" type="text/css">
	  <link href="{{ asset('gentelella/build/css/custom-product.css?v=0.3.8.0') }}" rel="stylesheet" type="text/css">
	  
        @yield('other_styles')
    </head>
    <?php $str_profile = session()->get('profile'); 
              $profile = json_decode($str_profile, true); 
              if(isset($profile)) {
              $sel_sex = 0;
              $url_avatar = "";
              $sip = 560;
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
                  $sip = $row['sip'];
               }
               $url_avartar_sex = ($sel_sex == 0) ? 'dashboard/production/images/avatar/avatar-female.jpg' : 'dashboard/production/images/avatar/avatar-male.jpg';
               $url_avatar = (strlen($url_avatar) > 0) ? $url_avatar : $url_avartar_sex;
             } ?>
    <body class="nav-md">  

    <div id="app" class="container body">

      <div class="main_container">
        @include('admin.general-left');
        @include('admin.general-topsidebar');
        <!-- /top navigation -->
         <!-- page content -->
        <div class="right_col" role="main"> 
             @yield('content')
       </div>
        <!-- /page content -->
        <!-- footer content -->
        <footer>
          <div class="pull-right">
            All rights reserved by <a href="https://ticmedi.tech">ticsoft</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
        
      </div>

    </div>
	@include('admin.popup-calling');
<div class="htz-popup-processing" style="display: none; position: fixed; z-index: 1010;left: 0;top: 0%;width: 100%; height: 100%; overflow: auto;background-color: rgb(0,0,0); background-color: rgba(0,0,0,0.4); ">
  <div class="processing" style="position:relative;background-color: rgba(255,255,255,0.1);width: 250px;height: 250px;margin-top:15%; margin-left: auto;margin-right: auto;text-align: center;">
    <p><img class="loading" style=" position: absolute;top: 11%;left: 11%;display: block;width: 200px; height: 200px;margin-left: auto;margin-right: auto;" src="{{ asset('dashboard/production/images/processing.gif') }}"></p>
    <div class="checked-img" style="position: relative;display: block; font-size: 5em;top: 15%;padding-bottom:0px;"><i class="fa fa-info-circle"></i></div>
	<p class="result"></p>
  </div>
</div>
      <script type="text/javascript">
        var url_home = '{{ url('/') }}';
      </script>
     
        <!-- jQuery -->
    <script src="{{ asset('gentelella/vendors/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('gentelella/vendors/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('gentelella/vendors/fastclick/lib/fastclick.js') }}"></script>
    <!-- NProgress -->
    <script src="{{ asset('gentelella/vendors/nprogress/nprogress.js') }}"></script>
    <script src="{{ asset('gentelella/build/js/format-price.js?v=0.0.5') }}"></script>
   
		@yield('other_scripts')
       
    </body>
</html>