<!-- Łączenie z bazą danych -->
<?php

   if ($dbusers = @mysqli_connect("notify.mysql.database.azure.com", "", "", ""))
   {mysqli_select_db($dbusers, "database");
   } else {
      echo '<h3> Wystąpił problem z zalogowaniem. Spróbuj ponownie. </br>
      W razie dalszych problemów, skontaktuj się z administatorem. <h3>';
   }
?>