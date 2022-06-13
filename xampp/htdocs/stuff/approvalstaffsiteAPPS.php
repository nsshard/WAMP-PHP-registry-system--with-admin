<!DOCTYPE html>
<html>
	<head>
		<?php
session_start();



if ($_SESSION['LEVEL']!=='THREE' and $_SESSION['LEVEL']!=='FOUR')
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
						
<h1>To approve an account, type in its email. The dataset will then be deleted and user automatically emailed.</h1>
	<br><br>
	  <form action="approveAPP.php" method="post">
				<label for="username">
					<i class="fas fa-user"></i>
			</label>
			
				
			</label>
				<input type="EMAIL" name="EMAIL" placeholder="Email" id="EMAIL" required>
				<input type="submit" value="Approve">
				
<h1>List of applications below.</h1>



<?php





$conn = new mysqli('localhost', 'approvalstaff', 'WZi7pwGPnSnuiQJ', 'specialapps');

if ($conn->connect_error)
{
die("connection failed:".$conn->connect_error);
}



$catchthem = $conn->prepare("SELECT * FROM apps");
$catchthem->execute();
$fetchingthingy = $catchthem->get_result();
$getarray = $fetchingthingy->fetch_assoc();

$cipher_algo = "AES-256-CTR"; 
$iv_length = openssl_cipher_iv_length($cipher_algo); 
$option = 0;
$decrypt_iv = '8746376827619797'; 
$decrypt_key = "NcRfUjXn2r4u7x!A%D*G-KaPdSgVkYp3";


foreach ($fetchingthingy as $fetchingthingy) {

echo '<pre>';
echo '<b>[Chinese name]</b>';
echo '<pre>';
print(openssl_decrypt ($fetchingthingy['CHINESENAME'], $cipher_algo, $decrypt_key, $option, $decrypt_iv));
echo '<pre>';
echo '<b>[English name]</b>';
echo '<pre>';
print(openssl_decrypt ($fetchingthingy['ENGLISHNAME'], $cipher_algo, $decrypt_key, $option, $decrypt_iv));
echo '<pre>';
echo '<b>[Gender]</b>';
echo '<pre>';
print($fetchingthingy['GENDER']);
echo '<pre>';
echo '<b>[DOB]</b>';
echo '<pre>';
print($fetchingthingy['DOB']);
echo '<pre>';
echo '<b>[Address]</b>';
echo '<pre>';
print(openssl_decrypt ($fetchingthingy['ADDRESS'], $cipher_algo, $decrypt_key, $option, $decrypt_iv));
echo '<pre>';
echo '<b>[Place of birth]</b>';
echo '<pre>';
print(openssl_decrypt ($fetchingthingy['POB'], $cipher_algo, $decrypt_key, $option, $decrypt_iv));
echo '<pre>';
echo '<b>[Occupation]</b>';
echo '<pre>';
print(openssl_decrypt ($fetchingthingy['OCCUPATION'], $cipher_algo, $decrypt_key, $option, $decrypt_iv));
echo '<pre>';
echo '<b>[Occupation]</b>';
echo '<pre>';
print($fetchingthingy['VENUE']);
echo '<pre>';
echo '<b>[Email]</b>';
echo '<pre>';
print(openssl_decrypt ($fetchingthingy['EMAIL'], $cipher_algo, $decrypt_key, $option, $decrypt_iv));
echo '<pre>';
echo '<b>[Next User Below]</b>';
echo '<pre>';
echo "<br>";
}

?>

<br>




<a href="staffsite.php">Click me to access staff main site!<a/>

<h1>Press to logout</h1>
<form action="logout" method="post">
				
				
		<a href="../stuff/logout.php">Click me to log out<a/>
	
			
	
</form>
		</div>
	</body>
</html>