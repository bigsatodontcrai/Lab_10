<?php 
    error_reporting(E_ALL); 
    ini_set("display_errors", 1);
    

    $mysqli = new mysqli("mysql.eecs.ku.edu", "suhaibansari", "oox7Ao9M", "suhaibansari");
    if ($mysqli->connect_errno) {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit(); 
    }

    $query = "SELECT Username FROM Users WHERE user_id > 0";
    $result = $mysqli -> query($query);
    while ($row = $result -> fetch_assoc()){
        echo "<p>" . $row["Username"] . "</p>";
    }

    $result -> free();
    $mysqli -> close();

?>