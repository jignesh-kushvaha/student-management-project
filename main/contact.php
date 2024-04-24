<!DOCTYPE html>
<html lang="en">

<head>
  <title>student management</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php 
      Session_start();
      include('csslink.php'); 
      include("../class/dataclass.php");
      $dc=new dataclass();
      $query="";
      $msg="";
    ?>
  <style>
     .site-navbar .site-navigation .site-menu > li > a:hover
    {
    color:red;
    font-weight:bold;
   }
   .location iframe{
    width:95%;
    height: 95%;
   }
  </style>

<?php
   $contactid="";
   $contactdate="";
   $personname="";
   $contactno="";
   $emailid="";  
   $detail="";   
   $reply="";              
   $msg="";
   $dc=new DataClass();
  
    if(isset($_POST['btnsend']))
    {
        $contactdate=date('y-m-d');
        $personname=$_POST['txtpresonname'];
        $contactno=$_POST['txtcontactno'];
        $emailid=$_POST['txtemailid'];
        $detail=$_POST['txtdetail'];
        $reply="no";
        
        $query="insert into contact(contactdate,personname,contactno,emailid,detail,reply) values('$contactdate','$personname','$contactno','$emailid','$detail','$reply')";  
        $result=$dc->saveRecord($query);
        if($result)
        {
        $msg="Send Message successfully...";
        }
        else
        {
        $msg="Message not submited...";
        }
    }	 
 ?>

</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
 <form name="frm" action="#" method="post">
  <div class="site-wrap">
    <?php include('topper.php') ?>
    <?php include('header.php') ?>
    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="section-title-underline">
                      <span>Contact Us</span>
                    </h2>
                </div>
            </div>
            <div class="row" style="padding-top:2rem">
              <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12 form-group">
                    <b><label>PERSON NAME</label></b>
                    <input type="text" class="form-control" name="txtpresonname"  placeholder="Enter your name" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-7 form-group">
                        <b><label>EMAIL ADDRESS</label></b>
                        <input type="text" class="form-control" name="txtemailid" placeholder="Enter your email" />
                    </div>
                    <div class="col-md-4 form-group">
                        <b><label>CONTACT NO</label></b>
                        <input type="text" class="form-control" name="txtcontactno"  placeholder="Enter contactno" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 form-group">
                        <b><label>DETAILS</label></b>
                        <textarea name="txtdetail" cols="30" rows="7" class="form-control" placeholder="Enter your Query Details" ></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <input type="submit" name="btnsend" value="Send Message" class="btn btn-primary btn-lg px-5">
                        <input type="submit" class="btn btn-primary btn-lg px-5" name="btncancel" value="Cancel" />
                    </div>
                </div>
                <div class="row">
                    <span><?php echo($msg); ?></span>
                </div>
              </div>

              <div class="col-md-6 location">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3726.8163399500363!2d72.91298601744383!3d20.919707499999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be0f9cfffffffff%3A0x8ee6462f40469602!2sNaranlala%20College%20of%20Professional%20%26%20Applied%20Science!5e0!3m2!1sen!2sin!4v1677125927223!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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