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
    <link href="https://fonts.googleapis.com/css2?family=Cedarville+Cursive&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hanuman:wght@100;300;400;700;900&display=swap" rel="stylesheet">
    <style>
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

        .contain {
            width: 100%;
            height: 80vh;
        }

        .cedarville-cursive-regular {
            font-family: "Cedarville Cursive", cursive;
            font-weight: 400;
            font-style: normal;
            color: darkred;
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
        <div class="contain bg-primary-subtle mx-auto d-flex align-items-center justify-content-center">
            <div class="">

                <!-- first half with 80% width -->
                <div class="">
                    <h1 class="cedarville-cursive-regular">CONGRATULATIONS!</h1>
                    <P>You scored :
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

                    </P>
                </div>

                <div class="mx-auto d-flex align-items-center justify-content-center">
                    <form action="../database/drop_database.php">
                        <button type="submit" class="kotta-one-regular btn btn-secondary btn-lg">Start again </button>
                    </form>
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