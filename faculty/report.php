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
        $msg="";
        $courseid="";
        $sem="";
        $div="";
        $i=0;
        $teachid=$_SESSION['regid'];
        $ct=0;
    ?>
    <?php
        if(isset($_POST['btncreate']))
        {
            $_SESSION['grno']=$_POST['btncreate'];
            $_SESSION['trans']="create";
            header('location:reportform.php');
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
                                    <h1>Create Progress Report</h1>
                                </div>
                            </div>
                            <div class="row"  style="margin-top:2rem">
                                <div class="form-group col-md-3">
                                <label>courses</label>
                                <select name="lstcourse">
                                <?php
                                    $query1="select c.courseid,t.courseid,coursename from courses c,teacher t where t.courseid=c.courseid and teachid='$teachid'"; 
                                    $tb=$dc->getTable($query1);
                                    while($rw=mysqli_fetch_array($tb))
                                    {
                                    if($courseid==$rw['courseid'])
                                    {
                                        echo("<option selected value='".$rw['courseid']."'>".$rw['coursename']."</option>");
                                    }
                                    else
                                    {
                                        echo("<option value='".$rw['courseid']."'>".$rw['coursename']."</option>");
                                    }
                                    }  
                                ?>
                                </select>
                                </div>
                                <div class="form-group col-md-3">
                                  <label>Semester</label>
                                  <select name="lstsem">
                                    <option value="select">Select</option>
                                    <option value="1">1 sem</option>
                                    <option value="2">2 sem</option>
                                    <option value="3">3 sem</option>
                                    <option value="4">4 sem</option>
                                    <option value="5">5 sem</option>
                                    <option value="6">6 sem</option>
                                    <option value="7">7 sem</option>
                                    <option value="8">8 sem</option>
                                  </select>
                                </div>
                                <div class="form-group col-md-3">
                                  <label>Division</label>
                                  <select name="lstdiv">
                                    <option value="select">Select</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                  </select>
                                </div>

                                <div class="form-group col-md-2">
                                  <label></label>
                                  <button type="submit" class="btn btn-primary" name="btnshow" style="padding: 1rem;margin-top: 1.3rem">Show Students</button>
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-md-7">
                                    <?php
                                        if(isset($_POST['btnshow']))
                                        {
                                           $sem=$_POST['lstsem'];
                                           $div=$_POST['lstdiv'];
                                    ?>

                                    <table class="table table-bordered table-striped">
                                        <tr style='text-align:center;background-color:orange'>
                                            <th>GR. NO.</th>
                                            <th>Name</th>
                                            <th>Sem</th>  
                                            <th>Division</th> 
                                            <th>Report</th> 
                                              
                                        </tr>
                                      <?php
                                        $query="select a.grno,a.firstname,a.middlename,a.lastname,a.sem,a.division from admission a where a.division='$div' and a.sem='$sem'";
                                        $tb=$dc->getTable($query);
                                        
                                        while($rw=mysqli_fetch_array($tb))
                                        {
                                            echo("<tr>");
                                            echo("<td style='text-align:center'>".$rw['grno']."</td>");
                                            echo("<td>".$rw['firstname'].' '.$rw['middlename'].' '.$rw['lastname']."</td>");
                                            echo("<td>".$rw['sem']."</td>");   
                                            echo("<td>".$rw['division']."</td>"); 
                                            echo("<td> <button name='btncreate' class='btn btn-gradient-primary me-2' value=".$rw['grno'].">Create Report</buuton></td>");
                                            echo("</tr>"); 
                                            $ct=$ct+1;
                                        }
                                        }
                                      ?>
                                      <tr><td><?php echo($msg); ?></td></tr>
                                    </table>
                                    <?php 
                                    if($ct == 0)
                                    {
                                        echo("<h2>Record Not Found</h2>");
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