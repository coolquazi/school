<?php
    $servername= "localhost";
	$username= "root";
	$password="";
	$db_name="LogIn_form";
	$conn= mysqli_connect($servername,$username , $password, $db_name );
	mysqli_select_db($db_name, $conn) or die("mysql_error");
?>