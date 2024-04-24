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
                          <div class="row">
                            <div class="col-md-12" style="height: 3rem;margin-top: 0.4rem;">
                                <h1>Show Attendance</h1>
                            </div>
                          </div>
                          <div class="row">
                           <div class="col-md-12" style="margin-bottom: 1rem;">
                            <table class="table table-bordered table-striped">
                                <tr style='text-align:center;background-color:orange'>
                                    <!-- <th>Gr. No.</th> -->
                                    <th>Date</th>
                                    <th>Student Name</th>
                                    <th>Subject</th>
                                    <th>Division</th>
                                    <th>Sem </th>
                                    <th>Attendance Status</th>
                                </tr>
                                <?php
                                    $query="select a.grno,a.subid,a.sem,a.courseid,a.division,attstatus,attdate,ad.firstname,ad.middlename,ad.lastname,sub.shortname from attendance a,admission ad,subject sub where a.grno='$grno' and ad.grno=a.grno and sub.subid=a.subid";
                                    $tb=$dc->getTable($query);
                                    while($rw=mysqli_fetch_array($tb))
                                    {
                                    
                                    echo("<tr>");
                                    //echo("<td>".$rw['grno']."</td>");
                                    echo("<td>".date("m-d-Y", strtotime($rw['attdate']))."</td>");
                                    echo("<td>".$rw['firstname'].' '.$rw['middlename'].' '.$rw['lastname']."</td>");
                                    echo("<td>".$rw['shortname']."</td>");
                                    echo("<td>".$rw['division']."</td>");
                                    echo("<td>".$rw['sem']."</td>");
                                    echo("<td>".$rw['attstatus']."</td>");
                                    echo("<tr>");
                                    }
                                ?>
                            </table>  
                           </div>
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