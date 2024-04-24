<!DOCTYPE html>
<html lang="en">

<head>
  <title>student management</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <?php 
      Session_start();
      include('csslink.php'); 
      include("../class/dataclass.php");
      $dc=new dataclass();
      $query="";
      $msg="";
    ?>
    <?php  
      if(isset($_POST['btncourse']))
      {
       $_SESSION['courseid']=$_POST['btncourse'];
       header('location:course-single.php');
      }
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
<form name="frm" action="#" method="post">
  <div class="site-wrap">
  

    <?php include('topper.php') ?>
    <?php include('header.php') ?>
    
    <div class="site-section">
        <div class="container-fluid">
            <div class="row" style="Margin-bottom:2rem">
                <div class="col-md-12">
                <center>
                    <h2 class="section-title-underline">
                        <span>Courses</span>
                    </h2>
                </center>
                </div>
            </div>
            <div class='row' style="margin: 0rem 3rem;">
                <?php
                    $query="select courseid,coursename,shortname,duration,fees,medium,totalsem,image from courses";
                    $tb=$dc->getTable($query);
                    $rno=0;
                    while($rw=mysqli_fetch_array($tb))
                    {
                    echo("<div class='col-md-4 mb-4'>");
                    echo("<div class='course-1-item'>");
                        echo("<figure class='thumnail'>");
                        echo("<button type='submit' value='".$rw['courseid']."' name='btncourse' style='width:100%;border:0px solid white;cursor:pointer'><img src=../images/courseimg/".$rw['image']." alt='Image' Style='width:100%;height:15rem'>");
                        echo("<div class='category'>");
                        echo("<h3>".$rw['coursename']." (".$rw['shortname'].")</h3>");
                        echo("</div></button><figure>");
                    echo("</div>");
                    echo("</div>");
                    }
                ?>
            </div>
        </div>
    </div>


    <?php include('footer.php') ?>
    </div>
  </form>
 
  <?php include('jslink.php'); ?>

</body>

</html>