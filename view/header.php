<!DOCTYPE html>
<html>
<head>
    <base href="https://tripbira.com/">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>TripBira | A Brother's Deal</title>
	<meta name="description" content="Book best holiday packages, Handsome Discounts, Last Minute Travel Deals, Lowest Flight Fares, Best Deals Guaranteed, Sight Seeing & Car rental offers,  Emerging Travel Site, Tailored Family & Honeymoon Trips, 24*7 Customer Service.">
	<meta name="keywords" content="Trip Planning, holiday, travel, hotels, hotel,tourism,beaches, shopping, flights, resorts, tourist places, wildlife, flight tickets, resort, air ticket, tours and travels, honeymoon packages, tour, holidays, tour packages, holiday packages,sightseeing, airfare, travel package, trip, holiday packages,tours, trips, holiday, hill stations,travel, online travel,flight ticket, flight tickets, flight booking, cheap flights, cheap flight tickets, book flight tickets, air ticket, cheap air ticket, flight offers, lowest airfare, lowest air fare, flight deals, airfare, air fare">

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="robots" content="all,follow">

	<!-- Bootstrap CSS-->
	<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
	<!-- Font Awesome CSS-->
	<link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
	<!-- Google fonts - Roboto -->
	<!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700"> -->
	<!-- owl carousel-->
	<link rel="stylesheet" href="vendor/owl.carousel/assets/owl.carousel.css">
	<link rel="stylesheet" href="vendor/owl.carousel/assets/owl.theme.default.css">
	<!-- theme stylesheet-->
	<link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
	<!-- Custom stylesheet - for your changes-->
	<link rel="stylesheet" href="css/custom.css">

	<!-- Swiper stylesheet - for your changes-->
	<link rel="stylesheet" href="css/swiper.css">

	<!-- My-Style stylesheet - for your changes-->
	<link rel="stylesheet" href="css/my-style.css">

	<!-- Favicon-->
	<link rel="icon" href="images/favicon_black.png" type="image/x-icon">

	<!-- JavaScript files-->
	<script src="vendor/jquery/jquery.min.js"></script>
	<!-- Bootstrap Date-Picker Plugin -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

	<!-- Animate css -->
    <link rel="stylesheet" type="text/css" href="css/animate.css">

    <!-- wow js -->
    <script src="js/wow.js"></script>

	<?php 

	if ($_SERVER['HTTP_HOST'] == 'localhost') { ?>
		<script src="https://www.google.com/recaptcha/api.js?render=6Ldzna0UAAAAAPn6R5SacGh0LYW5JXpTuylhnI6C"></script>
		<script type="text/javascript">
			grecaptcha.ready(function() {
				grecaptcha.execute('6Ldzna0UAAAAAPn6R5SacGh0LYW5JXpTuylhnI6C', {action: 'query'}).then(function(token) {
					var recaptchaResponse = document.getElementById('recaptchaResponse');
					recaptchaResponse.value = token;
				});
			});
		</script>
		<?php
	} else { ?>
		<script src="https://www.google.com/recaptcha/api.js?render=6Lfr8K4UAAAAADNkc7yr2-vDH7nreM6UVi1PgABG"></script>
		<script type="text/javascript">
			grecaptcha.ready(function() {
				grecaptcha.execute('6Lfr8K4UAAAAADNkc7yr2-vDH7nreM6UVi1PgABG', {action: 'query'}).then(function(token) {
					var recaptchaResponse = document.getElementById('recaptchaResponse');
					recaptchaResponse.value = token;
				});
			});
		</script>
		<?php
	}

	?>
</head>
<body>