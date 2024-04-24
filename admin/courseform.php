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
        $query1="";
        $msg="";
        $coursename="";
        $shortname="";
        $duration="";
        $fees="";
        $medium="";
        $totalsem="";
        $image="";
        $tmpimage="";
?>

    <?php

        if($_SESSION['trans']=='update')
        { 
        $courseid=$_SESSION['courseid'];
        $query="select * from courses where courseid='$courseid'";
        $rw=$dc->getRow($query);
        $coursename=$rw['coursename'];
        $shortname=$rw['shortname'];
        $duration=$rw['duration'];
        $fees=$rw['fees'];
        $medium=$rw['medium'];
        $totalsem=$rw['totalsem'];
        $image=$rw['image'];
        } 

        if(isset($_POST['btnsave']))
        {
            $coursename=$_POST['txtcoursename'];
            $shortname=$_POST['txtshortname'];
            $duration=$_POST['lstduration'];
            $fees=$_POST['txtfees'];
            $medium=$_POST['lstmedium'];
            $totalsem=$_POST['txttotalsem'];
            $image=$_FILES['fileimage']['name'];
            $tmpimage=$_FILES['fileimage']['tmp_name'];
            $deletestatus='no';

            if($_SESSION['trans']=='update')
            {
                $cityid=$_SESSION['cityid'];
                if($image!="")
                {
                    $query="update courses set coursename='$coursename',shortname='$shortname',duration='$duration',fees='$fees',medium='$medium',totalsem='$totalsem',image='$image' where courseid='$courseid'";
                }
                else
                {
                    $query="update courses set coursename='$coursename',shortname='$shortname',duration='$duration',fees='$fees',medium='$medium',totalsem='$totalsem' where courseid='$courseid'";
                }
            }
            if($_SESSION['trans']=='new')
            {
                $query="insert into courses(coursename,shortname,duration,fees,medium,totalsem,image,deletestatus) values('$coursename','$shortname','$duration','$fees','$medium','$totalsem','$image','$deletestatus')";    
            }
            $result=$dc->saveRecord($query);
            if($result)
            {
                move_uploaded_file($tmpimage,"../images/courseimg/".$image); 
                header('location:showcourse.php');
            }
            else
            {
                $msg="Record Not Save";
            }
        }

        if(isset($_POST['btncancel']))
        {
            header('location:showcourse.php');
        }
    ?>
    <script>
	    function checkerror()
		{
           var btn=document.activeElement.value;
           if(btn=="Save")
           {
                if(lblcoursename1.innerHTML!="" || lblcoursename2.innerHTML!="" ||lblshortname1.innerHTML!="" || lblshortname2.innerHTML!="" || lblfees1.innerHTML!="" || lblfees2.innerHTML!="" || lbltotalsem1.innerHTML!="" || lbltotalsem2.innerHTML!="" || lblimg1.innerHTML!="")
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
 <form name="stdfrm" action="#" method="post" enctype="multipart/form-data" onSubmit="return checkerror()">
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
                            <h1>Courses Form (
                                <?php 
                                    if($_SESSION['trans']=='new')
                                    {
                                        echo('Add Courses');
                                    }
                                    else
                                    {
                                        echo('Update Courses');}
                                ?>)
                            </h1>
                            </center>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Course Name</label>              
                                <input type="text" name="txtcoursename"  class="form-control"  placeholder="Enter Course Name" autofocus onchange="onlyalpha(this,lblcoursename1)" onblur="checkblank(this,lblcoursename2)" value='<?php echo($coursename) ?>' />
                                <label id="lblcoursename1"></label>
                                <label id="lblcoursename2"></label>
                                <span id="n0" class="error"></span>
                            </div>
                            <div class="form-group">
                                <label>Short Name</label>              
                                <input type="text" name="txtshortname"  class="form-control"  placeholder="Enter Short Name" autofocus onchange="onlyalpha(this,lblshortname1)" onblur="checkblank(this,lblshortname2)" value='<?php echo($shortname) ?>' />
                                <label id="lblshortname1"></label>
                                <label id="lblshortname2"></label>
                                <span id="n0" class="error"></span>         
                            </div>
                            <div class="form-group">
                                <label>Duration</label>
                                <select name="lstduration">
                                    <option <?php if($duration=="3") echo('selected') ?> >3 year</option> 
                                   <option <?php if($duration=="4") echo('selected') ?> value="4" >4 year</option> 
                                </select>
                            </div>    
                            
                        </div>   
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Fees</label>              
                                <input type="text" name="txtfees" class="form-control" placeholder="Enter Fees" autofocus onchange="onlynumber(this,lblfees1)" onblur="checkblank(this,lblfees2)" value='<?php echo($fees) ?>'>
                                <label id="lblfees1"></label>
                                <label id="lblfees2"></label>
                                <span id="n0" class="error"></span>         
                            </div>
                            <div class="form-group">
                                <label>Medium</label>
                                <select name="lstmedium">
                                   <option <?php if($medium=="english") echo('selected') ?> >English</option> 
                                   <option <?php if($medium=="gujarati") echo('selected') ?> >Gujarati</option> 
                                </select>
                            </div>    
                            <div class="form-group">
                                <label>Total sem</label>              
                                <input type="text" name="txttotalsem" class="form-control" placeholder="Enter Total Semester" autofocus onchange="onlynumber(this,lbltotalsem1)" onblur="checkblank(this,lbltotalsem2)" value='<?php echo($totalsem) 
                                ?>'/>
                                <label id="lbltotalsem1"></label>
                                <label id="lbltotalsem2"></label>
                                <span id="n0" class="error"></span>         
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Images</label>              
                                <input type="file" name="fileimage" class="form-control" autofocus onchange="imgValidation(this,lblimg1)" />
                                <label id="lblimg1"></label>
                            </div>
                        </div>
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