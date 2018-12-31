<?php
include_once('dbconnect.php');
include_once('functions.php');
include_once('session.php');
?>

<!DOCTYPE html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>Notify</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet"> 
    <link rel="stylesheet" href="css/notifystyle.css">
</head>

<body>
    <!-- dodawanie postu  -->
    <?php
    if (isset($_SESSION['message'])){
    echo "<b>". $_SESSION['message']."</b>";
    unset($_SESSION['message']);
}
?>

    <div class="add">
<form method='post' action='add_textbox.php' id='add_text'>
    <p><h1>Wyślij Notify do znajomych!</h1></p>
<textarea name='text' rows='5' cols='50' wrap=soft></textarea>
<p><input type='submit' value='Wyślij!'/></p>
</form>
    </div>

<section>
    <div class="tbl-header">
    <table cellpadding="0" cellspacing="0" border="0">
      <thead>
        <tr>
          <th>Użytkownik</th>
          <th>Wpis</th>
          <th>Data wpisu</th>
        </tr>
      </thead>
    </table>
</div>

<?php
$posts = show_posts($_SESSION['user']);
    if (count($posts)) ?>
        <div class="tbl-content">
        <table cellpadding="0" cellspacing="0" border="0">
<?php
foreach ($posts as $key => $list){
    echo "<tr>";
    echo "<td>".$list['username'] ."</td>";
    echo "<td>".$list['text'] ."</td>";
    echo "<td>".$list['text_date'] ."</td>";
    echo "</tr>"; }
?> 
</div> </table>
</section>

<div class="tbl-us-header">
    <table cellpadding="0" cellspacing="0" border="0">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nazwa użytkownika</th>
        </tr>
      </thead>
    </table>
</div>

<?php
$users = show_users();
    if (count($users)){ ?>
        <div class="tbl-users">
        <table cellpadding="0" cellspacing="0" border="0">
<?php
foreach ($users as $key => $value){
    echo "<tr>";
    echo "<td>".$key ."</td>";
    echo "<td>".$value ."</td>";
    echo "</tr>";
    }
?>
</table> 
<?php
}
?>


<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script  src="js/index.js"></script>
</body>
</html>