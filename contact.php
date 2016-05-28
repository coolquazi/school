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
 <!--method="post"-->
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
		 $x= "select * from tb_dir where sid='".$_SESSION['sid']."'";
		 $xx= mysqli_query($conn, $x);//echo count($xx);die;
		 //$a=mysqli_fetch_array($xx);
		 //echo $a['sid']; die;
		 //$b=count($a)/4;
		 if($_REQUEST['logout'])
			{
				unset($_SESSION['sid']);
				header("location:log.php");
			}
			if($_SESSION['sid']=='')
			{
				header("location:log.php");
			}
		 if($_REQUEST['add'])
		 {
			header("location:user.php");
		 }
		if($_REQUEST['edit'])
		{
			//
			header("location:edit.php");
		}
		if($_REQUEST['del'])
		{
			//delete from tb_dir 
		}
		//$a=mysqli_fetch_array($xx);echo $a['sno']; die;
	?>
	<form method="get">
		<table align="right">
		<tr>
		<td> <?php echo $_SESSION['sid'].'<br>';?><hr></td><td>
		<input type="submit" value="Log Out" name="logout">	<hr></td>
		</tr>
	<table id="t01" align="center" >
		<tr>
			<th>NAME</th>
			<th>E-MAIL</th>
			<th>CONTACT</th>
			<th>LABEL</th>
			<th>	</th>
		</tr>
		<?php $i=0; while($a=mysqli_fetch_array($xx)){?>
		<tr><td><?php echo $a['aname'];?></td>
		<td><?php echo $a['sid'];?></td>
		<td><?php echo $a['cont'];?></td>
		<td><?php echo $a['label'];?></td>
		<td><a href="edit.php?contact=<?php echo $a['cont']; ?> & numb=<?php echo $a['sno'];?>"><?php //$_SESSION['cont']=$a['cont'];?>edit<!--<input type="submit" name="edit<?php //$i;?>" value="EDIT<?php //echo $i;?>">||<input type="submit" name="delete" value="del">--></tr>
		<?php $i++;}?>
		<tr><td colspan="5"><input type="submit" name="add" value="ADD CONTACT"></td></tr>
	</table>
</form>
</html>