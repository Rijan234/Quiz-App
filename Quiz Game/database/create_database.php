<?php

if($_SERVER['REQUEST_METHOD']=='POST'){
    
    $user_name=$_POST['username'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quiz";


// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    echo '<p class="text-danger">Connection failed: ' . $conn->connect_error . '</p>';
} else {
    // Create database named quiz
    $sql = "CREATE DATABASE IF NOT EXISTS $dbname";
    $conn->query($sql);

    // Use the quiz database
    $conn->select_db($dbname);

    // create table users
    $sql = "CREATE TABLE IF NOT EXISTS users (
                    user_id INT(4) PRIMARY KEY AUTO_INCREMENT,
                    username VARCHAR(50) UNIQUE,
                    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
                    )";
    $conn->query($sql);

    // create table questions
    $sql = "CREATE TABLE IF NOT EXISTS questions (
                    questions_id INT(4) PRIMARY KEY AUTO_INCREMENT,
                    question VARCHAR(200),
                    answer VARCHAR(200)
                    )";
    $conn->query($sql);

    // create table lists
    $sql = "CREATE TABLE IF NOT EXISTS lists (
                    lists_id INT(4) PRIMARY KEY AUTO_INCREMENT,
                    a VARCHAR(200),
                    b VARCHAR(200),
                    c VARCHAR(200),
                    d VARCHAR(200)
                    )";
    $conn->query($sql);

    // create table score
    $sql = "CREATE TABLE IF NOT EXISTS score (
                    score_id INT(4) PRIMARY KEY AUTO_INCREMENT,
                    marks INT(4)
                    )";
    $conn->query($sql);

    
    // insert username
    // $sql="INSERT INTO users(username) VALUES ('$username')";
    // $conn->query($sql);


    $sql="INSERT INTO users(username) VALUES ('$user_name')";
    $conn->query($sql);


    $conn->close();
    header('location: ../database/insert_questions.php');
}
}

?>