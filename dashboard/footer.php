			
			</div>
		</div>
		<script src="../js/moment.min.js"></script>
	    <!--    Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
	    <script src="../js/bootstrap-datetimepicker.js" type="text/javascript"></script>

	    <script type="text/javascript" src="../js/material-dashboard.js"></script>
	    <script src="../js/dashboard_script.js" type="text/javascript"></script>

	    <script type="text/javascript">
	    	$(document).ready(function(){

	    		function reloadPage(){
	    			location.reload(true);
	    		}

	    		$('.datetimepicker').datetimepicker({
	    			icons: {
	    				time: "fa fa-clock-o",
	    				date: "fa fa-calendar",
	    				up: "fa fa-chevron-up",
	    				down: "fa fa-chevron-down",
	    				previous: 'fa fa-chevron-left',
	    				next: 'fa fa-chevron-right',
	    				today: 'fa fa-screenshot',
	    				clear: 'fa fa-trash',
	    				close: 'fa fa-remove'
	    			}
	    		});

	    		$('.form-submit').on('submit', function(e){
	    			e.preventDefault();
	    			var newdate = $('#date').val();
	    			var date = moment(newdate).format('YYYY-MM-DD');
	    			$('#departure').val(date);
	    			$.ajax({
	    				type : "POST",
	    				url : 'order_crud.php',
	    				data : $(this).serialize(), 
	    				success : function(data){
	    					$('#dash_message').modal('toggle');
	    					$('#new_message').text(data);
	    				}
	    			})
	    		})

	    		$('.edit_form-submit').on('submit', function(e){
	    			e.preventDefault();
	    			$.ajax({
	    				type : "POST",
	    				url : 'order_crud.php',
	    				data : $(this).serialize(), 
	    				success : function(data){
	    					val = JSON.parse(data);
	    					$('#customer').val(val['customer']);
			    			$('#cust_email').val(val['cust_email']);
			    			$('#cust_address').val(val['cust_address']);
			    			$('#cust_city').val(val['cust_city']);
			    			$('#cust_country').val(val['cust_country']);
			    			$('#cust_postal_code').val(val['cust_postal_code']);
			    			$('#order_name').val(val['order_name']);
			    			$('#order_place').val(val['order_place']);
			    			$('#day').val(val['day']);
			    			$('#date').val(val['departure']);
			    			$('#amount').val(val['amount']);
			    			$('#total_amount').val(val['total_amount']);
			    			$('#cust_id').val(val['id']);
			    			$('#new_action').val('edit');
			    			$('#create_order').modal('toggle');
			    			$('.form-group').addClass('is-filled');
	    				}
	    			})
	    		})

	    		$('.mail-submit').on('submit', function(e){
	    			e.preventDefault();
	    			$.ajax({
	    				type : "POST",
	    				url : 'mail_send.php',
	    				data : $(this).serialize(), 
	    				success : function(data){
	    					$('#dash_message').modal('toggle');
	    					$('#new_message').text(data);
	    				}
	    			})
	    		})

	    		$('#closemodal').click(function(){
	    			reloadPage();
	    		})

	    		$('#amount').keyup(function(){
	    			var value = $(this).val();
	    			var result = value*18/100;
	    			var test = parseInt(value)+parseInt(result);
	    			$('#total_amount').val(test);
	    		})
	    	})
	    </script>
	</body>
</html>
