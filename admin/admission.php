<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Layout</title>

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
        if(isset($_POST['btnadmision']))
        {
          $_SESSION['regid']=$_POST['btnadmision'];
          header('location:do-admission.php');
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
          <div class="col-md-2"></div>
          <div class="col-md-8 card">
            <div class="row">
              <div class="col-md-12">
                <center>
                 <u><h1>Admission Of Registered Students</h1></u>
                </center>
              </div>
            </div>
            <div class="row" style="margin-top:1rem">
              <table class="table table-bordered table-striped" >
                <thead>
                    <tr style='text-align:center;background-color:orange'>
                        <th>Register Id</th>
                        <th>User Name</th>
                        <th>First Name</th>
                        <th>Middle Name</th>
                        <th>Last Name</th>
                        <th>Do Admission</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $query="select regid,username,firstname,middlename,lastname,status from register where usertype='student'";
                    $tb=$dc->getTable($query);
                    $rno=0;
                    while($rw=mysqli_fetch_array($tb))
                    {
                     if($rw['status']=='n')
                     {
                      echo("<tr>");
                      echo("<td style='text-align:center'>".$rw['regid']."</td>");
                      echo("<td>".$rw['username']."</td>");
                      echo("<td>".$rw['firstname']."</td>");
                      echo("<td>".$rw['middlename']."</td>");
                      echo("<td>".$rw['lastname']."</td>");
                      echo("<td><button class='btn btn-primary' name='btnadmision' value='".$rw['regid']."'>Admission</button></td>");
                      echo("</tr>");
                      $rno=$rno+1; 
                     }
                    }
                    if($rno == 0)
                    {
                      echo("<tr><td colspan='6'><h1>No Admission Pending</h1></td></tr>");
                    }
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
  </div>
 </form>
    <?php include("jslink.php"); ?>
</body>
</html>