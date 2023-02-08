<?php
    include "config.php";

    if (isset($_POST['uQuestion'])) {
        $question = $_POST['question'];
        $type_of_quiz = $_POST['type_of_quiz'];
        $choices = $_POST['choices'];
        $answer = $_POST['answer'];
        $points = $_POST['points'];

        $sql = "UPDATE `quiz_inventory` SET `question`='$question', `type_of_quiz`='$type_of_quiz', `choices`='$choices', `answer`='$answer', `points`='$points' WHERE `quiz_code`='" . $_SESSION['quiz_code'] . "' AND `question`='" . $_SESSION['question'] ."'";

        $result = $connection->query($sql); 

        $sqlCreate = "SELECT `points` FROM `quiz_inventory` WHERE `quiz_code` = '" . $_SESSION['quiz_code'] . "'";

        $sqlCreateResult =  $connection->query($sqlCreate);

        $ts = 0;

        while ($row = mysqli_fetch_array($sqlCreateResult)) {
            $ts += $row['points'];
        }

        $sqlUpdate = "UPDATE `quiz_list` SET `total_score` = '$ts' WHERE `quiz_code` = '" . $_SESSION['quiz_code'] . "'";

        $sqlUpdateResult =  $connection->query($sqlUpdate);

        if ($result == TRUE && $sqlCreateResult == TRUE && $sqlUpdateResult == TRUE) {
            echo "<script>alert('Question Updated.')</script>";
            echo "<script>history.go(-1)</script>";
        } else{
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