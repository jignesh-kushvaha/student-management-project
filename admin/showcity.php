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
        $_SESSION['cityid']="";
        $_SESSION['trans']="";
    ?>
     <?php
        if(isset($_POST['btnnew']))
        {
            $_SESSION['trans']="new";
            header('location:addcity.php');
        }
        if(isset($_POST['btnupdate']))
        {
            $_SESSION['cityid']=$_POST['btnupdate'];
            $_SESSION['trans']="update";
            header('location:addcity.php');
        }
        if(isset($_POST['btndelete']))
        {
            $cityid=$_POST['btndelete']; 
            $query="delete from city where cityid='$cityid'";
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
                      <div class="col-md-10">
                        <h1> City Details </h1>
                      </div>
                      <div class="col-md-2">
                        <button type="submit" class="btn btn-gradient-primary me-2" name="btnnew">NEW</button>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <table class="table table-bordered ">
                          <thead >
                            <tr>
                                <th>City Id </th>
                                <th>City Name </th>
                                <th>Short Name</th>
                                <th>Pin Code</th>
                                <th>State</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                                $query="select cityid,cityname,c.shortname,pincode,statename from city c,state s where c.stateid=s.stateid";
                                $tb=$dc->gettable($query);
                                $rno=0;
                                while($rw=mysqli_fetch_array($tb))
                                {
                                    echo("<tr>");
                                    echo("<td>" . $rw['cityid'] . "</td>");
                                    echo("<td>" . $rw['cityname'] . "</td>");
                                    echo("<td>" . $rw['shortname'] . "</td>");
                                    echo("<td>" . $rw['pincode'] . "</td>");
                                    echo("<td>" . $rw['statename'] . "</td>");
                                    echo("<td> <button name='btnupdate' class='btn btn-gradient-primary me-2' value='".$rw['cityid']."'>UPDATE</buuton></td>");
                                    echo("<td> <button name='btndelete' class='btn btn-gradient-danger me-2' value='".$rw['cityid']."'>DELETE</buuton></td>");
                                    echo("</tr>");
                                    $rno=$rno+1;
                                }
                                echo("<tr><td colspan='5'>Records : ".$rno."</td><td colspan='7'>".$msg."</td></tr>");
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