<?php
session_start();
if(!isset($_SESSION['admin']))
{
	header("location:adminlogin.php");
}
	else 
	{


$con=mysqli_connect('localhost','root');
mysqli_select_db($con, 'mocktest');
$usernameid=$_SESSION['admin'];
$database=@$_GET['sub'];
$m="select * from admin where username='$usernameid'";
$result=mysqli_query($con, $m);
while($row=mysqli_fetch_array($result))
{
	$name=$row['name'];
	$post1_id=@$_GET['id'];
$query="select * from admin where username='$post1_id'";
if($run=mysqli_query($con, $query))
{
if(isset($_POST['submit']))
{
	$question=$_POST['question'];
	$option1=$_POST['option1'];
	$option2=$_POST['option2'];
	$option3=$_POST['option3'];
	$option4=$_POST['option4'];
	$answer=$_POST['answer'];
	$subject=$_POST['subject'];
	

$q1="insert into $database ( subject, question, option1, option2, option3, option4, Answer) values ('$subject', '$question', '$option1', '$option2', '$option3', 
'$option4','$answer')";

if(mysqli_query($con, $q1))
{
		echo "<script>alert('Questions have been submitted successfully!!')</script>";
		echo "<script>window.open('physicsinsert.php', '_self')</script>";
		
}
else
{
	echo "<script>alert('Questions have not been submitted successfully!!')</script>";
		echo "<script>window.open('physicsinsert.php', '_self')</script>";
	
}



}

}
}


mysqli_close($con);


?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<a href="physicsinsert.php"><center><button >BACK</button></center></a>

</body>
</html>
<?php } ?>