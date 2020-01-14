<?php 

	if(isset($_POST['signup-submit'])) {
		require('../config/db.php');

		$conn = OpenCon();

		$username = $_POST['username'];
		$email = $_POST['mail'];
		$password = $_POST['pwd'];
		$passwordRepeat = $_POST['pwd-repeat'];

		if(empty($username) || empty($email) || empty($password) || empty($passwordRepeat)) {
			header("Location: ../dashboard/index.php?error=emptyfields&invalidusername&mail".$username."&mail=".$email);
			exit();
		} else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
			header("Location: ../dashboard/index.php?error=emptyfields&invalidusername&mail");
			exit();
		} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			header("Location: ../dashboard/index.php?error=emptyfields&username=".$username);
			exit();
		} else if(!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
			header("Location: ../dashboard/index.php?error=emptyfields&mail=".$email);
			exit();
		} else if ($password !== $passwordRepeat ) {
			header("Location: ../dashboard/index.php?error=emptyfields&invalidusername&mail".$username."&mail=".$email);
			exit();
		} else {
			$sql = "SELECT username FROM tb_users WHERE username=?"; 
			$stmt = mysqli_stmt_init($conn);

			if(!mysqli_stmt_prepare($stmt, $sql)) {
				header("Location: ../dashboard/index.php?error=sqlerror");
				exit();
			} else {
				mysqli_stmt_bind_param($stmt, "s", $username);
				mysqli_stmt_execute($stmt);
				mysqli_stmt_store_result($stmt);

				$resultCheck = mysqli_stmt_num_rows($stmt);

				if($resultCheck > 0) {
					header("Location: ../dashboard/index.php?error=usertaken&mail=".$email);
					exit();
				} else {
					$sql = "INSERT INTO tb_users (username, email, password) VALUES (?, ?, ?)";
					$stmt = mysqli_stmt_init($conn);
					if(!mysqli_stmt_prepare($stmt, $sql)) {
						header("Location: ../dashboard/index.php?error=sqlerror");
						exit();
					} else {
						$hashedPwd = password_hash($password, PASSWORD_DEFAULT);

						mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPwd);
						mysqli_stmt_execute($stmt);
						mysqli_stmt_store_result($stmt);
						header("Location: ../dashboard/index.php?signup=success");
						exit();
					}
				}
			}
		}
		mysqli_stmt_close($stmt);
		mysql_close($conn);
	} else {
		header("Location: ../dashboard/index.php");
		exit();
	}

?>