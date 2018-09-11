<!doctype html>
<html lang="en">
    
<?php include_once 'templates/headWidget.php'; ?>
    
<body>
<?php include_once 'templates/navbarWidget.php'; ?>
<h2 style="margin:15px 0px 0px 15px"><?=($title)??'Admin DashBoard'?></h2>
<hr />
<?php include_once 'templates/menu.php';   ?>
    
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

