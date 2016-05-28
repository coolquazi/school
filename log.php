
<?php
	//include("config.php");
	error_reporting(0);
	session_start();
	$servername= "localhost";
	$username= "root";
	$password="";
	$db_name="LogIn_form";
	$conn= mysqli_connect($servername,$username , $password, $db_name );
	//mysqli_select_db($db_name, $conn) or die("mysql_error");
	$email=$_REQUEST['email'];
	$pwd=$_REQUEST['pwd'];
	if($_REQUEST['login'])
	{
		if($email=="" && $pwd=="")
		{
			echo "please enter email ID and Password";
		}
		
		echo $query = "SELECT sid, pwd FROM tb_form WHERE sid="."'$email'";
		$sel=mysqli_query($conn, $query);
		$res=mysqli_fetch_array($sel);
	//echo $res;
		//die;
		if($res['sid']==$email && $res['pwd']==$pwd)
		{
			$_SESSION['sid']=$email;
			header("location:contact.php");
		}
		else
		{
			$msg="Email-ID and Password do not match";
		}
	}
	
?>
<form>
<table align="center" valign="centre" width="318" border="0" cellspacing="0" cellpadding="0" style="font-family:Arial, Helvetica, sans-serif; color:#333333; text-align:center;">
<tr><td></td></tr><tr></tr><tr></tr>
  <tr>
    <td valign="top" height="250">
	<table width="100%" height="271" border="0" cellpadding="0" cellspacing="0" bgcolor="#EFEFEF" style="border:2px solid #CACACA; text-align:center;">
  
  <tr>
    <td><img src="images/user.png"></td>
  </tr> 
  <tr>
    <td height="58"><input type="text" name="email" size="40" placeholder="Email"></td>
  </tr>
  <tr>
    <td height="50"><input type="password" name="pwd" size="40" placeholder="password"></td>
  </tr>
  <tr>
    <td height="53"><input type="submit" name="login" value=" Sign in" style="background-color:#0066CC; color:#FFFFFF; font-family:Arial; font-size:14px; border:0px; height:32px; width:130px;"></td>
  </tr>

<tr><td colspan="2" height="40" align="center" style="color:#FF0000; font-weight:bold; font-family:Arial;"><?php echo $msg; ?></td></tr>


</table>

	</td>
  </tr>
  <tr>
    <td height="37" align="center"><a href="reg.php">Create An Account</a></td>
  </tr>
</table>
</form>
