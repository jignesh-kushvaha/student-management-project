<style>
  .icon-envelope-l:before {
    content: "\f041";
}
</style>
<div class="footer">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-1"></div>
          <div class="col-md-10">
           <div class="row">
            <div class="col-lg-4"  style="border-right:1px dashed white;padding:0px 20px">
                <h2 class="footer-heading"><img src="images/nlcps.png" alt="Image" class="img-fluid mr-3"></h2>
                <h6 style="padding-right:2rem;text-align:justify">
                  "Best Empowering Educational Institution to groom the personality of budding Professionals in various fields provided with lush green campus, well-equipped laboratory and efficient teachers aimed to impart effective knowledge"
                </h6>
            </div>
            
            <div class="col-lg-4"  style="border-right:1px dashed white;padding:0px 20px">
                <h2 class="footer-heading"><span style="font-size:35px;margin-left:2rem">Courses</span></h2>
                <ul>
                  <?php
                    $query="select courseid,coursename,shortname,duration,fees,medium,totalsem,image from courses";
                    $tb=$dc->getTable($query);
                    $rno=0;
                    while($rw=mysqli_fetch_array($tb))
                    {
                      echo("<h6>");
                      echo("<li>".$rw['coursename']."</li>");
                      echo("</h6>");
                    }
                  ?>
                </ul>
            </div>

            <div class="col-lg-4" style="border-right:0px dashed white;padding:0px 20px">
              <h1 class="footer-heading"><span style="font-size:25px;margin-left:2rem">Contact Information</span></h1>
              <div class="row">
                <div class="col" style="padding:0px 50px;">
                    <div class="row">
                        <div class="col-md-1"><h6 class="icon-envelope-l"></h6></div>
                        <div class="col-md-10">
                        <h6> Bhagwati Sankul, Sitaram Nagar Society, Near Eru Char Rasta, Eru, Navsari - 396450.</h6>
                        </div>
                    </div><br>
                    <div class="row">
                      <div class="col">
                      <h6 class="icon-envelope-o"> naranlalacollege@gmail.com</h6>
                      </div>
                    </div><br>
                    <div class="row">
                      <div class="col">
                      <h6 class="icon-phone2"> 70699-05151, 70699-052526</h6>
                      </div>
                    </div>
                </div>
              </div>
            </div>
            
           </div>
         </div>
        </div>
      </div>
    </div>