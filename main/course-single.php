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
        $courseid="";
        $totalsem="";
        $i='';
    ?>

    <?php 
        $courseid=$_SESSION['courseid'];
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
    <div class="container">
     <div class="row"  style="padding:4rem 0px">
        <div class="col-md-12">
         <div class="custom-breadcrumns border-bottom">
            <div class="container">
                <a href="mainhome.php">Home</a>
                <span class="mx-3 icon-keyboard_arrow_right"></span>
                <a href="courses.php">Courses</a>
                <span class="mx-3 icon-keyboard_arrow_right"></span>
                <span class="current">Courses</span>
            </div>
         </div>
         <div class="row" style="padding:2rem 0px">
            <div class="col-md-6">
                <center>
                    <h2 class="section-title-underline mb-5">
                        <span>Course Details</span>
                    </h2>
                </center>

                <table class="table table-bordered"> 
                 <?php
                    $query="select courseid,coursename,shortname,duration,fees,medium,totalsem from courses where courseid='$courseid'";
                    $rw=$dc->getRow($query);
                    $totalsem=intval($rw['totalsem']);
                    echo("<tr><td>Course Name</td><td>".$rw['coursename']."</td></tr>");
                    echo("<tr><td>Short Name</td><td>".$rw['shortname']."</td></tr>");
                    echo("<tr><td>Duration</td><td>".$rw['duration']." years</td></tr>");
                    echo("<tr><td>Fees</td><td>".$rw['fees']."</td></tr>");
                    echo("<tr><td>Medium</td><td>".$rw['medium']."</td></tr>");
                    echo("<tr><td>Total Semester</td><td>".$rw['totalsem']."</td></tr>");
                 ?>
                </table>
            </div>   
            
            <div class="col-md-6">
                <center>
                    <h2 class="section-title-underline mb-5">
                        <span>Subject Details Semester Wise</span>
                    </h2>
                 <?php
                    for($i=1;$i<=$totalsem;$i++)
                    {
                        echo("<button class='btn btn-primary' style='cursor:pointer' name='btnsem' value='".$i."'>sem ".$i."</button> &nbsp");
                    }
                 ?>
                </center>
                <?php
                 if(isset($_POST['btnsem']))
                 {
                ?>
                <table class="table table-bordered" style="margin-top:2rem"> 
                  <thead>
                    <tr>
                        <th>Subject Name</th>
                        <th>Short Name</th>
                        <th>Sem</th>  
                        <th>Subject Type</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                        $semester=$_POST['btnsem'];
                        $query="select s.courseid,subname,s.shortname,sem,subtype from subject s where s.courseid='$courseid' and sem='$semester' order by sem";
                        $tb=$dc->getTable($query);
                        while($rw=mysqli_fetch_array($tb))
                        {
                            echo("<tr>");
                            echo("<td>".$rw['subname']."</td>");
                            echo("<td>".$rw['shortname']."</td>");
                            echo("<td>".$rw['sem']."</td>");
                            echo("<td>".$rw['subtype']."</td>");
                            echo("</tr>");
                        }
                     
                    ?>
                  </tbody>
                </table>
                <?php
                 }
                ?>
            </div>   
         </div>
            
        </div>
     </div>
    </div>

    <?php include('footer.php') ?>
    </div>
  </form>
 
  <?php include('jslink.php'); ?>

</body>

</html>