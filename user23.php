<html>
<head>
<style>
table {
    width:30%;
}
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 5px;
    text-align: left;
}
table#t01 tr:nth-child(even) {
    background-color: #eee;
}
table#t01 tr:nth-child(odd) {
   background-color:#fff;
}
table#t01 th	{
    background-color: black;
    color: white;
}
</style>
</head>
<?php
	session_start();
	error_reporting(0);
	$servername= "localhost";
	$username= "root";
	$password="";
	$db_name="LogIn_form";
	$conn= mysqli_connect($servername,$username , $password, $db_name );
	$aa=$_SESSION['sid'];
	if($_REQUEST['logout'])
	{
		unset($_SESSION['sid']);
		header("location:log.php");
	}
	if($_SESSION['sid']=='')
	{
		header("location:log.php");
	}
	//<!----------- Directory -----------!>
		$cont=$_REQUEST['con'];
		$name=$_REQUEST['name'];
		$label=$_REQUEST['se'];
	if($_REQUEST["sub"])
	{
		$ab= "SELECT cont FROM tb_dir WHERE cont="."'$cont'";
		//echo $ab; die();
		$aab=mysqli_query($conn,$ab);
		$aabb=mysqli_fetch_array($aab);
		if($aabb['cont']==$cont)
		{
			echo "CONTACT EXIST!";
		}
		else
		{
			$inss="insert into tb_dir values('$cont','$name','$label','$aa','')";
			$ins= mysqli_query($conn, $inss);
			header("location:contact.php");
		}
	}
	
	if($_REQUEST['edit'])
	{
		header("location:contact.php");
	}
?>
<html>
	<form method= "post">
	<table align="right">
		<tr>
		<td> <?php echo $_SESSION['sid'].'<br>';?><hr></td><td>
		<input type="submit" value="Log Out" name="logout">	<hr></td>
		</tr>
	</table>
	<table id="t01" align="center" >
			<tr><td>Name</td><td><input type="text" name="name"></td></tr>
			<tr><td>Contact No</td><td><input type="text" name="con"></td></tr>
			<tr>
			<td>Label</td>
			<td>Home<input type="radio" name="se" value="home">Work<input type="radio" name="se" value="work"></td>
			</tr>
			<tr>
			<td><input type="submit" name="sub" value="Submit"></td><td align="right"><input type="submit" name="edit" value="BACK to CONTACTS LIST"></td>
			</tr>
	</table>
	</form>
</html>