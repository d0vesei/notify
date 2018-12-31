<?php
session_start();
$dbusers = ("notify.mysql.database.azure.com", "", "", "");
// Sprawdzanie połączenia z bazą danych

if($dbusers === false){
    die("Niepołączono z bazą danych, spróbuj ponownie." . mysqli_connect_error());
}

$myusername = mysqli_real_escape_string($dbusers,$_POST['username']);
$mypassword = mysqli_real_escape_string($dbusers,$_POST['password']);

$result = mysqli_query($dbusers,"SELECT username, password FROM users 
								 WHERE username = '$myusername' and password = '$mypassword'");
$count  = mysqli_num_rows($result);

if($count==0 && password_verify($mypassword, $hashedPassword)) {
		echo "Nieprawidłowa nazwa użytkownika/hasło!";
		header("refresh:3; url=login.html");
	} else {
        $_SESSION['user'] = $myusername;
		header("Location: index.php");
	}
?>
