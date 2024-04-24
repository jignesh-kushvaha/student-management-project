<style>
  .navbar .navbar-menu-wrapper .navbar-nav .nav-item .nav-link {
    margin-left: 0px;
  }
</style>
<nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center" style="background: coral;">
          <span class="brand-logo font-weight-bold" href="adminhome.php" style="font-size: 1.8rem;">Admin Pannel</span>
          <a class="navbar-brand brand-logo-mini" href="adminhome.php"><img src="assets/images/adminlogo.jpg" alt="logo" style="border-radius:2rem;height: 3rem;width: 3rem;"/></a>
        </div>
      
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>
          <!-- <div class="search-field d-none d-md-block">
            <form class="d-flex align-items-center h-100" action="#">
              <div class="input-group">
                <div class="input-group-prepend bg-transparent">
                  <i class="input-group-text border-0 mdi mdi-magnify"></i>
                </div>
                <input type="text" class="form-control bg-transparent border-0" placeholder="Search projects">
              </div>
            </form>
          </div> -->
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
              <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                <div class="nav-profile-img">
                  <img src="assets/images/adminlogo.jpg" alt="image">
                  <span class="availability-status online"></span>
                </div>
                <div class="nav-profile-text">
                  <p class="mb-1" style="color:black"><?php echo($_SESSION['username']);?></p>
                </div>
              </a>
              <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="../main/mainhome.php"  style="color:black">
                  <i class="mdi mdi-logout me-2 text-primary"></i> Signout </a>
              </div>
            </li>
            <li class="nav-item nav-profile dropdown">
              <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
              <div class="nav-profile-text">
                  <p class="mb-1" style="color:black"><i class="mdi mdi-email"></i>&nbsp;Send Email</p>
                </div>
              </a>
              <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="emailstudent.php"  style="color:black">
                  <i class="mdi mdi-account me-2 text-primary"></i> Student </a>
                <a class="dropdown-item" href="emailfaculty.php"  style="color:black">
                  <i class="mdi mdi-account me-2 text-primary"></i> Faculty </a>
              </div>
            </li>
            
            <li class="nav-item" style="color:black">
              <a class="nav-link" href="showsendemail.php">
                <p class="mb-1" style="color:black"><i class="mdi mdi-email-open"></i>&nbsp;Show Email</p>
              </a>
            </li>

            <li class="nav-item d-none d-lg-block full-screen-link">
              <a class="nav-link">
                <h5 class="mdi mdi-fullscreen" id="fullscreen-button" style="cursor:pointer;margin-top: 0.5rem;">Fullscreen</h5>
              </a>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
</nav>