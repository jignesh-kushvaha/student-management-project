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
        $stateid="";
        $statename="";
        $shortname="";
    ?>

 <?php

    if($_SESSION['trans']=='update')
    { 
        $stateid=$_SESSION['stateid'];
        $query="select * from state where stateid='$stateid'";
        $rw=$dc->getRow($query);
        $statename=$rw['statename'];
        $shortname=$rw['shortname'];
    }

    if(isset($_POST['btnsave']))
    {   
        $statename=$_POST['txtstatename'];
        $shortname=$_POST['txtshortname'];
        if($_SESSION['trans']=='new')
        {
           $query="insert into state(statename,shortname) values('$statename','$shortname')";
        }
        echo($query);
        if($_SESSION['trans']=='update')
        {
            $stateid=$_SESSION['stateid'];
            $query="update state set statename='$statename',shortname='$shortname' where stateid='$stateid'";
        }

        $result=$dc->saveRecord($query);
        if($result)
        {
         header('location:showstate.php');
        }
        else
        {
         $msg="Record not Save...";
        }
    }
    if(isset($_POST['btncancel']))
    {
        header('location:showstate.php');
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
                          <h1>State Form (
                              <?php 
                                  if($_SESSION['trans']=='new')
                                  {
                                      echo('Add State');
                                  }
                                  else
                                  {
                                      echo('Update State');
                                  }
                              ?>)
                          </h1>
                        </center>
                      </div>  
                      <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>State Name</label>
                          <input type="text" class="form-control" name="txtstatename" placeholder="Enter State" value='<?php echo($statename);?>'>
                        </div>
                        <div class="form-group">
                          <label>Short Name</label>
                          <input type="text" class="form-control" name="txtshortname" placeholder="Enter Shortname" value='<?php echo($shortname); ?>'>
                        </div>
                        <div class="form-group">
                          <input class="btn btn-success" type="submit" name="btnsave" value="SAVE">
                          <input class="btn btn-danger" type="submit" name="btncancel" value="CANCEL">
                        </div>    
                        <div class="form-group">
                          <?php echo($msg); ?> 
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                
            </div>
            <?php include("footer.php"); ?>
        </div>     
    </div>
 </form>
 <?php include("jslink.php"); ?>
</body>
</html>