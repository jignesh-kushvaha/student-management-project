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
        if(isset($_POST['btndelete']))
        {
            $teachid=$_POST['btndelete'];
            $query="update teacher set deletestatus='yes' where teachid='$teachid'";
            $result=$dc->saveRecord($query);
            if($result)
            {
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
                 <div class="row">
                    <div class="col-md-12 card">
                        <div class="row">
                            <div class="col-md-12" style="height: 3rem">
                                <center>
                                <u><h1>Show Faculties</h1></u>
                                </center>
                            </div>
                            
                        </div>
                        <div class="row" style="margin-top:1rem">
                          <div class="form-group col-md-3">
                            <!-- <lable>Search City</label>  -->
                            <input class="form-control" type="text" id="myInput" onkeyup="myFunction()" placeholder="Search By Name" >
                          </div>  
                          <div class="col-md-5"></div>
                          <div class="col-md-2" style="height: 3rem">
                            <center>
                            <h5 style="color:red"><?php echo($msg); ?></h5>
                            </center>
                          </div>
                        </div>
                        <div class="row">
                            <table class="table table-bordered table-striped" id="myTable">
                            <thead>
                                <tr style='text-align:center;background-color:orange'>
                                    <th>Teacher Id</th>
                                    <th>Faculty Name</th>
                                    <th>Designation</th>
                                    <th>Department</th>
                                    <th>Courses</th>
                                    <th>email</th>
                                    <th>Contact No.</th>  
                                    <th>Delete</th>  
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $query="select r.regid,t.teachid,r.firstname,r.middlename,r.lastname,t.desig,t.department,t.courseid,t.deletestatus,c.coursename,c.shortname,r.email,r.contactno from teacher t,register r,courses c where r.regid=t.teachid and c.courseid=t.courseid";
                                $tb=$dc->getTable($query);
                                $rno=0;
                                while($rw=mysqli_fetch_array($tb))
                                {
                                  if($rw['deletestatus']=="no")
                                  {
                                    echo("<tr>");
                                    echo("<td style='text-align:center'>".$rw['teachid']."</td>");
                                    echo("<td>".$rw['firstname'].' '.$rw['middlename'].' '.$rw['lastname']."</td>");
                                    echo("<td>".$rw['desig']."</td>");
                                    echo("<td>".$rw['department']."</td>");
                                    echo("<td>".$rw['coursename'].' ('.$rw['shortname'].")</td>");
                                    echo("<td>".$rw['email']."</td>");
                                    echo("<td>".$rw['contactno']."</td>");
                                    echo("<td><button style='padding: 0.875rem 1.5rem;' class='btn btn-danger' name='btndelete' value='".$rw['teachid']."'>Delete</button></td>");
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