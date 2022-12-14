<?php
    include "config.php";

    if (isset($_POST['udEndQuiz'])) {
        // collect values of input field
        $end_quiz = $_POST['end_quiz'];
        $quiz_code = $_POST['quiz_code'];

        $sql = "UPDATE 'quiz_list' SET 'end_quiz'='$end_quiz' WHERE 'quiz_code'='$quiz_code'";

        $result = $connection->query($sql);

        if($result == TRUE) {
            echo "Quiz Updated."
        } else {
            echo "Error:" . $sql . "<br>" . $connection->error;
        }

        $connection->close();
    }
?>