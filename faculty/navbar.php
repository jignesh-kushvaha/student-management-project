<style>
  /* .navbar{
    background-image: url('assets/images/bg.png');
    background-color: #15283c;
  } */
</style>
<?php
  $query="select * from teacher where teachid='".$_SESSION['regid']."'";   
  $rw=$dc->getRow($query);
?>
<nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center" style="background: coral;">
          <span class="brand-logo font-weight-bold" href="adminhome.php" style="font-size: 1.8rem;">Faculty Pannel</span>
          <a class="navbar-brand brand-logo-mini" href="adminhome.php"><img src="assets/images/adminlogo.jpg" alt="logo" style="border-radius:2rem;height: 3rem;width: 3rem;"/></a>
        </div>
      
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
              <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                <div class="nav-profile-img">
                  <img src="<?php echo('facultyimage/'.$rw['image']) ?>" alt="image">
                  <span class="availability-status online"></span>
                </div>
                <div class="nav-profile-text">
                  <p class="mb-1" style="color:black"></p>
                  Welcome <?php echo($_SESSION['username']); ?>
                </div>
              </a>
              <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="../main/mainhome.php" style="color:black">
                  <i class="mdi mdi-logout me-2 text-primary"></i> Signout </a>
              </div>
            </li>
            <!-- <li class="nav-item dropdown">
              <a class="nav-link" href="showemail.php">
                <i class="mdi mdi-email"></i>&nbsp;Show Email</a>
            </li> -->
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