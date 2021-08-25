<?php $indo = $this->db->get_where('info', array('id_info' => '1'))->row();?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>PickUpMe Malang</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">

    <link rel="stylesheet" href="<?php  echo (base_url());?>assets/frontend/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="<?php  echo (base_url());?>assets/frontend/css/animate.css">
    
    <link rel="stylesheet" href="<?php  echo (base_url());?>assets/frontend/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php  echo (base_url());?>assets/frontend/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?php  echo (base_url());?>assets/frontend/css/magnific-popup.css">

    <link rel="stylesheet" href="<?php  echo (base_url());?>assets/frontend/css/aos.css">

    <link rel="stylesheet" href="<?php  echo (base_url());?>assets/frontend/css/ionicons.min.css">

    <link rel="stylesheet" href="<?php  echo (base_url());?>assets/frontend/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="<?php  echo (base_url());?>assets/frontend/css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="<?php  echo (base_url());?>assets/frontend/css/flaticon.css">
    <link rel="stylesheet" href="<?php  echo (base_url());?>assets/frontend/css/icomoon.css">
    <link rel="stylesheet" href="<?php  echo (base_url());?>assets/frontend/css/style.css">

    <link rel="stylesheet" href="<?php  echo (base_url());?>assets/backend/plugins/toastr/toastr.min.css">
    <link rel="stylesheet" href="<?php  echo (base_url());?>assets/backend/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    
    <script src="<?php  echo (base_url());?>assets/frontend/js/jquery.min.js"></script>
    <script src="<?php  echo (base_url());?>assets/backend/plugins/sweetalert2/sweetalert2.min.js"></script>
    <script src="<?php  echo (base_url());?>assets/backend/plugins/toastr/toastr.min.js"></script>

    <style type="text/css">
      #quantity{
        background: #efefef !important;
        color: black !important;
        height: 33px !important;
        text-align: center;
      }
    </style>


  </head>
  <body>
  	<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="<?php echo base_url() ?>web">PickUp Me<small>MALANG</small></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>
	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item active"><a href="<?php echo base_url() ?>web" class="nav-link">Home</a></li>
	          <li class="nav-item dropdown">
	          <li class="nav-item cart">
              <a href="<?php  echo (base_url());?>web/chart" class="nav-link">
                <span class="icon icon-shopping_cart"></span>
                <span class="bag d-flex justify-content-center align-items-center" id="cou" style="<?php $count=count($this->cart->contents()); if ($count<0) {?>display: none !important;<?php }?>">
                  <small id="count"><?php echo($count>0) ? $count : 0 ;?></small>
                </span>
              </a>
            </li>
	        </ul>
	      </div>
		  </div>
	  </nav>
    <!-- END nav -->

  <?php
      echo $contents;
  ?>




    <footer class="ftco-footer ftco-section img">
    	<div class="overlay"></div>
      <div class="container">
        <div class="row mb-5">
          <div class="col-lg-4 col-md-6 mb-5 mb-md-5">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">About Us</h2>
              <p><?= $indo->nama_web?><br><?= $indo->tentang?></p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <?php $nama = $this->db->get_where('sosmed', array('active' => 'Y'))->result();?>
                <?php foreach ($nama as $key => $value) {?>
                  <li class="ftco-animate"><a href="<?= $value->link?>"><span class="icon-<?= $value->nama?>"></span></a></li>
                <?php }?>
              </ul>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mb-5 mb-md-5">
            <div class="ftco-footer-widget mb-4 ml-md-4">
              <h2 class="ftco-heading-2">Services</h2>
              <ul class="list-unstyled">
                <li><a href="<?php echo base_url() ?>web" class="py-2 d-block">Home</a></li>
                <li><a href="<?php echo base_url() ?>web/chart" class="py-2 d-block">Cart</a></li>
                <li><a href="<?php echo base_url() ?>login" class="py-2 d-block">Login</a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mb-5 mb-md-5">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Kontak</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text"><?= $indo->alamat?></span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text"><?= $indo->wa?></span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text"><?= $indo->email?></span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved  <i class="icon-heart" aria-hidden="true"></i> <a href="#" target="_blank"><?= $indo->nama_web?></a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  
  <script src="<?php  echo (base_url());?>assets/frontend/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="<?php  echo (base_url());?>assets/frontend/js/popper.min.js"></script>
  <script src="<?php  echo (base_url());?>assets/frontend/js/bootstrap.min.js"></script>
  <script src="<?php  echo (base_url());?>assets/frontend/js/jquery.easing.1.3.js"></script>
  <script src="<?php  echo (base_url());?>assets/frontend/js/jquery.waypoints.min.js"></script>
  <script src="<?php  echo (base_url());?>assets/frontend/js/jquery.stellar.min.js"></script>
  <script src="<?php  echo (base_url());?>assets/frontend/js/owl.carousel.min.js"></script>
  <script src="<?php  echo (base_url());?>assets/frontend/js/jquery.magnific-popup.min.js"></script>
  <script src="<?php  echo (base_url());?>assets/frontend/js/aos.js"></script>
  <script src="<?php  echo (base_url());?>assets/frontend/js/jquery.animateNumber.min.js"></script>
  <script src="<?php  echo (base_url());?>assets/frontend/js/bootstrap-datepicker.js"></script>
  <script src="<?php  echo (base_url());?>assets/frontend/js/jquery.timepicker.min.js"></script>
  <script src="<?php  echo (base_url());?>assets/frontend/js/scrollax.min.js"></script>
  <script src="<?php  echo (base_url());?>assets/frontend/js/google-map.js"></script>
  <script src="<?php  echo (base_url());?>assets/frontend/js/main.js"></script>

  </body>
</html>