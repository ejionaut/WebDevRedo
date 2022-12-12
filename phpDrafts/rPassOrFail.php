// how many passed / failed (pie chart) 50% - passing

<?php
    include "config.php";

    $quiz_code = $_POST['quiz_code'];

    $sql = "SELECT COUNT(CASE WHEN score >= 0.50 * (SELECT total_score FROM quiz_list WHERE quiz_code = '$quiz_code') THEN 1 END),
    COUNT(CASE WHEN score < 0.50 * (SELECT total_score FROM quiz_list WHERE quiz_code = '$quiz_code') THEN 1 END)
    FROM student JOIN student_quiz on student.user_id = student_quiz.user_id
    WHERE quiz_code ='$quiz_code'"
?>