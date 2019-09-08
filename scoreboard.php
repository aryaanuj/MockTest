<?php  
session_start();
if(!isset($_SESSION['username'])){
	header('location:index.php');
}
else
{

	
		$connect = mysqli_connect("localhost", "root");
    	mysqli_select_db($connect, 'mocktest');
    	$user=$_SESSION['username'];
    	$q1="select * from physics ";
    	$run1=mysqli_query($connect, $q1);
    	$row1=mysqli_num_rows($run1);

		$connect = mysqli_connect("localhost", "root");
    	mysqli_select_db($connect, 'mocktest');
    	$q2="select * from answer where userid='$user' AND physicsanswer='2' ";
    	$run2=mysqli_query($connect, $q2);
    	$row2=mysqli_num_rows($run2);
    	
    	

		$connect = mysqli_connect("localhost", "root");
    	mysqli_select_db($connect, 'mocktest');
    	$q3="select * from answer where userid='$user' AND physicsanswer='1'";
    	$run3=mysqli_query($connect, $q3);
    	$row3=mysqli_num_rows($run3);
    	
    	$connect = mysqli_connect("localhost", "root");
    	mysqli_select_db($connect, 'mocktest');
    	$q4="select * from answer where userid='$user' AND chemistryanswer='2'";
    	$run4=mysqli_query($connect, $q4);
    	$row4=mysqli_num_rows($run4);

    	$connect = mysqli_connect("localhost", "root");
    	mysqli_select_db($connect, 'mocktest');
    	$q5="select * from answer where userid='$user' AND chemistryanswer='1'";
    	$run5=mysqli_query($connect, $q5);
    	$row5=mysqli_num_rows($run5);




	?>
<!DOCTYPE html>
<html>
<head>
	<title>Mock Test</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style.css">
	<style type="text/css">
		html
		{
			background:url(images/12.jpg);
		}
	</style>
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
	

	 <div style="width:700px; height:480px; background:rgba(0, 0, 0, 0.2); position:relative; left:350px; top:40px;">
	 	<table width="100%" height="90%"  style="position:absolute; font-weight: bold; text-transform: uppercase; " cellpadding="5px" cellspacing="0px">
	 		<tr>
	 		<td align="center" colspan="3" style="font-size:25px; font-weight:bold; color:white;" >
	 		Score Board
	 	</td>
	 </tr>
	 <tr style="position:relative; bottom:15px;">
	 	<td colspan="3" Style="padding-left:500px; color:white;" >
	 		Total Question:<?php echo $row1; ?>
	 	</td>
	 

	 </tr>
	  <tr >
	 		<td   colspan="2" cellspacing="5" Style="padding-left:500px; color:green;">
	 		Right
	 	</td>
	 		<td style="color:red;">
	 		Wrong
	 	</td>
	
	 </tr>
	  <tr >
	 	<td  style="position:relative; left:50px; color:white;">
	 		physcis
	 	</td>


	 	<td style=" color:green;">
	 		<?php echo $row2; ?>

	 	</td>
	 	

	
	
	 	<td style="color:red;">
	 		<?php echo $row3; ?>

	 	</td>
	 	
</tr>
	 	<tr>
	 	<td style="position:relative; left:50px; color:white;">
	 		chemistry
	 	</td>
	 	<td style="color:green;">
	 	<?php echo $row4; ?>
	 	</td>
	 	<td  style="color:red;">
	 		<?php echo $row5; ?>
	 	</td>
	 	</tr>
	 
	 	
	 	<tr>
	 	<td style="position:relative; left:50px; color:white;">
	 		maths
	 	</td>
	 	<td style=" color:green;">
	 	0
	 	</td>
	 <td style="color:red;" >
	 		0
	 	</td>
	 	</tr>
	 	<tr>
	 	<td style="position:relative; left:50px; color:white;">
	 	Reasoning
	 	</td>
	 
	 	<td style=" color:green;">
	 	0
	 	</td>
	 		<td style="color:red;" >
	 	0
	 	</td>
	
	 	</tr>
	 	<tr>
	 	<td style="position:relative; left:50px; color:white;">
	 	G.K
	 	</td>
	 
	 	<td style=" color:green;">
	 	0
	 	</td>
	 		<td style="color:red;" >
	 	0
	 	</td>
	
	 	</tr>


	 		<tr  >

	 	<td  style="position:relative; left:50px; color:white;  " >
	 		<hr/ color="white">
	 	total 
	 	</td>
	    <td  style="color:green;  ">
	    	<hr/ color="white"  width="150%">
	 	<?php  echo ($row2+$row4); ?>
	 	</td>
	 	<td  style="color:red; ">
	 		<hr/ color="white" >
	 		<?php echo ($row3+$row5);  ?>
	 	</td>
	 	
	 
	 	</tr>




</table>

	 </div>
</body>
</html>
<?php } ?>