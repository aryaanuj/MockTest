<?php
session_start();
if(!isset($_SESSION['username'])){
  header('location:index.php');
}
else
{

$connect = mysqli_connect("localhost", "root");

    mysqli_select_db($connect, 'mocktest');
    $subjects=@$_GET['sub'];
    $skip=@$_GET['skip'];
   


 
$record_per_page = 1;
$page='';
if(isset($_GET["page"]))
{
 $page = $_GET["page"];
}
else
{

  
  $page=1;

}


$start_from = ($page-1)*$record_per_page;
       $q1="select * from physics where subject='physics'";
    
$run1=mysqli_query($connect, $q1);
$prow=mysqli_num_rows($run1);

$q="select * from physics ";
$run=mysqli_query($connect, $q);

$rowno=mysqli_num_rows($run);
 
$query = "SELECT * FROM physics  where subject='chemistry' order by id DESC LIMIT $start_from, $record_per_page ";
$result = mysqli_query($connect, $query);


?>
<!DOCTYPE html>
<html>
 <head>
  <title>Mock Test</title>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

<link rel="stylesheet" type="text/css" href="style.css">


   <script>
    function m(secs, elem)
    {
       var element=document.getElementById(elem);
       

    if(localStorage.getItem("counter")){
      if(localStorage.getItem("counter") <= 0){
          element.innerHTML="<h4>Timeout!!</h4>";
          element.innerHTML+=window.open('finalsubmit.php','_self');
      }else{
        var value = localStorage.getItem("counter");
      }
    }
 
 
 element.innerHTML="<h4>Time-left: "+value+"seconds </h4>";
var counter=function()
{

 

  if(value<1)
  {
    
 element.innerHTML="<h4>Time-left: "+value+"seconds </h4>";
    element.innerHTML="<h4>Timeout!!</h4>";
   element.innerHTML+=window.open('finalsubmit.php','_self');
  }
  value--;
  
  

}
var timer=setInterval('m('+secs+',"'+elem+'")',1000);

}

function nav()
{

  var x=document.getElementById("nav1");
  x.style.backgroundColor="red";
}

</script>
<script>
function disableF5(e)
{
  if((e.which || e.keyCode==116) e.preventDefault();)
};

  </script>
<style>
    html
    {
      background:white;
    }

    .navbar
{
  width:100%;
  height:50px;
  background:gray;
  
  border-bottom:3px solid green;


}

.navbar tr td   a
{
  color:white;
  text-decoration: none;
  list-style:none;
  margin:8px;
  position:fixed;
  top:85px;
  
  font-size:20px;
  font-family:Agency FB;
}
.navbar td:hover
{
  background:blue; 
  height:48px; 
  width:130px;
  position:relative;
  bottom:2px;


  
}

.save
{

  height:30px;
   width:170px;
    font-size:20px; 
    border:2px solid red;
     background:white; 
     color:red;
}
.save:hover
{
  border:2px solid green;
  color:green;
}
</style>
</head>
<body onload="clock()" >
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

  <div class="header" style="background:black;">
    <div style="float:left; padding-left:20px; font-family:Agency FB; font-size:20px;"><h1>MockTest</h1> <div id="status1"></div></div>
    <div style="float:right; padding-top:30px; padding-right:50px;  ">

      <h2 id="loginuser" style="font-family: Agency FB;">Welcome: <?php echo $firstname; ?></h2>
      
      <a href="logout.php" style=" color:yellow; text-decoration: none; font-size:18px; position:relative; top:20px; left:20px;">LOGOUT</a>


      </form>
      </div>

  </div>
  <?php  }  mysqli_close($con); ?>
    <div class="navbar">
        
    
    <table width="630px" height="50px">
      <tr>
        <td id="nav1" onclick="nav()">
    <a  href="test.php?sub=physics && pans=physicsanswer">Physics</a></td>
    <td   ><a href="chemistry.php?sub=chemistry " >Chemistry</a></td>
    <td><a href="test.php?sub=maths && pans=mathsanswer" >Maths</a></td>
    <td><a href="test.php?sub=reasoning && pans=reasoninganswer" >Reasoning</a></td>
    <td><a href="test.php?sub=gk && pans=answer" >Gearnal Knowledge</a></td>
    
  </tr></table>
      <div id="status" style="width:350px; height:30px; font-family: Agency FB; float:right; font-size:22px; position:fixed; bottom:570px; left:1160px;  color:red; "><script> m(10, 'status');</script></div>

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
    <div style="border:2px solid black; color:black; font-family:Agency FB;  width:1000px;  height:340px; position:relative; left:1px; padding-top:10px;  padding-left:20px; 
    font-size:20px;">

    <form  action="answerdata.php?ans=physicsanswer && subject=chemistry &&  quesno= <?php echo $id; ?> && pageu=<?php echo $page;?>" method="post" >
     
   <div style="background:red; border-radius:7px; height:30px; width:150px;  padding-left:5px; position:relative; bottom:2px; "> <p style="color:white; padding-top:3px;">Questions <?php  echo $page; ?>/<?php echo $rowno;  ?></p></div>
    <p ><b>Question #<?php  echo $page; ?>:</b></p><p><?php echo $question; ?></p>
    
    <input  type="radio" name="option" value="<?php echo $option1 ?>"><?php echo $option1; ?><br/>
    <input   type="radio" name="option" value="<?php echo $option2 ?>"><?php echo $option2; ?><br/>
    <input   type="radio" name="option" value="<?php echo $option3 ?>"><?php echo $option3; ?><br/>
    <input   type="radio" name="option" value="<?php echo $option4 ?>"><?php  echo $option4; ?><br/><br/><br/>
    <center><input class="save"  type="submit" value=" Save & Next" name="submit">&nbsp; &nbsp;<input class="save"  type="submit" value="Reset" name="reset">
    </center>
   </form>
  </div>


<div style="width:315px; position:fixed; left:1023px; bottom:175px; height:350px; border:2px solid black; float:right ">

 <?php
    $connect = mysqli_connect("localhost", "root");
    mysqli_select_db($connect, 'mocktest');
   $page_query = "SELECT * FROM physics where subject='chemistry' ORDER BY id DESC";
  
    
    $page_result = mysqli_query($connect, $page_query);
    $total_records = mysqli_num_rows($page_result);
    $total_pages = ceil($total_records/$record_per_page);

    $start_loop = 1;

    $difference = $total_pages - 1;
    if($difference <= 1)
    {
     $start_loop = $total_pages - 1;
    }
    $end_loop = $start_loop + 5;
     for($i=$start_loop; $i<=$rowno; $i++)
    {     
      
       
          if($page==($i))
          {
            echo "<a id='skip' style=' padding:8px 16px;  border:1px solid black; background:blue; color:white; text-decoration: none; font-weight:bold; position:relative; top:15px; left:7px;' href='chemistry.php?sub=chemistry && page=".$i."'>".$i."</a>";
          }
               else
        {
     echo "<a id='skip' style=' padding:8px 16px;  border:1px solid black;  color:black; text-decoration: none; font-weight:bold; position:relative; top:15px; left:7px;' href='chemistry.php?sub=chemistry && page=".$i."'>".$i."</a>";
    }
        }
        
      
 
 
    ?>

</div>





     <?php
     }
 
     ?>
    </table>

    <div align="center">
    <?php
    $connect = mysqli_connect("localhost", "root");
    mysqli_select_db($connect, 'mocktest');
   $page_query = "SELECT * FROM physics where subject='chemistry' ORDER BY id DESC";
  
    
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
     
     echo "<a style=' padding:8px 16px; border:1px solid #ccc; font-weight:bold; text-decoration: none; position:relative; bottom:450px; right:150px; background:navy; color:white;' href='chemistry.php?sub=chemistry && page=".($page-1)."'>Previous</a>";
    }
  
    if($page < $end_loop)
    {
     echo "<a  name='skip' style=' padding:8px 16px; border:1px solid #ccc; color:white; text-decoration: none; font-weight:bold; position:relative; bottom:450px; right:150px; background:navy; color:white;'  href='chemistry.php?sub=chemistry && page=".($page + 1)." && skip=skip'> Skip</a>";
    
    }


     ?>
    
 
    </div>
    <br /><br />

   </div>
  
   <script>
        function skip()
        {
          var y=document.getElementById("skip");
          y.style.backgroundColor="red";
        }  
        </script>
</body>
</html>




<?php }  ?>