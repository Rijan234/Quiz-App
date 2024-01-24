<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Mania</title>
</head>
<body>
    <div>
    <h1>
    <p class="text-center">
                                    <!-- to display score -->
                                    <?php
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

                                    // Retrieve data from the database
                                    $sql = "SELECT marks FROM score";
                                    $result = $conn->query($sql);

                                    $dataArray = array(); // Initialize an array to store the results

                                    if ($result->num_rows > 0) {
                                        // Output data of each row
                                        while ($row = $result->fetch_assoc()) {
                                            // Store each row in the array
                                            $dataArray[] = $row['marks'];

                                        }
                                    } else {
                                        echo "";
                                    }
                                    
                                    // Close the database connection
                                    $conn->close();

                                    echo array_sum($dataArray);

                                    // Now $dataArray contains the retrieved results
                                    ?>


                                </p>
                                
    </h1>
    </div>

    <div>
        <form action="../database/drop_database.php">
            <button type="submit">Start again </button>
        </form>
    </div>

</body>
</html>