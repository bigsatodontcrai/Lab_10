<?php

    error_reporting(E_ALL); 
    ini_set("display_errors", 1);
    
    $username = $_POST["username"];
    

    $mysqli = new mysqli("mysql.eecs.ku.edu", "suhaibansari", "oox7Ao9M", "suhaibansari");
    if ($mysqli->connect_errno) {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit(); 
    }

    

    $query = "
        SELECT Users.Username, Posts.content
        FROM Users
        INNER JOIN Posts
        ON user_id = author_id AND Username = '". $username."'
        ORDER BY Users.Username;
    ";

    $result = $mysqli -> query($query);
    echo "<p>" . $username . "'s posts: </p>";
    while ($row = $result -> fetch_assoc()){
        echo "<p>" . $row["content"] . "</p>";
    }


    $result -> free();
    $mysqli->close();

?>