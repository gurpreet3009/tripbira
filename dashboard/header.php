<?php 
	session_start(); 

	define("DASHBOARD_URL", "http://localhost/tb/dashboard");
	
?>
<!DOCTYPE html>
<html lang="en" class="perfect-scrollbar-on">
<head>
	<title>TripBira</title>

	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../css/dashboard.css">
	<link rel="stylesheet" type="text/css" href="../css/material-dashboard.css">

	
	<script src="../js/jquery.min.js" type="text/javascript"></script>
    <script src="../js/popper.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="../js/bootstrap-material-design.min.js"></script>

    <script type="text/javascript" src="../js/perfect-scrollbar.jquery.min.js"></script>

    

</head>
<body>
<?php if(!isset($_SESSION['userid'])) { 
	header("Location: ../dashboard/login.php");
	} else {
	?>
		<div class="wrapper ">
			<div class="sidebar" data-color="purple" data-background-color="white">
				<div class="logo">
					<a href="<?php echo DASHBOARD_URL; ?>" class="simple-text logo-mini">
						<img src="../images/Logo1.png" id="icon" alt="User Icon" height="70" width="200"/>
					</a>
				</div>
				<div class="sidebar-wrapper ps-container ps-theme-default" data-ps-id="2714b2fa-ef75-7160-6ce2-a404e5ffa279">
					<ul class="nav">
						<li class="nav-item">
							<a class="nav-link" href="<?php echo DASHBOARD_URL; ?>">
								<i class="material-icons">dashboard</i>
								<p>Dashboard</p>
							</a>
						</li>
						<li class="nav-item ">
							<a class="nav-link" href="<?php echo DASHBOARD_URL; ?>/order_table.php">
								<i class="material-icons">content_paste</i>
								<p>Order Table</p>
							</a>
						</li>
					</ul>
					<div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 0px;">
						<div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div>
					</div>
					<div class="ps-scrollbar-y-rail" style="top: 0px; right: 0px;">
						<div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 0px;"></div>
					</div>
				</div>
				<div class="sidebar-background" style="background-image: url(../images/sidebar-1.jpg) "></div>
			</div>
			<div class="main-panel ps-container ps-theme-default ps-active-y" data-ps-id="fdfcf644-9343-29e2-2bf4-e95775b1bdb6">
				<!-- Navbar -->
				<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
					<div class="container-fluid">
						<div class="navbar-wrapper">
							<a class="navbar-brand">Hello <?php echo $_SESSION['userUid'];?></a>
						</div>
						<button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
							<span class="sr-only">Toggle navigation</span>
							<span class="navbar-toggler-icon icon-bar"></span>
							<span class="navbar-toggler-icon icon-bar"></span>
							<span class="navbar-toggler-icon icon-bar"></span>
						</button>
						<div class="collapse navbar-collapse justify-content-end">
							<ul class="navbar-nav">
								<li class="nav-item">
									<a class="nav-link" href="#pablo">
										<i class="material-icons">notifications</i> Notifications
									</a>
								</li>
								<?php 
								if(isset($_SESSION['userid'])) { ?>
								<li class="nav-item">
									<form action="logout.php" method="POST">
										<button type="submit" name="logout-submit" class="log_sub_btn"><i class="material-icons" style="font-size: 18px;top: 3px;position: relative;margin-right: 3px;">lock</i> Logout</button>
									</form>
								</li>
								<?php	
								}
								?>
								<!-- your navbar here -->
							</ul>
						</div>
					</div>
				</nav>
				<!-- End Navbar -->
	<?php } ?>
