<?php 
      $conn = OpenCon();

      $internat_sql = "SELECT city, img FROM tb_packages As p JOIN tb_feat_packages As fp on p.id=fp.pack_id WHERE fp.feat_id='3' group by p.city";
      $internat_result = $conn->query($internat_sql);

      // closing connection 
      mysqli_close($conn);       
?>		

		<div id="hot">
			<div class="box py-4">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<h2 class="mb-0">International Package</h2>
						</div>
					</div>
				</div>
			</div>
			<div class="container my-container">
				<div class="row">
					<div class="swiper-container">
	      				<div class="swiper-wrapper">
	                            <?php foreach ($internat_result as $internat_rows) { 
	                            	$city_url = str_replace(' ', '_', $internat_rows['city']);
	                            ?>
	                            <div class="swiper-slide sliderPackage" style="background-image:url('images/<?php echo $internat_rows['img']?>');display: flex;justify-content: center;align-items: center;">
	                            	<a href="<?php echo BASE_URL; ?>international_tour_package/<?php echo $city_url; ?>" style="text-decoration: none;text-align: center;">
		            					<span style="background: #2b262669;border: 0;color: #fff;cursor: pointer;font-size: 20px;padding: 15px;border-radius: 10px;text-align:center;text-transform: capitalize;"><?php echo $internat_rows['city']?>
		            					</span>
		            				</a>
	                            </div>
	                            <?php } ?>
	      				</div>
	      				<!-- Add Pagination -->
	      				<div class="swiper-pagination"></div>
      				</div>
				</div>
			</div>
		</div>