<!DOCTYPE html>
<html lang="en">
<head>
   <?php use \App\Http\Controllers\Helper\HelperController; 
     $menu_primary = new HelperController(); 
	$_title = ''; $seo_desc = '';$url_thumbnail = ''; $keyword =''; $author =''; $short_desc = ''; $_template = ''; $_namecattype = 'post'; ?>
  <?php if(isset($product) and $product[0]['_commit'] > 0): ?>
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
  <?php endif; ?>
  <?php if(isset($_template) and !empty($_template)): ?>
	  <?php $template = $_template; ?>
  <?php endif; ?>
  <?php if(isset($_title) and !empty($_title)): ?>
	  <?php $title = $_title; ?>
  <?php endif; ?>
  <meta charset="utf-8">

  <title><?php echo e($title); ?></title>

  <meta http-equiv="X-UA-Compatible" content="IE=edge">



  <meta content="width=device-width, initial-scale=1.0" name="viewport">



  <meta http-equiv="Content-type" content="text/html; charset=utf-8">

  <meta name=”robots” content=”noindex,nofollow”>

  

  

  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />

  <!--meta -->

  <meta name="description" content="<?php echo e($short_desc); ?>"/>

  <meta name="keywords" content="<?php echo e($keyword); ?>"/>

  <meta name="copyright" content="<?php echo e(config('app.name')); ?>">

  <meta name="author" content="<?php echo e($author); ?>"/>

  <meta name="application-name" content="<?php echo $__env->yieldContent('title', config('app.name')); ?>">

  <!--GEO Tags-->

  

  <!--Facebook Tags-->
  <meta property="og:site_name" content="<?php echo e(config('app.name')); ?>">

  <meta property="og:type" content="article"/>

  <meta property="og:url" content="<?php echo e(request()->fullUrl()); ?>"/>

  <meta property="og:title" content="<?php echo e($title); ?>"/>

  <meta property="og:description" content="<?php echo e($short_desc); ?>"/>

  <meta property="og:image" content="<?php echo e(asset($url_thumbnail)); ?>"/>

  
  <meta property="fb:app_id" content="128078052234955" /> 
  <meta property="og:locale" content="en_UK"/>

  <!--Twitter Tags-->

  <meta name="twitter:card" content="summary"/>

  <meta name="twitter:site" content="<?php echo e('@' . config('app.name')); ?>"/>

  <meta name="twitter:title" content="<?php echo e($title); ?>"/>

  <meta name="twitter:description" content="<?php echo e($seo_desc); ?>"/>

  <meta name="twitter:image" content="<?php echo e(asset($url_thumbnail)); ?>"/>

	<link href="<?php echo e(asset('xhtml/vendor/jquery-nice-select/css/nice-select.css')); ?>" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo e(asset('xhtml/vendor/nouislider/nouislider.min.css')); ?>">
	<!-- Style css -->
	<link href="<?php echo e(asset('xhtml/css/style.css')); ?>" rel="stylesheet">
	<link href="<?php echo e(asset('xhtml/css/style-custom.css?v=0.0.0.7')); ?>" rel="stylesheet">
	
   <?php echo $__env->yieldContent('other_styles'); ?>

</head>
<?php $bodyclass = ''; ?>

<body>
  <?php $str_profile = session()->get('profile');

        $profile = json_decode($str_profile, true); 
		$sel_sex = 0; $firstname = 'guest';$email = 'guest@cmr.secretenergy.net';
        if(isset($profile)) {


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
        
     } 
	 $url_avartar_sex = ($sel_sex == 0) ? 'dashboard/production/images/avatar/avatar-female.jpg' : 'dashboard/production/images/avatar/avatar-male.jpg';
	 $url_avatar = isset($url_avatar) ? $url_avatar : $url_avartar_sex;
	 ?>
  <?php 
    //$str_session = session()->get('orderhistory');
    //if(!isset($str_session)||empty($str_session)){
         //$str_item = '{"idorder":0,"idcrosstype":0,"parent":0,"idparentcross":0,"input_quality":0,"idproduct":0,"inp_session":0,"trash":0}';
         //session()->put('orderhistory', $str_item);
    //}
  ?>
   <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="waviy">
		   <span style="--i:1">L</span>
		   <span style="--i:2">o</span>
		   <span style="--i:3">a</span>
		   <span style="--i:4">d</span>
		   <span style="--i:5">i</span>
		   <span style="--i:6">n</span>
		   <span style="--i:7">g</span>
		   <span style="--i:8">.</span>
		   <span style="--i:9">.</span>
		   <span style="--i:10">.</span>
		</div>
    </div>
	<!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">
    <!--*******************
        Preloader end
    ********************-->
        <!-- End Header -->
	 <?php echo $__env->make('teamilk.learning.nav-header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	 <?php echo $__env->make('teamilk.learning.chatbox', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	 <?php echo $__env->make('teamilk.learning.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	 <?php echo $__env->make('teamilk.learning.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	   <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
		
			<!-- BEGIN: PAGE CONTENT -->
			<?php echo $__env->yieldContent('content'); ?>
			<!-- END: PAGE CONTENT -->
		</div>
		<!-- End of Main -->
		  <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright © Designed &amp; Developed by <a href="https://dexignlab.com/" target="_blank">DexignLab</a> 2021</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->
    </div>
	<!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="<?php echo e(asset('xhtml/vendor/global/global.min.js')); ?>"></script>
	<script src="<?php echo e(asset('xhtml/vendor/chart.js/Chart.bundle.min.js')); ?>"></script>
	<script src="<?php echo e(asset('xhtml/vendor/jquery-nice-select/js/jquery.nice-select.min.js')); ?>"></script>
	
	<!-- Apex Chart -->
	<!--<script src="<?php echo e(asset('xhtml/vendor/apexchart/apexchart.js')); ?>"></script>
	<script src="<?php echo e(asset('xhtml/vendor/nouislider/nouislider.min.js')); ?>"></script>
	<script src="<?php echo e(asset('xhtml/vendor/wnumb/wNumb.js')); ?>"></script>-->
	
	<!-- Dashboard 1 -->
	<!--<script src="<?php echo e(asset('xhtml/js/dashboard/dashboard-1.js')); ?>"></script>-->

    <script src="<?php echo e(asset('xhtml/js/custom.min.js')); ?>"></script>
	<script src="<?php echo e(asset('xhtml/js/dlabnav-init.js')); ?>"></script>
	<script src="<?php echo e(asset('xhtml/js/custom-init.js?v=0.0.3')); ?>"></script>
    <?php echo $__env->yieldContent('other_scripts'); ?>
    </body>
</html>



<?php /**PATH /home/crmenergy/domains/crm.secretenergy.net/public_html/resources/views/teamilk/master-learning.blade.php ENDPATH**/ ?>