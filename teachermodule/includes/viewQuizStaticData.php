<?php
    include "config.php";

    $quiz_code = $_GET['quiz_code'];
    $q_name = $_GET['q_name'];

    $highestScoreName = "SELECT CONCAT(first_name,' ',last_name) as fullname FROM students JOIN student_quiz ON student_quiz.user_id = students.user_id
    WHERE score = (SELECT MAX(score) FROM student_quiz WHERE quiz_code = '$quiz_code')";

    $highestScore = "SELECT MAX(score) as highestScore from student_quiz WHERE quiz_code = '$quiz_code'";


    $averageScore = "SELECT AVG(score) AS average FROM student_quiz WHERE quiz_code ='$quiz_code'";

    $passed = "SELECT COUNT(CASE WHEN score >= 0.50 * (SELECT total_score FROM quiz_list WHERE quiz_code = '$quiz_code') THEN 1 END) AS passed
    FROM students JOIN student_quiz ON students.user_id = student_quiz.user_id
    WHERE quiz_code ='$quiz_code'";

    $failed = "SELECT COUNT(CASE WHEN score < 0.50 * (SELECT total_score FROM quiz_list WHERE quiz_code = '$quiz_code') THEN 1 END) AS failed
    FROM students JOIN student_quiz on students.user_id = student_quiz.user_id
    WHERE quiz_code ='$quiz_code'";

    $over = "SELECT total_score from quiz_list
    WHERE quiz_code = '$quiz_code'";

    $studentsName = "SELECT CONCAT(first_name,' ',last_name) as fullname FROM students JOIN student_quiz ON students.user_id = student_quiz.user_id WHERE quiz_code ='$quiz_code'";
    $studentsScore = "SELECT score FROM students JOIN student_quiz on students.user_id = student_quiz.user_id WHERE quiz_code ='$quiz_code'";

    $missed = "SELECT (SELECT COUNT(*) FROM student) - (SELECT COUNT(*) FROM student JOIN student_quiz ON student.user_id = student_quiz.user_id WHERE quiz_code = '$quiz_code') AS total_studentsMissed";

    $studentsCompleted = "SELECT COUNT(student_quiz.user_id) AS students_Completed FROM student_quiz WHERE quiz_code = '$quiz_code'";
    $studentsMissed = "SELECT (SELECT COUNT(students.user_id) FROM students) - (SELECT COUNT(student_quiz.user_id) FROM student_quiz WHERE quiz_code = '$quiz_code') AS students_Missed";
    $lateSubmissions = "SELECT COUNT(student_quiz.user_id) AS late_submissions FROM student_quiz WHERE student_quiz.timestamp > (SELECT end_date FROM quiz_list WHERE quiz_code = '$quiz_code')";

    $studentsCompletedResult = $connection->query($studentsCompleted);
    $studentsMissedResult = $connection->query($studentsMissed);
    $passedResult = $connection->query($passed);
    $failedResult = $connection->query($failed);
    $overResult = $connection->query($over);
    $highestScoreNameResult = $connection->query($highestScoreName);
    $highestScoreResult = $connection->query($highestScore);
    $averageScoreResult = $connection->query($averageScore);
    $studentsNameResult = $connection->query($studentsName);
    $lateSubmissionsResult = $connection->query($lateSubmissions);
    $studentsScoreResult = $connection->query($studentsScore);
?>