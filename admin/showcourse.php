<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Layout</title>
    <style>
    </style>


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

    <?php
     if(isset($_POST['btnnew']))
	 {
      $_SESSION['trans']="new";
	  header('location:courseform.php');
     }
     if(isset($_POST['btnupdate']))
	 {
      $_SESSION['courseid']=$_POST['btnupdate']; 
      $_SESSION['trans']="update";
	  header('location:courseform.php');
     }
     if(isset($_POST['btndelete']))
     {
        $courseid=$_POST['btndelete'];
        $query="update courses set deletestatus='yes' where courseid='$courseid'";
        $result=$dc->saveRecord($query);
        if($result)
        {
            $msg="Record Deleted Successfully...";
            //echo '<script>alert("Record Deleted Successfully...")</script>';
        }  
        else
        {
            $msg="Record Not Deleted";
        }
     }
    ?>
</head>
<body>
 <form name="frm" action="#" method="post">
    <div class="container-scroller">
     <?php include("navbar.php"); ?>
        <div class="container-fluid page-body-wrapper">
            <?php include("sidebar.php"); ?>
            <div class="main-panel">
                <div class="content-wrapper">    
                 <div class="row" style="margin-top:2rem">
                    <div class="col-md-12 card">
                        <div class="row">
                            <div class="col-md-9" style="height: 3rem;margin: 0.4rem 0px;">
                                <center>
                                <u><h1>Show Courses</h1></u>
                                </center>
                            </div>
                            <div class="col-md-3" style="height: 3rem;margin: 0.4rem 0px;">
                                <center>
                                <button class='btn' style='background: #2cb1f3' name='btnnew' value='".$rw['courseid']."'>New</button>
                                </center>
                            </div>
                        </div>
                        <div class="row">
                            <table class="table table-bordered table-striped" >
                            <thead>
                                <tr style='background-color:orange'>
                                    <th>Course ID</th>
                                    <th>Course Name</th>
                                    <th>Short Name</th>
                                    <th>Duration</th>
                                    <th>Fees</th>
                                    <th>Medium</th>
                                    <th>Total Sem</th>  
                                    <th>Update</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $query="select courseid,coursename,shortname,duration,fees,medium,totalsem,deletestatus from courses";
                                $tb=$dc->getTable($query);
                                $rno=0;
                                while($rw=mysqli_fetch_array($tb))
                                {
                                 if($rw['deletestatus']=="no")
                                 {
                                    echo("<tr>");
                                    echo("<td style='text-align:center'>".$rw['courseid']."</td>");
                                    echo("<td>".$rw['coursename']."</td>");
                                    echo("<td>".$rw['shortname']."</td>");
                                    echo("<td>".$rw['duration']."</td>");
                                    echo("<td>".$rw['fees']."</td>");
                                    echo("<td>".$rw['medium']."</td>");
                                    echo("<td>".$rw['totalsem']."</td>");
                                    echo("<td><button class='btn btn-primary' name='btnupdate' value='".$rw['courseid']."'>Update</button></td>");
                                    echo("<td><button class='btn btn-danger' name='btndelete' value='".$rw['courseid']."'>Delete</button></td>");
                                    echo("</tr>");
                                    $rno=$rno+1;
                                 }
                                }
                                echo("<tr style='background-color:silver'><td colspan='9'>Records : ".$rno."</td></tr>");
                                
                            ?>
                            </tbody>
                            </table>
                        </div>
                    </div>
                 </div>
                </div>
                <?php include("footer.php"); ?>     
            </div>
        </div>   
    </div>
 </form>
 <?php include("jslink.php"); ?>
</body>
</html>