<?php
$EMAIL = $_POST["EMAIL"];


session_start();

$cipher_algo = "AES-256-CTR"; 
$iv_length = openssl_cipher_iv_length($cipher_algo); 
$option = 0;
$encrypt_iv = '8746376827619797'; 
$encrypt_key = "NcRfUjXn2r4u7x!A%D*G-KaPdSgVkYp3";
$EMAILaes = openssl_encrypt($EMAIL, $cipher_algo,
$encrypt_key, $option, $encrypt_iv);

$decrypt_iv = '8746376827619797'; 
$decrypt_key = "NcRfUjXn2r4u7x!A%D*G-KaPdSgVkYp3";

if ($_SESSION['LEVEL']!=='TWO' and $_SESSION['LEVEL']!=='FOUR')
{
header("location:../index.php");
exit();
}

$conn = new mysqli('localhost', 'staff', 'STAFE3123@DADWE_', 'applications');

if ($conn->connect_error)
{
die("connection failed:".$conn->connect_error);
}

$catchthem = $conn->prepare("SELECT * FROM applications HAVING EMAIL = ?");
$catchthem->bind_param("s", $EMAILaes); 
$catchthem->execute();
$result = $catchthem->get_result();
$fetchy = $result->fetch_assoc();


$emailofpersonOLD = $fetchy['EMAIL'];
$Placeofperson = $fetchy['VENUE'];
$emailofperson = (openssl_decrypt ($emailofpersonOLD, $cipher_algo, $decrypt_key, $option, $decrypt_iv));
// the below section sends an email
//echo $emailofperson;
//$message = "Hello, your ID card has been successfully approved, please visit ".$Placeofperson." at a given date, the staff will assist you in the venue.";
//echo "Hello, your ID card has been successfully approved, please visit ".$Placeofperson." at a given date, the staff will assist you in the venue.";
//mail("$emailofperson","Hello!",$message);
echo "Email was successfully sent to email address "." $emailofperson";

echo '<pre>';
$deleteXD = $conn->prepare("DELETE FROM applications WHERE EMAIL= ?");
$deleteXD->bind_param("s", $EMAILaes);
$deleteXD->execute();

echo "Record containing this email ".$emailofperson." was successfully deleted";
echo '<pre>';
echo  "This is what the message look like to the person";
echo '<pre>';
echo  "Hello, your ID card has been successfully approved, please visit ".$Placeofperson." at a given date, the staff will assist you in the venue.";

mysqli_close($conn);

?>
