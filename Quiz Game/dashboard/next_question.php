<?php
// next_question.php

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the questions_id from the form
    $questions_id = $_POST["current_question_id"];
    $questions_id++;
    // echo $questions_id;

    if($questions_id<=10){

        // Redirect to index.php with the questions_id as a query parameter
        header('location: ../dashboard/indexx.php?questions_id=' . $questions_id);
        exit();
    }
    else{
        header('location: ../dashboard/final.php');
        exit();
    }
}
?>
