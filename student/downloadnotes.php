<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Layout</title>

    <?php 
        include("csslink.php");
        include("../class/dataclass.php");
        session_start();
    ?>
    <?php 
        $dc=new dataclass();
        $query="";
        $query5="";
        $msg="";
        $grno=$_SESSION['regid'];
        $subid="";
        $notesid="";
        $filename="";
    ?>

<?php
    
    if(isset($_POST['btndownload']))
	{
	  $notesid=$_POST['btndownload'];	
	  $query5="select image from notes where notesid='$notesid'";
      $rw=$dc->getRow($query5);
	  $filename=$rw['image'];
	  $filepath="../notesfile/".$filename;
      if(file_exists($filepath))
	  {
	   header('Content-Description: File Transfer');
	   header('Content-Type:application/octet-stream');
	   header('Content-Disposition: attachment;filename='.basename($filepath));
	   header('Expires:0');
	   header('Cache-Control: must-revalidate');
	   header('Pragma:public');
	   header('Content-Length:'.filesize($filepath));
	   if(readfile($filepath))
	   {
	     $msg="File download Successfully..."; 
	   }
	   else
	   {
	     $msg="Error in downloading..."; 
	   }	   
	  }
	  
	}
?>
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
 <form name="frm" action="" method="post">
    <div class="container-scroller">
     <?php include("navbar.php"); ?>
        <div class="container-fluid page-body-wrapper">
          <?php include("sidebar2.php"); ?>
          <div class="main-panel">
            <div class="content-wrapper">
              <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-7 card">
                    <div class="row">
                        <div class="col-md-12" style="height:3rem;margin-top: 0.4rem;text-align:center">
                            <h1>Download Notes</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Subject</label>
                            <select name="lstsub">
                            <?php
                            $q1="select s.subname,s.subid,a.courseid,a.grno from subject s,admission a where a.grno='$grno' and s.courseid=a.courseid"; 
                            $tb=$dc->getTable($q1);
                                while($rw=mysqli_fetch_array($tb))
                                {
                                    echo("<option value='".$rw['subid']."'>".$rw['subname']."</option>");
                                }      
                            ?>
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <button type="submit" class="btn btn-primary" name="btnshow" style="padding: 1rem;margin-top: 1.3rem">Show</button>
                        </div>
                    </div>  

                    <div class="row">
                     <div class="form-group col-md-6">
                        <?php 
                        if(isset($_POST['btnshow']))
                        {
                        ?>
                      <table class="table table-bordered table-striped">
                        <tr style='text-align:center;background-color:orange'>
                            <th>Subject Name</th>
                            <th>File Name</th>
                            <th>Download</th>
                        </tr>
                       <?php   
                            $subid=$_POST['lstsub'];
                            
                            $query="select n.notesid,s.subname,image from notes n,subject s where n.subid =$subid and s.subid=$subid";
                            $tb=$dc->gettable($query);
                            while($rw=mysqli_fetch_array($tb))
                            {
                                echo("<tr>");
                                echo("<td>" . $rw['subname'] . "</td>");
                                echo("<td>" . $rw['image'] . "</td>");
                                echo("<td> <button name='btndownload' class='btn btn-gradient-primary me-2' value='".$rw['notesid']."'>Download</buuton></td>");
                                echo("</tr>");
                            }
                        }
                       ?>
                      </table>
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