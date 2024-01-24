<?php

// Replace these with your database credentials
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



// Open the CSV file for reading
$csvFile = fopen('../questions/lists.csv', 'r');

// Check if the file opened successfully
if ($csvFile !== FALSE) {
    // Read and insert data from the CSV file
    while (($row = fgetcsv($csvFile)) !== FALSE) {
        $values = implode("', '", $row);
        $sql = "INSERT INTO lists VALUES (NULL, '$values')";
        $conn->query($sql);
    }

    // Close the CSV file
    fclose($csvFile);
}

// Close the connection
$conn->close();

header('location: ../dashboard/index.php');

?>

