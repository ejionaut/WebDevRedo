<?php
    include "config.php";

    session_start();

    if (isset($_POST['submitCQuiz'])) {
        // collect values of input field
        
        $code = $_POST['quiz_code'];
        $query = "SELECT quiz_code FROM quiz_list WHERE quiz_code LIKE '%$code%' ORDER BY quiz_code DESC LIMIT 1;";
        $queryResult = $connection->query($query);

        $_SESSION['quiz_code'] = "";

        while ($row = mysqli_fetch_array($queryResult)) {
            $quiz_code = ++$row['quiz_code'];
        }

        $_SESSION['quiz_code'] = $quiz_code;

        $subject_code = trim($code, "qs");

        $today = date("m/d/Y");
        $start_quiz = date("m/d/Y", strtotime($_POST['start_quiz']));
        if ($today == $start_quiz) {
            $q_display_setting = "listed";
        } else {
            $q_display_setting = "unlisted";
        }
    
        $q_name = $_POST['q_name'];
        $q_password = $_POST['q_password'];
        $q_display_setting = $_POST['q_display_setting'];
        $start_quiz = $_POST['start_quiz'];
        $end_quiz = $_POST['end_quiz'];
        $sql = "INSERT INTO `quiz_list`(`q_name`, `q_password`, `quiz_code`, `q_display_setting`) VALUES('$q_name', '$q_password', '$quiz_code', '$q_display_setting')";
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