<?php 

	if(isset($_POST['login-submit'])) {

		require('../config/db.php');

		$conn = OpenCon();
		
		$mailuid = $_POST['username'];
		$password = $_POST['pwd'];

		if(empty($mailuid) || empty($password)) {
			header("Location: dashboard/index.php?error=emptyfields");
			exit();

		} else {

			$sql = "SELECT * FROM tb_users WHERE username='".$mailuid."'";
			$stmt = $conn->query($sql);

			if(!$conn->query($sql)) {
				header("Location: ../dashboard/index.php?error=sqlerror");
				exit();				
			} else {

				if($row = mysqli_fetch_assoc($stmt)) {
					$pwdCheck = password_verify($password, $row['password']);

					if($pwdCheck == false) {
						header("Location: ../dashboard/index.php?error=wrongpwd");
						exit();
					} else if ($pwdCheck == true) {
						session_start();
						$_SESSION['userid'] = $row['id'];
						$_SESSION['userUid'] = $row['username'];

						header("Location: ../dashboard");
						exit();
					} else {
						header("Location: ../dashboard/index.php?error=wrongpwd");
						exit();
					}
				} else {
					header("Location: ../dashboard/index.php?error=nouser");
					exit();
				}
			}
		}

	} 
    else { ?>
    	<html>
	    	<head>
	    		<title>TripBira</title>

	    		<link rel="stylesheet" type="text/css" href="../css/login.css">
	    		<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
				<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
				<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	    	</head>
	    	<body>
		    	<div class="wrapper fadeInDown">
		    		<div id="formContent">

		    			<!-- Icon -->
		    			<div class="fadeIn first">
		    				<img src="../images/Logo1.png" id="icon" alt="User Icon" height="70" width="200"/>
		    			</div>

		    			<!-- Login Form -->
		    			<form action="login.php" method="POST">
		    				<input type="text" id="login" class="fadeIn second" name="username" placeholder="username">
		    				<input type="password" id="password" class="fadeIn third" name="pwd" placeholder="password">
		    				<input type="submit" name="login-submit" class="fadeIn fourth" value="Login">
		    			</form>

		    		</div>
		    	</div>
		    			
		    </body>
		</html>

<?php	}

?>


<!-- <form action="signup.php" method="POST">
		    				<input type="text" id="login" class="fadeIn second" name="username" placeholder="username">
		    				<input type="text" id="mail" class="fadeIn second" name="mail" placeholder="username">
		    				<input type="password" id="password" class="fadeIn third" name="pwd" placeholder="password">
		    				<input type="password" id="pwd-repeat" class="fadeIn third" name="pwd-repeat" placeholder="password">
		    				<input type="submit" name="signup-submit" class="fadeIn fourth" value="Login">
		    			</form> -->