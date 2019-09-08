<?php 
session_start();

?>


<!DOCTYPE html>
<html >
<head>
	<title>Mock Test</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="C:\xampp\htdocs\mocktest\like\public\fonts\fontawesome.css">
	<style type="text/css">
		html
		{
			background:url(images/121.jpg);
		}
	</style>
</head>
<body>
	<div class="header">
		<div style="float:left; padding-left:20px; color:yellow; font-family:Agency FB; font-size:30px; "><h1>MockTest</h1></div>
		<div style="float:right; padding-top:30px; padding-right:10px;  ">
			<form action="index.php" method="post" enctype="maltipart/data-type">
				<input type="text" name="username" style="height:25px;" placeholder="Username">
				<input type="password" name="password" style="height:25px;" placeholder="Password">
				<input style="width:100px; height:30px; font-size: 16px;" type="submit" name="submit" value="login">


			</form>
		  </div>

	</div>
		<hr/ color="white">
		<div class="container">

			<div class="sidebar">
				<form action="userdata.php" method="post">
					<table class="table"   align="center"  cellspacing="0px" width="100%" cellpadding="5px">
						<tr>
							<td align="center" style="color:white;  font-size:20px; "><h1 >SignUp </h1></td>
						</tr>
						<tr>
							<td><input type="text" name="firstname" placeholder="Firstname"></td>
						</tr>
						<tr>
							<td><input type="text" name="lastname" placeholder="Lastname"></td>
						</tr>
						<tr>
							<td style="color:white;"><input  style="width:15px; height:15px; " type="radio" name="gender" value="male" >Male
								<input style="width:15px; height:15px; " type="radio" name="gender" value="female">Female</td>
						</tr>
						<tr>
							<td><input type="text" name="username" placeholder="Username"></td>
						</tr>
						<tr>
							<td><input type="password" name="password" placeholder="Password"></td>
						</tr>
						<tr>
							<td><input style="background:navy; color:white;" type="submit" name="submit" vlaue="submit"></td>
						</tr>
					</table>

				</form>
	</div>

	</div>
		<div class="footer">

	</div>
		

</body>
</html>
<?php 

$con=mysqli_connect('localhost', 'root');
mysqli_select_db($con, 'mocktest');
if(isset($_POST['submit']))
{
	$username=mysqli_real_escape_string($con,$_POST['username']);
	$password=mysqli_real_escape_string($con,$_POST['password']);
	$enctype=md5($password);
	$q="select * from user where username='$username' AND password='$password'";
	$run=mysqli_query($con,$q);
	if(mysqli_num_rows($run)>0)
	{
		$_SESSION['username']=$username;
			echo "<script>window.open('welcomemocktest.php','_self')</script>";
}
else
{
	echo"<script>alert('username or password is invalid!!')</script>";
}
}
mysqli_close($con);
?>