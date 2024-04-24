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
        $grno=$_SESSION['regid'];
    ?>
    <style>
      .table td{
        font-size:1rem;
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
                    <div class="col-md-12 card">
                      <div class="row">
                        <div class="col-md-12" style="height: 3rem;margin-top: 0.4rem;text-align:center">
                            <u><h1>Show Reports</h1></u>
                        </div>
                      </div>
                      <!-- <div class="row">
                        <div class="col-md-12" style="margin-bottom: 1rem;">
                        <table class="table table-bordered">
                            <tr>
                            <th>Gr. No.</th>
                            <th>Date</th>
                            <th>Student Name</th>
                            <th>Month</th>
                            <th>Sem </th>
                            <th>Division</th>
                            <th>Total Present</th>
                            
                            <th>Assignment Submited</th>
                            </tr>
                            <?php
                            // $query="select r.grno,r.reportdate,r.month,r.sem,r.division,totpresent,r.assignment,ad.grno,ad.firstname,ad.middlename,ad.lastname from progressreport r,admission ad where ad.grno=r.grno and r.grno='$grno'";
                            // $tb=$dc->getTable($query);
                            // while($rw=mysqli_fetch_array($tb))
                            // {
                            
                            //     echo("<tr>");
                            //     echo("<td>".$rw['grno']."</td>");
                            //     echo("<td>".date("m-d-Y", strtotime($rw['reportdate']))."</td>");
                            //     echo("<td>".$rw['firstname'].' '.$rw['middlename'].' '.$rw['lastname']."</td>");
                            //     echo("<td>".$rw['month']."</td>");
                            //     echo("<td>".$rw['sem']."</td>");
                            //     echo("<td>".$rw['division']."</td>");
                            //     echo("<td>".$rw['totpresent']."</td>");
                            //     
                            //     echo("<td>".$rw['assignment']."</td>");
                            //     echo("<tr>");
                            // }
                            ?>
                        </table>  
                        </div>
                      </div> -->

                      <div class='row'>
                        <?php
                            $query="select r.grno,r.reportdate,r.month,r.sem,r.division,totpresent,r.assignment,ad.grno,ad.firstname,ad.middlename,ad.lastname from progressreport r,admission ad where ad.grno=r.grno and r.grno='$grno'";
                            $tb=$dc->getTable($query);
                            $rno=0;
                            while($rw=mysqli_fetch_array($tb))
                            {
                              echo("<div class='col-md-4 mb-4' style='margin-top:1rem'>");
                              echo("<table class='table table-bordered table-striped'>");
                              echo("<tr><td colspan=2 style='text-align:center;background-color:orange;font-weight:bold'>".$rw['month']."</td></tr>");
                              echo("<tr><td>GR. NO.</td><td>".$rw['grno']."</td></tr>");
                              echo("<tr><td>Name</td><td>".$rw['firstname'].' '.$rw['middlename'].' '.$rw['lastname']."</td></tr>");
                              echo("<tr><td>Semester</td><td>".$rw['sem']."</td></tr>");
                              echo("<tr><td>Total Present</td><td>".$rw['totpresent']."</td></tr>");
                              
                              echo("<tr><td>Assignment Status</td><td>".$rw['assignment']."</td></tr>");
                              
                              echo("</table>");
                              echo("</div>");
                            }
                        ?>
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