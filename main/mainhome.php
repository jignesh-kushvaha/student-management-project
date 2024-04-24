<!DOCTYPE html>
<html lang="en">

<head>
  <title>student management</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php 
      Session_start();
      include('csslink.php'); 
      include("../class/dataclass.php");
      $_SESSION['username']="";
      $_SESSION['regid']=""; 
      $dc=new dataclass();
      $query="";
      $msg="";
    ?>
  <style>
    .site-navbar .site-navigation .site-menu > li > a:hover
    {
    color:red;
    font-weight:bold;
   }
   .section-bg {
    padding:1rem 0px;
   }
  </style>

</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
<form name="frm" action="" method="post">
  <div class="site-wrap">
  

    <?php include('topper.php') ?>
    <?php include('header.php') ?>
    <?php include('slider.php') ?>

     <!-- About us -->
     <a name="about">

     <div class="container-fluid" style="padding:2rem;background: #bcfefe4d;color: #0d0e0e;">
        <div class="row">
            <div class="col-md-12">
            <center>
                <h1>About Us</h1>
            </center>
            </div>
        </div>
    </div>
    
    <div class="section-bg style-1" style="background-image: url('images/about_1.jpg');">
     <div class="container pt-5 mb-5">
      <div class="row">
        <div class="col-lg-4">
          <h2 class="section-title-underline style-2">
            <span>Academics History</span>
          </h2>
        </div>
        <!-- <div class="col-lg-4">
            <img src="images/clg/clg3.jpg" alt="Image"style="max-width:95%;height:100%">
        </div> -->
        <div class="col-lg-8">
            <p>20 years of legacy with State-of-Art infrastructure having lush green campus with 60 + Classrooms, 10+ Science & Computer Labs. Regular Participation in National and State level inter-collegiate events, Youth festival Competitions
            150+ winners each year.Naran Lala college of proffessional science is a well known College / Institute based in Navsari, Gujarat, India and established /founded in the 1992 is a modern educational institution. Naran Lala college of proffessional science is a Private College and offers education mainly in ARTS/SCIENCE/ENGINEERING/ LAW ETC. The main object of the institute is to provide quality education to enhance individual performance and elevate professional standards through innovative training programs in varied disciplines, research and extension activities.
            </p>
        </div>
      </div>
     </div>
    </div>

    <div class="site-section">
      <div class="container">
        <div class="row mb-6 justify-content-center text-center">
          <div class="col-lg-6 mb-5">
            <h2 class="section-title-underline mb-5">
              <span>Why Naran Lala College?</span>
            </h2>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">

            <div class="feature-1 border">
              <div class="icon-wrapper bg-primary">
                <span class="flaticon-mortarboard text-white"></span>
              </div>
              <div class="feature-1-content" style="width:100%;height: 20rem;">
               <h2>Academic Excellence</h2>
               <ul>
                <li>
                <p style="text-align:left">Consistent University result with 05 University Gold Medalists</p>
                </li>
                <li>
                <p style="text-align:left">Highly qualified & experienced staff</p>
                </li>
               <ul>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
            <div class="feature-1 border">
              <div class="icon-wrapper bg-primary">
                <span class="flaticon-diploma text-white"></span>
              </div>
              <div class="feature-1-content" style="width:100%;height: 20rem;">
                <h2>Awards & Achievement</h2>
                <ul><li>
                <p style="text-align:left">Regular Participation in National and State level inter-collegiate events, Youth festival Competitions.</p></li>
                <li><p style="text-align:left">150+ winners each year</p></li>
                </ul>
              </div>
            </div> 
          </div>
          <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
            <div class="feature-1 border">
              <div class="icon-wrapper bg-primary">
                <span class="flaticon-library text-white"></span>
              </div>
              <div class="feature-1-content" style="width:100%;height: 20rem;">
               <h2>Holistic Development Activities</h2>
               <ul>
                <li><p style="text-align:left">Serving the society by 'Cherish the Charity'.</p></li>
                <li><p style="text-align:left">Catering talents through 'Synergy'</p></li>
                <li><p style="text-align:left">Adding colors in Students' life by celebrating festivals & fun week</p></li>
               </ul>
              </div>
            </div> 
          </div>
        
        </div>
      </div>
    </div>

    <div class="section-bg style-1" style="background-image: url('images/hero_1.jpg');">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-6 mb-5 mb-lg-0">
            <span class="icon flaticon-mortarboard"></span>
            <h3>Vision</h3>
            <p>To be a Leading, Innovative and most Respected Centre of Education in the Region.To be evolved as leading institution of learning, discovery and knowledge creation in South Gujarat area.</p>
          </div>
          <div class="col-lg-4 col-md-6 mb-5 mb-lg-0">
            <span class="icon flaticon-school-material"></span>
            <h3>Mission</h3>
            <p>To impart Quality Education through Inspiring Leadership,State-of-the-Art  infrastructure, Nurturing Skills and Indian Ethos, Creating Sustainable Opportunities that produce a cadre of Socially responsible, Empowered and Employable Youth.</p>
          </div>
          <div class="col-lg-4 col-md-6 mb-5 mb-lg-0">
            <span class="icon flaticon-library"></span>
            <h3>Values</h3>
            <p>
              <ul style="color:#7697c6;padding: 0px 1.1rem;">
                <li>Respecting each other.</li>
                <li>Practising truth and non-violence.</li>
                <li>Discouraging corruption and mal-practices.</li>
                <li>Encouraging knowledge, honesty and hard work.</li>
              </ul>
            </p>
          </div>
        </div>
      </div>
    </div>

    <div class="container" style="padding-top:3rem">
     <div class="row">
        <div class="col-lg-4">
            <h2 class="section-title-underline">
                <span>Our Objectives</span>
            </h2>
        </div>
     </div>
    </div>  
    <div class="container" style="padding: 2rem 0rem;">
        <div class="row">
            <div class="col-lg-12">
                <ol style="padding: 0px 2rem;">
                    <li>To prepare socially responsible & successful industrialist/Executives to cater nation’s vivid managerial needs.</li>
                    <li>To explore excellent career prospects through offering graduate course affiliated to highly reputed Gujarat Technological University (GTU), Ahmedabad and approved by All India Council of Technical Education (AICTE), Delhi.</li>
                    <li>To transform students into sensitive human beings who should be alert to social & industrial needs.</li>
                    <li>To cater the above objectives: by ensuring quality education with interactive as well as effective classroom participation, excellent interpersonal skills among students & offering platform for exploration of innovative business solution.</li>
                </ol>
            </p>
            </div>
        </div>
    </div>
    
 
    <?php include('footer.php') ?>
    </div>
  </form>
 
  <?php include('jslink.php'); ?>

</body>

</html>