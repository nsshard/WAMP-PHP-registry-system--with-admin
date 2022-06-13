
<?php
session_start();

$conn = new mysqli("localhost", "login", "hifrneds@#1232", "usersdata");


if ($conn->connect_error) 
{
    die("Connection failed: ". $conn->connect_error);
} 


$USERNAME = $_POST["USERNAME"]; 
$PASSWORD = $_POST["PASSWORD"]; 
$salt = 'e4twrvq2421421eq';
$salted = $salt.$PASSWORD;
$hash1 = md5($salted);
$sh = hash('sha256', $hash1);
$right = true;
$wrong = "";





$search_sql = $conn->prepare("SELECT * FROM users WHERE USERNAME = ? and PASSWORD = ?");
$search_sql->bind_param("ss", $USERNAME, $sh); 
$search_sql->execute();
$search_sql->store_result();



if($search_sql->num_rows > 0) 
{
	echo "<h2>Authentication success!</h2>";
$_SESSION['valid'] = true;

$_SESSION['USERNAME'] = "$USERNAME";

$userrow = $_SESSION['USERNAME'];

echo "You are logged in as ".$_SESSION['USERNAME'];

$getaccountlist = $conn->prepare("SELECT * FROM users HAVING USERNAME = ?"); 

$getaccountlist->bind_param("s", $userrow);
$getaccountlist->execute();
$gettheresults = $getaccountlist->get_result();
$userlevel = $gettheresults->fetch_assoc();


$_SESSION['LEVEL'] = $userlevel['LEVEL'];

echo "</br>";  
echo (" Your permission level is ".$userlevel['LEVEL']);

switch( $userlevel['LEVEL']){
	
	case 'ONE':
	header("location:membersite.php");
	exit();
	

	
	case 'TWO':
	header("location:staffsite.php");
	exit();


	
	case 'THREE':
	header("location:approvalstaffsite.php");
	exit();


	
	case 'FOUR':
	header("location:adminsite.php");
	exit();

}

}



else
{
    echo "<h2>The login data is wrong, authentication failed</h2>";
}




mysqli_close($conn);
?>

