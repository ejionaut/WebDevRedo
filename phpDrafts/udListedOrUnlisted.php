<?php
    include "config.php";

    if (isset($_POST['udEndQuiz'])) {
        // collect values of input field
        $q_display_setting = $_POST['q_display_setting'];
        $quiz_code = $_POST['quiz_code'];

        $sql = "UPDATE 'quiz_list' SET 'q_display_setting'=$q_display_setting" WHERE 'quiz_code'=$quiz_code;

        $result = $connection->query($sql);

        if($result == TRUE) {
            echo "Quiz Updated.";
        } else {
            echo "Error:" . $sql . "<br>" . $connection->error;
        }

        $connection->close();
    }
?>