<!DOCTYPE html>
<html lang="en">

<head>
  <title>student management</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <?php 
        include("csslink.php");
        include("../class/dataclass.php");
        session_start();
    ?>
    <?php
      $dc=new DataClass();
      $regid="";
      $username="";
      $password="";
      $email="";
	  $query="";
	  $msg="";
	 ?>
     <?php
       if(isset($_POST['btnshowemail']))
       {
          $username=$_POST['txtusername']; 
          $rw=$dc->getRow("select username,email from register where username='$username'");
          if($rw)
          {
             $email=$rw['email']; 
          }
       }
	 ?>

    <?php 
        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\Exception;

        require 'phpmailer/src/Exception.php';
        require 'phpmailer/src/PHPMailer.php';
        require 'phpmailer/src/SMTP.php';

        if(isset($_POST['btnfrgpwd']))
        {
            $username=$_POST['txtusername']; 
            $rw=$dc->getRow("select username,email,password from register where username='$username'");
            $email=$rw['email'];
            $password=$rw['password'];

            $mail = new PHPMailer(true);
            
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'santinodantonio8866@gmail.com';
            $mail->Password = 'ujnqnkqudscbvyvy';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
            
            $mail->setFrom('santinodantonio8866@gmail.com');
            $mail->addAddress($_POST['txtemail']);
            $mail->isHTML(true);
            $mail->Subject = "Forget Password";
            $mail->Body = "your user name is <u><b>$username</b></u> and your password is <u><b>$password</b></u>";
            
            $mail->Send();

            echo
            "
            <script>
            alert('<h1>Send Successfully...</h1>');
            document.location.href = 'login.php';
            </script>
            ";
        }
    ?>

  <style>
     .site-navbar .site-navigation .site-menu > li > a:hover
    {
    color:red;
    font-weight:bold;
   }
  </style>

</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
<form name="frm" action="#" method="post">
  <div class="site-wrap">
  

    <?php include('topper.php') ?>
    <?php include('header.php') ?>
    <div class="container">
     <div class="row" style="margin:8rem 0px">
      <div class="col-md-3"></div>
      <div class="col-md-6" style="border:3px solid black;border-radius:14px;padding:1rem">
        <div class="row">
            <div class="col-md-12 form-group">
                <center>
                    <h1>Forget Password</h1>
                </center>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 form-group">
                <label>Username</label>
                <input type="text" name="txtusername" class="form-control form-control-lg" value='<?php echo($username) ?>' />
            </div>  
            <div class="col-md-3 form-group" style="margin-top:0.5rem">
                <label></label>
                <button type="submit" name="btnshowemail" class="btn btn-lg px-5" style="background-color:#183661;color:white">Show Email</button>
            </div>  
        </div>  
        <div class="row">
            <div class="col-md-12 form-group">
                <label>Email</label>
                <input type="text" name="txtemail" class="form-control form-control-lg" value='<?php echo($email) ?>' readonly >
            </div>

            <div class="col-md-12 form-group">
            <button type="submit" name="btnfrgpwd" class="btn btn-lg px-5" style="background-color:#183661;color:white">Forget Password</button>
                <button type="submit" name="btncancel" class="btn btn-lg px-5" style="background-color:#183661;color:white">Cancel</button>
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

    <?php include('footer.php') ?>
    </div>
  </form>
 
  <?php include('jslink.php'); ?>

</body>

</html>