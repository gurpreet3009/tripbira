<?php 
	require "header.php";

	include('create_order_modal.php');
?>

	<?php 

		if(isset($_SESSION['userid'])) { 

			require('../config/db.php');

			$conn = OpenCon();

			$sql = "SELECT * FROM tb_order WHERE status = '0'";

			$result = $conn->query($sql);
			
			?>
			<div class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header card-header-tabs card-header-primary">
									<div class="nav-tabs-navigation">
										<div class="nav-tabs-wrapper">
											<span class="nav-tabs-title" style="font-size: 24px; font-weight: 500;">Order</span>
											<ul class="nav nav-tabs pull-right" data-tabs="tabs">
												<li class="nav-item">
													<a class="nav-link active" data-toggle="modal" data-target="#create_order">
														<i class="material-icons">library_books</i> Create Order
														<div class="ripple-container"></div>
													</a>
												</li>
											</ul>
										</div>
									</div>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table class="table">
											<thead class=" text-primary">
												<tr>
													<th>
														ID
													</th>
													<th>
														Name
													</th>
													<th>
														Email
													</th>
													<th>
														City
													</th>
													<th>
														Order Name
													</th>
													<th>
														Place
													</th>
													<th>
														Day
													</th>
													<th>
														Departure
													</th>
													<th>
														Amount
													</th>
													<th>
														Total Amount
													</th>
													<th>
														Send Mail
													</th>
													<th>
														Action
													</th>
												</tr>
											</thead>
											<tbody>
										<?php foreach ($result as $key => $rows) { ?>
												<tr>
													<td>
														<?php echo ++$key; ?>
													</td>
													<td>
														<?php echo $rows['customer']; ?>
													</td>
													<td>
														<?php echo $rows['cust_email']; ?>
													</td>
													<td>
														<?php echo $rows['cust_city']; ?>
													</td>
													<td>
														<?php echo $rows['order_name']; ?>
													</td>
													<td>
														<?php echo $rows['order_place']; ?>
													</td>
													<td>
														<?php echo $rows['day']; ?>
													</td>
													<td>
														<?php echo $rows['departure']; ?>
													</td>
													<td class="text-primary">
														<?php echo $rows['amount']; ?>
													</td>
													<td class="text-primary">
														<?php echo $rows['total_amount']; ?>	
													</td>
													<td class="td-actions text-center">
														<form class="mail-submit">
															<input type="hidden" name="email" value="<?php echo $rows['cust_email']; ?>">
															<input type="hidden" name="order_id" value="<?php echo $rows['id']; ?>">
															<input type="hidden" name="name" value="<?php echo $rows['customer']; ?>">
															<button type="submit" rel="tooltip" title="" class="btn btn-info btn-link btn-sm" data-original-title="Send payment Link">
																<i class="material-icons">email</i>
															</button>
														</form>
													</td>
													<td class="td-actions text-center">
														<form class="edit_form-submit" style= "display: inline-block;">
															<input type="hidden" name="id" value="<?php echo $rows['id']; ?>">
															<input type="hidden" name="action" value="show">
															<button type="submit" rel="tooltip" title="" class="btn btn-primary btn-link btn-sm" data-original-title="Edit Task">
																<i class="material-icons">edit</i>
																<div class="ripple-container"></div>
															</button>
														</form>
														<form class="form-submit" style= "display: inline-block;">
															<input type="hidden" name="id" value="<?php echo $rows['id']; ?>">
															<input type="hidden" name="action" value="delete">
															<button type="submit" rel="tooltip" title="" class="btn btn-danger btn-link btn-sm" data-original-title="Remove">
																	<i class="material-icons">close</i>
															</button>
														</form>
													</td>
												</tr>
											<?php } ?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php

		require "footer.php";
		} else { 
			header("Location: ../dashboard/login.php");	
		}
	?>