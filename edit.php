<html>
<head>
<style>
table {
    width:100%;
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
	if($_REQUEST['logout'])
		{
			unset($_SESSION['sid']);
			header("location:log.php");
		}
	if($_SESSION['sid']=='')
		{
			header("location:log.php");
		}

	$contact=$_REQUEST['contact'];
	$name=$_REQUEST['name'];
	$label=$_REQUEST['label'];
	$sno=$_REQUEST['numb'];
	//$id=$_GET['id']; var_dump($id); die;
	//$sid=$_REQUEST[';
	$s="select * from tb_dir where cont= '". $_GET['contact']."'"; //echo $s;die;
	$s1=mysqli_query($conn, $s);
	$ss=mysqli_fetch_array($s1);
	//print_r($_GET['numb']);
	
	//print_r($_REQUEST);die;
	//$sno=3;
	if($_REQUEST['logout'])
	{
		unset($_SESSION['sid']);
		header("location:log.php");
	}
	if($_SESSION['sid']=='')
	{
		header("location:log.php");
	}
	if($_REQUEST['update'])
	{
		//print_r($_REQUEST);die;
		//echo $_SERVER['REQUEST_URI'];
		//$getUrl = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
		//echo $getUrl(); die;
		
		$upd="UPDATE tb_dir SET cont='$contact', aname='$name', label='$label', sid='".$_SESSION['sid']."' where sno= '$sno'"; //die;
		 $update=mysqli_query($conn,$upd); //or die(mysql_error());
		 //unset($_SESSION['cont']);
		header("location:contact.php");
	}
	if($_REQUEST['delete'])
	{
		$del= "DELETE from tb_dir where sno= '$sno'";
		$dell=mysqli_query($conn, $del);
		header("location:contact.php");
	}
?>
<form><!--method="post"-->
	<table align="right">
		<tr>
		<td> <?php echo $_SESSION['sid'].'<br>';?><hr></td><td>
		<input type="submit" value="Log Out" name="logout">	<hr></td>
		</tr>
	</table>
	<table id="t01" align="center" >
		<th colspan="2">UPDATE YOUR CONTACT</th>
		<tr><td>CONTACT</td><td><input type="text" name="contact" value="<?php echo $ss['cont'];?>" required></td></tr>
		<tr><td>NAME</td><td><input type="text" name="name" value="<?php echo $ss['aname'];?>" required></td></tr>
		<tr><td>LABEL</td><td><input type="text" name="label" value="<?php echo $ss['label'];?>"></td></tr>
		<tr><td>EMAIL</td><td><input type="button" name="sid" value="<?php echo $_SESSION['sid'];?>"></td></tr>
		<tr><td><input type="hidden" name="numb" value="<?php echo $_GET['numb']?>"></td></tr>
		</tr><?php //echo $_SERVER['PHP_SELF'];?>
		<tr>
			<td colspan="2">
				<input type="submit" name="update" value="UPDATE">
				<input type="submit" name="delete" value="DELETE">
			</td>
		</tr>
	</table>
</form>
</html>