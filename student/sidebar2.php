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
<?php
  $query="select * from student where grno='".$_SESSION['regid']."'";   
  $rw=$dc->getRow($query);
?>
<nav class="sidebar sidebar-offcanvas" id="sidebar" >
  <ul class="nav" style="padding: 1rem 0rem;">
    <li class="nav-item nav-profile">
      <a href="showprofile.php" class="nav-link">
        <div class="nav-profile-image">
          <img src="<?php echo('studentimage/'.$rw['image']) ?>" alt="profile">
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
      <a class="nav-link" href="showreport.php">
        <span class="menu-title">Show Report</span>
        <i class="mdi mdi-table-large menu-icon"></i>
      </a>
    </li>   
    <li class="nav-item">
      <a class="nav-link" href="showattendance.php">
        <span class="menu-title">Show Attendance</span>
        <i class="mdi mdi-checkerboard menu-icon"></i>
      </a>
    </li>   
    
    <li class="nav-item">
      <a class="nav-link" href="showassignment.php">
        <span class="menu-title">Show Assignment</span>
        <i class="mdi mdi-table-large menu-icon"></i>
      </a>
    </li>  

    <li class="nav-item">
      <a class="nav-link" href="downloadnotes.php">
        <span class="menu-title">Download Notes</span>
        <i class="mdi mdi-briefcase-download menu-icon"></i>
      </a>
    </li>  

    <li class="nav-item">
      <a class="nav-link" href="studleave.php">
        <span class="menu-title">Leave Application</span>
        <i class="mdi mdi-transcribe menu-icon"></i>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="query.php">
        <span class="menu-title">Query</span>
        <i class="mdi mdi-message-reply-text menu-icon"></i>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="changepassword.php">
        <span class="menu-title">Change Password</span>
        <i class="mdi mdi-key menu-icon"></i>
      </a>
    </li>   
  </ul>
</nav>