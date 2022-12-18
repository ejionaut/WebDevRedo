<?php
    include "config.php";

    if (isset($_POST['submitCQuiz'])) {
        // collect values of input field
        
        $code = $_POST['quiz_set'];
        $query = "SELECT quiz_set FROM quiz_list WHERE quiz_set LIKE '%$code%' ORDER BY quiz_set DESC LIMIT 1;";
        $queryResult = $connection->query($query);

        while ($row = mysqli_fetch_array($queryResult)) {
            $quiz_set = ++$row['quiz_set'];
        }

    
        $subject_code = trim($code, "qs");

        $today = date("m/d/Y");
        $start_quiz = date("m/d/Y", strtotime($_POST['start_quiz']));
        if ($today == $start_quiz) {
            $q_display_setting = "listed";
            echo "listed";
        } else {
            $q_display_setting = "unlisted";
            echo "unlisted";
        }
    
        $q_name = $_POST['q_name'];
        $q_password = $_POST['q_password'];
        $q_display_setting = $_POST['q_display_setting'];
        $start_quiz = $_POST['start_quiz'];
        $end_quiz = $_POST['end_quiz'];
        $sql = "INSERT INTO `quiz_list`(`q_name`, `q_password`, `quiz_set`, `subject_code`, `q_display_setting`, `start_quiz`, `end_quiz`) VALUES('$q_name', '$q_password', '$quiz_set', '$subject_code', '$q_display_setting', '$start_quiz', '$end_quiz')";
        $result = $connection->query($sql);
        if($result == TRUE) {
            echo "<script>alert('Quiz Created.')</script>";
        } else {
            echo "Error:" . $sql . "<br>" . $connection->error;
        }

        $connection->close();
    }

    header('Location: teacherCreateQuestions.php');
?>