<?php  
session_start();
if(!isset($_SESSION['admin'])){
	header('location:adminlogin.php');
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
	$user=$_SESSION['admin'];
	$q="select * from admin where username='$user'";
	$run=mysqli_query($con, $q);
	while($row=mysqli_fetch_array($run))
	{
		$name=$row['name'];
	?>

	<div class="header">
		<div style="float:left; padding-left:20px;"><h1>MockTest</h1></div>
		<div style="float:right; padding-top:30px; padding-right:50px;  ">

			<h2 id="loginuser"> <?php echo $name; ?></h2>
			<img src="images/admin.png" style="height:60px; width:60px; border-radius:100%; position:relative; bottom:20px;" >
			<a href="adminlogout.php" style="position:relative; bottom:30px; left:20px;">LOGOUT</a>


			</form>
		  </div>

	</div>
	<?php  } mysqli_close($con); ?>
		<div class="navbar">
			<a href="">HOME</a>
			<a href="">HOME</a>
			<a href="">HOME</a>

	</div>
	<div id="testsidebar">
		<div><h2 align="center">Subjects</h2></div>
		<a href="insertquestion/physicsinsert.php" >Physics</a><br/><br/>
		<a href="insertquestion/chemistryinsert.php" >Chemistry</a><br/><br/>
		<a href="insertquestion/mathsinsert.php" >Maths</a><br/><br/>
		<a href="insertquestion/reasoninginsert.php" >Reasoning</a><br/><br/>
		<a href="insertquestion/gkinsert.php" >Gernal Knowledge</a><br/><br/>
		<a href="insertquestion/englishinsert.php" >English</a>
	 </div>
</body>
</html>
<?php } ?>