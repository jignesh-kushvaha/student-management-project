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
        $username="";
        $password="";
        $newpassword="";
        $oldpassword="";
        $confirmpassword="";
    ?>
    <?php
        $username=$_SESSION['username'];
	   if(isset($_POST['btnchange']))
	   {
          $regid=$_SESSION['regid']; 
          $query="select password from register where regid='$regid'"; 
	      $rw=$dc->getRow($query);
          $password=$rw['password'];
          $oldpassword=$_POST['txtoldpassword'];
          $newpassword=$_POST['txtnewpassword'];
          $confirmpassword=$_POST['txtconfirmpassword'];
          if($password==$oldpassword)
          {
            if($newpassword==$confirmpassword)
            {
              $query="update register set password='$newpassword' where regid='$regid'";
              $result=$dc->saveRecord($query);
              if($result)
              {
                  $msg="Password Changed successfully...";
              }
              else
              {
                $msg="Password not changed..";
              }
            }
            else
            {
                $msg="New Password And Confirm Password Different ..";
            }
          }
          else
            {
                $msg="Old Password Is Different";
            }
	   }
	   if(isset($_POST['btncancel']))
	   {
	     header('location:customerhome.php');
	   }
	 ?>

    <script>
	 function checkerror()
	 {
		if(lblnewpassword1.innerHTML!="" || lblnewpassword2.innerHTML!="" )
		{
		return false;
		}
		else
		{
		return true;
		}
						
	 }
	</script>

</head>
<body>
 <form name="frm" action="" method="post" onSubmit="return checkerror()">
    <div class="container-scroller">
     <?php include("navbar.php"); ?>
        <div class="container-fluid page-body-wrapper">
            <?php include("sidebar2.php"); ?>
          <div class="main-panel">
            <div class="content-wrapper">
              <div class="row">
                <div class="col-md-12">
                <div class="row" style="margin-bottom: 2rem;">
                        <div class="col-md-2"></div>
                        <div class="col-md-8 card">
                            <div class="row">
                                <div class="col-md-12">
                                    <center>
                                        <h1>Change Password</h1>
                                    </center>
                                </div>
                            </div>
                           <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>User Name</label>              
                                        <input type="text" name="txtusername"  class="form-control" 
                                        value='<?php echo($username);?>' readonly/>
                                        <span id="n0" class="error"></span>         
                                    </div>
                                </div>
                            </div>
                           <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Old Password</label>              
                                        <input type="text" name="txtoldpassword" class="form-control" />
                                        <span id="n0" class="error"></span>         
                                    </div>
                                </div>
                            </div>
                           <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>New Password</label>              
                                        <input type="text" name="txtnewpassword" autofocus onchange="checklength(this,lblnewpassword1,3,8)" onblur="checkblank(this,lblnewpassword2)"class="form-control" />
                                        <label id="lblnewpassword1"></label>
                                        <label id="lblnewpassword2"></label>
                                        <span id="n0" class="error"></span>         
                                    </div>
                                </div>
                            </div>
                           <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Confirm Password</label>              
                                        <input type="password" name="txtconfirmpassword"  class="form-control" />
                                        <span id="n0" class="error"></span>         
                                    </div>
                                </div>
                            </div>
                           <div class="row">
                                <div class="col-md-12">
                                  <div class="form-group">
                                    <input type="submit" name="btnchange" value="Change" class="btn btn-gradient-primary me-2"/>
                                    <span id="n0" class="error">
                                        <?php 
                                            echo($msg);
                                        ?>
                                    </span>         
                                  </div>
                                </div>
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