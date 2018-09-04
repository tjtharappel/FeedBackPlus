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
  <?php if(isset($widgets) && is_array($widgets)):?> 
<div class="container" style="margin-top:50px">
<?php foreach($widgets as $item) {include_once "templates/$item.php";};?> 
</div>
<?php endif; ?>    
<?php include_once "templates/footerWidget.php"; ?>
<?php include_once "templates/scriptWidget.php"; ?>
<?php if( isset($scripts) && is_array($scripts)):?>
    <script>
<?php foreach($scripts as $item):?>

      <?php require_once  "scripts/$item.js"; ?>

<?php endforeach; ?>

  </script>
  <?php endif; ?>    

</body>

</html>

