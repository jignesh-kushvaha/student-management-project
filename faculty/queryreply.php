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
        $queryid="";
        $querydate="";
        $problem="";
        $solution="";
        $status="";
        $grno="";
        $msg="";  
        $teachid=$_SESSION['regid']  
    ?>

    <?php
  
  
        if(isset($_POST['btnreply']))
        {
            $queryid=$_POST['btnreply'];
            $query="select * from query where queryid='$queryid'";
            $rw=$dc->getRow($query);
            $_SESSION['queryid']=$rw["queryid"];
            $problem=$rw["problem"];
        }
        
        if(isset($_POST['btnsubmit']))
        {
            $queryid=$_SESSION['queryid'];
            $solution=$_POST['txtreply'];
            $query="update query set solution='$solution',status='complete' where queryid='$queryid'";
          //  echo($query);
            $result=$dc->saveRecord($query);
            if($result)
            {
                $msg="Reply Submit successfully";
            }
            else
            {
                $msg="Reply not Submited";
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
                 <div class="col-md-8 card">
                    <div class="row" style="margin-bottom:10px">
                        <div class="col-md-12"><h3 style= "font-family:Comic Sans MS"><b><center>
                            <font color=Brown>Query Reply</font></h3>
                        </div>
                    </div>
                    <div class="row" >
                        <div class="col-md-12"> 
                        <table class='table table-bordered'>
                            <tr style='text-align:center;background-color:orange'>
                             <th>Id</th>
                             <th>Date</th>
                             <th>Name</th>
                             <th>Sem</th>
                             <th>Query Detail</th>
                             <th>Reply</th>
                            </tr>
                            <?php
                            $query="select queryid,querydate,problem,q.grno,q.teachid,s.middlename,a.sem from query q,student s,admission a where q.teachid=$teachid and q.grno=s.grno and a.grno=q.grno and status='pending'";
                            $tb=$dc->getTable($query);   				  
                            while($rw=mysqli_fetch_array($tb))
                            {
                                echo("<tr>");
                                echo("<td>".$rw['queryid']."</td>");
                                echo("<td>".date("d-m-Y", strtotime($rw['querydate']))."</td>");
                                echo("<td>".$rw['middlename']."</td>");
                                echo("<td>".$rw['sem']."</td>");
                                echo("<td>".$rw['problem']."</td>");
                                echo("<td><button class='btn btn-primary' type='submit' name='btnreply' 
                                value=".$rw['queryid'].">reply</button></td>");
                                echo("</tr>");
                            }
                            echo("<tr>");
                            echo("<td colspan='6'>".$msg."</td>");
                            echo("</tr>");
                            echo("</table>");
                            ?>
                        
                        </div>  
                    </div>
                    <?php   
                    if(isset($_POST['btnreply']))
                    {  
                    ?>
                    <div class="row" >
                    <div class="col-md-12"> 
                        <div class="form-group"><hr>
                        <label>Query Detail</label><br>
                        <label><?php echo($problem) ?></label>
                        </div>
                    </div>
                    </div>
                    <div class="row" >
                    <div class="col-md-12">
                    <div class="form-group">
                        <label>Query Reply</label>
                        <input type="text" class="form-control" name="txtreply" value='' placeholder="Enter reply" >
                    </div>
                    </div>
                    </div>
                    <div class="row" >
                    <div class="col-md-12"> 
                        <div class="form-group">
                            <input type="submit" class="btn btn-success" name="btnsubmit" value="Submit">
                            <input type="submit" class="btn btn-danger" name="btncancel" value="Cancel">
                        </div>
                    </div>
                    </div>
                    <?php
                    }
                    ?>
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