<?php
	

	
	
	function OpenCon()
	{
	    $db_server = "localhost";
    	$db_user = "root";
	    $db_pass = "";
	    $db_database ="tb";
		$conn = new mysqli($db_server, $db_user, $db_pass, $db_database) or die("Connect failed: %s\n". $conn -> error);

		return $conn;
	}

	function CloseCon($conn)
	{
		$conn -> close();
	}

?>