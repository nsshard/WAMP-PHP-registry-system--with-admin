<!DOCTYPE html>
<html>
	<head>

<?php
session_start();



?>
		

		
		<meta charset="utf-8">
		
		<title>Login</title>
		
	<a href="index.php"><img src="dept.png"> </a>
		
	</head>
	<body style="background-color:whitesmoke;">
		
				
		<div class="stuff/login.php">
			<h1>Hong Kong Department of Immigration</h1>
			<br><br>








<h1>ID Card system</h1>
			<h1>Login</h1>
		  <form action="stuff/login.php" method="post">
				<label for="username">
					<i class="fas fa-user"></i>
			</label>
				<input type="text" name="USERNAME" placeholder="Username" id="USERNAME" required>
				<label for="password">
				
			</label>
				<input type="password" name="PASSWORD" placeholder="Password" id="PASSWORD" required>
				<input type="submit" value="Login">
				<h1><a href="apply.php">Click here to apply for a ID card!</a></h1>
<br>
<h2><a href="specialapp.php">Click here to apply for ID card (special cases)</a></h2>
		  </form>

<h1>Press to logout</h1>
<form action="logout" method="post">
				
				
		<a href="stuff/logout.php">Click me to log out<a/>
	
			
	
</form>

		</div>
	</body>
</html>