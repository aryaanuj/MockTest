<?php 

$con=mysqli_connect('localhost', 'root');
mysqli_select_db($con, 'mocktest');
mysqli_close($con);

?>