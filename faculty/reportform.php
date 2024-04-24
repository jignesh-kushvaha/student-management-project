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
        $grno="";
        $q="";
        $query="";
        $query1="";
        $query2="";
        $rw="";
        $rw1="";
        $rw2="";
        $tb1="";
        $tb2="";
        $teachid=$_SESSION['regid'];
    ?>
    <?php 
    if($_SESSION['trans']=='create')
    { 
        $grno=$_SESSION['grno'];
        $q="select * from admission where grno=$grno";
        $rw=$dc->getRow($q);
        $sem=$rw['sem'];
        $div=$rw['division'];
    }
    ?>
     <?php
        if(isset($_POST['btncreate']))
        {
            $reportdate=date('y-m-d');
            $month=$_SESSION['month'];
            $year=date("Y");
            $courseid=$_POST['lstcourse'];
            $sem=$_POST['txtsem'];
            $div=$_POST['txtdiv'];
            $totpresent=$_POST['txttotpresent'];
            
            $assignment=$_POST['lstassig'];

            $query="insert into progressreport(reportdate,month,year,teachid,grno,courseid,sem,division,totpresent,assignment) values('$reportdate','$month','$year','$teachid','$grno','$courseid','$sem','$div','$totpresent','$assignment')";
            $result=$dc->saveRecord($query);
            if($result)
            {
                $msg="Reported Created";
            }
            else
            {
                $msg="Reported Not Created";
            }
        }
        if(isset($_POST['btncancel']))
        {
            header('location:report.php');
        }
    ?>
    <script>
	  function checkerror()
		{
      var btn=document.activeElement.value;
      if(btn=="Update")
      {
        if(lblremark1.innerHTML!="" || lblremark2.innerHTML!="")
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
    .form-group select{
          font-size:0.9rem;
          height: 3rem;
          width: 100%;
          border-color: #0000001f;
          color: #000000b5;
      }
  </style>
</head>
<body>
 <form name="frm" action="" method="post" onSubmit="return checkerror()">
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
                        <div class="col-md-12">
                            <center>
                            <h1>Create Report</h1><hr>
                            </center>
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group col-md-4">
                         <label>Months</label>
                         <select name="lstmonth">
                          <option >January</option>
                          <option >Febuary</option>
                          <option >March</option>
                          <option >April</option>
                          <option >May</option>
                          <option >June</option>
                          <option >July</option>
                          <option >August</option>
                          <option >September</option>
                          <option >October</option>
                          <option >November</option>
                          <option >December</option>
                         </select>
                        </div>
                        <div class="form-group col-md-8" style="padding-top:1.5rem">
                         <input type="submit" name="btnshow" value="Show" class="btn btn-gradient-primary me-2"/>  
                        </div>     
                      </div>     
                      <?php
                      if(isset($_POST['btnshow']))
                      {
                      ?>  
                      <div class="row">
                        <div class="form-group col-md-3">
                         <label>Grno</label>
                         <input type="text" class="form-control" name="txtgrno" value="<?php echo($grno);?>" readonly/>
                        </div>     
                        <div class="form-group col-md-3">
                         <label>Sem</label>
                         <input type="text" class="form-control" name="txtsem" value="<?php echo($sem);?>" readonly/>
                        </div>   
                        <div class="form-group col-md-6">
                            <label>courses</label>
                            <select name="lstcourse" class="form-control"  style="height:3rem;color:black">
                            <?php
                                $query1="select c.courseid,t.courseid,coursename from courses c,teacher t where t.courseid=c.courseid and teachid='$teachid'"; 
                                $tb1=$dc->getTable($query1);
                                while($rw1=mysqli_fetch_array($tb1))
                                {
                                if($courseid==$rw1['courseid'])
                                {
                                    echo("<option selected value='".$rw1['courseid']."'>".$rw1['coursename']."</option>");
                                }
                                else
                                {
                                    echo("<option value='".$rw1['courseid']."'>".$rw1['coursename']."</option>");
                                }
                                }  
                            ?>
                            </select>
                       </div>  
                      </div>
                      <div class="row">
                       <div class="form-group col-md-4">
                            <label>Assignment Submitted</label>
                            <select name="lstassig">
                                <option>Select</option>
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                            </select>
                       </div> 
                       <div class="form-group col-md-4">
                        <label>Division</label>
                        <input type="text" class="form-control" name="txtdiv" value="<?php echo($div);?>" readonly/>
                       </div>  
                        <?php 
                            $month=$_POST['lstmonth'];
                            $_SESSION['month']=$month;
                            $tot=0;
                            $present=0;
                            $query2="select * from attendance where grno='$grno'";
                            $tb2=$dc->getTable($query2);
                            
                            while($rw2=mysqli_fetch_array($tb2))
                            {
                             if($month==date("F", strtotime($rw2['attdate'])))
                             {
                                if($rw2['attstatus']=="Present")
                                {
                                    $present=$present + 1;
                                }
                                $tot=$tot + 1;
                             }
                            }
                        ?>
                       <div class="form-group col-md-4">
                        <label>Total Present</label>
                        <input type="text" class="form-control" name="txttotpresent" value="<?php echo($present);?>" readonly/>
                       </div> 
                      </div>       
                      <div class="row">
                        <div class="form-group col-md-12">
                         <label>Remark</label>
                         <textarea class="form-control" name="txtremark" rows="3" cols="10" placeholder="Enter Remark.." autofocus onchange="onlyalpha(this,lblremark1)" onblur="checkblank(this,lblremark2)"></textarea>
                        <label id="lblremark1"></label>
                        <label id="lblremark2"></label>
                        </div>     
                      </div>     
                      <div class="row">
                        <div class="form-group col-md-12">
                        <input type="submit" name="btncreate" id="create" value="Create" class="btn btn-gradient-primary me-2"/> 
                        <input type="submit" name="btncancel" id="cancel" value="Cancel" class="btn btn-gradient-primary me-2"/> 
                        </div>     
                      </div>  
                      <?php }?>
                      <div class="row">
                        <div class="form-group col-md-12">
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