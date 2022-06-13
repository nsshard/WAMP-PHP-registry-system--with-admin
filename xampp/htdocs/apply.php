<!DOCTYPE html>
<html>
	<head>
		
		
		
		<meta charset="utf-8">
		
		<title>Login</title>
		
		
		
<a href="index.php"><img src="dept.png"> </a>
		
	</head>
	<body style="background-color:whitesmoke;">
		
				
		<div class="connectDB.php">
			<h1>Hong Kong Department of Immigration</h1>
			<br><br>
			
			
			
			
	
<h1>ID Card system</h1>
<h1>Register!</h1>
<form action="stuff/connectDB.php" method="post">
				
				<h4>Chinese Name</h4>
				<input type="CHINESENAME" name="CHINESENAME" placeholder="Chinese Name" id="CHINESENAME" required>
	
					<h4>English Name</h4>
				<input type="ENGLISHNAME" name="ENGLISHNAME" placeholder="English Name" id="ENGLISHNAME" required>
	
	<h4>Gender (M or F)</h4>
	
				<select name="GENDER" id="GENDER">
		
  <option value="M">Male</option>
  <option value="F">Female</option>
						</select>
		<h4>Date Of Birth (DDMMYY)</h4>
				<input type="DOB" name="DOB" placeholder="DDMMYY" id="DOB" required>
	
		<h4>Address</h4>
				<input type="ADDRESS" name="ADDRESS" placeholder="Address" id="ADDRESS" required>
	
		<h4>Place of birth</h4>
				<input type="POB" name="POB" placeholder="Place of birth" id="POB" required>

		<h4>Occupation</h4>
				<input type="OCCUPATION" name="OCCUPATION" placeholder="Occupation" id="OCCUPATION" required>
	
	<h4>Select Venue!</h4>
	<select name="VENUE" id="VENUE">
	
  <option value="streetA">Street A Office</option>
  <option value="streetB">Street B Office</option>
  <option value="streetC">Street C Office</option>
		</select>
	
	
		<h4>Email</h4>
				<input type="EMAIL" name="EMAIL" placeholder="Email" id="EMAIL" required>

<br>
		<input type="submit" name="submit" value="Register!"> 
	
			
	
</form>

			
		</div>
	</body>
</html>