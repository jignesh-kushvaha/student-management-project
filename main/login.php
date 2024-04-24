<!DOCTYPE html>
<html lang="en">

<head>
  <title>student management</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <?php 
        session_start();
        include('csslink.php');
     ?>
    <?php include('../class/dataclass.php'); ?>
  <style>
    .site-navbar .site-navigation .site-menu > li > a:hover
    {
    color:red;
    font-weight:bold;
   }
   .mainlogin{
    border: 1px solid black;
    padding:10% 10%;
    background-image: url('images/loginbg.jpg');
    font-size:1.5rem;
    color:white;
   }
   .leftside{
    padding:2%;
    border:5px solid white;
    border-radius:14px;
   }
   .error{
    color:red;
   }
  </style>
    <?php 
      $dc=new dataclass();
      $query="";
      $msg="";
    ?>
    <?php 
      $username="";
      $password="";
      $usertype="";
      $msg="";
      ?>
  <?php
  $conn=mysqli_connect('localhost','root','','studentmanagement');
  if(isset($_POST['btnlogin'])){
      $username=$_POST['txtusername'];
      $password=$_POST['txtpassword'];
      $query="select * from register where username='$username'";
      $rw=$dc->getRow($query);
      if($rw)
      {
          if($password==$rw['password'])
          {
            $_SESSION['regid']=$rw['regid'];
            if($rw['usertype']=='admin')
            {
              $_SESSION['username']=$username;
              header('location:../admin/adminhome.php');
            }
            if($rw['usertype']=='student')
            {
              $_SESSION['username']=$username;
              header('location:../student/showprofile.php');
              //$msg=$username;
            }
            if($rw['usertype']=='faculty')
            {
              $_SESSION['username']=$username;
              header('location:../faculty/showprofile.php');
              //$msg=$username;
            }
          }
          else
          {
              $msg="Invalid Password....";
          }
      }
      else
      {
          $msg="Invalid User name....";
      }
  }
?>

</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
<form name="frm" action="#" method="post">
  <div class="site-wrap">
  

    <?php include('topper.php') ?>
    <?php include('header.php') ?>
    <div class="container-fluid mainlogin">
        <div class="row">
            <div class="col-md-5 leftside">
                <div class="row">
                    <div class="col-md-12 form-group">
                        <center>
                            <h1>User Login</h1>
                        </center>
                    </div>
                
                    <div class="col-md-12 form-group">
                        <label>Username</label>
                        <input type="text" name="txtusername" class="form-control form-control-lg">
                    </div>
                
                    <div class="col-md-12 form-group">
                        <label>Password</label>
                        <input type="password" name="txtpassword" class="form-control form-control-lg">
                    </div>

                    <div class="col-md-12 form-group">
                        <input type="submit" name="btnlogin" value="Log In" class="btn btn-lg px-5" style="background-color:#183661;color:white">
                        <span id="n0" class="error">
                            <?php 
                                echo($msg);
                            ?>
                        </span>  
                    </div>
                    <div class="col-12-md form-group">
                     <a href="forgetpassword.php" class="nav-link text-left" style="color:white"><u>Forget Password</u></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include('footer.php') ?>
    </div>
  </form>
 
  <?php include('jslink.php'); ?>

</body>

</html>