<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" href="<?= getSiteFrontendAsset('Images/i1.ico')?>">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href='<?php echo getSiteFrontendAsset("css/").$_COOKIE['color']."?".date('d');?>'>
  <link rel="stylesheet" href=<?php echo getSiteFrontendAsset("css/custom.css");?>>

  <title>FeedBackPlus :: Login </title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="<?=site_url('welcome')?>">FeedBack
      <sup>+</sup>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01"
      aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav ml-auto  ">

        <li class="nav-item">
         
        </li>

      </ul>

    </div>
  </nav>
  <div class="container" style="margin-top:100px">
    <div class="card col-md-6 offset-md-3">
      <div class="card-body">
        <h4 class="card-title text-center">Login</h4>
        <form action="<?=site_url('welcome/authorise');?>" method="post">
          <div class="form-group">
            <label for="exampleInputEmail1" style="font-size: 16px">Username</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="username" aria-describedby="emailHelp" placeholder="Enter email">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1" style="font-size: 16px">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
          </div>
          <div> 
          <?php if(isset($message)):?>
              <div class="alert alert-dismissible alert-danger">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <strong><?=$message;?></a>.
               </div>
        <?php endif;?>
          <button type="submit" class="btn btn-primary btn-round float-right">Login</button>
        </form>
      </div>
    </div>
  </div>
  
  <!-- Footer -->
   <section id="footer" class="card text-white bg-primary mb-3 fixed-bottom">
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
              </u>Sneha Susan George</p>
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



