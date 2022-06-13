<!DOCTYPE html>
<html>
	<head>
		
<?php
session_start();




if ($_SESSION['LEVEL']!=='FOUR')
{
header("location:../index.php");
exit();
}
?>
		
		<meta charset="utf-8">
		
		<title>Login</title>
		
<a href="../index.php"><img src="../dept.png"> </a>
		
	</head>
	<body style="background-color:whitesmoke;">
		
				
		<div class="apply">
			<h1>Hong Kong Department of Immigration</h1>
			<br><br>
<h1>Admin Area! You are a Admin!</h1>
<h1>Press to logout</h1>
<form action="logout" method="post">
				
				
		<a href="logout.php">Click me to log out<a/>
	
			
	
</form>
		</div>
	</body>
</html>