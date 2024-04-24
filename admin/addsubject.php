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
        $query1="";
        $msg="";
        $subid="";
        $subname="";
        $shortname="";
        $courseid="";
        $sem="";
        $subtype="";
        $totalsem="";
?>

    <?php

        if($_SESSION['trans']=='update')
        { 
        $subid=$_SESSION['subid'];
        $query="select * from subject where subid='$subid'";
        $rw=$dc->getRow($query);
        $subname=$rw['subname'];
        $shortname=$rw['shortname'];
        $courseid=$rw['courseid'];
        $sem=$rw['sem'];
        $subtype=$rw['subtype'];
        } 

        if(isset($_POST['btnsave']))
        {
            $subname=$_POST['txtsubname'];
            $shortname=$_POST['txtshortname'];
            $courseid=$_POST['lstcourse'];
            $sem=$_POST['lstsem'];
            $subtype=$_POST['lstsubtype'];
            $deletestatus='no';

            if($_SESSION['trans']=='update')
            {
                $subid=$_SESSION['subid'];
                $query="update subject set subname='$subname',shortname='$shortname',courseid='$courseid',sem='$sem',subtype='$subtype' where subid='$subid'";
            }
            if($_SESSION['trans']=='new')
            {
                $query="insert into subject(subname,shortname,courseid,sem,subtype,deletestatus) values('$subname','$shortname','$courseid','$sem','$subtype','$deletestatus')";    
            }
            $result=$dc->saveRecord($query);
           if($result)
                header('location:showsubject.php');
            else
            {
                $msg="Record Not Save";
            } 
        }

        if(isset($_POST['btncancel']))
        {
            header('location:showsubject.php');
        }
    ?>
    <script>
	    function checkerror()
		{
            var btn=document.activeElement.value;
            if(btn=="Save")
            {
                if(lblsubname1.innerHTML!="" || lblsubname2.innerHTML!="" ||lblshortname1.innerHTML!="" || lblshortname2.innerHTML!="" || lblsemester1.innerHTML!="" || lblsemester2.innerHTML!="")
                {
                    return false;
                }
                else
                {
                    return true;
                }
            }

            if(btn=="cancel")
            {
                return true;
            }			  
		}
	</script>
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
 <form name="stdfrm" action="#" method="post" onSubmit="return checkerror()">
    <div class="container-scroller">
    <?php include("navbar.php"); ?>
    <div class="container-fluid page-body-wrapper">
        <?php include("sidebar.php"); ?>
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row" style="margin-top:2rem">
                    <div class="col-md-2"></div>
                    <div class="col-md-7 card">
                        <div class="row">
                        <div class="col-md-12">
                            <center>
                            <h1>Subject Form (
                                <?php 
                                    if($_SESSION['trans']=='new')
                                    {
                                        echo('Add Subject');
                                    }
                                    else
                                    {
                                        echo('Update Subject');}
                                ?>)
                            </h1>
                            </center>
                        </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Subject Name</label>              
                                <input type="text" name="txtsubname"  class="form-control" placeholder="Enter Subject Name" autofocus onchange="onlyalphanumeric(this,lblsubname1)" onblur="checkblank(this,lblsubname2)" value='<?php echo($subname) ?>' />
                                <label id="lblsubname1"></label>
                                <label id="lblsubname2"></label>
                                <span id="n0" class="error"></span>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Short Name</label>              
                                <input type="text" name="txtshortname"  class="form-control" placeholder="Enter Short Name" autofocus onchange="onlyalpha(this,lblshortname1)" onblur="checkblank(this,lblshortname2)" value='<?php echo($shortname) ?>' />
                                <label id="lblshortname1"></label>
                                <label id="lblshortname2"></label>
                                <span id="n0" class="error"></span>         
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>courses</label>
                                <select name="lstcourse">
                                    <?php
                                        $query1="select courseid,coursename from courses"; 
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
                            <div class="form-group col-md-6">
                              <label>Semester</label>
                              <select name="lstsem">
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
                        </div>   
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Subject Type</label>
                                <select name="lstsubtype">
                                   <option <?php if($subtype=="theory") echo('selected') ?> value="theory">Theory</option> 
                                   <option <?php if($subtype=="practical") echo('selected') ?> value="practical">Practical</option> 
                                </select>
                            </div>    
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <input type="submit" name="btnsave" id="save" value="Save" class="btn btn-gradient-primary me-2"/>
                                <span id="n0" class="error"></span>         
                                <input type="submit" name="btncancel" id="cancel" value="cancel" class="btn btn-gradient-danger me-2"/>
                                <span id="n0" class="error"></span>         
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