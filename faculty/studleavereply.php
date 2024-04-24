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
    
        $leaveid="";
        $leavedt="";
        $reason="";
        $status="";
        $grno="";
        $msg=""; 
        $teachid=""; 
    
    ?>

    <?php
    
    
        if(isset($_POST['btnaccept']))
        {
            $leaveid=$_POST['btnaccept'];
            //echo($leaveid);
            $query= "update leaveapp set status='Accepted' where leaveid='$leaveid'";
            
            $result=$dc->saveRecord($query);
            if($result)
            {
                $msg="Leave Accepted";
            }
        }
        if(isset($_POST['btndeny']))
        {
            $leaveid=$_POST['btndeny'];
            //echo($leaveid);
            $query= "update leaveapp set status='Denied' where leaveid='$leaveid'";
            
            $result=$dc->saveRecord($query);
            if($result)
            {
                $msg="Leave Denied";
            }
        }
    ?>
</head>
<body>
 <form name="frm" action="" method="post">
    <div class="container-scroller">
     <?php include("navbar.php"); ?>
        <div class="container-fluid page-body-wrapper">
            <?php include("sidebar.php"); ?>
            <div class="main-panel">
              <div class="content-wrapper">
               <div class="row">
                  <div class="col-md-1"></div>
				  <div class="col-md-10 card">
                    <div class="row" style="margin-bottom:10px">
                        <div class="col-md-12">
                            <h3 style= "font-family:Comic Sans MS;text-align:center"><b>
                            <font color=Brown>Leave Reply</font></b>
                            </h3>
                        </div>
                    </div>
                    <div class="row" >
                        <div class="col-md-12">
                            <table class='table table-bordered'>
                            <tr>
                                <th>Id</th>
                                <th>Date</th>
                                <th>Name</th>
                                <th>Sem</th>
                                <th>Leave Detail</th>
                                <th>Reply</th>
                            </tr> 
                            <?php                            
                            $query="select leaveid,leavedt,reason,l.grno,s.middlename,a.sem from leaveapp l,student s,admission a where l.grno=s.grno and a.grno=l.grno and status='pending'";
                            $tb=$dc->getTable($query);   				  
                            while($rw=mysqli_fetch_array($tb))
                            {
                                echo("<tr>");
                                echo("<td>".$rw['leaveid']."</td>");
                                echo("<td>".$rw['leavedt']."</td>");
                                echo("<td>".$rw['middlename']."</td>");
                                echo("<td>".$rw['sem']."</td>");
                                echo("<td>".$rw['reason']."</td>");
                                echo("<td><button class='btn btn-success' type='submit' name='btnaccept' 
                                value=".$rw['leaveid'].">Accept</button></td>");
                                echo("<td><button class='btn btn-danger' type='submit' name='btndeny' 
                                value=".$rw['leaveid'].">Deny</button></td>");
                                echo("</tr>");
                                
                            }
                            echo("<tr>");
                            echo("<td colspan='6'>".$msg."</td>");
                            echo("</tr>");
                            echo("</table>");
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