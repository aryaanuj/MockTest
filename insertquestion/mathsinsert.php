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
			<a href="../adminlogout.php" style="position:relative; bottom:30px; left:20px;">LOGOUT</a>


			
		  </div>

	</div>
	<?php  }  mysqli_close($con); ?>
		<div class="navbar">
			<a href="">HOME</a>
			<a href="">HOME</a>
			<a href="">HOME</a>

	</div>
	<div class="container">
	<div id="testsidebar">
		<div><h2 align="center">Subjects</h2></div>
		<a href="physicsinsert.php"  >Physics</a><br/><br/>
		<a href="chemistryinsert.php" >Chemistry</a><br/><br/>
		<a href="mathsinsert.php" style="background:green;" >Maths</a><br/><br/>
		<a href="reasoninginsert.php" >Reasoning</a><br/><br/>
		<a href="gkinsert.php" >Gernal Knowledge</a><br/><br/>
		<a href="englishinsert.php" >English</a>
	</div>
<div>
<form action="physicsdata.php? id=<?php  $_SESSION['admin'] ?> && sub=maths" method="post" >
<table align="center" border="2px" cellspacing="0px" cellpadding="5px" width="550px" height="400px"  >

<tr>
<td   align="center" colspan="3"><h1>Insert Questions</h1></td>
</tr>

<tr>
<td><h3 align="right" >Question:</h3></td>
<td><textarea  name="question" cols="70" rows="2" ></textarea></td>
</tr>
<tr>
<td align="right" ><h3>Options#1:</h3></td>
<td><textarea  name="option1" cols="35" rows="2" ></textarea></td></tr>
<tr>
	<td align="right" ><h3>Options#2:</h3></td>
<td><textarea  name="option2" cols="35" rows="2" ></textarea></td></tr>
<tr>
	<td align="right" ><h3>Options#3:</h3></td>
<td><textarea  name="option3" cols="35" rows="2" ></textarea></td></tr>
<tr>
	<td align="right" ><h3>Options#4:</h3></td>
<td><textarea  name="option4" cols="35" rows="2" ></textarea></td>
</tr>
<tr>
	<td align="right" ><h3>Answer:</h3></td>
<td><textarea  name="answer" cols="35" rows="2" ></textarea></td>
</tr>

<tr>
<td align="center" colspan="2" >
<input   type="submit"  name="submit" value="Submit" >
</td>
</tr>
</table>
</form>
</div>
</body>
</html>
<?php } ?>