<!DOCTYPE html>
<html>
<head>
	<title>Welcome to MockTest</title>
	 	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript">
	function preventBack()
	{
	
window.history.forward();

	}
	setTimeout("preventBack()",0);
	window.onunload = function()
	{
		null
	};


</script>
	<style type="text/css">
	html
	{
		background:url(images/14.jpg) no-repeat;
	}
		.container
		{

	
			width:100%;
			height:620px;
		}
		.start
		{
			position:relative;
			top:150px;
			left:585px;
			background:rgba(0, 0, 0, 0.1);
			border:2px solid green;
			color:green;
			width:170px;
			height:140px;
			font-size:45px;
			border-radius:20px;
			font-family:Agency FB;


		}
		.start:hover
		{
			border:2px solid red;
			color:red;
		}
	</style>

</head>
<body>
	<div class="container">
		<center><h1 style="color:white; font-size:50px; font-family:Agency FB; position:relative;  top:130px;">Welcome To Mock Test</h1></center>
		<form action="test.php?sub=physics && page=1" method="post">
			<input class="start" type="submit" value="START" name="start">
		</form>
	</div>

</body>
</html>