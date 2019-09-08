<?php
 
session_start();
if(!isset($_SESSION['username']))
{
  header('location:index.php');
}
else
{

	$con=mysqli_connect('localhost', 'root');
    mysqli_select_db($con, 'mocktest');
	$user=$_SESSION['username'];
	$subject=$_GET['subject'];
	$ansdatabase=$_GET['ans'];
	$pid=$_GET['pid'];
	$id=$_GET['quesno'];
	$pageuu=$_GET['pageu'];
	$q5="select * from physics ";
	$run5=mysqli_query($con, $q5);

	$rowno5=mysqli_num_rows($run5);
	
	
	$query1="select * from physics where subject='$subject' AND id='$pid'";
	$result1=mysqli_query($con, $query1);
	while($row1=mysqli_fetch_array($result1))
	{
		$answer=$row1['Answer'];
	
	if(isset($_POST['submit']))
		{

			$option=$_POST['option'];




		if($option==$answer)
		{

			$query2="insert into answer ( userid, $ansdatabase, questionid, status, pid) values ('$user', '1', '$id', 'attempt', '$pid')";
			mysqli_query($con, $query2);
			for($i=$pageuu; $i<$rowno5; $i++)
			{
			echo "<script> window.open('test.php?sub=physics && pans=".$ansdatabase." && page=". ($i+1)."', '_self');</script>";
			
			}
		}
		else
		{
			$query2="insert into answer (userid, $ansdatabase, questionid, status, pid) values ( '$user','0', '$id', 'attempt', '$pid')";
			mysqli_query($con, $query2 );
			for($i=$pageuu; $i<$rowno5; $i++)
			{
				echo "<script> window.open('test.php?sub=physics && pans=".$ansdatabase." && page=".($i+1)."', '_self');</script>";
		}
		}
	}



}


if(isset($_POST['reset']))
{

	$delquery="DELETE from answer where userid='$user' AND questionid='$id'";
	$delrun=mysqli_query($con, $delquery);
	for($i=$pageuu; $i<$rowno5; $i++)
	{
	echo "<script> window.open('test.php?sub=physics && pans=".$ansdatabase." && page=". ($i)."', '_self');</script>";
		}	


}





}









mysqli_close($con);


?>