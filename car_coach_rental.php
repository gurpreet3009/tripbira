
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
                <h1 class="display-4">Car & Coach Rental</h1>
            </div>
        </div>
        <div id="all">
          <div class="content">
              <div class="container">
                  <div class="col-lg-12">
                      <nav aria-label="breadcrumb">
                          <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="<?php echo BASE_URL; ?>">Home</a></li>
                              <li aria-current="page" class="breadcrumb-item active">Car & Coach Rental</li>
                          </ol>
                      </nav>
                  </div>
              </div>
      		    <div class="container my-container">
      			     <div class="section-story-overview">
      				        <div class="row">
      					         <div class="col-md-6">
                  						<p style="font-size: 22px;text-align: justify;">TRIPBIRA ensure a stress-free car rental experience by providing superior services that cater to our customer`s individual needs. We believe in setting world-class standards and providing unparalleled service and comfort to our valued customers. Our dedicated team ensures that you receive the highest quality service.</p>
                  			 </div>
      					         <div class="col-md-6">
      						          <img src="images/car_coach_rental.jpg" class="service_img">
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