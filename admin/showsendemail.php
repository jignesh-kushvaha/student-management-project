<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Layout</title>

    <?php 
        session_start();
        include("csslink.php");
        include("../class/dataclass.php");
    ?>
    <?php 
        $dc=new dataclass();
        $query="";
        $msg="";
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
              <div class="col-md-1 "></div>
              <div class="col-md-10 card" style='padding-bottom:1rem'>

                <div class="row">
                  <div class="col-md-12" style="height: 3rem;margin-top: 0.4rem;">
                    <center>
                      <u><h1>Show Sended Email</h1></u>
                    </center>
                  </div>
                </div>
                <div class="row" style="margin-top:1rem">
                  <div class="form-group col-md-5">
                    <input class="form-control" type="text" id="myInput" onkeyup="myFunction()" placeholder="Search By Name" style='color:black;border-color:black;border-radius:0.5rem'>
                  </div>  
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <table class='table table-bordered table-striped' id="myTable">
                      <tr style='text-align:center;background-color:orange'>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Date</th>
                        <th>Subject</th>
                        <th>User Type</th>
                      </tr>
                        <?php
                            $query="select emailid,emaildate,subject,e.regid,r.regid,r.firstname,r.middlename,r.lastname,r.usertype from email e,register r where e.regid=r.regid";
                            $tb=$dc->getTable($query);
                            while($rw=mysqli_fetch_array($tb))
                            {
                                echo("<tr>");
                                echo("<td>".$rw['emailid']."</td>");
                                echo("<td>".$rw['firstname'].' '.$rw['middlename'].' '.$rw['lastname']."</td>");
                                echo("<td style='text-align:center;'>".date("d-m-Y", strtotime($rw['emaildate']))."</td>");
                                echo("<td>".$rw['subject']."</td>");
                                echo("<td>".$rw['usertype']."</td>");
                                echo("</tr>");
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