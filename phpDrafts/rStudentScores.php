<?php
    include "config.php";

    $quiz_code = $_POST['quiz_code'];

    $sql = "SELECT CONCAT(firstname, ' ', lastname), score 
    FROM student_quiz JOIN student on student.user_id = student_quiz.user_id
    WHERE quiz_code = '$quiz_code'"
?>