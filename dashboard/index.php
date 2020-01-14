<?php 
	require "header.php";
?>

<main>
	<?php 
		if(isset($_SESSION['userid'])) { ?>
		<div class="content">
			<div class="container-fluid">
				
			</div>
		</div>
		<?php
		} else { 
			header("Location: ../dashboard/login.php");
		}
	?>
</main>

<?php 
	require "footer.php";
?>


<!-- <form action="signup.php" method="POST">
	<input type="text" name="username" placeholder="Username">
	<input type="text" name="mail" placeholder="Email">
	<input type="password" name="pwd" placeholder="Password">
	<input type="password" name="pwd-repeat" placeholder="Repeat Password">
	<button type="submit" name="signup-submit">Signup</button>
</form> -->

