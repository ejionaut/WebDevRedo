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
        <link rel="stylesheet" href="./styles/teacherCreateQuiz.css">
        <title>Create Quiz</title>

        <link rel="stylesheet" href="./styles/teacherCreateQuizzes.css">
    </head>

<body>
  <header> Quiz Creator </header>
  <main>
  <h2>Create Quiz</h2>

  <div>
    <section-left>
      <h3> Current Questions </h3>
                <div class="studentQuizzes">
                    <?php
                        if ($quizQuestionsResults->num_rows > 0) {
                            while ($row = $quizQuestionsResults->fetch_assoc()) {
                                echo "<div><h4>" . $row['question'] . "</h4><div><button class='editQuestion' onclick='editQuestion()'> edit </button><button class='deleteQuestion'> delete </button></div></div>";
                            }
                        }
                    ?>
                </div>
    </section-left>
    <section-right>
    <form action="" method="POST">
    <fieldset>




      <label>Type of Subject:</label>
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


    <label>Type of Quiz:</label>

    <select onchange="mcOrNot(this)" name="type_of_quiz">
                        <option name="_">--Select a type of question--</option>
                        <option name="mc" value="mc">Multiple Choice</option>
                        <option name="iden" value="iden">Identification</option>
                        <option name="enum" value="enum">Enumeration</option>
                        <option name="tf" value="tf">True or False</option>
                    </select>

    <br>
    
      <label>Choices:</label>
      <input type="text" name="choices">

        <label>Answer:</label>
        <input type="text" name="answer">

        <label>Points:</label>
        <input type="text" name="points">

        <input type="submit" name="submit" value="submit">
      </fieldset>

  </form>
    </section-right>
  </div>
</body>

</html>