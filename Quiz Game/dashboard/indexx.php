<?php
// index.php

// Check if the questions_id parameter is set in the URL
if (isset($_GET['questions_id'])) {
    // Retrieve the questions_id from the URL
    $questions_id = $_GET['questions_id'];

    // Use $questions_id as needed in your code

    // $submitted_answer = $_GET['submitted_answer'];
    // $database_answer = $_GET['database_answer'];
    // echo $submitted_answer;
    // echo $database_answer;
} else {
    echo "questions_id parameter is not set.";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Mania</title>
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- font link -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hanuman:wght@100;300;400;700;900&display=swap" rel="stylesheet">
    <style>
        .main_div {
            height: 100vh;
            /* background-color: aliceblue; */
        }

        .foot_div {
            height: 12vh;
            background-color: aliceblue;


        }

        .hanuman-regular {
            font-family: "Hanuman", serif;
            font-weight: 400;
            font-style: normal;
        }

        .kotta-one-regular {
            font-family: "Kotta One", serif;
            font-weight: 400;
            font-style: normal;
        }

        .txt {
            font-size: large;
            width: 65%;
        }

        .cc {
            margin-top: 150px;
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar bg-body-tertiary">
            <div class="container-fluid">
                <span class="navbar-brand mb-0 h1">QuizMania</span>
            </div>
        </nav>

    </header>

    <main>
        <div class="container-fluid ">
            <div class="row main_div">

                <!-- first half with 80% width -->
                <div class="a col-9 bg-primary-subtle ">
                    <section class="a">
                        <div class="col-md-3 pt-2 mx-auto shadow-sm  mb-5  rounded">

                            <h1 class="text-primary kotta-one-regular text-center ">Question <?php echo "$questions_id"; ?></h1>
                        </div>
                        <div>
                            <h1 class="hanuman-regular">
                                <?php
                                $servername = "localhost";
                                $username = "root";
                                $password = "";
                                $database = "quiz";

                                // Create connection
                                $conn = new mysqli($servername, $username, $password, $database);

                                // Check connection
                                if ($conn->connect_error) {
                                    die("Connection failed: " . $conn->connect_error);
                                }

                                // gets row value from next_question.php it increments and passes here
                                // SQL query to retrieve data
                                $sql = "SELECT question FROM questions WHERE questions_id=$questions_id";
                                $result = $conn->query($sql);

                                // Check if the query was successful
                                if ($result) {
                                    // Fetch data and display
                                    while ($row = $result->fetch_assoc()) {
                                        echo "" . $row["question"] . "";
                                    }
                                } else {
                                    echo "Error: " . $sql . "<br>" . $conn->error;
                                }

                                // Close connection
                                $conn->close();
                                ?>

                            </h1>
                        </div>
                    </section>
                    <section class="b">
                        <form action="../dashboard/score/check_answer.php" method="post" id="genderForm">
                            <?php
                            $servername = "localhost";
                            $username = "root";
                            $password = "";
                            $database = "quiz";

                            // Create connection
                            $conn = new mysqli($servername, $username, $password, $database);

                            // Check connection
                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }

                            // initializing varible 1

                            // SQL query to retrieve data
                            $sql = "SELECT a,b,c,d FROM lists WHERE lists_id=$questions_id";
                            $result = $conn->query($sql);

                            // Check if the query was successful
                            if ($result) {
                                // Fetch data and display
                                while ($row = $result->fetch_assoc()) {
                                    // main div 
                                    echo '<div class="container row mx-auto">';

                                    // a div
                                    echo '<div class="col-6  d-flex align-items-center justify-content-center">';

                                    echo '<button class="btn btn-primary p-4 txt " name="submitted_answer"   value="' . $row["a"] . '" type="radio">';
                                    echo "A)" . $row["a"] . "";
                                    echo "</button>";
                                    // end of a div
                                    echo "</div>";

                                    // b div
                                    echo '<div class="col-6  d-flex align-items-center justify-content-center">';

                                    echo '<button class="btn btn-primary p-4 txt " name="submitted_answer"  value=" ' . $row["b"] . '"  type="radio">';
                                    echo "B)" . $row["b"] . "";
                                    echo "</button>";
                                    echo "<br>";
                                    echo "<br>";
                                    // end of b div
                                    echo "</div>";

                                    // end of main div
                                    echo "</div>";

                                    echo "<br>";
                                    echo "<br>";

                                    // for c and d
                                    echo '<div class="container row mx-auto">';

                                    // a div
                                    echo '<div class="col-6  d-flex align-items-center justify-content-center">';

                                    echo '<button class="btn btn-primary p-4 txt "  name="submitted_answer"  value=" ' . $row["c"] . '"  type="radio">';
                                    echo "C)" . $row["c"] . "";
                                    echo "</button>";
                                    // end of a div
                                    echo "</div>";

                                    // b div
                                    echo '<div class="col-6  d-flex align-items-center justify-content-center">';

                                    echo '<button class="btn btn-primary p-4 txt " name="submitted_answer"  value=" ' . $row["d"] . '"  type="radio">';
                                    echo "D)" . $row["d"] . "";
                                    echo "</button>";
                                    echo "<br>";
                                    echo "<br>";
                                    // end of b div
                                    echo "</div>";

                                    // end of main div
                                    echo "</div>";
                                }
                            } else {
                                echo "Error: " . $sql . "<br>" . $conn->error;
                            }

                            // Close connection
                            $conn->close();
                            ?>

                            <input type="hidden" name="row_id" value="<?php echo $questions_id; ?>">
                        </form>
                        <!-- javascript code to pass the form without clicking submit -->
                        <script>
                            // Automatically submit the form when a radio button is selected
                            document.addEventListener('DOMContentLoaded', function() {
                                var form = document.getElementById('genderForm');
                                form.addEventListener('change', function() {
                                    form.submit();
                                });
                            });
                        </script>
                    </section>
                    <section class="c">
                        <div class="container">

                            <div class=" p-4 d-flex flex-row-reverse">


                                <form action="next_question.php" method="post">

                                    <?php
                                    // Replace these values with your actual database credentials
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

                                    // Query to retrieve data from the database
                                    $sql = "SELECT questions_id FROM questions";
                                    $result = $conn->query($sql);

                                    // Check if the query was successful
                                    if ($result === false) {
                                        die("Error in SQL query: " . $conn->error);
                                    }

                                    // Fetch data from the result set
                                    $row = $result->fetch_assoc();

                                    // Close the database connection
                                    $conn->close();
                                    ?>

                                    <?php
                                    $a = $questions_id

                                    ?>
                                    <input type="hidden" name="current_question_id" value="<?php echo $a; ?>">

                                    <button type="submit" class="btn btn-outline-primary">Next Question</button>
                                </form>
                            </div>
                        </div>
                    </section>
                    <section class="d">

                        <p id="submittedAnswer"></p>
                        <p id="databaseAnswer"></p>
                        <!-- Your existing HTML content -->

                        <!-- Display the values -->
                        <script>
                            // Get values from the URL and replace plus signs with spaces
                            var submitted_answer = decodeURIComponent(window.location.search.match(/(\?|&)submitted_answer=([^&]*)/)[2]).replace(/\+/g, ' ');
                            var database_answer = decodeURIComponent(window.location.search.match(/(\?|&)database_answer=([^&]*)/)[2]).replace(/\+/g, ' ');
                            var row_id = decodeURIComponent(window.location.search.match(/(\?|&)questions_id=([^&]*)/)[2]);

                            // Display the values in HTML elements
                            document.getElementById("submittedAnswer").innerHTML = "Your Answer: " + submitted_answer;
                            document.getElementById("databaseAnswer").innerHTML = "Correct Answer: " + database_answer;
                            document.getElementById("rowId").innerHTML = "Row ID: " + row_id;
                        </script>

                    </section>



                </div>

                <!-- 2nd half with 20% width -->
                <div class="b col-3 bg-dark-subtle main_div">
                    <div>
                        <section class="aa pt-3">
                            <h3 class="text-center">Player Name</h3>
                            <div class="user">
                                <?php
                                $servername = "localhost";
                                $username = "root";
                                $password = "";
                                $database = "quiz";

                                // Create connection
                                $conn = new mysqli($servername, $username, $password, $database);

                                // Check connection
                                if ($conn->connect_error) {
                                    die("Connection failed: " . $conn->connect_error);
                                }

                                // initializing varible 1
                                $i = 1;
                                // SQL query to retrieve data
                                $sql = "SELECT username FROM users WHERE user_id=1";
                                $result = $conn->query($sql);

                                // Check if the query was successful
                                if ($result) {
                                    // Fetch data and display
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<p class='text-center'>";
                                        echo "<u>";
                                        echo "" . $row["username"] . "";
                                        echo "</u>";
                                        echo "</p>";
                                    }
                                } else {
                                    echo "Error: " . $sql . "<br>" . $conn->error;
                                }

                                // Close connection
                                $conn->close();
                                ?>

                            </div>
                        </section>
                    </div>
                    <div>
                        <section class="bb p-2">
                            <div>
                                <h3 class="text-center">Score</h3>
                            </div>
                            <div>

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
                                        echo "0";
                                    }

                                    // Close the database connection
                                    $conn->close();

                                    echo array_sum($dataArray);

                                    // Now $dataArray contains the retrieved results
                                    ?>


                                </p>


                            </div>
                        </section>
                    </div>
                    <div class="cc d-flex justify-content-center">
                        <section class="">
                            <form action="../dashboard/final.php" method="post">
                                <!-- icon -->


                                <button type="submit" class="btn btn-outline-danger ">End Game <i class="bi bi-x"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708" />
                                        </svg> </i> </button>


                            </form>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer>
        <div class="foot_div">
            <p class="text-center p-4">Developed By: Rijan Rai</p>
        </div>
    </footer>

    <!-- boostrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>