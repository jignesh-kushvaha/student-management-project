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
    ?>
    <?php 
        if(isset($_POST['btnnew']))
        {
            header('location:registration.php');
        }
        if(isset($_POST['btndelete']))
        {
            $grno=$_POST['btndelete'];
            $query="update admission set deletestatus='yes' where grno='$grno'";
            $result=$dc->saveRecord($query);
            if($result)
            {
                $query2="update student set deletestatus='yes' where grno='$grno'";
                $result2=$dc->saveRecord($query2);
                 $msg="Record Deleted Successfully...";
                //echo '<script>alert("Record Deleted Successfully...")</script>';
            }  
            else
            {
                $msg="Record Not Deleted";
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
                 <div class="row" style="margin-top:0rem">
                    <!-- <div class="col-md-2"></div> -->
                    <div class="col-md-12 card">
                        <div class="row">
                            <div class="col-md-12" style="height: 3rem">
                                <center>
                                <h1><u>Show Students </u></h1>
                                </center>
                            </div>
                            
                        </div>
                        <div class="row" style="margin-top:1rem">
                          <div class="form-group col-md-3">
                            <input class="form-control" type="text" id="myInput" onkeyup="myFunction()" placeholder="Search By Name" style='color:black;border-color:black;border-radius:0.5rem'>
                          </div>  
                          <div class="col-md-5"></div>
                          <div class="col-md-4" style="height: 3rem">
                                <center>
                                <h5 style="color:red"><?php echo($msg); ?></h5>
                                </center>
                            </div>
                        </div>
                        <div class="row">
                            <table class="table table-bordered table-striped" id="myTable">
                            <thead>
                                <tr style='text-align:center;background-color:orange'>
                                    <th>GR. NO.</th>
                                    <th>Student Name</th>
                                    <th>Courses</th>
                                    <th>Department</th>
                                    <th>Division</th>
                                    <th>Semester89</th>
                                    <th>email</th>
                                    <th>Contact No.</th>  
                                    <th>Delete</th>  
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $query="select a.grno,r.firstname,r.middlename,r.lastname,a.courseid,a.courseid,c.shortname,a.department,a.division,a.sem,a.deletestatus,r.email,r.contactno from admission a,register r,courses c where r.regid=a.grno and a.courseid=c.courseid";
                                $tb=$dc->getTable($query);
                                $rno=0;
                                while($rw=mysqli_fetch_array($tb))
                                {
                                 if($rw['deletestatus']=="no")
                                 {
                                    echo("<tr>");
                                    echo("<td style='text-align:center'>".$rw['grno']."</td>");
                                    echo("<td>".$rw['firstname'].' '.$rw['middlename'].' '.$rw['lastname']."</td>");
                                    echo("<td>".$rw['shortname']."</td>");
                                    echo("<td>".$rw['department']."</td>");
                                    echo("<td>".$rw['division']."</td>");
                                    echo("<td>".$rw['sem']."</td>");
                                    echo("<td>".$rw['email']."</td>");
                                    echo("<td>".$rw['contactno']."</td>");
                                    echo("<td><button class='btn btn-danger' style='padding: 0.875rem 1.5rem;' name='btndelete' value='".$rw['grno']."'>Delete</button></td>");
                                    echo("</tr>");
                                    $rno=$rno+1;
                                 }
                                }
                                // echo("<tr style='background-color:silver'><td colspan='2'>Records : ".$rno."</td><td colspan='5'>".$msg."</td></tr>");
                            ?>
                            </tbody>
                            </table>
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
 <script>
    function myFunction() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[1];
        if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
        } else {
            tr[i].style.display = "none";
        }
        }       
    }
    }
</script>
</body>
</html>