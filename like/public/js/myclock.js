
function myclock(){
	time=new Date();
	hours=time.getHours();
	minutes=time.getMinutes();
	sec=time.getSeconds();
	if(sec<10)
	{
		sec="0"+sec;
	}
	if(minutes<10)
	{
		minutes="0"+minutes;
	}
	document.getElementById("clock").innerHTML=hours+":"+minutes+":"+sec;
	timer = setTimeout(function(){myclock()},500);
	
	
}