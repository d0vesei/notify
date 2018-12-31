<?php
$dbusers = mysqli_connect("notify.mysql.database.azure.com", "", "", "");
// Sprawdzanie połączenia z bazą danych
if($dbusers === false){
    die("Niepołączono z bazą danych, spróbuj ponownie." . mysqli_connect_error());
}

$username = mysqli_real_escape_string($dbusers, $_REQUEST['username']);
$mypassword = mysqli_real_escape_string($dbusers, $_REQUEST['password']);
    $hashedPassword = password_hash($mypassword, PASSWORD_DEFAULT);
$email = mysqli_real_escape_string($dbusers, $_REQUEST['email']);
 
// Insert do bazy danych podczas rejestracji użytkownika (username, password, email)
$sql = "INSERT INTO users (username, password, email) VALUES ('$username', '$mypassword', '$email')";
if(mysqli_query($dbusers, $sql)){
    
    echo "<h3>Konto zostało założone.<h3>";
    header( "refresh:3;url=login.html" );
} else{
    echo "Nie utworzono konta użytkownika. Spróbuj ponownie.";
}
 
// Koniec połączenia
mysqli_close($dbusers);

?>
