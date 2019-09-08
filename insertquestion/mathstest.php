<?php
 
session_start();
if(!isset($_SESSION['username'])){
  header('location:index.php');
}
else
{

$connect = mysqli_connect("localhost", "root");

    mysqli_select_db($connect, 'mocktest');
   
$record_per_page = 1;
$page = '';
if(isset($_GET["page"]))
{
 $page = $_GET["page"];
}
else
{
 $page = 1;
}

$start_from = ($page-1)*$record_per_page;
$q="select * from maths";
$run=mysqli_query($connect, $q);

$rowno=mysqli_num_rows($run);
$query = "SELECT * FROM maths  order by id DESC LIMIT $start_from, $record_per_page";
$result = mysqli_query($connect, $query);


?>

<!DOCTYPE html>
<html>
 <head>
  <title>Mock Test</title>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
   <link rel="stylesheet" type="text/css" href="style.css">

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
   <script>
 var total_seconds=60*10;
 var minutes=parseInt(total_seconds/60);
 var seconds=parseInt(total_seconds%60);
 
 function checktime()
 {
    document.getElemenById("timer").innerHTML ='Time left:'+ minutes +'minutes'+ seconds +'seconds';
   if(total_seconds<=0)
   {
      setTimeout('document.quiz.submit()', 1);

   }
   else
   {
        total_seconds=total_seconds-1;
             minutes=parseInt(total_seconds/60);
            seconds=parseInt(total_seconds%60);
            setTimeout("checktime()", 1000);
   }
 }
 setTimeout("checktime()", 1000);

</script>
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

      <h2 id="loginuser"  style="font-size:25px;"> <?php echo $firstname; ?></h2>
      <img src="images/admin.png" style="height:60px; width:60px; border-radius:100%; position:relative; bottom:20px;" >
      <a href="../logout.php" style="position:relative;  left:20px; font-weight:bold;">LOGOUT</a>


    
      </div>

  </div>
  <?php  } mysqli_close($con); ?>
    <div class="navbar"  >
      <a  style="position:relative; right:260px;" href="">HOME</a>
      <a style="position:relative; right:260px;" href="">HOME</a>
      <a  style="position:relative; right:260px;" href="">HOME</a>
      </div>
  <div id="testsidebar">
    <div><h2 align="center">Subjects</h2></div>
    
    <a href="../physics.php"  >Physics</a><br/><br/>
    <a href="../chemistry.php" >Chemistry</a><br/><br/>
    <a href="../maths.php" style="background:green;" >Maths</a><br/><br/>
    <a href="../reasoning.php" >Reasoning</a><br/><br/>
    <a href="../gk.php" >Gernal Knowledge</a><br/><br/>
    <a href="../english.php" >English</a>
    
   </div>
   </div>




 
   <div class="table-responsive">
    <table class="table table-bordered">
     
     <?php
       
   
     while($row = mysqli_fetch_array($result))
     {
    

      $question=$row['question'];
        $option1=$row['option1'];
        $option2=$row['option2'];
        $option3=$row['option3'];
        $option4=$row['option4'];
        $id=$row['id'];

   ?>
    <div style="border:2px solid black;  float:right; width:1000px;  height:340px; position:relative; right:20px; padding-top:10px;  padding-left:20px; 
    font-size:20px;">
    <form action="#" method="post" >
      <u>
    <p>Questions <?php  echo $rowno-($id-1) ?>/<?php echo $rowno;  ?></p></u>
    <p ><b>Question #<?php  echo $rowno-($id-1) ?>:</b></p><p><?php echo $question; ?></p>
    
    <input  type="radio" name="option" value="option1"><?php echo $option1; ?><br/>
    <input type="radio" name="option" value="option2"><?php echo $option2; ?><br/>
    <input type="radio" name="option" value="option3"><?php echo $option3; ?><br/>
    <input type="radio" name="option" value="option4"><?php  echo $option4; ?><br/><br/><br/>
    <center><input style="height:30px; width:170px; font-size:20px; background:lightblue; color:black;" type="submit" value=" Save & Next" name="submit">
    </center>
   </form>
  </div>

     <?php
     }
     ?>
    </table>

    <div align="center">
    <?php
    $page_query = "SELECT * FROM maths ORDER BY id DESC";
    $page_result = mysqli_query($connect, $page_query);
    $total_records = mysqli_num_rows($page_result);
    $total_pages = ceil($total_records/$record_per_page);
    $start_loop = $page;
    $difference = $total_pages - $page;
    if($difference <= 1)
    {
     $start_loop = $total_pages - 1;
    }
    $end_loop = $start_loop + 1;
    if($page > 1)
    {
     
     echo "<a style=' padding:8px 16px; border:1px solid #ccc; color:#333; font-weight:bold; position:relative; bottom:500px; background:navy; color:white;' href='mathstest.php?page=".($page-1)."'>Previous</a>";
    }
    for($i=$start_loop; $i<=$end_loop; $i++)
    {     
     echo "<a  style=' padding:8px 16px; border:1px solid #ccc; color:#333; font-weight:bold; position:relative; bottom:500px;' href='mathstest.php?page=".$i."'>".$i."</a>";
    }
    if($page < $end_loop)
    {
     echo "<a style=' padding:8px 16px; border:1px solid #ccc; color:#333; font-weight:bold; position:relative; bottom:500px; background:navy; color:white;' href='mathstest.php?page=".($page + 1)."'>Next</a>";
    
    }
     ?>
    
    
    <center><input style="height:30px; width:170px; font-size:20px;  position:relative; bottom:460px; background:lightblue; color:black;" type="submit" value=" Final Submit" name="submit">
    </center>
    </div>
    <br /><br />

   </div>
  
 </body>
 </html>
 <?php } ?>