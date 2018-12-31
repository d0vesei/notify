<!-- dodawanie postu do bazy danych -->
<?php
function add_post($myusername,$text) {
    
    if ($dbusers = @mysqli_connect("notify.mysql.database.azure.com", "", "", ""))
    $sql = "INSERT INTO posts (username, text, text_date) VALUES ('$myusername', '$text' ,now())"; 
    $result = mysqli_query($dbusers, $sql);
} ?>

    <!-- wyświetlanie postów innych użytkowników -->
<?php
function show_posts($userid) {
   
    $posts = array();
    if ($dbusers = mysqli_connect("notify.mysql.database.azure.com", "", "", ""))
    $showposts = "SELECT username, text, text_date FROM posts ORDER BY text_date DESC";
    // echo '<pre>';
    // print_r($dbusers);
    // echo '</pre>';
    if ($result = $dbusers->query($showposts)) {
        while ($data = mysqli_fetch_object($result)) {
            $posts[] = array (
                        "text_date" => $data -> text_date,
                        "username" => $data -> username,
                        "text" => $data -> text );
            }
        }
    return $posts;
    }
?>

    <!-- wyświetlanie użytkowników -->
<?php
function show_users(){
    $users = array();
    if ($dbusers = mysqli_connect("notify.mysql.database.azure.com", "", "", ""))
    $sql = "SELECT id, username from users";
    if ($result = $dbusers->query($sql)) {
        while ($data = mysqli_fetch_object($result)) {
        $users[$data->id] = 
        $data->username;
    }
    }
    return $users;
}
?>