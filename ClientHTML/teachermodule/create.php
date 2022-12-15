<?php 

include "config.php";

  if (isset($_POST['submit'])) {

    $type_of_subject = $_POST['type_of_subject'];
    $type_of_quiz = $_POST['type_of_quiz'];
    $question = $_POST['question'];
    $choices = $_POST['choices'];
    $answer = $_POST['answer'];
    $points = $_POST['points'];

    $sqlCreate = "INSERT INTO `quiz_inventory`(`type_of_subject`,`type_of_quiz`, `question`, `choices`, `answer`, `points`) 
    VALUES ('$type_of_subject', '$type_of_quiz', '$question','$choices', '$answer', '$points')";


    $sqlCreateResult =  $connection->query($sqlCreate);

  

    if ($sqlCreateResult == TRUE) {

      echo "New record created successfully.";

    }else{

      echo "Error:". $sql . "<br>". $conn->error;

    } 

    $conn->close(); 

  }

?>


<!DOCTYPE html>

<html>

<body>

<h2>Create Quiz</h2>

<form action="" method="POST">

  <fieldset>

    <legend>Personal information:</legend>

    Type of Subject:<br>

    <input type="text" name="type_of_subject">

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