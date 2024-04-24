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
        $msg="";
    
        $leaveid="";
        $leavedt="";
        $reason="";
        $status="";
        $teachid="";
        $msg=""; 
    ?>

    <?php
        
        
        if(isset($_POST['btnaccept']))
        {
            $leaveid=$_POST['btnaccept'];
            //echo($leaveid);
            $query= "update teachleave set status='Accepted' where leaveid='$leaveid'";
            
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
            $query= "update teachleave set status='Denied' where leaveid='$leaveid'";
            
            $result=$dc->saveRecord($query);
            if($result)
            {
                $msg="Leave Denied";
            }
        }
        
    ?>

    </head>
    <body>
      <form name="frm" action="#" method="post">
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
                            <div class="col-md-8"><h3 style= "font-family:Comic Sans MS"><b><center>
                                <font color=Brown>Faculty Leave Reply</font></h3>
                            </div>
                        </div>
                        <div class="row" >
                            <div class="col-md-12"> 
                                <?php
                                echo("<table class='table table-bordered table-striped'>");
                                echo("<tr style='text-align:center;background-color:orange'>");
                                echo("<th>Name</th><th>Date</th><th>Leave Reason</th><th>Accept</th><th>Deny</th>");
                                $query="select leaveid,leavedt,l.teachid,t.teachid,t.middlename,t.firstname,reason from teachleave l,teacher t where status='pending' and t.teachid=l.teachid";
                                $tb=$dc->getTable($query);   				  
                                while($rw=mysqli_fetch_array($tb))
                                {
                                    echo("<tr>");
                                    echo("<td>".$rw['middlename']." ".$rw['firstname']."</td>");
                                    echo("<td>".date("d-m-Y", strtotime($rw['leavedt']))."</td>");
                                    echo("<td>".$rw['reason']."</td>");
                                    echo("<td style='text-align:center'><button class='btn btn-success' type='submit' name='btnaccept' 
                                    value=".$rw['leaveid'].">Accept</button></td>");
                                    echo("<td style='text-align:center'><button class='btn btn-danger' type='submit' name='btndeny' 
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