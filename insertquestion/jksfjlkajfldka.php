<?php 

$con=mysqli_connect('localhost', 'root');
    	mysqli_select_db($con, 'mocktest');
 
	$query=mysqli_query($conn,"select count(id) from `physics`");
	$row = mysqli_fetch_row($query);
 
	$rows = $row[0];
 
	$page_rows = 10;
 
	$last = ceil($rows/$page_rows);
 
	if($last < 1){
		$last = 1;
	}
 
	$pagenum = 1;
 
	if(isset($_GET['pn'])){
		$pagenum = preg_replace('#[^0-9]#', '', $_GET['pn']);
	}
 
	if ($pagenum < 1) { 
		$pagenum = 1; 
	} 
	else if ($pagenum > $last) { 
		$pagenum = $last; 
	}
 
	$limit = 'LIMIT ' .($pagenum - 1) * $page_rows .',' .$page_rows;
 
	$nquery=mysqli_query($conn,"select * from `physics` $limit");
 
	$paginationCtrls = '';
 
	if($last != 1){
 
	if ($pagenum > 1) {
        $previous = $pagenum - 1;
		$paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$previous.'" class="btn btn-default">Previous</a> &nbsp; &nbsp; ';
 
		for($i = $pagenum-4; $i < $pagenum; $i++){
			if($i > 0){
		        $paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'" class="btn btn-default">'.$i.'</a> &nbsp; ';
			}
	    }
    }
 
	$paginationCtrls .= ''.$pagenum.' &nbsp; ';
 
	for($i = $pagenum+1; $i <= $last; $i++){
		$paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'" class="btn btn-default">'.$i.'</a> &nbsp; ';
		if($i >= $pagenum+4){
			break;
		}
	}
 
    if ($pagenum != $last) {
        $next = $pagenum + 1;
        $paginationCtrls .= ' &nbsp; &nbsp; <a href="'.$_SERVER['PHP_SELF'].'?pn='.$next.'" class="btn btn-default">Next</a> ';
    }
	}



    	while($row=mysqli_fetch_array($result1))
    	{

    		$question=$row['question'];
    		$option1=$row['option1'];
    		$option2=$row['option2'];
    		$option3=$row['option3'];
    		$option4=$row['option4'];
    		$id=$row['id'];

	 ?>
	 	<div style="border:2px solid black;  float:right; width:1000px;  height:330px; position:relative; right:20px;  padding-left:20px; 
	 	font-size:20px;">
	 	<form action="#" method="post">
	 	<p><?php echo $i++; ?>/10</p>
	 	<p ><b>Question#<?php echo $j++; ?>:</b></p><p><?php echo $question; ?></p>
	 	
	 	<input  type="radio" name="option" value="option1"><?php echo $option1; ?><br/>
	 	<input type="radio" name="option" value="option2"><?php echo $option2; ?><br/>
	 	<input type="radio" name="option" value="option3"><?php echo $option3; ?><br/>
	 	<input type="radio" name="option" value="option4"><?php  echo $option4; ?><br/><br/><br/>
	 	<center><input style="height:30px; width:170px; font-size:20px; background:lightblue; color:black;" type="submit" value=" Submit Answer" name="submit"></center>
	 </form>
	</div>