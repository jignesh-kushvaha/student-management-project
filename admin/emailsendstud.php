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
        $grno=$_SESSION['grno'];
    ?>
    <?php
    $emailid="";
    $emaildate="";
    $emailto="";
    $subject="";
    $description="";
    $email="";
    $msg="";
    $dc=new DataClass();
    ?>

    <?php 
        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\Exception;

        require 'phpmailer/src/Exception.php';
        require 'phpmailer/src/PHPMailer.php';
        require 'phpmailer/src/SMTP.php';

        if(isset($_POST['btnsend']))
        {
            $emaildate=date('y-m-d');
            $emailto=$_POST['txtemailto'];
            $subject=$_POST['txtsubject'];
            $description=$_POST['txtdescription'];
            $query="insert into email(emaildate,emailto,subject,description,regid) values('$emaildate','$emailto','$subject','$description','$grno')";
            $result=$dc->saveRecord($query);

            $mail = new PHPMailer(true);
            
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'santinodantonio8866@gmail.com';
            $mail->Password = 'ujnqnkqudscbvyvy';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
            
            $mail->setFrom('santinodantonio8866@gmail.com');
            $mail->addAddress($_POST['txtemailto']);
            $mail->isHTML(true);
            $mail->Subject = $_POST['txtsubject'];
            $mail->Body = $_POST['txtdescription'];
            
            $mail->Send();

            echo
            "
            <script>
            alert('Send Successfully...');
            document.location.href = 'adminhome.php';
            </script>
            ";
        }
    ?>



  <?php 	
	if(isset($_POST['btncancel']))
	{
	   header('location:emailstudent.php');
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
                    <div class="col-md-3"></div>
                    <div class="col-md-6 card">
                        <div class="row">
                         <div class="col-md-12">
                            <center>
                            <h1>Send Email</h1>
                            </center>
                         </div>
                        </div>
                        <div class="row">
                          <?php 
                            $query="select * from register where regid='$grno'";
                            $rw=$dc->getRow($query);
                            $email=$rw['email'];
                          ?>
                          <div class="col-md-12 form-group">
                            <label>Email To</label>
                            <input type="text" class="form-control" name="txtemailto" value="<?php echo($email); ?>" placeholder="Enter Email Address" autofocus readonly onchange='checkemail(this,lblemail)'>
                          </div>
                        </div>   
                        <div class="row">
                          <div class="col-md-12 form-group">
                            <label>Subject</label>
                            <input type="text" class="form-control" name="txtsubject" value="" placeholder="Enter Subject" >
                          </div>
                        </div>   
                        <div class="row">
                          <div class="col-md-12 form-group">
                            <label>Description</label>
                            <textarea class="form-control" name="txtdescription" rows="5" cols="10" placeholder="Enter Description.."></textarea>
                          </div>
                        </div>   
                        <div class="form-group">
                            <input type="submit" name="btnsend" value="Send" class="btn btn-gradient-primary me-2"/>
                            <span id="n0" class="error"></span>         
                            <input type="submit" name="btncancel" value="cancel" class="btn btn-gradient-danger me-2"/>
                            <span id="n0" class="error"></span>      
                        </div>
                        <div class="form-group">
                            <span><?php echo($msg); ?></span>      
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