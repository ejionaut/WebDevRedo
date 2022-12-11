<?php
    include "config.php";

    if (isset($_POST['cQuiz'])) {
        // collect values of input field
        $quiz_code = $_POST['quiz_code'];
        $q_name = $_POST['q_name'];
        $q_password = $_POST['q_password'];
        $quiz_set = $_POST['quiz_set'];
        $subject_code = $_POST['subject_code'];
        $q_display_setting = $_POST['q_display_setting'];
        $start_quiz = $_POST['start_quiz'];
        $end_quiz = $_POST['end_quiz'];

        $query = "INSERT INTO 'quiz_list'('t_quiz_code', 'q_name', 
        'q_password', 'quiz_set', 'subject_code', 
        'q_display_setting', 'start_quiz', 'end_quiz') 
        VALUES('$t_quiz_code', '$q_name', '$q_password', '$quiz_set', 
        '$subject_code', '$q_display_setting', '$start_quiz', 
        '$end_quiz')";

        $result = $connection->query($sql);

        if($result == TRUE) {
            echo "Quiz Created."
        } else {
            echo "Error:" . $sql . "<br>" . $connection->error;
        }

        $connection->close();
    }
?>