<?php
    include "config.php";

    $quiz_code = $_GET['quiz_code'];
    $q_name = $_GET['q_name'];

    $highestScoreName = "SELECT CONCAT(student.firstname, ' ', student.lastname) as fullname, student_quiz.score as score
    FROM student JOIN student_quiz on student.user_id = student_quiz.user_id
    WHERE score = (SELECT MAX(score) FROM `student_quiz` WHERE quiz_code = '$quiz_code')
    LIMIT 1";

    $highestScore = "SELECT CONCAT(student.firstname, ' ', student.lastname) as fullname, student_quiz.score as score
    FROM student JOIN student_quiz on student.user_id = student_quiz.user_id
    WHERE score = (SELECT MAX(score) FROM `student_quiz` WHERE quiz_code = '$quiz_code')
    LIMIT 1";

    $averageScore = "SELECT AVG(score) as average FROM student_quiz WHERE quiz_code ='$quiz_code'";

    $passed = "SELECT COUNT(CASE WHEN score >= 0.50 * (SELECT total_score FROM quiz_list WHERE quiz_code = '$quiz_code') THEN 1 END) as passed
    FROM student JOIN student_quiz on student.user_id = student_quiz.user_id
    WHERE quiz_code ='$quiz_code'";

    $failed = "SELECT COUNT(CASE WHEN score < 0.50 * (SELECT total_score FROM quiz_list WHERE quiz_code = '$quiz_code') THEN 1 END) as failed
    FROM student JOIN student_quiz on student.user_id = student_quiz.user_id
    WHERE quiz_code ='$quiz_code'";

    $over = "SELECT total_score from quiz_list
    WHERE quiz_code = '$quiz_code'";

    $studentsName = "SELECT CONCAT(firstname,' ',lastname) as fullname FROM student JOIN student_quiz on student.user_id = student_quiz.user_id WHERE quiz_code ='$quiz_code'";

    $missed = "SELECT (SELECT COUNT(*) FROM student) - (SELECT COUNT(*) FROM student JOIN student_quiz on student.user_id = student_quiz.user_id WHERE quiz_code = '$quiz_code') as total_studentsMissed";

    $studentsCompleted = "SELECT COUNT(student_quiz.user_id) as students_Completed FROM student_quiz";
    $studentsMissed = "SELECT (SELECT COUNT(student.user_id) FROM student) - (SELECT COUNT(student_quiz.user_id) FROM student_quiz) as students_Missed";

    $studentsCompletedResult = $connection->query($studentsCompleted);
    $studentsMissedResult = $connection->query($studentsMissed);
    $passedResult = $connection->query($passed);
    $failedResult = $connection->query($failed);
    $overResult = $connection->query($over);
    $highestScoreNameResult = $connection->query($highestScoreName);
    $highestScoreResult = $connection->query($highestScore);
    $averageScoreResult = $connection->query($averageScore);
    $studentsNameResult = $connection->query($studentsName);
?>