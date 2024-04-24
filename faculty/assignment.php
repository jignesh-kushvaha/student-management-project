<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculty Layout</title>

    <?php 
        include("csslink.php");
        include("../class/dataclass.php");
        session_start();
    ?>
    <?php 
        $dc=new dataclass();
        $query="";
        $msg="";
        $courseid="";
        $subid="";
        $sem="";
        $image="";
        $tmpimage="";
        $submitdate="";
        $assignmentdate="";
        $teachid=$_SESSION['regid'];
    ?>

    <?php
         if(isset($_POST['btnupload']))
         {       
            $courseid=$_POST['lstcourse'];
            $assignmentdate=date('y-m-d');
            $sem=$_POST['lstsem'];
            $subid=$_POST['lstsub'];
            $submitdate = date("y-m-d", strtotime($_POST['txtdate']));
            $image=$_FILES['fileimage']['name'];
            $tmpimage=$_FILES['fileimage']['tmp_name'];
            // echo($tmpimage);
            // echo($image);
            // echo($courseid);
            $assignmentby=$teachid;
    
            $query="insert into assignment(courseid,assignmentdate,sem,subid,submitdate,image,assignmentby) values('$courseid','$assignmentdate','$sem ','$subid','$submitdate','$image','$assignmentby')";
            
            $result=$dc->saveRecord($query);
            if($result)
            {
               move_uploaded_file($tmpimage,"../assignmentfile/".$image); 
                $msg="Assignment Uploaded";
            }  
            else
            {
                $msg="Assignment Not Uploaded";
            }
        }
        if(isset($_POST['btncancel']))
        {
            header('location:showprofile.php');
        }
    ?>
    <style>
        select{
            height:2.5rem;
            width:100%;
            border-color: #00000040;
            color:#00000080;
            border-radius: 0.4rem;
        }
    </style>
    <script>
	  function checkerror()
		{
		  if(lblfile1.innerHTML!="" || lblfile2.innerHTML!="" || txtsdate.innerHTML!="")
		  {
		    return false;
		  }
		  else
		  {
		    return true;
		  }
             			  
		}
	</script>
  <style>
    .error{
        color:red;
    }
  </style>
</head>
<body>
 <form name="frm" action="#" method="post" enctype="multipart/form-data" onsubmit="return checkerror()">
    <div class="container-scroller">
     <?php include("navbar.php"); ?>
        <div class="container-fluid page-body-wrapper">
            <?php include("sidebar.php"); ?>
            <div class="main-panel">
              <div class="content-wrapper">
                <div class="row">
                  <div class="col-md-2"></div>
                  <div class="col-md-7 card">
                    <div class="row">
                        <div class="col-md-12" style="height: 3rem;margin-top: 1rem;">
                            <h1><u>Upload Assignment</u></h1>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 1rem;">
                     <div class="form-group col-md-12">
                        <label>Cousres</label>
                        <select name="lstcourse">
                            <?php
                            $query1="select c.courseid,c.coursename from courses c,teacher t where t.courseid=c.courseid and teachid='$teachid'"; 
                            $tb=$dc->getTable($query1);
                            while($rw=mysqli_fetch_array($tb))
                            {
                                echo("<option value='".$rw['courseid']."'>".$rw['coursename']."</option>");
                            } 
                            ?>
                        </select>
                     </div>
                    </div>
                    <div class="row">
                     <div class="form-group col-md-12">
                        <label>Semester</label>
                        <select name="lstsem">
                            <option value="1">1 sem</option>
                            <option value="2">2 sem</option>
                            <option value="3">3 sem</option>
                            <option value="4">4 sem</option>
                            <option value="5">5 sem</option>
                            <option value="6">6 sem</option>
                            <option value="7">7 sem</option>
                            <option value="8">8 sem</option>
                        </select>
                     </div>
                    </div>
                    <div class="row">
                     <div class="form-group col-md-12">
                        <label>Subject</label>
                        <select name="lstsub">
                        <?php
                        $q1="select s.subid,s.courseid,s.subname,t.courseid from subject s,teacher t where teachid='$teachid' and s.courseid=t.courseid";
                        $tb=$dc->getTable($q1);
                        while($rw=mysqli_fetch_array($tb))
                        {
                            echo("<option value='".$rw['subid']."'>".$rw['subname']."</option>");
                        }     
                        ?>                        
                        </select>
                     </div>
                    </div>
                    <div class="row">
                     <div class="form-group  col-md-3">
                        <label>Last Submit Date</label>              
                        <input type="date" name="txtdate" class="form-control" autofocus onchange="checkdate(this,txtsdate)" />
                        <label class='error' id="txtsdate"></label>  
                     </div>
                     <div class="form-group  col-md-7">
                        <label>Files</label>              
                        <input type="file" name="fileimage" class="form-control"  onchange="fileValidation(this,lblfile1)" autofocus onblur="checkblank(this,lblfile2)" />
                        <label class='error' id="lblfile1"></label>
                        <label class='error' id="lblfile2"></label>
                     </div>
                    </div>
                    <div class="row">
                      <div class="form-group">
                        <input type="submit" name="btnupload" value="Upload" class="btn btn-gradient-primary me-2"/>  
                      </div>
                    </div>
                    <div class="row">
                    <div class="form-group  col-md-7">
                        <label><?php echo($msg); ?></label>              
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