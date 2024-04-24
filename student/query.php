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
        $query1="";
        $queryid="";
        $querydate="";
        $problem="";
        $solution="";
        $status="";
        $grno="";
        $msg="";
    ?>
 
  
  <?php
		if(isset($_POST['btnsubmit']))
	{
	      $grno=$_SESSION['regid'];
		  $querydate=date('y-m-d');
		  $problem=$_POST['txtproblem'];
		  $teachid=$_POST['lstteacher'];
		  $status="pending";
		  		  
		 $query="insert into query(querydate,problem,status,grno,teachid) values('$querydate','$problem','$status','$grno','$teachid')";
		// echo($query); 
      	 $result=$dc->saveRecord($query);
	     if($result)
	     {
		   $msg="Query Submit successfully";
		 }
		 else
		 {
		   $msg="Query not Submited";
		 }
		 
		 
	 }	 	
	if(isset($_POST['btncancel']))
	{
	   header('location:studenthome.php');
	}	
  ?> 
	<script>
	 function checkerror()
	 {
		if(txtproblem1.innerHTML!="" || txtproblem2.innerHTML!="" )
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
    </style>
</head>
<body>
 <form name="frm" action="" method="post" enctype="multipart/form-data" onSubmit="return checkerror()">
    <div class="container-scroller">
     <?php include("navbar.php"); ?>
        <div class="container-fluid page-body-wrapper">
            <?php include("sidebar2.php"); ?>
            <div class="main-panel">
             <div class="content-wrapper">
				<div class="row">
					<div class="col-md-2"></div>
					<div class="col-md-7 card">
					  <div class="row" style="margin-top:1rem;text-align:center;font-size:35px">
					  	<div class="col-md-12"><u>Query Pannel</u></div>
					  </div>
					  <div class="row" style="margin-top:2rem">
						<div class="col-md-12"> 
							<div class="form-group">
								<label>Query</label>
								<input type="text" class="form-control" name="txtproblem" value="" placeholder="Enter Qury" autofocus onchange="onlyalphanumeric(this,txtproblem1)" onblur="checkblank(this,txtproblem2)"/>
								<label id="txtproblem1"></label>
								<label id="txtproblem2"></label>
							</div>				
						</div>				
					  </div>				
					  <div class="row">
						<div class="col-md-12"> 
							<div class="form-group">
								<label>Faculty</label>
                                <select name="lstteacher">
								<option>Select Faculty</option>
								<?php
									$query1="select * from teacher";
									$tb1=$dc->getTable($query1);
									while($rw=mysqli_fetch_array($tb1))
                                    {
                                        echo("<option value='".$rw['teachid']."'>".$rw['middlename']." ".$rw['firstname']."</option>");
                                    }
								?>
								</select>
							</div>				
						</div>				
					  </div>				
					  <div class="row">
						<div class="form-group">
							<input type="submit" class="btn btn-success" name="btnsubmit" value="Submit">
							<input type="submit" class="btn btn-danger" name="btncancel" value="Cancel">
						</div>
						<div class="form-group">
							<label name="lblmsg"> <?php echo($msg) ?></label>
						</div>
					  </div>
					  <div class="row">
						<div class="col-md-5"><H3 class='heading1'>SOLUTION</H3> </div>
					  </div> 
					  <div class="row" style="margin-bottom:2rem"> 		
						<div class="col-md-12"> 			   
							<?php
								$grno=$_SESSION['regid'];
								$query="select * from query where grno='$grno'";
								$tb=$dc->getTable($query);
								while($rw=mysqli_fetch_array($tb))
								{
								echo("<table class='table table-bordered'>");			  
								echo("<tr><td width='100px'>Qeury</td>");
								echo("<td>".$rw["problem"]."</td></tr>");
								echo("<tr><td width='100px'>Solution</td>");
								if($rw["status"]=='pending')
									echo("<td>Pending</td></tr>");
								else
									echo("<td>".$rw["solution"]."</td></tr>");
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