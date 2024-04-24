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
 <form name="frm" action="" method="post">
    <div class="container-scroller">
     <?php include("navbar.php"); ?>
        <div class="container-fluid page-body-wrapper">
            <?php include("sidebar.php"); ?>
            <div class="main-panel">
                <div class="content-wrapper">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="row" style="margin-bottom:2rem">
                        <div class="col-md-12">
                         <h3 class="page-title">
                          <span class="page-title-icon bg-gradient-primary text-white me-2">
                            <i class="mdi mdi-home"></i>
                          </span> Dashboard
                         </h3>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-3 stretch-card grid-margin">
                          <div class="card bg-gradient-danger card-img-holder text-white">
                           <a href="showstudent.php" style="cursor:pointer;text-decoration: none;color:white ">  
                            <div style="padding:1.5rem 2rem">
                              <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                              
                              <h2 class="font-weight-normal mb-3" style="margin-top:0.8rem">Students
                              </h2>
                              <h2 class="mb-5">
                                <?php 
                                  $query="select * from student";   
                                  $tb=$dc->getTable($query);
                                  $count=0;
                                  while($rw=mysqli_fetch_array($tb))
                                  {
                                    $count=$count+1;
                                  }
                                  echo("<h2 class='mb-5'>Total : ".$count."</h2>");
                                ?>
                              </h2>
                             
                            </div>
                           </a>
                          </div>
                        </div>
                        <div class="col-md-3 stretch-card grid-margin">
                          <div class="card bg-gradient-info card-img-holder text-white">
                           <a href="showfaculty.php" style="cursor:pointer;text-decoration: none;color:white ">
                            <div style="padding:1.5rem 2rem">
                              <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                              <h2 class="font-weight-normal mb-3" style="margin-top:0.8rem"> Faculties</h2>
                              <h2 class="mb-5">
                                <?php 
                                  $query="select * from teacher";   
                                  $tb=$dc->getTable($query);
                                  $count=0;
                                  while($rw=mysqli_fetch_array($tb))
                                  {
                                    $count=$count+1;
                                  }
                                  echo("<h2 class='mb-5'> Total : ".$count."</h2>");
                                ?>
                              </h2>
                            </div>
                           </a>
                          </div>
                        </div>
                        <div class="col-md-3 stretch-card grid-margin">
                          <div class="card bg-gradient-success card-img-holder text-white">
                           <a href="showcourse.php" style="cursor:pointer;text-decoration: none;color:white">
                            <div style="padding:1.5rem 2rem">
                              <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                              <h2 class="font-weight-normal mb-3" style="margin-top:0.8rem">Courses</h2>
                              <h2 class="mb-5">
                                <?php 
                                  $query="select * from courses";   
                                  $tb=$dc->getTable($query);
                                  $count=0;
                                  while($rw=mysqli_fetch_array($tb))
                                  {
                                    $count=$count+1;
                                  }
                                  echo("<h2 class='mb-5'> Total : ".$count."</h2>");
                                ?>
                              </h2>
                            </div>
                           </a>
                          </div>
                        </div>
                        <div class="col-md-3 stretch-card grid-margin">
                          <div class="card bg-gradient-primary card-img-holder text-white">
                           <a href="showsubject.php" style="cursor:pointer;text-decoration: none;color:white">
                            <div style="padding:1.5rem 2rem">
                              <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                              
                              <h2 class="font-weight-normal mb-3" style="margin-top:0.rem">Subjects</h2>
                              <h2 class="mb-5">
                                <?php 
                                  $query="select * from subject";   
                                  $tb=$dc->getTable($query);
                                  $count=0;
                                  while($rw=mysqli_fetch_array($tb))
                                  {
                                    $count=$count+1;
                                  }
                                  echo("<h2 class='mb-5'> Total : ".$count."</h2>");
                                ?>
                              </h2>
                            </div>
                           </a>
                          </div>
                        </div>
                      </div>
                      
                      <div class="row">
                        <div class="col-md-3 stretch-card grid-margin">
                          <div class="card bg-gradient-dark card-img-holder text-white">
                           <a href="contactreply.php" style="cursor:pointer;text-decoration: none;color:white ">
                            <div style="padding:1.5rem 2rem">
                              <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                              <h2 class="font-weight-normal mb-3" style="margin-top:0.8rem">Contact Reply 
                              </h2>
                              <h2 class="mb-5">
                                <?php 
                                  $query="select * from contact where reply='no'";   
                                  $tb=$dc->getTable($query);
                                  $count=0;
                                  while($rw=mysqli_fetch_array($tb))
                                  {
                                    $count=$count+1;
                                  }
                                  echo("<h2 class='mb-5'> Total : ".$count."</h2>");
                                ?>
                              </h2>
                            </div>
                           </a>
                          </div>
                        </div>
                        <div class="col-md-3 stretch-card grid-margin" >
                          <div class="card card-img-holder text-white" style="background: #947fff;">
                           <a href="facultyleavereply.php" style="cursor:pointer;text-decoration: none;color:white ">
                            <div style="padding:1.5rem 2rem">
                              <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                              
                              <h2 class="font-weight-normal mb-3" style="margin-top:0.8rem">Faculty Leave 
                              </h2>
                              <h2 class="mb-5">
                                <?php 
                                  $query="select * from teachleave where status='pending'";   
                                  $tb=$dc->getTable($query);
                                  $count=0;
                                  while($rw=mysqli_fetch_array($tb))
                                  {
                                    $count=$count+1;
                                  }
                                  echo("<h2 class='mb-5'> Total : ".$count."</h2>");
                                ?>
                              </h2>
                            </div>
                           </a>
                          </div>
                        </div>
                        <div class="col-md-3 stretch-card grid-margin" >
                          <div class="card card-img-holder text-white" style="background: #ff00c880">
                           <a href="showsendemail.php" style="cursor:pointer;text-decoration: none;color:white ">
                            <div style="padding:1.5rem 2rem">
                              <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                              
                              <h2 class="font-weight-normal mb-3" style="margin-top:0.8rem">Sended Mails
                              </h2>
                              <h2 class="mb-5">
                                <?php 
                                  $query="select * from email";   
                                  $tb=$dc->getTable($query);
                                  $count=0;
                                  while($rw=mysqli_fetch_array($tb))
                                  {
                                    $count=$count+1;
                                  }
                                  echo("<h2 class='mb-5'> Total : ".$count."</h2>");
                                ?>
                              </h2>
                            </div>
                           </a>
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