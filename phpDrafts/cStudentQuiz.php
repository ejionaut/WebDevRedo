<?php
    include "config.php";

    if (isset($_POST['cStudentQuiz'])) {
        // collect values of input field
        $acc_id = $_POST['acc_id'];
        $quiz_code = $_POST['quiz_code'];
        $score = $_POST['score'];
        $sq_id = $_POST['sq_id'];
        $timestamp = $_POST['timestamp'];

        $query = "INSERT INTO 'student_quiz'('acc_id', 'quiz_code', 
        'score', 'sq_id', 'timestamp') VALUES('$acc_id', '$quiz_code', 
        '$score', '$sq_id', '$timestamp')";

        $result = $connection->query($sql);

        if($result == TRUE) {
            echo "Student Quiz updated."
        } else {
            echo "Error:" . $sql . "<br>" . $connection->error;
        }

        $connection->close();
    }
?>