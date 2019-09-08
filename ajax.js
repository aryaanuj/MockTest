function questions( subj)
{

	var req=new XMLHttpRequset();
	req.open("get","http://localhost/mocktest/subquestion.php?subject="+subj, true);
	req.send();
	req.onreadystatechange=function()
	{
		if(req.readyState==4 && req.status==200)
		{
			document.getElementById("subjectquestion").innerHTML=req.responseText;
		}
	};


}