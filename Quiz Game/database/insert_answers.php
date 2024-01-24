<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quiz";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// CSV file path
$csvFile = '../questions/answers.csv';

// Open and read the CSV file
if (($handle = fopen($csvFile, 'r')) !== FALSE) {
    // Loop through each row in the CSV file
    $i = 1; // Initialize the question_id counter
    while (($data = fgetcsv($handle, 1000, ',')) !== FALSE) {
        // Extract the necessary information from the CSV row
        $answer = $data[0]; // Assuming the answer is in the second column of the CSV

        // Update the answer column in the questions table
        $sql = "UPDATE questions SET answer = '" . $conn->real_escape_string($answer) . "' WHERE questions_id = $i";

     $conn->query($sql) ;
     
     $i++; // Increment the question_id counter
    }
    
    // Close the CSV file
    fclose($handle);
}

// Close the database connection
$conn->close();
header('location: ../database/create_lists.php');
?>
