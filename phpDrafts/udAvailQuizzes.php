<?php
    include "config.php";

    if (isset($_POST['udAvailQuizzes'])) {
        // collect values of input field
        $quiz_code = $_POST['quiz_code'];

        $sql = "UPDATE 'student' SET 'avail_quizzes' = CONCAT('avail_quizzes', '$quiz_code')";

        $result = $connection->query($sql);

        if($result == TRUE) {
            echo "Quiz Created.";
        } else {
            echo "Error:" . $sql . "<br>" . $connection->error;
        }

        $connection->close();
    }

    if (isset($_GET['']))
?>