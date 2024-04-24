<style>
  .sidebar{
    background-image: url('assets/images/bg.png');
    background-color: #15283c;
  }
  .sidebar .nav .nav-item:hover{
    background-color: #142230;
  }
  .sidebar .nav .nav-item.active {
    background: none;
  }
  .sidebar .nav .nav-item .nav-link .menu-title {
    color:white;
  }
  .sidebar .nav .nav-item.active > .nav-link .menu-title {
    color: #b66dff;
}
</style>
<nav class="sidebar sidebar-offcanvas" id="sidebar" >
  <ul class="nav" style="padding: 1rem 0rem;">
    <li class="nav-item nav-profile">
      <a href="showprofile.php" class="nav-link">
        <div class="nav-profile-image">
          <img src="<?php echo('facultyimage/'.$rw['image']) ?>" alt="profile">
          <span class="login-status online"></span>
          
        </div>
        <div class="nav-profile-text d-flex flex-column">
          <span class="font-weight-bold mb-2"><?php echo($_SESSION['username']); ?></span>
          <span class="text-secondary text-small">Naranlala College</span>
        </div>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="showprofile.php">
        <span class="menu-title">Profile</span>
        <i class="mdi mdi-account-card-details menu-icon"></i>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
        <span class="menu-title">Attendance</span>
        <i class="menu-arrow"></i>
        <i class="mdi mdi-crosshairs-gps menu-icon"></i>
        
      </a>
      <div class="collapse" id="ui-basic">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> 
            <a class="nav-link" href="attendance.php"><span class="menu-title" style="margin-right: 2rem;">Take Attendance</span>
              <i class="mdi mdi-pencil-box-outline menu-icon"></i>
            </a>
          </li>
          <li class="nav-item"> 
            <a class="nav-link" href="showattendance.php">
            <span class="menu-title" style="margin-right: 1.6rem;">Show Attendance</span>
            <i class="mdi mdi-table-large menu-icon"></i>  
          </a>
          </li>
        </ul>
      </div>
    </li>

    <!-- <li class="nav-item">
      <a class="nav-link" href="attendance.php">
        <span class="menu-title">Attendance</span>
        <i class="mdi mdi-home menu-icon"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="showattendance.php">
        <span class="menu-title">Show Attendance</span>
        <i class="mdi mdi-home menu-icon"></i>
      </a>
    </li> -->
    <li class="nav-item">
      <a class="nav-link" href="assignment.php">
        <span class="menu-title">Assignment</span>
        <i class="mdi mdi-note-text menu-icon"></i>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#general-pages" aria-expanded="false" aria-controls="general-pages">
        <span class="menu-title">Report</span>
        <i class="menu-arrow"></i>
        <i class="mdi mdi-medical-bag menu-icon"></i>
      </a>
      <div class="collapse" id="general-pages">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
             <a class="nav-link" href="report.php">
                <span class="menu-title" style="margin-right:3rem;">Create Report</span>
                <i class="mdi mdi-pencil-box-outline menu-icon"></i>
             </a>
          </li>
          <li class="nav-item">
             <a class="nav-link" href="reportshow.php">
             <span class="menu-title" style="margin-right:3.5rem;"> Show Report</span>
              <i class="mdi mdi-table-large menu-icon"></i>
              
             </a>
          </li>
        </ul>
      </div>
    </li>

    <!-- <li class="nav-item">
      <a class="nav-link" href="report.php">
        <span class="menu-title">Generate Report</span>
        <i class="mdi mdi-home menu-icon"></i>
      </a>
    </li>   
    <li class="nav-item">
      <a class="nav-link" href="reportshow.php">
        <span class="menu-title">Show Generated Report</span>
        <i class="mdi mdi-home menu-icon"></i>
      </a>
    </li>    -->
    <li class="nav-item">
      <a class="nav-link" href="notes.php">
        <span class="menu-title">Notes</span>
        <i class="mdi mdi-note-text menu-icon"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="queryreply.php">
        <span class="menu-title">Query Reply</span>
        <i class="mdi mdi-transcribe menu-icon"></i>
      </a>
    </li>   
    
    <li class="nav-item">
      <a class="nav-link" href="facultyleave.php">
        <span class="menu-title">Faculty Leave</span>
        <i class="mdi mdi-message-reply-text menu-icon"></i>
      </a>
    </li>   
    <?php 
      $teachid=$_SESSION['regid'];
      $query="Select teachid from leaveapp where teachid='$teachid'";
      $rw=$dc->getRow($query);
      if($rw)
      {
    ?>
    <li class="nav-item">
      <a class="nav-link" href="studleavereply.php">
        <span class="menu-title">Student Leave Reply</span>
        <i class="mdi mdi-message-reply-text menu-icon"></i>
      </a>
    </li> 
    <?php 
      }
    ?>  
    <li class="nav-item">
      <a class="nav-link" href="changepassword.php">
        <span class="menu-title">Change Password</span>
        <i class="mdi mdi-key menu-icon"></i>
      </a>
    </li>
 
    
    
    
    
  </ul>
</nav>