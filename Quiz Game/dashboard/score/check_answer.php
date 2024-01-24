<?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $submitted_ans = $_POST['submitted_answer'];
        $row_id=$_POST['row_id'];
        // echo $row_id;
        // echo $submitted_answer;
        $submitted_answer = str_replace(' ', '', $submitted_ans);


      

        // get answer from database of respective row starting from 1

        function get_answer($row_id)
        {

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

            // SQL query
            $sql = "SELECT answer FROM questions WHERE questions_id=$row_id";
            $result = $conn->query($sql);

            // Check if the query was successful
            if ($result->num_rows > 0) {
                // Loop through the result set
                while ($row = $result->fetch_assoc()) {
                    // Access data using $row['column_name']
                    return $row['answer'];
                }
            } else {
                echo "0 results";
            }

            // Close the connection
            $conn->close();
        }

        $database_ans = get_answer($row_id);
        // echo $database_answer;
        // trim answer
        $database_answer = str_replace(' ', '', $database_ans);

        $result = strcasecmp($database_answer, $submitted_answer);
        // insert score 10 if correct answer
        if ($result==0) {

            // Database connection details
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

        $score=10;

            // SQL query to insert values
            $sql = "INSERT INTO score (score_id,marks) VALUES ('$row_id','$score')";

            // Execute query
            $conn->query($sql) ;
        

            // Close connection
            $conn->close();
            // header('location: ../indexx.php?questions_id=' . $row_id);
            // header('location: ../indexx.php?questions_id=' . $row_id . '&submitted_answer=' . urlencode($submitted_answer) . '&database_answer=' . urlencode($database_answer));


              // Redirect with additional parameters
        $redirectUrl = '../indexx.php?questions_id=' . $row_id . '&submitted_answer=' . urlencode($submitted_answer) . '&database_answer=' . urlencode($database_answer);
        echo "<script>window.location.href = '$redirectUrl';</script>";
        exit();

        }
        else{
            // Database connection details
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
    
            
            $a=0;
            // SQL query to insert values
            $sql = "INSERT INTO score (score_id,marks) VALUES ($row_id,$a)";
    
            // Execute query
            $conn->query($sql) ;
            
    
            // Close connection
            $conn->close();
            // header('location: ../indexx.php?questions_id=' . $row_id);
            $redirectUrl = '../indexx.php?questions_id=' . $row_id . '&submitted_answer=' . urlencode($submitted_answer) . '&database_answer=' . urlencode($database_answer);
            echo "<script>window.location.href = '$redirectUrl';</script>";
            exit();
        }
        
    }
?>
