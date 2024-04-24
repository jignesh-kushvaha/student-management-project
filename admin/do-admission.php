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
    <style>
        .form-group label{
            font-size:1.2rem;
        }
        .form-group select{
            font-size:0.9rem;
            height: 3rem;
            width: 100%;
            border-color: #0000001f;
            color: #000000b5;
        }
    </style>
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
         $grno=$_SESSION['regid']; 

         $query="select * from register where regid='$grno'";
         $rw=$dc->getRow($query);
         $username=$rw['username'];
         $firstname=$rw['firstname'];
         $middlename=$rw['middlename'];
         $lastname=$rw['lastname'];

         if(isset($_POST['btnadd']))
         {
            $admissiondate=date('y-m-d');
            $firstname=$_POST['txtfirstname'];
            $middlename=$_POST['txtmiddlename'];
            $lastname=$_POST['txtlastname'];
            $courseid=$_POST['lstcourse'];
            $division=$_POST['lstdivision'];
            $department=$_POST['lstdepartment'];
            $sem=$_POST['lstsem'];
            $deletestatus="no";
            $query1="insert into admission(admissiondate,grno,firstname,middlename,lastname,courseid,sem,division,department,deletestatus) values('$admissiondate','$grno','$firstname','$middlename','$lastname','$courseid','$sem','$division','$department','$deletestatus')"; 
            $result1=$dc->saveRecord($query1);
            //echo($query1);
            if($result1)
            {
                $query2="update register set status='y' where regid='$grno'";
                $result2=$dc->saveRecord($query2);
                $query3="insert into student(grno,firstname,middlename,lastname,deletestatus) values('$grno','$firstname','$middlename','$lastname','$deletestatus')";
                $result3=$dc->saveRecord($query3);
                $msg=" Admission Successful...";
                header('location:admission.php');
            }  
            else
            {
                $msg="Record Not Inserted";
            }
         }
         
        if(isset($_POST['btncancel']))
        {
            header('location:admission.php');
        }
    ?>

</head>
<body>
 <form name="frm" action="#" method="POST">       
  <div class="container-scroller">    
    <?php include("navbar.php"); ?>
    <div class="container-fluid page-body-wrapper">
        <?php include("sidebar.php"); ?>
     <div class="main-panel">
      <div class="content-wrapper">
       <div class="row" style="margin-top:2rem">
          <div class="col-md-1"></div>
          <div class="col-md-10 card">
            <div class="row">
              <div class="col-md-12">
                <center>
                 <u><h1>Student Admission</h1></u>
                </center>
              </div>
            </div>
            <div class="row" style="margin-top:1rem">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>GR. NO.</label>              
                        <input type="text" name="txtgrno"  class="form-control" placeholder="Enter General Register No." value="<?php echo($grno);?>" readonly/>
                        <span id="n0" class="error"></span>         
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>User Name</label>              
                        <input type="text" name="txtusername"  class="form-control" 
                        value="<?php echo($username);?>" readonly/>
                    </div>
                </div>    
            </div>    
            <div class="row">
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
                <div class="col-md-6">
                    <div class="form-group">
                        <label style="display:block">courses</label>
                        <select name="lstcourse">
                        <option>Select Courses</options>
                        <?php
                            $query3="select courseid,coursename from courses"; 
                            $tb=$dc->getTable($query3);
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
                 <div class="col-md-6">
                    <div class="form-group">
                        <label style="display:block">Division</label>
                        <select name="lstdivision" style="height:3rem;width:100%;border-color: #0000001f">
                        <option>Select Division</options>
                        <option value="A">A</options>
                        <option value="B">B</options>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label style="display:block">Department</label>
                        <select name="lstdepartment" style="height:3rem;width:100%;border-color: #0000001f">
                        <option>Select Department</options>
                        <option>Commerce</options>
                        <option>Science</options>
                        <option>Law</options>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label style="display:block">Semester</label>
                        <select name="lstsem" style="height:3rem;width:100%;border-color: #0000001f">
                        <option>Select Semester</options>
                        <option>1</options>
                        <option>2</options>
                        <option>3</options>
                        <option>4</options>
                        <option>5</options>
                        <option>6</options>
                        <option>7</options>
                        <option>8</options>
                        </select>
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