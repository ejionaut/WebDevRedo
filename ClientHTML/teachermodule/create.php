<?php 

include "config.php";

  if (isset($_POST['submit'])) {

    $quiz_set = $_POST['quiz_set'];
    $type_of_quiz = $_POST['type_of_quiz'];
    $question = $_POST['question'];
    $choices = $_POST['choices'];
    $answer = $_POST['answer'];
    $points = $_POST['points'];

    $sqlCreate = "INSERT INTO `quiz_inventory`(`quiz_set`,`type_of_quiz`, `question`, `choices`, `answer`, `points`) 
    VALUES ('$quiz_set', '$type_of_quiz', '$question','$choices', '$answer', '$points')";

    $sqlCreateResult =  $connection->query($sqlCreate);

    if ($sqlCreateResult == TRUE) {

      echo "New record created successfully.";

    }else{

      echo "Error:". $sql . "<br>". $connection->error;

    } 

    $connection->close(); 

  }

?>


<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Create Quiz</title>

        <link rel="stylesheet" href="./styles/teacherCreateQuizzes.css">
    </head>

<body>

<h2>Create Quiz</h2>

<form action="" method="POST">

  <fieldset>

    <legend>Personal information:</legend>

    Type of Subject:<br>

    <input type="text" name="quiz_set">

    <br>


    Type of Quiz:<br>

    <input type="text" name="type_of_quiz">

    <br>
    
    Question:<br>

    <input type="text" name="question">

    <br>

    Choices:<br>

    <input type="text" name="choices">

    <br>

    Answer:<br>

    <input type="text" name="answer">

    <br>

    Points:<br>

    <input type="text" name="points">

    <br>

    <br><br>

    <input type="submit" name="submit" value="submit">

  </fieldset>

</form>

</body>

</html>