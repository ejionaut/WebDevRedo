<?php
    session_start();   

    include "config.php";
    $quiz_code = $_GET['quiz_code'];
    $question = $_GET['question'];
    $query = "DELETE FROM `quiz_inventory` WHERE `quiz_code` = '$quiz_code' AND `question` = '$question'";

    if($connection->query($query) === TRUE){
        echo "<script>confirm('Are you sure? Data will be deleted.')</script>";
        if (strpos($_SERVER['HTTP_REFERER'], "teacherCreateQuestions")) {
            header("Location: teacherCreateQuestions.php?quiz_code=" . $quiz_code);
        } else {
            header("Location: teacherManageQuestions.php?quiz_code=" . $quiz_code);
        }

    }
?>