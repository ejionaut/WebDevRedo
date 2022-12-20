<?php
    include "config.php";

    session_start();

    if (isset($_POST['uQuestion'])) {
        $question = $_POST['question'];
        $type_of_quiz = $_POST['type_of_quiz'];
        $choices = $_POST['choices'];
        $answer = $_POST['answer'];
        $points = $_POST['points'];

        $sql = "UPDATE `quiz_inventory` SET `question`='$question', `type_of_quiz`='$type_of_quiz', `choices`='$choices', `answer`='$answer', `points`='$points' WHERE `quiz_code`='" . $_SESSION['quiz_code'] . "' AND `question`='" . $_SESSION['question'] ."'";

        $result = $connection->query($sql); 
        if ($result == TRUE) {
            echo "<script>alert('Question Updated.')</script>";
        // unset($_SESSION['quiz_code']);
        // unset($_SESSION['question']);
        }else{
            echo "Error:" . $sql . "<br>" . $connection->error;
        }

    }

    $sql = "SELECT * FROM `quiz_inventory` WHERE `question` = '" . $_SESSION['question'] . "'";

    $result = mysqli_query($connection, $sql);

    while ($row = $result->fetch_assoc()) {
        $type_of_quiz = $row['type_of_quiz'];
        $choices = $row['choices'];
        $answer = $row['answer'];
        $points = $row['points'];
    }
?>