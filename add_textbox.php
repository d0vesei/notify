<!-- Dodawanie postu (umieszczenie jej w bazie danych) -->

<!-- Sprawdzanie połączenia z bazą danych, korzystanie z pliku functions.php -->
<?php
session_start();
include_once("dbconnect.php");
include_once("functions.php");
include_once("session.php");

// Insert textbox'a do bazy danych
$myusername = $_SESSION['user'];
$text = substr($_POST['text'],0,200);

add_post($myusername,$text);
$_SESSION['message'] = "Twój post został dodany!";
 
header("Location:index.php");
?>