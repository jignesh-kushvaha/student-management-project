<!DOCTYPE html>
<html lang="en">

<head>
  <title>student management</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <?php 
        include("csslink.php");
        include("../class/dataclass.php");
        session_start();
    ?>
    <?php 
        $dc=new dataclass();
        $query="";
        $msg="";
    ?>
  <style>
     .site-navbar .site-navigation .site-menu > li > a:hover
    {
    color:red;
    font-weight:bold;
   }
  </style>

</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
<form name="frm" action="" method="post">
  <div class="site-wrap">
  

    <?php include('topper.php') ?>
    <?php include('header.php') ?>
    <?php include('slider.php') ?>
    <div class="container">
     <div class="row" >
      <div class="col-md-12">


      </div>
     </div>
    </div>

    <?php include('footer.php') ?>
    </div>
  </form>
 
  <?php include('jslink.php'); ?>

</body>

</html>