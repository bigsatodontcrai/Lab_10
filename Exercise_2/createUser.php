<?php

    error_reporting(E_ALL); 
    ini_set("display_errors", 1);
    
    $username = $_POST["username"];
    $password = $_POST["password"];

    $mysqli = new mysqli("mysql.eecs.ku.edu", "suhaibansari", "oox7Ao9M", "suhaibansari");
    if ($mysqli->connect_errno) {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit(); 
    }

    $query = "SELECT Username FROM Users WHERE Username = '" . $username . "'";
	$result = $mysqli -> query($query);

    if($username == ""){
        echo "<p> Sorry. Username was not made. Go back and try again. </p>";
    } else if($result -> num_rows != 0){
		echo "<p> Username already exists.";
	}else if($password == ""){
        echo "<p> Sorry. Password was not made. Go back and try again. </p>";
    } else {
        $this_id = rand(1000000, 9999999);
        $query = "INSERT INTO Users (Username, Password, user_id) VALUES ('" . $username . "','" . $password . "'," . $this_id . ");";
        $mysqli -> query($query);
        echo "<p> Successfully made username and password. </p>";
        
    }
    $mysqli->close();

?>