<!-- Modal -->
<div id="create_order" class="modal fade bd-example-modal-lg" role="dialog">
	<div class="modal-dialog modal-lg">
		
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header" style="padding : 10px;">
				<h3 style="margin: 0;">Create Order</h3>
				<button type="button" data-dismiss="modal" id="closemodal" style=" background: transparent;border: none;font-size: 25px;position: relative;">&times;</button>
			</div>
			<div class="modal-body" style="padding : 5px;">
				<div class="row" style="padding: 10px;">
					<div class="col-md-12">
						<form class="form-submit">
							<div class="row">
								<div class="col-md-12">
									<label style="font-weight: 600;">Customer Detail</label>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group bmd-form-group">
										<label class="bmd-label-floating">Name</label>
										<input type="text" class="form-control" name="customer" id="customer" required = "required">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group bmd-form-group">
										<label class="bmd-label-floating">Email address</label>
										<input type="email" class="form-control" name="cust_email" id="cust_email" required = "required">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group bmd-form-group">
										<label class="bmd-label-floating">Address</label>
										<input type="text" class="form-control" name="cust_address" id="cust_address" required = "required">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group bmd-form-group">
										<label class="bmd-label-floating">City</label>
										<input type="text" class="form-control" name="cust_city" id="cust_city" required = "required">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group bmd-form-group">
										<label class="bmd-label-floating">Country</label>
										<input type="text" class="form-control" name="cust_country" id="cust_country" required = "required">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group bmd-form-group">
										<label class="bmd-label-floating">Postal Code</label>
										<input type="text" class="form-control" name="cust_postal_code" id="cust_postal_code" required = "required">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<label style="font-weight: 600;">Order Detail</label>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group bmd-form-group">
										<label class="bmd-label-floating">Name</label>
										<input type="text" class="form-control" name="order_name" id="order_name" required = "required">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group bmd-form-group">
										<label class="bmd-label-floating">Place</label>
										<input type="text" class="form-control" name="order_place" id="order_place" required = "required">
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-group bmd-form-group">
										<label class="bmd-label-floating">Day</label>
										<input type="text" class="form-control" name="day" id="day" required = "required">
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-group bmd-form-group">
										<input type="text" id="date" class="form-control datetimepicker" name="date" id="date" placeholder="Departure" id="date" required = "required">
										<input type="hidden" name="departure" id="departure">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group bmd-form-group">
										<label class="bmd-label-floating">Amount</label>
										<input type="text" class="form-control" name="amount" id="amount" required = "required">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group bmd-form-group">
										<label class="bmd-label-floating">Total Amount</label>
										<input type="text" class="form-control" name="total_amount" id="total_amount" required = "required">
									</div>
								</div>
								<div class="col-md-2">
									<input type="hidden" name="action" value="add" id="new_action">
									<input type="hidden" name="id" value="" id="cust_id">
									<button type="submit" class="btn btn-primary pull-right" name="submit">Create</button>
								</div>
							</div>
							<?php include('dash_message.php'); ?>
							<div class="clearfix"></div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>	