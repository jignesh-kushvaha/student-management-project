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
        if(isset($_POST['btnemail']))
        {
          $_SESSION['teachid']=$_POST['btnemail'];
          header('location:emailsendfaculty.php');
        }
    ?>

</head>
<body>
 <form name="frm" action="" method="post">
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
                        <h1><u>Faculties Detail</u></h1>
                        </center>
                    </div>
                    </div>
                    <div class="row" style="margin-top:1rem">
                     <table class="table table-bordered" >
                        <thead>
                            <!-- <tr style='background-color:orange'> -->
                                <tr style="text-align:center;background-color:orange">
                                <th>Teacher Id .</th>
                                <th>Name</th>
                                <th>Send email</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $query="select teachid,firstname,middlename,lastname from teacher";
                            $tb=$dc->getTable($query);
                            $rno=0;
                            while($rw=mysqli_fetch_array($tb))
                            {
                                echo("<tr>");
                                echo("<td style='text-align:center'>".$rw['teachid']."</td>");
                                echo("<td>".$rw['firstname'].' '.$rw['middlename'].' '.$rw['lastname']."</td>");
                                echo("<td style='text-align:center'><button class='btn btn-primary' name='btnemail' value='".$rw['teachid']."'>Send Email</button></td>");
                                echo("</tr>");
                                $rno=$rno+1; 
                            }
                            echo("<tr style='background-color:silver'><td>Records :  ".$rno."</td><td colspan='3'>".$msg."</td></tr>");
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