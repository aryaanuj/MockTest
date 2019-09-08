<?php  
session_start();
if(!isset($_SESSION['username'])){
	header('location:index.php');
}
else
{
?>
<!DOCTYPE html>
<html>
<head>
	<title>Mock Test</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php 
	$con=mysqli_connect('localhost', 'root');
    mysqli_select_db($con, 'mocktest');
	$user=$_SESSION['username'];
	$q="select * from user where username='$user'";
	$run=mysqli_query($con, $q);
	while($row=mysqli_fetch_array($run))
	{
		$firstname=$row['First_Name'];
	?>

	<div class="header">
		<div style="float:left; padding-left:20px;"><h1>MockTest</h1></div>
		<div style="float:right; padding-top:30px; padding-right:50px;  ">

			<h2 id="loginuser"> <?php echo $firstname; ?></h2>
			<img src="images/admin.png" style="height:60px; width:60px; border-radius:100%; position:relative; bottom:20px;" >
			<a href="logout.php" style="position:relative; bottom:30px; left:20px;">LOGOUT</a>


			</form>
		  </div>

	</div>
	<?php  } mysqli_close($con); ?>
		<div class="navbar">
			<a href="">HOME</a>
			<a href="">HOME</a>
			<a href="">HOME</a>

	</div>
	<div class="container">
	<div id="testsidebar">
		<a href="subtest.php" ></a>
	 </div>


		<button>
	</div>

</body>
</html>
<?php } ?>