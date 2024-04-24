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
        $contactid="";
        $contactdate="";
        $personname="";
        $contactno="";
        $emailid="";
        $detail="";
        $msg="";
        $dc=new DataClass();
    ?>
    <?php
        if(isset($_POST['btnreply']))
        {
        $contactid=$_POST['btnreply'];	
        $query="update contact set reply='yes' where contactid='$contactid'";
        $result=$dc->saveRecord($query);   
        if($result)
        {
            $msg="Reply To contact Person..";  
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
                  <div class="row" style="margin-top: 2rem;">
                    <div class="col-md-1"></div>
                    <div class="col-md-10 card" style="padding-bottom: 2rem;">
                      <div class="row">
                        <div class="col-md-12" style="margin-bottom: 1rem;">
                            <center>
                            <h1>Reply Contact Query</h1>
                            </center>
                        </div>
                      </div>
                      <div class="row" >
                       <div class="col-md-12">
                        <table class='table table-bordered'>
                          <tr style='text-align:center;background-color:orange'>
                                <th>ID</th>
                                <th>Date</th>
                                <th>Preson Name</th>
                                <th>Contact No</th>
                                <th>Email Address</th>
                                <th>Detail</th>
                                <th>Reply</th>
                          </tr>
                          <?php
                                $query="select contactid,contactdate,personname,contactno,emailid,detail,reply from contact where reply='no'";
                                $tb=$dc->getTable($query);   	
                                $no=0;			  
                                while($rw=mysqli_fetch_array($tb))
                                {
                                  echo("<tr>");
                                  echo("<td>".$rw['contactid']."</td>");
                                  echo("<td>".$rw['contactdate']."</td>");
                                  echo("<td>".$rw['personname']."</td>");
                                  echo("<td>".$rw['contactno']."</td>");
                                  echo("<td>".$rw['emailid']."</td>");
                                  echo("<td>".$rw['detail']."</td>");
                                  echo("<td><button class='btn btn-success' type='submit' name='btnreply' value=".$rw['contactid'].">Reply</button></td>");
                                  echo("</tr>");
                                  $no=$no+1; 
                                }
                                if($no == 0)
                                {
                                  echo("<tr><td colspan='5'><h1>No Contact Query Pending</h1></td></tr>");
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