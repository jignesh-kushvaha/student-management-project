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
        $query1="";
        $query="";
        $msg="";
        $grno=$_SESSION['regid'];
    ?>

    <?php 
    if(isset($_POST['btnsubmit']))
    {
        $leavedt=date('y-m-d');
        $reason=$_POST['txtreason'];
        $startdt = date("y-m-d", strtotime($_POST['txtstartdate']));
        $enddt = date("y-m-d", strtotime($_POST['txtenddate']));
        $status="pending";

        $query="select * from teacher where desig='HOD'";
        $rw=$dc->getRow($query);
        $teachid=$rw['teachid'];

        $query1="insert into leaveapp(leavedt,grno,reason,startdt,enddt,status,teachid) values('$leavedt','$grno','$reason','$startdt','$enddt','$status','$teachid')";
        $result=$dc->saveRecord($query1);
        if($result)
        {
            $msg="Leave Send Successfully";
        }
        else
        {
            $msg="Leave Not Send";
        }
    }
    ?>
     <script>
	    function checkerror()
		{
		  if(txtreason1.innerHTML!="" || txtreason2.innerHTML!="" )
		  {
		    return false;
		  }
		  else
		  {
		    return true;
		  }
             			  
		}
	</script>
    
</head>
<body>
 <form name="frm" action="" method="post"  onSubmit="return checkerror()">
    <div class="container-scroller">
     <?php include("navbar.php"); ?>
        <div class="container-fluid page-body-wrapper">
            <?php include("sidebar2.php"); ?>
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row" style="margin-bottom: 2rem;">
                        <div class="col-md-2"></div>
                        <div class="col-md-8 card">
                            <div class="row">
                                <div class="col-md-12">
                                    <center>
                                        <h1>Leave Application</h1>
                                    </center>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Reason For Leave</label>              
                                        <textarea class="form-control" name="txtreason" rows="10" cols="100" autofocus onchange="onlyalphanumeric(this,txtreason1)" onblur="checkblank(this,txtreason2)"></textarea>  
                                        <label id="txtreason1"></label>    
                                        <label id="txtreason2"></label>     
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Start Date</label>              
                                        <input type="date" name="txtstartdate"  class="form-control" placeholder="">
                                        <span id="n0" class="error"></span>         
                                    </div> 
                                </div> 
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>End Date</label>              
                                        <input type="date" name="txtenddate"  class="form-control" placeholder="">
                                        <span id="n0" class="error"></span>  
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">                                    
                                    <div class="form-group">
                                        <input type="submit" name="btnsubmit" value="Submit" class="btn btn-gradient-primary me-2"/>
                                        <span id="n0" class="error">
                                        </span>         
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">                                    
                                    <div class="form-group">
                                        <span><?php echo($msg); ?></span>         
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-bottom:2rem"> 		
							 <div class="col-md-12">			   
								<?php
									$query1="select * from leaveapp where grno='$grno'";
									$tb=$dc->getTable($query1);
									while($rw=mysqli_fetch_array($tb))
									{
                                    echo("<table class='table table-bordered'>");			  
									echo("<tr><td colspan='3' width='100px'><h3>View Status</h3></td></tr>");
                                    echo("<tr><td width='100px'>Leave Status</td>");
									echo("<td>".date("d-m-Y", strtotime($rw["leavedt"]))."</td></tr>");
                                    echo("<tr><td width='100px'>Leave</td>");
									echo("<td>From ".date("d-m-Y", strtotime($rw["startdt"]))." to ".date("d-m-Y", strtotime($rw["enddt"]))."</td></tr>");
									echo("<tr><td width='100px'>Leave Status</td>");
									if($rw["status"]=='pending')
										echo("<td>Pending</td>");
									else
										echo("<td>".$rw["status"]."</td>");
									echo("</table>"); 
									}
								?>
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