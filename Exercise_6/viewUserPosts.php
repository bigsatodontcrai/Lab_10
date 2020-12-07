<?php

    error_reporting(E_ALL); 
    ini_set("display_errors", 1);
    
    $username = $_POST["username"];
    $password = $_POST["password"];
    $content = $_POST["post"];

    $mysqli = new mysqli("mysql.eecs.ku.edu", "suhaibansari", "oox7Ao9M", "suhaibansari");
    if ($mysqli->connect_errno) {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit(); 
    }

    $query = "SELECT Username, Password FROM Users WHERE Username = " . $username . " AND Password = " . $password;


    if($username == ""){
        echo "<p> Blank username. </p>";
    } else if($password == ""){
        echo "<p> Sorry. Password was not made. Go back and try again. </p>";
    } else if($content == ""){
        echo "<p> No content. Go back and try again. </p>";
    } else if($result = $mysqli -> query($query)) {
        $this_id = rand(1000000, 9999999);
        $result -> free();
        $query = "SELECT user_id FROM Users WHERE Username = " . $username . " AND Password = " .$password;
        $result = $mysqli -> query($query);
        $query = "INSERT INTO Posts (post_id, content, author_id) VALUES (" . $this_id . "," . $content . "," . $result . ")";
        $result -> free();
    } else {
        echo "<p> Either the user doesn't exist or the password is incorrect. Try again.";
    }
    $mysqli->close();

?>