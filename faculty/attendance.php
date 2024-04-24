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
        $query1="";
        $query2="";
        $query3="";
        $tb="";
        $tb1="";
        $tb2="";
        $tb3="";
        $rw="";
        $rw1="";
        $rw2="";
        $rw3="";
        $msg="";
        $courseid="";
        $sem="";
        $div="";
        $i=0;
        $_SESSION['courseid']="";
        $_SESSION['sem']="";
        $_SESSION['div']="";
        $teachid=$_SESSION['regid'];
    ?>
    <?php
        if(isset($_POST['btnshow']))
        {
        $courseid=$_POST['lstcourse'];
        $_SESSION['courseid']=$courseid;
        $sem=$_POST['lstsem'];
        $_SESSION['sem']=$sem;
        $div=$_POST['lstdiv'];
        $_SESSION['div']=$div;
        $query3="select a.grno,a.firstname,a.middlename,a.lastname,a.sem,a.division from admission a where a.courseid=$courseid and a.division='$div' and a.sem='$sem'";
        $tb3=$dc->getTable($query3);
        }
    ?>
    <?php
      if(isset($_POST['btnsave']))
      {
        $present=$_POST['chkpresent'];
        $grno=$_POST['grno'];
        
        foreach($grno as $gr)
        {
            if($present==NULL)
            {
            $attnd="Absent";
            }
           foreach ($present as $p)
           { 
            $attnd="Absent";
            if($p==$gr)
            {
              $attnd="Present";
              break;
            }
          }
          $attdate=date('y-m-d');
          date_default_timezone_set("Asia/Calcutta");
          $atttime= date("h:i:sa");
          $teachid=$_SESSION['regid'];
          $subid=$_POST['lstsub'];
          $courseid=$_POST['lstcourse'];
          $sem=$_POST['lstsem'];
          $div=$_POST['lstdiv'];
          $i++;
          
          $query="insert into attendance(attdate,atttime,grno,teachid,subid,courseid,sem,division,attstatus) values('$attdate','$atttime','$gr','$teachid','$subid','$courseid','$sem','$div','$attnd')";
          $result=$dc->saveRecord($query);
          if($result)
          {
            $msg="Attendance Added Successfully";
          }
          else{
            $msg="Attendance Not Added";
          }
        }
      }
      if(isset($_POST['btncancel']))
      {
        header('location:showprofile.php');
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
                <div class="col-md-12" style="height: 3rem;margin-top: 0.4rem;text-align:center">
                    <h1><u>Take Attendance</u></h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h4><?php echo($msg); ?></h4>
                </div>
            </div>
            <div class="row"  style="margin-top:2rem">
                <div class="form-group col-md-3">
                    <label>Cousres</label>
                    <select name="lstcourse">
                        <?php
                        $query1="select c.courseid,c.coursename from courses c,teacher t where t.courseid=c.courseid and teachid='$teachid'"; 
                        $tb1=$dc->getTable($query1);
                        while($rw1=mysqli_fetch_array($tb1))
                        {
                            if($_SESSION['$courseid']==$rw1['courseid'])
                            {
                                echo("<option selected value='".$rw1['courseid']."'>".$rw1['coursename']."</option>");
                            }
                            else
                            {
                                echo("<option value='".$rw1['courseid']."'>".$rw1['coursename']."</option>");
                            }
                        } 
                        ?>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label>Semester</label>
                    <select name="lstsem">
                        <option value="select">Select</option>
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
                    <label>Division</label>
                    <select name="lstdiv">
                        <option value="select">Select</option>
                        <option <?php if($_SESSION['div']=='A') echo("selected") ?> value="A">A</option>
                        <option <?php if($_SESSION['div']=='B') echo("selected") ?> value="B">B</option>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label></label>
                    <button type="submit" class="btn btn-primary" name="btnshow" style="padding: 1rem;margin-top: 1.3rem"/>Show</button>
                </div>
            </div>

            <div class="row">
             <div class="col-md-7">
                <?php 
                if($tb3)
                {
                ?>    
                <div class="form-group col-md-5">
                    <label>Subject</label>
                    <select name="lstsub">
                    <?php
                    $query2="select * from subject where courseid=$courseid and sem=$sem";
                    $tb2=$dc->getTable($query2);
                    while($rw2=mysqli_fetch_array($tb2))
                    {
                        echo("<option value='".$rw2['subid']."'>".$rw2['subname']."</option>");
                    }     
                    ?>                        
                    </select>
                </div>

                <table class="table table-bordered table-striped">
                    <tr style='text-align:center;background-color:orange'>
                        <th>GR. NO.</th>
                        <th>Name</th>
                        <th>Sem</th>  
                        <th>Division</th>  
                        <th>Attendance</th>  
                    </tr>
                 <?php          
                    $no=0;                                
                    while($rw3=mysqli_fetch_array($tb3))
                    {
                        echo("<tr>");
                        echo("<td style='text-align:center'>".$rw3['grno']."</td>");
                        echo("<td>".$rw3['firstname'].' '.$rw3['middlename'].' '.$rw3['lastname']."</td>");
                        echo("<td>".$rw3['sem']."</td>");   
                        echo("<td>".$rw3['division']."</td>"); 
                        echo "<td><input type='checkbox' name='chkpresent[]' value='".$rw3['grno']."' checked>Present</td>";
                        echo(" <input type='hidden' name='grno[]' value='".$rw3['grno']."'>");  
                        echo("</tr>"); 
                        $no = $no + 1;
                    }
                    if($no != 0)
                    {
                        echo("<tr><td colspan='5'><input class='btn btn-primary' type='submit' name='btnsave' value='save'>&nbsp;");
                        echo("<input class='btn btn-primary' type='submit' name='btncancel' value='cancel'></td></tr>");
                    }
                    else{
                        echo("<tr><td colspan='6'><h3>No Records</h3></td></tr>");   
                    }
                 ?>
                </table>
                <?php }?>
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