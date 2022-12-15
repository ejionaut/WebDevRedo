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

  $quiz_code = "tp001a";

    $quizQuestions = "SELECT question
    FROM quiz_inventory JOIN quiz_list ON quiz_inventory.quiz_set = quiz_list.quiz_set
    WHERE quiz_code = '$quiz_code'";

    $quizQuestionsResults = $connection->query($quizQuestions);

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

    <select name="quiz_set">
                        <option name="_">--Select subject--</option>
                        <option name="tpqs001" value="tpqs001">Technolgy Assisted Presentation and Communication</option>
                        <option name="nmqs001" value="nmqs001">Numerical Methods</option>
                        <option name="pdqs001" value="pdqs001">Personal Development</option>
                        <option name="wdqs001" value="wdqs001">Web Development</option>
                        <option name="seqs001" value="seqs001">Software Engineering</option>
                        <option name="adqs001" value="adqs001">Application Development</option>
                    </select>

    <br>


    Type of Quiz:<br>

    <select onchange="mcOrNot(this)" name="type_of_quiz">
                        <option name="_">--Select a type of question--</option>
                        <option name="mc" value="mc">Multiple Choice</option>
                        <option name="iden" value="iden">Identification</option>
                        <option name="enum" value="enum">Enumeration</option>
                        <option name="tf" value="tf">True or False</option>
                    </select>

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