<?php
    // still needs fixing

    include "config.php";

    if (isset($_POST['udAvailQuizzes'])) {
        // collect values of input field
        $avail_quizzes = $_POST['avail_quizzes'];

        $query = "UPDATE 'student' SET 'avail_quizzes' WHERE 'subject_list' LIKE '%%'";

        $result = $connection->query($sql);

        if($result == TRUE) {
            echo "Quiz Created."
        } else {
            echo "Error:" . $sql . "<br>" . $connection->error;
        }

        $connection->close();
    }

    if (isset($_GET['']))
?>