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
  </style>

</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
<form name="frm" action="" method="post">
  <div class="site-wrap">
  

    <?php include('topper.php') ?>
    <?php include('header.php') ?>
    <a name="about">

    <div class="container" style="padding-top:7rem">
        <div class="row">
            <div class="col-md-12">
            <center>
                <h1>About Us</h1>
            </center>
            </div>
        </div>
    </div>

    <div class="container" style="padding-top:3rem">
        <div class="row">
            <div class="col-lg-4">
            <h2 class="section-title-underline">
                <span>Academics History</span>
            </h2>
            </div>
        </div>
    </div>

    <div class="container pt-5 mb-5">
        <div class="row">
        <div class="col-lg-4">
            <img src="images/clg/clg3.jpg" alt="Image"style="max-width:95%;height:100%">
        </div>
        <div class="col-lg-4">
            <p>20 years of legacy with State-of-Art infrastructure having lush green campus with 60 + Classrooms, 10+ Science & Computer Labs. Regular Participation in National and State level inter-collegiate events, Youth festival Competitions
            150+ winners each year.
            </p>
        </div>
        <div class="col-lg-4">
            <ul>
            <li>
            Serving the society by 'Cherish the Charity'.
            </li>
            <li>
            Catering talents through 'Synergy'.
            </li>
            <li>
            Adding colors in Students' life by celebrating festivals & fun week.
            </li>
            </ul>
        </div>
        </div>
    </div>

    <div class="container" style="padding-top:3rem">
     <div class="row">
        <div class="col-lg-4">
            <h2 class="section-title-underline">
                <span>About Trust</span>
            </h2>
        </div>
     </div>
    </div>

    <div class="container" style="padding: 2rem 0rem;">
        <div class="row">
            <div class="col-lg-12">
                <p>Shri Mohanlal Harkishandas Kansara Kelavani Trust, Navsari was established in 1992, with the objectives mentioned as under:<br>
                1.To distribute notebooks, books and other accessories to the needy students during their educational study.<br>
                2.To provide interest free study loans to the students.<br>
                3.To help the needy students for higher education and to meet their expenditures.</p>
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
    <div class="container" style="padding-top:3rem">
     <div class="row">
        <div class="col-lg-4">
            <h2 class="section-title-underline">
                <span>Chairman Message</span>
            </h2>
        </div>
     </div>
    </div>

    <div class="container" style="padding: 2rem 0rem;">
        <div class="row">
            <div class="col-lg-5">
                <img src="images/chairman.jpg" alt="Image"style="max-width:100%;height:100%">
            </div>
            <div class="col-lg-7">            
            HON. SHRI MAHESHBHAI M. KANSARA<br>
            (Chairman & Managing Trustee)<br><br>

            Life dedicated for the cause of the poor and the needy for socio-economic upliftment with the motto of “complete selflessness” and the vision of enlightening every dark corner of ignorance with knowledge.<br><br>
        
            Our Naran Lala college of Industrial Management and Computer Science is a new feather in the cap of Naran Lala group of Educational Institutes. It is my proud pleasure to acknowledge the space that it has created for itself in a very short period of time. I heartily admire the effort of staff and other official that are associated with academic and other co curricular activity of the institute.<br><br>     

            I am sure of the journey ahead on the path of the success and wish the institute riches new heights of achievements in future.
            </div>
        </div>
    </div>

    <?php include('footer.php') ?>
    </div>
  </form>
 
  <?php include('jslink.php'); ?>

</body>

</html>