<?php 


$CHINESENAME = $_POST["CHINESENAME"];
$ENGLISHNAME = $_POST["ENGLISHNAME"];
$GENDER = $_POST["GENDER"];
$DOB = $_POST["DOB"];
$ADDRESS = $_POST["ADDRESS"];
$POB = $_POST["POB"];
$OCCUPATION = $_POST["OCCUPATION"];
$VENUE = $_POST["VENUE"];
$EMAIL = $_POST["EMAIL"];
$right = true;
$wrong = "";

// openSSL  AES256 encryption 


$cipher_algo = "AES-256-CTR"; 
$iv_length = openssl_cipher_iv_length($cipher_algo); 
$option = 0;
$encrypt_iv = '8746376827619797'; 
$encrypt_key = "NcRfUjXn2r4u7x!A%D*G-KaPdSgVkYp3";

$CHINESENAMEaes = openssl_encrypt($CHINESENAME, $cipher_algo,
$encrypt_key, $option, $encrypt_iv);
			
$ENGLISHNAMEaes = openssl_encrypt($ENGLISHNAME, $cipher_algo,
$encrypt_key, $option, $encrypt_iv);


	
$ADDRESSaes = openssl_encrypt($ADDRESS, $cipher_algo,
$encrypt_key, $option, $encrypt_iv);	

$POBaes = openssl_encrypt($POB, $cipher_algo,
$encrypt_key, $option, $encrypt_iv);	

$OCCUPATIONaes = openssl_encrypt($OCCUPATION, $cipher_algo,
$encrypt_key, $option, $encrypt_iv);	

$EMAILaes = openssl_encrypt($EMAIL, $cipher_algo,
$encrypt_key, $option, $encrypt_iv);	



$conn = new mysqli('localhost', 'createid', 'hifrneds@#1232', 'applications');

if ($conn->connect_error)
{
die("connection failed:".$conn->connect_error);
}





if(!preg_match("/^[a-zA-Z0-9_ ]{1,255}$/", $CHINESENAME))
{
    $right = false;
    $wrong = $wrong . "Chinese name must contain 1 to 255 letters!<br><br>"; 
}

if(!preg_match("/^[a-zA-Z0-9_ ]{1,255}$/", $ENGLISHNAME))
{
    $right = false;
    $wrong = $wrong . "English name must contain 1 to 255 letters!<br><br>"; 
}

if(!preg_match("/^[a-zA-Z0-9_ ]{1,15}$/", $GENDER))
{
    $right = false;
    $wrong = $wrong . "Gender must be M or F!<br><br>"; 
}

if(!preg_match("/^[0-9_]{6}$/", $DOB))
{
    $right = false;
    $wrong = $wrong . "Data must be xx/xx/xx!<br><br>"; 
}

if(!preg_match("/^[a-zA-Z0-9_ ]{1,255}$/", $ADDRESS))
{
    $right = false;
    $wrong = $wrong . "Address must contain 1 to 255 letters!<br><br>"; 
}

if(!preg_match("/^[a-zA-Z0-9_ ]{1,255}$/", $POB))
{
    $right = false;
    $wrong = $wrong . "Place Of Birth must contain 1 to 255 letters!<br><br>"; 
}

if(!preg_match("/^[a-zA-Z0-9_ ]{1,255}$/", $OCCUPATION))
{
    $right = false;
    $wrong = $wrong . "Occupation must contain 1 to 255 letters!<br><br>"; 
}

if(!preg_match("/^[a-zA-Z0-9_]{1,20}$/", $VENUE))
{
    $right = false;
    $wrong = $wrong . "Venue must be one of three choices!<br><br>"; 
}


if(!preg_match("/^\w+@[a-zA-Z0-9_]+?\.[a-zA-Z]{1,255}$/", $EMAIL))
{
    $right = false;
    $wrong = $wrong . "Email must contain 1 to 25 letters!<br><br>"; 
}

if($right)
{
	$search_sql = $conn->prepare("SELECT * FROM applications where EMAIL = ?");
	  $search_sql->bind_param("s", $EMAILaes); 
	
    $search_sql->execute();
    $search_sql->store_result();
	
	 if($search_sql->num_rows > 0) 
    {
        echo "Email already exists!</h2>";
    }
	
	



    else
    {
        $insert_sql = $conn->prepare("INSERT INTO applications (CHINESENAME, ENGLISHNAME, GENDER, DOB, ADDRESS, POB, OCCUPATION, VENUE, EMAIL) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");  
        $insert_sql->bind_param("sssssssss", $CHINESENAMEaes, $ENGLISHNAMEaes, $GENDER, $DOB, $ADDRESSaes, $POBaes, $OCCUPATIONaes, $VENUE, $EMAILaes); 
        $insert_sql->execute();
        echo "<h2>Registration Success!!</h2>";
    }
}
else
{
    echo "<h3> $wrong </h3>";
}

mysqli_close($conn);
	
?>


