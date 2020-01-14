
  <!--*** HEADER ***-->
  <?php include('view/header.php'); ?>
  <!--*** HEADER END ***-->

  <!--*** NAVBAR ***-->
  <?php include('view/navbar.php');  ?>

  <style type="text/css">
    .service_img {
        background-attachment: fixed;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        width: 100%;
    }
  </style>
        <div class="jumbotron jumbotron-fluid my-jumbotron" style="background-image: url('images/banner.jpg');">
            <div class="container">
                <h1 class="display-4">Travel Insurance</h1>
            </div>
        </div>
        <div id="all">
          <div class="content">
              <div class="container">
                  <div class="col-lg-12">
                      <nav aria-label="breadcrumb">
                          <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="<?php echo BASE_URL; ?>">Home</a></li>
                              <li aria-current="page" class="breadcrumb-item active">Travel Insurance</li>
                          </ol>
                      </nav>
                  </div>
              </div>
              <div class="container my-container">
                 <div class="section-story-overview">
                      <div class="row">
                         <div class="col-md-6">
                              <p style="font-size: 22px;text-align: justify;">While planning to travel, it&#39;s highly recommended to buy a travel insurance plan to take care of risks or losses that might occur during the trip. Travel Insurance is meant to protect you &amp; your loved ones from unforeseen circumstances, even if you are not with them.</p>
                         </div>
                         <div class="col-md-6">
                            <img src="images/travel_insurance.jpg" class="service_img">
                         </div>
                      </div>
                 </div>
              </div>
          </div>
      </div>

<!-- Footer -->
    <?php include('view/footer.php'); ?>
</body>
</html>