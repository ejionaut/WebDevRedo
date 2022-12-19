<?php
    include "config.php";

    session_start();

    if (isset($_POST['uQuiz'])) {
        $q_name = $_POST['q_name'];
        $q_password = $_POST['q_password'];
        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];

        $sql = "UPDATE `quiz_list` SET `q_name`='$q_name',`q_password`='$q_password',`start_date`='$start_date',`end_date`='$end_date' WHERE `quiz_code`='" . $_SESSION['quiz_code'] . "'"; 

        $result = $connection->query($sql); 
        if ($result == TRUE) {
            header('Location: teacherQuizzes.php');
        }else{
            echo "Error:" . $sql . "<br>" . $connection->error;
        }
    }

    $sql = "SELECT * FROM `quiz_list` WHERE `quiz_code` = '" . $_SESSION['quiz_code'] . "'";

    $string = preg_replace('/[0-9]+/', '', $_SESSION['quiz_code']);

    $result = mysqli_query($connection, $sql);

    while ($row = $result->fetch_assoc()) {
        $q_name = $row['q_name'];
        $q_password = $row['q_password'];
        $start_date = $row['start_date'];
        $end_date = $row['end_date'];
    }
?>