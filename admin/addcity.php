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
        $cityid="";
        $cityname="";
        $shortname="";
        $stateid="";
        $pincode="";
        $query="";
        $msg="";
        $result="";
    ?>

    <?php
        if($_SESSION['trans']=='update')
        {
            $cityid=$_SESSION['cityid'];
            $query="select * from city where cityid='$cityid'";
            $rw=$dc->getrow($query);
            $cityname=$rw['cityname'];
            $shortname=$rw['shortname'];
            $pincode=$rw['pincode'];
            $stateid=$rw['stateid'];
        }
        if(isset($_POST['btnsave']))
        {
            $cityname=$_POST['txtcityname'];
            $shortname=$_POST['txtshortname'];
            $pincode=$_POST['txtpincode'];
            $stateid=$_POST['lststate'];
            if($_SESSION['trans']=='new')
            {
                $query="insert into city(cityname,shortname,pincode,stateid) values('$cityname','$shortname','$pincode','$stateid')";
            }
            if($_SESSION['trans']=='update')
            {
                $cityid=$_SESSION['cityid'];
                $query="update city set cityname='$cityname',shortname='$shortname',pincode='$pincode',stateid='$stateid' where cityid='$cityid'";
            }
            $result=$dc->saverecord($query);
            if($result)
            {
                $_SESSION['cityname']=$cityname;
                header('location:showcity.php');
            }
            else
            {
                $msg="Record not Save...";
            }
        }
        if(isset($_POST['btncancel']))
        {
            header('location:showcity.php');
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
                    <div class="row" style="margin-top: 3rem;">
                        <div class="col-md-2"></div>
                        <div class="col-md-8 card">
                            <div class="row">
                             <center>
                                <h1>City Form (
                                    <?php 
                                        if($_SESSION['trans']=='new')
                                        {
                                            echo('Add City');
                                        }
                                        else
                                        {
                                            echo('Update City');
                                        }
                                    ?>)
                                </h1>
                             </center>
                            </div>  
                            <div class="row">
                              <div class="col-md-12">
                                <div class="form-group">
                                    <label>City Name</label>
                                    <input type="text" class="form-control" name="txtcityname" placeholder="Enter City Name" value='<?php echo($cityname) ?>'>
                                </div>
                                <div class="form-group">
                                    <label>Short Name</label>
                                    <input type="text" class="form-control" name="txtshortname" placeholder="Enter Short Name" value='<?php echo($shortname) ?>'>
                                </div>
                                <div class="form-group">
                                    <label>Pincode</label>
                                    <input type="text" class="form-control" name="txtpincode" placeholder="Enter Pincode" value='<?php echo($pincode) ?>'>
                                </div>
                                <div class="form-group">
                                    <label>State</label>
                                    <select  class="form-control" name="lststate" placeholder="Enter State Name" style="height:3rem;color:black;">
                                     <?php
                                        $query1="select stateid,statename from state"; 
                                        $tb=$dc->getTable($query1);
                                        while($rw=mysqli_fetch_array($tb))
                                        {
                                            if($stateid==$rw['stateid'])
                                            {
                                                echo("<option selected value='".$rw['stateid']."'>".$rw['statename']."</option>");
                                            }
                                            else
                                            {
                                                echo("<option value='".$rw['stateid']."'>".$rw['statename']."</option>");
                                            }
                                        }  
                                     ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-gradient-success me-2" name="btnsave">SAVE</button>
                                    <button type="submit" class="btn btn-gradient-danger me-2" name="btncancel">CANCEL</button>
                                </div>
                                <div class="form-group">
                                <center> <?php echo($msg); ?> </center>
                                </div>
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