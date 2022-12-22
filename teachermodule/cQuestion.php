<?php
    include "config.php";

    session_start();

    if (isset($_POST['submitCQuestion'])) {
        $quiz_code = $_SESSION['quiz_code'];
        $type_of_quiz = $_POST['type_of_quiz'];
        $question = $_POST['question'];
        $choices = $_POST['choices'];
        $answer = $_POST['answer'];
        $points = $_POST['points'];

        $sqlCreate = "SELECT `question` FROM `quiz_inventory` WHERE `question` = '$question' AND `quiz_code` = '$quiz_code'";

        $sqlCreateResult =  $connection->query($sqlCreate);

        $row = mysqli_fetch_array($sqlCreateResult);

        if (empty($row)){
            $sqlCreate = "INSERT INTO `quiz_inventory`(`quiz_code`,`type_of_quiz`, `question`, `choices`, `answer`, `points`) VALUES ('$quiz_code', '$type_of_quiz', '$question','$choices', '$answer', '$points')";

            $sqlCreateResult =  $connection->query($sqlCreate);

            if ($sqlCreateResult == TRUE) {
                $sqlCreate = "SELECT `total_score` FROM `quiz_list` WHERE `quiz_code` = '$quiz_code'";

                $sqlCreateResult =  $connection->query($sqlCreate);

                while ($row = mysqli_fetch_array($sqlCreateResult)) {
                    $total_score = $row['total_score'];
                }

                $total_score += $points;

                $sqlCreate = "UPDATE `quiz_list` SET `total_score` = $total_score WHERE `quiz_code` = '$quiz_code'";

                $sqlCreateResult =  $connection->query($sqlCreate);

                echo "<script>alert('Question created!');</script>";
                header("Reload: 0; Location: teacherCreateQuestions.php?quiz_code=" . $quiz_code);
            } else{
                echo "Error:". $sql . "<br>". $connection->error;
            } 
        } elseif (count($row) > 0) {
            echo "<script>alert('Question already exists!')</script>";
        } 

        $connection->close(); 
    }

    $quizQuestions = "SELECT question
    FROM quiz_inventory 
    WHERE quiz_code = '$quiz_code'";

    $quizQuestionsResults = $connection->query($quizQuestions);

    // header('Location: teacherCreateQuestions.php');
?>