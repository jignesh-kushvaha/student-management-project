<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Layout</title>
    
    <?php 
        session_start();
        include("csslink.php");
        include("../class/dataclass.php");
    ?>
    <?php 
        $dc=new dataclass();
        $query="";
        $msg="";
        $regdate="";
        $username="";
        $firstname="";
        $middlename="";
        $lastname="";
        $password="";
        $usertype="";
        $email="";
        $contactno="";
        $status="";
    ?>

    <?php
        if(isset($_POST['btnadd']))
        {
            $regdate=date('y-m-d');
            $firstname=$_POST['txtfirstname'];
            $middlename=$_POST['txtmiddlename'];
            $lastname=$_POST['txtlastname'];
            $username=$_POST['txtusername'];
            $password=$_POST['txtpassword'];
            $confirmpassword=$_POST['txtconfirmpassword'];
            $usertype=$_POST['lstusertype'];
            $email=$_POST['txtemail'];
            $contactno=$_POST['txtcontactno'];
            $status='n';
            if($password==$confirmpassword)
            {
             $query="select * from register where username='$username'";
             if($dc->checkunique($query))
             {
                $query="insert into register(regdate,firstname,middlename,lastname,username,password,usertype,email,contactno,status) values('$regdate','$firstname','$middlename','$lastname','$username','$password','$usertype','$email','$contactno','$status')";
                //echo($query);
                $result=$dc->saveRecord($query);
                if($result)
                {
                    $msg="Record Inserted";
                }
                else
                {
                    $msg="Record Not Inserted";
                }
             }
             else
             {
                $msg="Username is already exists..";
             }
            }
            else
            {
                $msg="Password And Confirm Password Different ..";
            }
        }
        if(isset($_POST['btncancel']))
        {
            header('location:adminhome.php');
        }
    ?>

    <script>
	    function checkerror()
		{
            var btn=document.activeElement.value;
            if(btn=="Add")
            {
                if(lblfirstname2.innerHTML!="" || lblfirstname2.innerHTML!="" || lblmiddlename1.innerHTML!="" || lblmiddlename2.innerHTML!="" || lbllastname1.innerHTML!="" || lbllastname2.innerHTML!="" || lblusername1.innerHTML!="" || lblusername2.innerHTML!="" || lblpassword1.innerHTML!="" || lblpassword2.innerHTML!="" || lblemailaddress1.innerHTML!="" || lblemailaddress2.innerHTML!="" || lblcontactno1.innerHTML!="" || lblcontactno2.innerHTML!="")
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
    <style>
        select{
            height:2.5rem;
            width:100%;
            border-color: #00000040;
            color:#00000091;
            padding:0.2rem;
        }
    </style>
</head>
<body>
  <form name="frm" action="#" method="post" onSubmit="return checkerror()">       
    <div class="container-scroller">
        <?php include("navbar.php"); ?>
        <div class="container-fluid page-body-wrapper">
            <?php include("sidebar.php"); ?>
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row" style="margin-bottom: 2rem;">
                        <div class="col-md-2"></div>
                        <div class="col-md-8 card">
                            <div class="row">
                                <div class="col-md-12">
                                    <center>
                                        <h1><u>Registration</u></h1>
                                    </center>
                                </div>
                            </div>
                            <div class="row" style="margin-top:1rem">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>First Name</label>              
                                        <input type="text" name="txtfirstname"  class="form-control" autofocus onchange="checkalphalength(this,lblfirstname1)" onblur="checkblank(this,lblfirstname2)" placeholder="Enter Surname"/>
                                        <label id="lblfirstname1"></label>
                                        <label id="lblfirstname2"></label>
                                        <span id="n0" class="error"></span>         
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                       <label>Middle Name</label>              
                                      <input type="text" name="txtmiddlename" class="form-control" autofocus onchange="checkalphalength(this,lblmiddlename1)" onblur="checkblank(this,lblmiddlename2)" placeholder="Enter Name"/>
                                      <label id="lblmiddlename1"></label>
                                      <label id="lblmiddlename2"></label>
                                        <span id="n0" class="error"></span>         
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                       <label>Last Name</label>              
                                      <input type="text" name="txtlastname" class="form-control" autofocus onchange="checkalphalength(this,lbllastname1)" onblur="checkblank(this,lbllastname2)" placeholder="Enter Father Name"/>
                                      <label id="lbllastname1"></label>
                                      <label id="lbllastname2"></label>
                                        <span id="n0" class="error"></span>         
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>User Name</label>             
                                        <input type="text" name="txtusername"  class="form-control" autofocus onchange="checkalphalength(this,lblusername1)" onblur="checkblank(this,lblusername2)" placeholder="Enter Username"/>
                                        <label id="lblusername1"></label>
                                        <label id="lblusername2"></label>
                                        <span id="n0" class="error"></span>         
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                     <label style="display:block">User Type</label>
                                     <select name="lstusertype">
                                       <option>Select User Type</options>
                                       <option value="student">Student</options>
                                       <option value="faculty">Faculty</options>
                                       <option value="admin">Admin</options>
                                     </select>
                                    </div>  
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Password</label>              
                                        <input type="text" name="txtpassword"  class="form-control" autofocus onchange="checklength(this,lblpassword1,3,8)" onblur="checkblank(this,lblpassword2)" placeholder="Enter Password"/>
                                        <label id="lblpassword1"></label>
                                        <label id="lblpassword2"></label>
                                        <span id="n0" class="error"></span>         
                                    </div>
                                </div>   
                                <div class="form-group col-md-6">
                                    <label>Confirm Password</label>              
                                    <input type="password" name="txtconfirmpassword" placeholder="Enter Confirm Password" class="form-control" />
                                    <span id="n0" class="error"></span>         
                                </div>                               
                            </div>
                            <div class="row">
                                <div class="form-group col-md-8">
                                    <label>Email</label>              
                                    <input type="text" name="txtemail"  class="form-control" onchange="checkemail(this,lblemailaddress1)" onblur="checkblank(this,lblemailaddress2)" placeholder="Enter Email"/>
                                    <label id="lblemailaddress1"></label>
                                    <label id="lblemailaddress2"></label>
                                    <span id="n0" class="error"></span>         
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Contact no</label>              
                                    <input type="text" name="txtcontactno"  class="form-control" autofocus onchange="checkmobileno(this,lblcontactno1)" onblur="checkblank(this,lblcontactno2)" placeholder="Enter Mobile Number"/>
                                    <label id="lblcontactno1"></label>
                                    <label id="lblcontactno2"></label>
                                    <span id="n0" class="error"></span>         
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <input type="submit" name="btnadd" id="save" value="Add" class="btn btn-gradient-primary me-2"/>
                                    <input type="submit" name="btncancel" id="cancel" value="Cancel" class="btn btn-gradient-primary me-2"/>
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
             <?php include("footer.php"); ?>     
            </div>
        </div>    
    </div>
  </form>
    <?php include("jslink.php"); ?>
</body>
</html>