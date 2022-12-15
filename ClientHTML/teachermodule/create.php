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

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Create Quiz</title>

        <link rel="stylesheet" href="./styles/teacherCreateQuizzes.css">
    </head>

<body>
  <h1>Create Quiz</h1>

  <form action="" method="POST">
    <fieldset>
      <label>Type of Subject:</label>
      
      <input type="text" name="type_of_subject">

      <label>Type of Quiz:</label>
      <input type="text" name="type_of_quiz">
            
      <label>Question:</label>
      <input type="text" name="question">
    
      <label>Choices:</label>
      <input type="text" name="choices">

      <label>Answer:</label>
      <input type="text" name="answer">

      <label>Points:</label>
      <input type="text" name="points">

      <input type="submit" name="submit" value="submit">

    </fieldset>

  </form>

</body>

</html>