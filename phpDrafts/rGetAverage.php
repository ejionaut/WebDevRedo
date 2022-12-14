<?php
    include "config.php";

    $quiz_code = $_POST['quiz_code'];

    $sql = "SELECT AVG(score)
    FROM student_quiz
    WHERE quiz_code ='$quiz_code'";
?>
