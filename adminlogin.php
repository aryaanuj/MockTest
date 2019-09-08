<?php 
session_start();

?>


<!DOCTYPE html>
<html>
<head>
	<title>Mock Test</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="C:\xampp\htdocs\mocktest\like\public\fonts\fontawesome.css">
</head>
<body>
	
		<div class="container1">
			<div class="adminlogin">
			<form action="adminlogin.php" method="post">
				<input type="text" name="admin" placeholder="Admin username"><br/>
				<input type="password" name="password" placeholder="Password"><br/>
				<input style="width:309px; height:30px;" type="submit" name="submit" value="login">
			
			</form>
			</div>
	</div>

	

	
		

</body>
</html>
<?php 

$con=mysqli_connect('localhost', 'root');
mysqli_select_db($con, 'mocktest');
if(isset($_POST['submit']))
{
	$username=mysqli_real_escape_string($con,$_POST['admin']);
	$password=mysqli_real_escape_string($con,$_POST['password']);
	$enctype=md5($password);
	$q="select * from admin where username='$username' AND password='$password'";
	$run=mysqli_query($con,$q);
	if(mysqli_num_rows($run)>0)
	{
		$_SESSION['admin']=$username;
			echo "<script>window.open('adminpanel.php','_self')</script>";
}
else
{
	echo"<script>alert('username or password is invalid!!')</script>";
}
}
mysqli_close($con);
?>