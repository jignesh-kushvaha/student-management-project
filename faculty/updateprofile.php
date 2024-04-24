<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculty Layout</title>
    <?php 
        session_start();
        include("csslink.php");
        include("../class/dataclass.php");
    ?>
    <?php 
        $dc=new dataclass();
        $query="";
        $msg="";
    ?>
    <?php
        if($_SESSION['trans']=='update')
        { 
            $teachid=$_SESSION['teachid'];
            $query="select * from teacher where teachid='$teachid'";
            $rw=$dc->getRow($query);
            $firstname=$rw['firstname'];
            $middlename=$rw['middlename'];
            $lastname=$rw['lastname'];
            $address=$rw['address'];
            $cityname=$rw['cityname'];
            $qualification=$rw['qualification'];
            $image=$rw['image'];
            $query1="select * from register where regid='".$_SESSION['teachid']."'";   
            $rw1=$dc->getRow($query1);
            $email=$rw1['email'];
            $contactno=$rw1['contactno'];
        } 
        if(isset($_POST['btnupdate']))
        {
            $teachid=$_SESSION['teachid'];
            $firstname=$_POST['txtfirstname'];
            $middlename=$_POST['txtmiddlename'];
            $lastname=$_POST['txtlastname'];
            $address=$_POST['txtaddress'];
            $cityname=$_POST['txtcityname'];
            $email=$_POST['txtemail'];
            $contactno=$_POST['txtcontactno'];
            $qualification=$_POST['txtqualification'];
            $image=$_FILES['fileimage']['name'];
            $tmpimage=$_FILES['fileimage']['tmp_name'];

            if($image!="")
            {
                $query="update teacher set firstname='$firstname',middlename='$middlename',lastname='$lastname',address='$address',cityname='$cityname',qualification='$qualification',image='$image' where teachid='$teachid'";
            }
            else{
                $query="update teacher set firstname='$firstname',middlename='$middlename',lastname='$lastname',address='$address',cityname='$cityname',qualification='$qualification' where teachid='$teachid'";   
            }
            $result=$dc->saveRecord($query);
            if($result)
            {
                move_uploaded_file($tmpimage,"facultyimage/".$image); 
                $query1="update register set email='$email',contactno='$contactno' where regid='$teachid'";
                $result1=$dc->saveRecord($query1);
                header('location:showprofile.php');
            }  
            else
            {
                $msg="Record Not Inserted";
            }
        }
        if(isset($_POST['btncancel']))
        {
            header('location:showprofile.php');
        }
    ?>

    <script>
	    function checkerror()
		{
            var btn=document.activeElement.value;
            if(btn=="Update")
            {
                if(lbladdress1.innerHTML!="" || lbladdress2.innerHTML!="" || lblcityname1.innerHTML!="" || lblcityname2.innerHTML!="" || lblemail1.innerHTML!="" || lblemail2.innerHTML!="" || lblcontactno1.innerHTML!="" || lblcontactno2.innerHTML!="" || lblqualification1.innerHTML!="" || lblqualification2.innerHTML!="" )
                {
                    return false;
                }
                else
                {
                    return true;
                }  
            }
            if(btn=="Cancel")
            {
                return true;
            }			  
		}
	</script>
    
</head>
<body>
 <form name="frm" action="" method="post" enctype="multipart/form-data" onSubmit="return checkerror()">
    <div class="container-scroller">
     <?php include("navbar.php"); ?>
        <div class="container-fluid page-body-wrapper">
            <?php include("sidebar.php"); ?>
            <div class="main-panel">
                <div class="content-wrapper">
                    
                <div class="row" style="margin-top:2rem">
                    <div class="col-md-2"></div>
                    <div class="col-md-7 card">
                      <div class="row">
                        <div class="col-md-12">
                            <center>
                            <h1>Update Profile</h1><hr>
                            </center>
                        </div>
                      </div>
                      <div class="row" style="margin-top:1rem">
                          <div class="col-md-4">
                                <div class="form-group">
                                    <label>First Name</label>              
                                    <input type="text" name="txtfirstname"  class="form-control" value="<?php echo($firstname);?>" readonly/>
                                </div>
                          </div>
                          <div class="col-md-4">
                                <div class="form-group">
                                    <label>Middle Name</label>              
                                    <input type="text" name="txtmiddlename"  class="form-control" value="<?php echo($middlename);?>" readonly/>
                                </div>
                          </div>
                          <div class="col-md-4">
                                <div class="form-group">
                                    <label>Last Name</label>              
                                    <input type="text" name="txtlastname"  class="form-control"  value="<?php echo($lastname);?>" readonly />
                                </div>
                          </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Address</label>              
                                <textarea type="text" name="txtaddress"  class="form-control" autofocus onchange="onlyalphanumeric(this,lbladdress1)" onblur="checkblank(this,lbladdress2)"><?php echo($address); ?></textarea>
                                <label class="error" id="lbladdress1"></label>
                                <label class="error" id="lbladdress2"></label>
                                <span id="n0" class="error"></span>         
                            </div>                            
                        </div> 
                        <div class="col-md-6">                           
                            <div class="form-group">
                                <label>City</label>              
                                <input type="text" name="txtcityname"  class="form-control" placeholder="Enter City Name" autofocus onchange="onlyalpha(this,lblcityname1)" onblur="checkblank(this,lblcityname2)" value='<?php echo($cityname) ?>' />
                                <label id="lblcityname1"></label>
                                <label id="lblcityname2"></label>
                                <span id="n0" class="error"></span>         
                            </div> 
                        </div> 
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email</label>              
                                <input type="text" name="txtemail"  class="form-control" autofocus onchange="checkemail(this,lblemail1)" onblur="checkblank(this,lblemail2)" value='<?php echo($email) ?>' />
                                <label id="lblemail1"></label>
                                <label id="lblemail2"></label>
                                <span id="n0" class="error"></span>         
                            </div>                            
                        </div> 
                        <div class="col-md-6">                           
                            <div class="form-group">
                                <label>Contact No.</label>              
                                <input type="text" name="txtcontactno"  class="form-control"
                                autofocus onchange="checkmobileno(this,lblcontactno1)" onblur="checkblank(this,lblcontactno2)" value='<?php echo($contactno) ?>' />
                                <label id="lblcontactno1"></label>  
                                <label id="lblcontactno2"></label>
                                <span id="n0" class="error"></span>         
                            </div> 
                        </div> 
                      </div> 
                      <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Qualification</label>              
                                <input type="text" name="txtqualification"  class="form-control" placeholder="Enter Qualification" autofocus onchange="onlyalphasymbol(this,lblqualification1)" onblur="checkblank(this,lblqualification2)" value='<?php echo($qualification) ?>' />
                                <label id="lblqualification1"></label>
                                <label id="lblqualification2"></label>
                                <span id="n0" class="error"></span>         
                            </div>                            
                        </div>   
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Images</label>              
                                <input type="file" name="fileimage" class="form-control" autofocus onchange="imgValidation(this,lblfile1)" />
                                <label id="lblfile1"></label>
                                
                            </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group">
                            <input type="submit" name="btnupdate" id="save" value="Update" class="btn btn-gradient-primary me-2"/>
                            <input type="submit" name="btncancel" id="cancel" value="cancel" class="btn btn-gradient-danger me-2"/>        
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