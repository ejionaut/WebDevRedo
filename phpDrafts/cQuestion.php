<?php
    include "config.php";

    if (isset($_POST['cQuestion'])) {
        // collect values of input field
        $quiz_set = $_POST['quiz_set'];
        $type_of_quiz = $_POST['type_of_quiz'];
        $question = $_POST['question'];
        $choices = $_POST['choices'];
        $answer = $_POST['answer'];
        $points = $_POST['points'];

        $sql = "INSERT INTO 'quiz_inventory'('quiz_set', 
        'type_of_quiz', 'question', 'choices', 'answer', 'points') 
        VALUES('$quiz_set', '$type_of_quiz', '$question', '$choices', 
        '$answer', '$points')";

        $result = $connection->query($sql);

        if($result == TRUE) {
            echo "Question Created."
        } else {
            echo "Error:" . $sql . "<br>" . $connection->error;
        }

        $connection->close();
    }
?>