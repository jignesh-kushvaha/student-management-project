<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Layout</title>

    <?php 
        session_start();
        include("csslink.php");
        include("../class/dataclass.php");
    ?>
    <?php 
        $dc=new dataclass();
        $query="";
        $msg="";
    ?>
    <?php
     if(isset($_POST['btnupdate']))
	 {
      $_SESSION['grno']=$_SESSION['regid']; 
      $_SESSION['trans']="update";
     // echo($_SESSION['grno']);
	  header('location:updateprofile.php');
     }
    ?>

</head>
<body>
 <form name="frm" action="" method="post" enctype="multipart/form-data">
    <?php
        $query="select * from student where grno='".$_SESSION['regid']."'";   
        $rw=$dc->getRow($query);
        $query1="select * from register where regid='".$_SESSION['regid']."'";   
        $rw1=$dc->getRow($query1);
    ?>
    <div class="container-scroller">
     <?php include("navbar.php"); ?>
        <div class="container-fluid page-body-wrapper">
            <?php include("sidebar2.php"); ?>
            <div class="main-panel">
                <div class="content-wrapper">
                 <div class="row" style="margin-left:2rem;margin-top:2rem">
                  <div class="col-md-10 card">
                    <div class="row">
                        <div class="col-md-12" style="height: 3rem;margin-top: 0.4rem;">
                            <center>
                            <h1>Profile</h1>
                            </center>
                        </div>
                    </div>
                    <div class="row" style="margin-top:1rem" >
                        <div class="col-md-4" style="margin-bottom: 1rem;">
                        <img src="<?php echo('studentimage/'.$rw['image']) ?>" alt="Upload Your Photo" style="width:100%;height:20rem"> 
                        </div>
                        <div class="col-md-6">
                        <table class="table table-bordered table-striped">
                            <tr>
                                <td>Name</td>
                                <td><?php echo($rw['firstname'].' '.$rw['middlename'].' '.$rw['lastname']); ?></td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td><?php echo($rw['address']);?></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><?php echo($rw1['email']);?></td>
                            </tr>
                            <tr>
                                <td>Contact No.</td>
                                <td><?php echo($rw1['contactno']);?></td>
                            </tr>
                            <tr>
                                <td>City</td>
                                <td><?php echo($rw['cityname']);?></td>
                            </tr>
                            <tr>
                                <td>DOB</td>
                                <td><?php echo($rw['dob']);?></td>
                            </tr>
                            
                            <tr>
                                <td>Blood Group</td>
                                <td><?php echo($rw['bloodgroup']);?></td>
                            </tr>
                            
                            <tr>
                                <td colspan='2'><button class="btn btn-primary" name="btnupdate" >Update</button></td>
                            </tr>
                        </table>
                        </div>
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