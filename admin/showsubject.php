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
	  header('location:addsubject.php');
     }
     if(isset($_POST['btnupdate']))
	 {
      $_SESSION['subid']=$_POST['btnupdate']; 
      $_SESSION['trans']="update";
	  header('location:addsubject.php');
     }
     if(isset($_POST['btndelete']))
     {
        $subid=$_POST['btndelete'];
        $query="update subject set deletestatus='yes' where subid='$subid'";
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
    <style>
        .error{
            color:red;
        }
    </style>
</head>
<body>
 <form name="frm" action="#" method="post">
    <div class="container-scroller">
     <?php include("navbar.php"); ?>
        <div class="container-fluid page-body-wrapper">
            <?php include("sidebar.php"); ?>
            <div class="main-panel">
                <div class="content-wrapper">    
                 <div class="row">
                    <div class="col-md-12 card">
                        <div class="row">
                            <div class="col-md-9" style="height: 3rem;margin-top: 0.4rem;">
                                <center>
                                <u><h1>Show Subjects</h1></u>
                                </center>
                            </div>
                            <div class="col-md-3" style="height: 3rem;margin-top: 0.5rem;">
                                <center>
                                <button class='btn' name='btnnew' value='".$rw['courseid']."' style="height:3rem;background-color:#71f0f9">New</button>
                                </center>
                            </div>
                        </div>
                        <div class="row" style="margin-top:1rem">
                            <table class="table table-bordered table-striped" >
                            <thead>
                                <tr style='text-align:center;background-color:orange'>
                                    <th>Subject ID</th>
                                    <th>Subject Name</th>
                                    <th>Short Name</th>
                                    <th>Courses</th>
                                    <th>Sem</th>  
                                    <th>Subject Type</th>
                                    <th>Update</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $query="select subid,subname,s.shortname,coursename,s.shortname,sem,subtype,s.deletestatus from subject s,courses c where s.courseid=c.courseid";
                                $tb=$dc->getTable($query);
                                $rno=0;
                                while($rw=mysqli_fetch_array($tb))
                                {
                                  if($rw['deletestatus']=="no")
                                  {
                                    echo("<tr>");
                                    echo("<td style='text-align:center'>".$rw['subid']."</td>");
                                    echo("<td>".$rw['subname']."</td>");
                                    echo("<td>".$rw['shortname']."</td>");
                                    echo("<td>".$rw['coursename']."</td>");
                                    echo("<td>".$rw['sem']."</td>");
                                    echo("<td>".$rw['subtype']."</td>");
                                    echo("<td><button class='btn btn-primary' name='btnupdate' value='".$rw['subid']."'>Update</button></td>");
                                    echo("<td><button class='btn btn-danger' name='btndelete' value='".$rw['subid']."'>Delete</button></td>");
                                    echo("</tr>");
                                    $rno=$rno+1;
                                  }
                                }
                                echo("<tr style='background-color:silver'><td colspan='2'>Records : ".$rno."</td><td colspan='6' class='error'>".$msg."</td></tr>");
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