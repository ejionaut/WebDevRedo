<?php
    include "config.php";

    session_start();

    if (isset($_POST['submitCQuestion'])) {
        $quiz_set = $_SESSION['quiz_set'];
        $type_of_quiz = $_POST['type_of_quiz'];
        $question = $_POST['question'];
        $choices = $_POST['choices'];
        $answer = $_POST['answer'];
        $points = $_POST['points'];

        $sqlCreate = "INSERT INTO `quiz_inventory`(`quiz_set`,`type_of_quiz`, `question`, `choices`, `answer`, `points`) 
        VALUES ('$quiz_set', '$type_of_quiz', '$question','$choices', '$answer', '$points')";

        $sqlCreateResult =  $connection->query($sqlCreate);

        if ($sqlCreateResult == TRUE) {
            echo "<script>alert('New record added succesfully')</script>";
        } else{
            echo "Error:". $sql . "<br>". $connection->error;
        } 

        $connection->close(); 
    }

    $quizQuestions = "SELECT question
    FROM quiz_inventory 
    WHERE quiz_set = '$quiz_set'";

    $quizQuestionsResults = $connection->query($quizQuestions);

    // header('Location: teacherCreateQuestions.php');
?>