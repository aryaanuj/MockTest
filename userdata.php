<?php
$con=mysqli_connect('localhost', 'root');
mysqli_select_db($con, 'mocktest');
if(isset($_POST['submit']))
{
	$firstname=$_POST['firstname'];
	$lastname=$_POST['lastname'];
	$gender=$_POST['gender'];
	$username=$_POST['username'];
	$password=$_POST['password'];


$q="insert into user (First_Name, Last_Name, username, password, Gender) values ('$firstname', '$lastname', '$username', '$password', '$gender')";

if(mysqli_query($con, $q))
{
	echo"<script>alert('Account has been created successfully!!!')</script>";
	echo"<script>window.open('index.php', '_self')</script>";
}
else
{
	echo"<script>alert('Account has not been created, plz try again later!!')</script>";
}




}
mysqli_close($con);

?>