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
            $_SESSION['trans']="new";
            header('location:addstate.php');
        }
        if(isset($_POST['btnupdate']))
        {
            $_SESSION['stateid']=$_POST['btnupdate'];
            $_SESSION['trans']="update";
            header('location:addstate.php');
        }
        if(isset($_POST['btndelete']))
        {
            $stateid=$_POST['btndelete']; 
            $query="delete from state where stateid='$stateid'";
            $result=$dc->saveRecord($query);
            if($result)
            {
                $msg="Record has been deleted....";
            }
            else
            {
                $msg="Record not Deleted...";
            }
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
                  <div class="row" style="padding-top:3rem">
                   <div class="col-md-2"></div> 
                   <div class="col-md-8 card"> 
                    <div class="row">
                        <div class="col-md-9">
                            <h1> State Details </h1>
                        </div>
                        <div class="col-md-3">
                        <button type="submit" class="btn btn-gradient-primary me-2" name="btnnew" >NEW</button>
                        </div>
                    </div>
                    <div class="row">
                     <div class="col-md-12">
                       <table class="table table-bordered">
                            <thead style="text-align:center">
                                <tr>
                                    <th>State Id </th>
                                    <th>State Name </th>
                                    <th>short Name</th>
                                    <th>Update</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $query="select * from state";
                                $tb=$dc->getTable($query);
                                $rno=0;
                                while($rw=mysqli_fetch_array($tb))
                                {
                                    echo("<tr>");
                                    echo("<td>".$rw['stateid']."</td>");
                                    echo("<td>".$rw['statename']."</td>");
                                    echo("<td>".$rw['shortname']."</td>");
                                    echo("<td style='text-align:center'><button class='btn btn-primary' name='btnupdate' value='".$rw['stateid']."'>Update</button></td>");
                                    echo("<td style='text-align:center'><button class='btn btn-danger' name='btndelete' value='".$rw['stateid']."'>Delete</button></td>");
                                    echo("</tr>");
                                    $rno=$rno+1;
                                }
                                echo("<tr><td colspan='2'>Records : ".$rno."</td><td colspan='3'>".$msg."</td></tr>");
                            ?>
                            </tbody>
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