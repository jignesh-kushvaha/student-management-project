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
        $teachid=$_SESSION['regid'];
    ?>

    <?php
        
        if(isset($_POST['btnupload']))
        {
            
            $courseid=$_POST['lstcourse'];
            $subid=$_POST['lstsub'];
            $sem=$_POST['lstsem'];
            $image=$_FILES['fileimage']['name'];
            //$tmpimage=$_FILES['fileimage']['tmp_name'];
            $notesby=$teachid;

            $query="insert into notes(courseid,subid,sem,image,notesby) values('$courseid','$subid','$sem','$image','$notesby')";

            $result=$dc->saveRecord($query);
            if($result)
            {
                move_uploaded_file($tmpimage,"../notesfile/".$image); 
               $msg="Notes Uploaded Successfully";
            }  
            else
            {
                $msg="Notes Not Uploaded Successfully";
            }
        }
    ?>
    <script>
	    function checkerror()
		{
		  if(lblfile1.innerHTML!="" || lblfile2.innerHTML!="" )
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
        select{
            height:2.5rem;
            width:100%;
            border-color: #00000040;
            color:#00000091;
            border-radius: 0.4rem;
            padding:0.2rem;
        }
        .form-group label{
            font-size: 1.2rem;
        }
    </style>
</head>
<body>
 <form name="frm" action="" method="post" enctype="multipart/form-data" onsubmit="return checkerror()">
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
                                <div class="col-md-12" style="height:3rem;margin-top: 0.4rem;text-align:center">
                                    <h1><u>Upload Notes </u></h1>
                                </div>
                            </div>
                            <div class="row"  style="margin-top:1rem">
                                <div class="form-group col-md-12">
                                    <label>Cousres</label>
                                    <select  name="lstcourse">
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
                                    <label>Subject</label>
                                    <select  name="lstsub">
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
                                <div class="form-group col-md-12">
                                    <label>Semester</label>
                                    <select  name="lstsem">
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
                                <div class="form-group col-md-6">
                                    <label>Files</label>              
                                    <input type="file" name="fileimage" class="form-control" onchange="fileValidation(this,lblfile1)" autofocus onblur="checkblank(this,lblfile2)"  />
                                    <label id="lblfile1"></label>
                                    <label id="lblfile2"></label>
                                </div>
                            </div>
                            <div class="row">
                              <div class="form-group">
                                <input type="submit" name="btnupload" value="Upload" class="btn btn-gradient-primary me-2"/>
                              </div>
                            </div>
                            <div class="row">
                              <div class="form-group">
                                <label> <?php echo($msg) ?></label>
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