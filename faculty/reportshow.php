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
        $rw1="";
        $rw="";
        $tb="";
        $tb1="";
        $teachid=$_SESSION['regid'];
        $_SESSION["month"]="";
        $_SESSION["sem"]="";
        $_SESSION["div"]="";
        $ct =0;
    ?>
    <?php
        if(isset($_POST['btnshow']))
        {
        $month=$_POST['lstmonth'];
        $_SESSION['month']=$month;
        $sem=$_POST['lstsem'];
        $_SESSION['sem']=$sem;
        $div=$_POST['lstdiv'];
        $_SESSION['div']=$div;
        $query="select r.grno,r.reportdate,r.month,r.sem,r.division,totpresent,r.assignment,ad.grno,ad.firstname,ad.middlename,ad.lastname from progressreport r,admission ad where r.sem=$sem and r.division='$div' and ad.grno=r.grno";
        $tb1=$dc->getTable($query);
        }
    ?>
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
                        <div class="col-md-12" style="height: 3rem;margin: 0.4rem 0px;">
                            <h1>Show Generated Report</h1>
                        </div>
                    </div>

                    <div class="row">
                    <div class="form-group col-md-2">
                    <label>Months</label>
                    <select  name="lstmonth">
                        <option <?php if($_SESSION['month']=='January') echo("selected") ?> >January</option>
                        <option <?php if($_SESSION['month']=='Febuary') echo("selected") ?> >Febuary</option>
                        <option <?php if($_SESSION['month']=='March') echo("selected") ?> 
                        >March</option>
                        <option <?php if($_SESSION['month']=='April') echo("selected") ?>
                        >April</option>
                        <option <?php if($_SESSION['month']=='May') echo("selected") ?>
                        >May</option>
                        <option <?php if($_SESSION['month']=='June') echo("selected") ?>
                        >June</option>
                        <option <?php if($_SESSION['month']=='July') echo("selected") ?>
                        >July</option>
                        <option <?php if($_SESSION['month']=='August') echo("selected") ?>
                        >August</option>
                        <option <?php if($_SESSION['month']=='September') echo("selected") ?>
                        >September</option>
                        <option <?php if($_SESSION['month']=='October') echo("selected") ?>
                        >October</option>
                        <option <?php if($_SESSION['month']=='November') echo("selected") ?>
                        >November</option>
                        <option <?php if($_SESSION['month']=='December') echo("selected") ?>
                        >December</option>
                      </select>
                    </div>
                    <div class="form-group col-md-2">
                        <label>Semester</label>
                        <select  name="lstsem">
                            <option <?php if($_SESSION['sem']==1) echo("selected") ?> value="1">1 sem</option>
                            <option <?php if($_SESSION['sem']==2) echo("selected") ?> value="2">2 sem</option>
                            <option <?php if($_SESSION['sem']==3) echo("selected") ?> value="3">3 sem</option>
                            <option <?php if($_SESSION['sem']==4) echo("selected") ?> value="4">4 sem</option>
                            <option <?php if($_SESSION['sem']==5) echo("selected") ?> value="5">5 sem</option>
                            <option <?php if($_SESSION['sem']==6) echo("selected") ?> value="6">6 sem</option>
                            <option <?php if($_SESSION['sem']==7) echo("selected") ?> value="7">7 sem</option>
                            <option <?php if($_SESSION['sem']==8) echo("selected") ?> value="8">8 sem</option>
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <label>Division</label>
                        <select name="lstdiv">
                        <option <?php if($_SESSION['div']=='A') echo("selected") ?> value="A">A</option>
                        <option <?php if($_SESSION['div']=='B') echo("selected") ?> value="B">B</option>
                        </select>
                    </div>
                    <div class="form-group  col-md-2" style="   padding-top: 1.5rem;">
                        <input type="submit" name="btnshow" value="Show" class="btn btn-gradient-primary me-2"/>  
                    </div>
                    </div>

                   
                    <div class="row">
                     <div class="col-md-12">
                      <?php
                       if($tb1)
                       {
                      ?>
                      <table class="table table-bordered table-striped">
                        <tr style='text-align:center;background-color:orange'>
                        <th>Gr. No.</th>
                        <th>Student Name</th>
                        <th>Date</th>
                        <th>Month</th>
                        <th>Sem </th>
                        <th>Division</th>
                        <th>Total Present</th>
                        
                        <th>Assignment Submited</th>
                        </tr>
                        
                        <?php 
                            while($rw=mysqli_fetch_array($tb1))
                            {
                              if($month==$rw['month'])
                              {
                                echo("<tr>");
                                echo("<td>".$rw['grno']."</td>");
                                echo("<td>".$rw['firstname'].' '.$rw['middlename'].' '.$rw['lastname']."</td>");
                                echo("<td>".$rw['reportdate']."</td>");
                                echo("<td>".$rw['month']."</td>");
                                echo("<td>".$rw['sem']."</td>");
                                echo("<td>".$rw['division']."</td>");
                                echo("<td>".$rw['totpresent']."</td>");
                                
                                echo("<td>".$rw['assignment']."</td>");
                                echo("<tr>");
                                $ct = $ct + 1;
                              }
                            }
                            echo("</table>");
                            if($ct == 0)
                            {
                                echo("<h2>Record Not Found</h2>");
                            }
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