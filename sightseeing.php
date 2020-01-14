
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
                <h1 class="display-4">Sightseeing</h1>
            </div>
        </div>
        <div id="all">
          <div class="content">
              <div class="container">
                  <div class="col-lg-12">
                      <nav aria-label="breadcrumb">
                          <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="<?php echo BASE_URL; ?>">Home</a></li>
                              <li aria-current="page" class="breadcrumb-item active">Sightseeing</li>
                          </ol>
                      </nav>
                  </div>
              </div>
              <div class="container my-container">
                 <div class="section-story-overview">
                      <div class="row">
                         <div class="col-md-6">
                              <p style="font-size: 22px;text-align: justify;">TRIPBIRA offer a large range of sightseeing tours that let you explore and discover the world on the go. No matter whether you want to go for sightseeing tours for domestic or international destinations, TRIPBIRA has got it all. Whether the sightseeing tour is to Shimla, Munnar, Kerala, Andaman or to an international destination such as Bali, America, South Africa, or Maldives, TRIPBIRA will make it happen.</p>
                         </div>
                         <div class="col-md-6">
                            <img src="images/sightseeing.jpg" class="service_img">
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