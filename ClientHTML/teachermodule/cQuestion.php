<?php 

    include "config.php";
    include "cQuiz.php";

    if (isset($_POST['submitCQuestion'])) {
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

    $quiz_code = "tp001a";

    $quizQuestions = "SELECT question
    FROM quiz_inventory JOIN quiz_list ON quiz_inventory.quiz_set = quiz_list.quiz_set
    WHERE quiz_code = '$quiz_code'";

    $quizQuestionsResults = $connection->query($quizQuestions);

    // header('Location: teacherCreateQuestions.php');
?>