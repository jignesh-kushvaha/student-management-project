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
        $query1="";
        $query2="";
        $msg="";
        $admissiondate="";
        $firstname="";
        $middlename="";
        $lastname="";
        $courseid="";
        $division="";
        $department="";
    ?>
    <?php
         $teachid=$_SESSION['regid'];
         $query="select * from register where regid='$teachid'";
         $rw=$dc->getRow($query);
         $username=$rw['username'];
         $firstname=$rw['firstname'];
         $middlename=$rw['middlename'];
         $lastname=$rw['lastname']; 

         if(isset($_POST['btnadd']))
         {
            
            $firstname=$_POST['txtfirstname'];
            $middlename=$_POST['txtmiddlename'];
            $lastname=$_POST['txtlastname'];
            $joindate=$_POST['txtdate'];
            $department=$_POST['lstdepartment'];
            $courseid=$_POST['lstcourse'];
            $desig=$_POST['txtdesig'];
            $deletestatus="no";
            $query1="insert into teacher(teachid,firstname,middlename,lastname,joindate,department,courseid,desig,deletestatus) values('$teachid','$firstname','$middlename','$lastname','$joindate','$department','$courseid','$desig','$deletestatus')"; 
            $result1=$dc->saveRecord($query1);

            if($result1)
            {
                $query2="update register set status='y' where regid='$teachid'";
                $result2=$dc->saveRecord($query2);
                $msg=" Admission Successful...";
                header('location:addfacultyinfo.php');
            }  
            else
            {
                $msg="Record Not Inserted";
            }
         }
         
        if(isset($_POST['btncancel']))
        {
            header('location:addfacultyinfo.php');
        }
    ?>  
    <script>
	  function checkerror()
	  {
        var btn=document.activeElement.value;
        if(btn=="Add")
        {
		  if(lbldesignation1.innerHTML!="" || lbldesignation2.innerHTML!="")
		  {
		    return false;
		  }
		  else
		  {
		    return true;
		  }
        }
        if(btn=="cancel")
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
            border-radius: 0.4rem;
            padding:0.2rem;
        }
    </style>
</head>
<body>
 <form name="frm" action="#" method="POST" onSubmit="return checkerror()">       
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
                 <u><h1>Add Teacher Info.</h1></u>
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
                        <input type="text" name="txtlastname"  class="form-control" value="<?php echo($lastname);?>" readonly/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>User Name</label>              
                        <input type="text" name="txtusername"  class="form-control" 
                        value="<?php echo($username);?>" readonly/>
                    </div>
                </div>    
            </div>   
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Join Date</label>
                        <input type="date" name="txtdate"  class="form-control" />
                    </div>  
                </div>  
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label style="display:block">Department</label>
                        <select name="lstdepartment" style="height:2.5rem;width:100%">
                        <option>Select Department</options>
                        <option>Commerce</options>
                        <option>Science</options>
                        <option>Law</options>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label style="display:block">courses</label>
                    <select name="lstcourse" style="height:2.5rem;width:100%">
                        <?php
                            $query1="select courseid,coursename from courses"; 
                            $tb=$dc->getTable($query1);
                            while($rw=mysqli_fetch_array($tb))
                            {
                            if($courseid==$rw['courseid'])
                            {
                                echo("<option selected value='".$rw['courseid']."'>".$rw['coursename']."</option>");
                            }
                            else
                            {
                                echo("<option value='".$rw['courseid']."'>".$rw['coursename']."</option>");
                            }
                            }  
                        ?>
                    </select>
                  </div>    
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Designation</label>              
                        <input type="text" name="txtdesig"  class="form-control" placeholder="Enter Designation" autofocus onchange="onlyalpha(this,lbldesignation1)" onblur="checkblank(this,lbldesignation2)"/>
                        <label id="lbldesignation1"></label>
                        <label id="lbldesignation2"></label>
                    </div>
                </div>    
            </div>   
            <div class="row">
                    <div class="form-group" style="margin-top:1rem">
                        <input type="submit" name="btnadd" value="Add" class="btn btn-gradient-primary me-2"/>
                        <input type="submit" name="btncancel" value="cancel" class="btn btn-gradient-danger me-2"/>
                        <span id="n0" class="error">
                            <?php echo($msg); ?>
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
    </div>
  </div>
 </form>
    <?php include("jslink.php"); ?>
</body>
</html>