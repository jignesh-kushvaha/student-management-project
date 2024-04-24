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
        if(isset($_POST['btnnew']))
        {
          header('location:registration.php');
        }
        if(isset($_POST['btnadd']))
        {
          $_SESSION['regid']=$_POST['btnadd'];
          header('location:addfacultyinfo1.php');
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
            <div class="row" style="height:4rem;margin-top: 1rem;">
              <div class="col-md-9">
                <center>
                 <u><h1>Add Faculties Detail</h1></u>
                </center>
              </div>
              <div class="col-md-2" >
                <center>
                 <button class='btn' name='btnnew' style="height:3rem;background-color:#71f0f9">New</button>
                  </center>
              </div>
            </div>
            <div class="row">
              <table class="table table-bordered table-striped" >
                <thead>
                    <tr style='text-align:center;background-color:orange'>
                        <th>Register Id</th>
                        <th>User Name</th>
                        <th>Name</th>
                        <th>Add Details</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $query="select regid,username,firstname,middlename,lastname,status from register where usertype='faculty'";
                    $tb=$dc->getTable($query);
                    $rno=0;
                    while($rw=mysqli_fetch_array($tb))
                    {
                      if($rw['status']=='n')
                      {
                        echo("<tr>");
                        echo("<td style='text-align:center'>".$rw['regid']."</td>");
                        echo("<td>".$rw['username']."</td>");
                        echo("<td>".$rw['firstname'].' '.$rw['middlename'].' '.$rw['lastname']."</td>");
                        echo("<td style='text-align:center'><button class='btn btn-primary' name='btnadd' value='".$rw['regid']."'>ADD</button></td>");
                        echo("</tr>");
                        $rno=$rno+1; 
                      }
                    }
                    echo("<tr style='background-color:silver'><td>Records :  ".$rno."</td><td colspan='5'>".$msg."</td></tr>");
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