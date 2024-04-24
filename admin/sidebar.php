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
    <!-- <li class="nav-item nav-profile">
      <a href="#" class="nav-link">
        <div class="nav-profile-image">
          <img src="assets/images/adminlogo.jpg" alt="profile">
          <span class="login-status online"></span>
          
        </div>
        <div class="nav-profile-text d-flex flex-column">
          <span class="font-weight-bold mb-2">Admin</span>
          <span class="text-secondary text-small">Admin Of College</span>
        </div>
     
      </a>
    </li> -->

    <li class="nav-item">
      <a class="nav-link" href="adminhome.php">
        <span class="menu-title">Dashboard</span>
        <i class="mdi mdi-home menu-icon"></i>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="registration.php">
        <span class="menu-title">Registration</span>
        <i class="mdi mdi-account-plus menu-icon"></i>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="admission.php">
        <span class="menu-title">Admission</span>
        <i class="mdi menu-icon mdi mdi-account-check"></i>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="showstudent.php">
        <span class="menu-title">Show Students</span>
        <i class="mdi mdi-view-carousel menu-icon"></i>
      </a>
    </li>   

    <li class="nav-item">
      <a class="nav-link" href="addfacultyinfo.php">
        <span class="menu-title">Add Faculty Information</span>
        <i class="mdi mdi-plus-circle menu-icon"></i>
      </a>
    </li>   

    <li class="nav-item">
      <a class="nav-link" href="showfaculty.php">
        <span class="menu-title">Show Faculties</span>
        <i class="mdi mdi-view-carousel menu-icon"></i>
      </a>
    </li>   

    <li class="nav-item">
      <a class="nav-link" href="showcourse.php">
        <span class="menu-title">Show Courses</span>
        <i class="mdi mdi-view-carousel menu-icon"></i>
      </a>
    </li>   

    <li class="nav-item">
      <a class="nav-link" href="showsubject.php">
        <span class="menu-title">Show Subjects</span>
        <i class="mdi mdi-view-carousel menu-icon"></i>
      </a>
    </li>   
    
    <li class="nav-item">
      <a class="nav-link" href="contactreply.php">
        <span class="menu-title">Home Contact Reply</span>
        <i class="mdi mdi-message-reply-text menu-icon"></i>
      </a>
    </li>   
    <li class="nav-item">
      <a class="nav-link" href="facultyleavereply.php">
        <span class="menu-title">Faculty Leave Reply</span>
        <i class="mdi mdi-message-reply-text menu-icon"></i>
      </a>
    </li>   
    <!-- <li class="nav-item">
      <a class="nav-link" href="showstate.php">
        <span class="menu-title">Show State</span>
        <i class="mdi mdi-home menu-icon"></i>
      </a>
    </li>   
    <li class="nav-item">
      <a class="nav-link" href="showcity.php">
        <span class="menu-title">Show City</span>
        <i class="mdi mdi-home menu-icon"></i>
      </a>
    </li>    -->
  </ul>
</nav>