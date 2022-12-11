<?php
    include "config.php";

    if (isset($_POST['cStudentQuizAnswer'])) {
        // collect values of input field
        $acc_id = $_POST['acc_id'];
        $sq_id = $_POST['sq_id'];
        $quiz_code = $_POST['quiz_code'];
        $question = $_POST['question'];
        $answer = $_POST['answer'];

        $query = "INSERT INTO 'student_quiz_answer'('acc_id', 'sq_id', 
        'quiz_code', 'question', 'answer') VALUES('$acc_id', '$sq_id', 
        '$quiz_code', '$question', '$answer')";

        $result = $connection->query($sql);

        if($result == TRUE) {
            echo "Student Quiz Answers updated."
        } else {
            echo "Error:" . $sql . "<br>" . $connection->error;
        }

        $connection->close();
    }
?>