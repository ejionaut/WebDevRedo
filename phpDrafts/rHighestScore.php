<?php
    include "config.php";

    $quiz_code = $_POST['quiz_code'];

    $sql = "SELECT CONCAT(firstname, ' ', lastname), score
    FROM student JOIN student_quiz on student.user_id = student_quiz.user_id
    WHERE score = (SELECT MAX(score) FROM `student_quiz` WHERE quiz_code ='$quiz_code')
    LIMIT 1;"
?>
