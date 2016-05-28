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
<form>
<table id="t01" align="center" width="150">
	<tr>
		<th colspan = "2" align="center">Registration Form
		</th>
	</tr>
  <tr>
    <td>Name</td>
    <td><input type="text" name="name" required></td>
  </tr>
  <tr>
    <td>Email-Id</td>
    <td><input type="text" name="email" id="email" ></td>
  </tr>
  <tr>
    <td>Password</td>
    <td><input type="password" name="pwd" required></td>
  </tr>
  <tr>
    <td>Confirm Password</td>
    <td><input type="password" name="cpwd" required></td>
  </tr>
  <tr>
    <td>Date of Birth</td>
    <td><input type="text" name="age" value="yyyy-mm-dd" onfocus="this.value=''" required></td>
  </tr>
  <tr>
    <td>Contact</td>
    <td><input type="text" name="con" required></td>
  </tr>
  <tr>
    <td>Gender</td>
    <td>Male<input type="radio" name="sex" value="Male">Female<input type="radio" name="sex" value="Female"></td>
  </tr>
  
   <tr>
    <td colspan="2" align="center"><input type="submit" value="Submit" id="btn" name="reg"> <a href="index.php">Back</a></td>
  </tr> 
  
</table>
</form>
<script>
    $(document).ready(function){
		$('#btn').click(function(){
			var $email = $('#email').val();
			if($.trim($email).length == 0){
				alert('Please Enter E-Mail address');
			}
			if(!validateEmail($email)){
				alert('Please Enter a valid e-mail');
			}
		});
	});
	
	function validateEmail($email){
		var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3}(\]?)$/;
		if(filte.test($email)){
			return true;
		}else{
			return false;
		}
	}
	
</script>
<?php
error_reporting(0);
	$servername= "localhost";
	$username= "root";
	$password="";
	$db_name="LogIn_form";
	$conn= mysqli_connect($servername,$username , $password, $db_name );
	session_start();
	$name=$_REQUEST['name'];
	$email=$_REQUEST['email'];
	//echo $id; 
	$pwd=$_REQUEST['pwd'];
	//echo $pwd;
	$cpwd=$_REQUEST['cpwd'];
	$age=$_REQUEST['age'];
	$con=$_REQUEST['con'];
	$gender=$_REQUEST['sex'];
	if($pwd == $cpwd)
		{
		}
	else
		{
			echo "please enter the correct password";
		}
		//database connectivity -->
	if($_REQUEST['reg'])
	{
		$sel= "SELECT sid FROM tb_form WHERE sid="."'$email'";
		$sell= mysqli_query($conn,$sel);
		//echo $sell; die;
		$res=mysqli_fetch_array($sell);
		//echo $res['sid']; die;
		if($res['sid']== $email)
			{
				echo "Id Already Exists";
			}
			else
			{
				$ins=mysqli_query("insert into tb_form values('$name', '$email', '$pwd', '$cpwd', '$age', '$con', '$gender', 'user')");
				header("location:log.php");
			}
			
}
?>
</html>