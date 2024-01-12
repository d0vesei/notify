<?php

$con=mysqli_init(); 
mysqli_ssl_set($con, 'localhost','','', ''); 
mysqli_real_connect($con, "notify.mysql.database.azure.com", "", "", "", 3306);

?>
