<?php 
$s1=$_GET['subject'];
$physics=array('what is your name','what are you doing?');
$chemistry=array('what is n2o','what is mohar salt?');
$p1option1="ajay";
$p1option2="ram";
$p1option3="anuj";
$p1option4="none";
$p2option1="a";
$p2option1="b";
$p2option1="c";
$p2option1="d";
$ch1option1="x";
$ch1option2="y";
$ch1option3="z";
$ch1option4="w";
$ch2option1="p";
$ch2option2="q";
$ch2option3="r";
$ch2option4="s";
if($s1=="physics")
{
	foreach ($physics as $p ) {


		echo "  <form  action='#' method='post' >
		 <div style='background:red; border-radius:7px; height:30px; width:150px;  padding-left:5px; position:relative; bottom:2px; '> <p style='color:white; padding-top:3px;'>Questions 1/2</p></div>
    <p ><b>Question #1:</b></p><p>". $p ."</p>
    
    <input  type='radio' name='option' >".$p1option1."<br/>
    <input   type='radio' name='option' >".$p1option2."<br/>
    <input   type='radio' name='option'>".$p1option3."<br/>
    <input   type='radio' name='option' >".$p1option4."<br/><br/><br/>
    <center><input class='save'  type='submit' value=' Save & Next' name='submit'>
    </center> </form>";
	}
}
















?>