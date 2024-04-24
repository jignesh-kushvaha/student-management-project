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
        $q1="";
        $msg="";
        $rw1="";
        $rw="";
        $tb="";
        $tb1="";
        $teachid=$_SESSION['regid'];
        $_SESSION["month"]="";
        $_SESSION["sem"]="";
        $_SESSION["subid"]="";
    ?>
    <?php
      if(isset($_POST['btnshow']))
      {
        $month=$_POST['lstmonth'];
        $_SESSION['month']=$month;
        $sem=$_POST['lstsem'];
        $_SESSION['sem']=$sem;
        $subid=$_POST['lstsub'];
        $_SESSION['subid']=$subid;
        $query="select a.grno,a.subid,a.sem,a.courseid,a.division,attstatus,attdate,ad.firstname,ad.middlename,ad.lastname,sub.shortname from attendance a,admission ad,subject sub where a.sem=$sem and a.subid=$subid and ad.grno=a.grno and sub.subid=a.subid";
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
                        <div class="col-md-12" style="height: 3rem;margin-top: 0.4rem;">
                            <h1>Show Attendance</h1>
                        </div>
                    </div>
                    <div class="row">
                     <div class="form-group col-md-3">
                      <label>Months</label>
                      <select name="lstmonth">
                        <!-- <option value="select">Select</option> -->
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
                     <div class="form-group col-md-3">
                        <label>Semester</label>
                        <select name="lstsem">
                          <!-- <option value="select">Select</option> -->
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
                     <div class="form-group col-md-3">
                        <label>Subject</label>
                        <select name="lstsub">
                        <!-- <option value="select">Select</option> -->
                        <?php
                        $q1="select s.subid,s.courseid,s.subname,t.courseid from subject s,teacher t where teachid='$teachid' and s.courseid=t.courseid";
                        $tb=$dc->getTable($q1);
                        while($rw=mysqli_fetch_array($tb))
                        {
                          if($_SESSION['subid']==$rw['subid'])
                          {
                            echo("<option selected value='".$rw['subid']."'>".$rw['subname']."</option>");
                          }
                          else{
                            echo("<option value='".$rw['subid']."'>".$rw['subname']."</option>");
                          }
                        }     
                        ?>                        
                        </select>
                     </div>
                    </div>
                    <div class="row">
                      <div class="form-group">
                        <input type="submit" name="btnshow" value="Show" class="btn btn-gradient-primary me-2"/>  
                      </div>
                    </div>
                    
                    <div class="row">
                      <div class="col-md-12">
                      
                        <?php
                            if($tb1)
                            {
                              echo("<table class='table table-bordered table-striped'>");
                              echo("<tr style='text-align:center;background-color:orange'>");
                              echo("<th>Gr. No.</th>");
                              echo("<th>Student Name</th>");
                              echo("<th>Subject</th>");
                              echo("<th>Division</th>");
                              echo("<th>Sem</th>");
                              echo("<th>Date</th>");
                              echo("<th>Attendance Status</th>");
                              echo("</tr>"); 
                              $no=0; 
                              while($rw1=mysqli_fetch_array($tb1))
                              {
                                if($month==date("F", strtotime($rw1['attdate'])))
                                {
                                  echo("<tr>");
                                  echo("<td>".$rw1['grno']."</td>");
                                echo("<td>".$rw1['firstname'].' '.$rw1['middlename'].' '.$rw1['lastname']."</td>");
                                echo("<td>".$rw1['shortname']."</td>");
                                  echo("<td>".$rw1['division']."</td>");
                                  echo("<td>".$rw1['sem']."</td>");
                                  echo("<td>".date("d-m-Y", strtotime($rw1['attdate']))."</td>");
                                  echo("<td>".$rw1['attstatus']."</td>");
                                  echo("<tr>");
                                  $no = $no + 1;
                                }
                              }
                              echo("</table>");
                              if($no == 0)
                              {
                                echo("<h3>No Record Found</h3>");
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