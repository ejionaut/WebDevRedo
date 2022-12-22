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
            $sqlCreate = "SELECT SUM(`points`) as total_score FROM `quiz_list` WHERE `quiz_code` = '$quiz_code'";

            $sqlCreateResult =  $connection->query($sqlCreate);

            $total_score = 0;

            while ($row = mysqli_fetch_array($sqlCreateResult)) {
                $total_score += $row['total_score'];
            }

            $sqlCreate = "UPDATE `quiz_list` SET `total_score` = $total_score WHERE `quiz_code` = '$quiz_code'";

            $sqlCreateResult =  $connection->query($sqlCreate);

            echo "<script>alert('Question Updated.')</script>";
            if (strpos($_SERVER['HTTP_REFERER'], "teacherCreateQuestions")) {
                header("Location: teacherCreateQuestions.php?quiz_code=" . $quiz_code);
            } else {
                header("Location: teacherManageQuestions.php?quiz_code=" . $quiz_code);
            }
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