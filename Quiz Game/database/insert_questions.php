<?php
    
    // Database connection parameters
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $database = "quiz";
    
    // Establishing connection
    $conn = new mysqli($hostname, $username, $password, $database);
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    // Read questions from file and insert into the database
    $file = fopen("../questions/questions.txt", "r");
    
    while (!feof($file)) {
        $question = trim(fgets($file));
    
        if (!empty($question)) {
            $escaped_question = $conn->real_escape_string($question);
            $query = "INSERT INTO questions(question) VALUES ('$escaped_question')";
    
            if ($conn->query($query) === TRUE) {
                header('location: ../database/insert_answers.php');
            } else {
                echo "Error inserting question: " . $conn->error . "<br>";
            }
        }
    }
    
    fclose($file);
    $conn->close();
    
    
?>