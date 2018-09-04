<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" href="<?= getSiteFrontendAsset('Images/i1.ico')?>">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href='<?php echo getSiteFrontendAsset("css/").$_COOKIE['color'];?>'>
  <link rel="stylesheet" href=<?php echo getSiteFrontendAsset("css/custom.css");?>>

  <title>FeedBackPlus :: Student FeedBack System :: Teacher Rating System</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="#">FeedBack
      <sup>+</sup>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01"
      aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav ml-auto  ">

        <li class="nav-item">
            <a href="<?=site_url("login");?>" class="btn btn-secondary btn-round">login</a>
        </li>

      </ul>

    </div>
  </nav>
    <section class="pt-5 pb-5 mt-0 align-items-center d-flex bg-dark" style="height:100vh; background-size: cover; background-image: url(<?php echo getSiteFrontendAsset('images/1.jpg');?>);">

    <div class="container-fluid">
      <div class="row  justify-content-center align-items-center d-flex text-center h-100">
        <div class="col-12 col-md-8  h-50 ">
          <h1 class="display-2  text-light mb-2 mt-5 typewrite" style="color:white"  data-period="2000" data-type='[ "Register now, We are waiting for your feedback","Join us" ]'>
            
              
              
            
          </h1>
          <p class="lead  text-light mb-5"></p>
          <p>
            <a href="<?=site_url('teacher-registration');?>" class="btn bg-primary btn-round text-light btn-lg btn-rised">Teacher ></a>
            <a href='<?=site_url('student/registration');?>' class="btn btn-success btn-round text-light btn-lg btn-rised">Student ></a>
          </p>

          <div class="btn-container-wrapper p-relative d-block  zindex-1">
            <a class="btn btn-link btn-lg   mt-md-3 mb-4 scroll align-self-center text-light" href="http://bootstraptor.com">

            </a>
          </div>
        </div>

      </div>
    </div>
  </section>
  <!-- Footer -->
  <section id="footer" class="card text-white bg-primary mb-3">
    <div class="container">
      <div class="row text-center text-xs-center text-sm-left text-md-left">

      </div>
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-5">
          <ul class="list-unstyled list-inline social text-center">
            <li class="list-inline-item">
              <a href="javascript:void();">
                <i class="fa fa-facebook"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="javascript:void();">
                <i class="fa fa-twitter"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="javascript:void();">
                <i class="fa fa-instagram"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="javascript:void();">
                <i class="fa fa-google-plus"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="javascript:void();" target="_blank">
                <i class="fa fa-envelope"></i>
              </a>
            </li>
          </ul>
        </div>
        <hr />
      </div>
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-2 text-center text-white">
          <p>
            <u>
              <a href="javascript:void(0);">developed by </a>
            </u>Sneha Susan George</p><a href='<?=site_url("welcome/changecolor");?>'>change color theme</a>
          <p class="h6">&copy All right Reversed.
            <a class="text-green ml-2" href="javascript:void(0);" target="_blank">Sneha Susan George</a>
          </p>
        </div>
        <hr />
      </div>
    </div>
  </section>
  <!-- ./Footer -->
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src=<?php echo getSiteFrontendAsset("js/typewriter.js");?>></script>
  <script src=<?php echo getSiteFrontendAsset("js/jquery-3.3.1.slim.min.js");?>></script>
  <script src=<?php echo getSiteFrontendAsset("js/popper.min.js");?>></script>
  <script src=<?php echo getSiteFrontendAsset("js/bootstrap.min.js");?>></script>
</body>

</html>

