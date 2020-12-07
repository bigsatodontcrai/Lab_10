<?php

    error_reporting(E_ALL); 
    ini_set("display_errors", 1);
    
    $content = $_POST["posts"];
    

    $mysqli = new mysqli("mysql.eecs.ku.edu", "suhaibansari", "oox7Ao9M", "suhaibansari");
    if ($mysqli->connect_errno) {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit(); 
    }

    $num = count($content);
    for($i = 0; i < $N; $i++){
        $query = "
            DELETE FROM Posts
            WHERE content = ". $content[$i] ."
        ";
        $result = $mysqli -> query($query);
        $result -> free();
    }

    $mysqli->close();

?>