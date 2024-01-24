<?php

        
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "quiz";

    // Create connection
    $conn = new mysqli($servername, $username, $password);

    // Check connection
    if ($conn->connect_error) {
        echo '<p class="text-danger">Connection failed: ' . $conn->connect_error . '</p>';
    } else{

        // Drop database
    $sql = "DROP DATABASE $dbname";

    if ($conn->query($sql) === TRUE) {
        echo "Database dropped successfully";
    } else {
        echo "Error dropping database: " . $conn->error;
    }
    }
    header('location: ../index.html');
?>