<?php
    include "config.php";

    if (isset($_POST['submit'])) {
        // collect values of input field

        $type_of_quiz = $_POST['type_of_quiz'];
        $question = $_POST['question'];
        $choices = $_POST['choices'];
        $answer = $_POST['answer'];
        $points = $_POST['points'];

        $st = $connection->prepare("INSERT INTO quiz_inventory(type_of_quiz, question, choices, answer, points) VALUES(?, ?, ?, ?, ?, ?)");
        $st->bind_param('ssssss',  $type_of_quiz, $question, $choices, $answer, $points);
        $st->execute();

        echo "gumana na besh";
        $st->close();

    }
?>