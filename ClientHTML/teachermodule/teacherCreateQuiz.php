<?php
    include "config.php";

    if (isset($_POST['submit'])) {
        // collect names of input field
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
      
            echo "Error:". $sqlCreate . "<br>". $connection->error;
      
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
    <title>View Quiz Details</title>
    <script src="mcOrNot.js"></script>
    <script src="submitForm.js"></script>
    <script src="editQuestion.js"></script>
</head>
<body>
    <header>
        <h2> Quiz creator </h2>
    </header>

    <main>
        <div>
        </div>
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
                <h2> Create Question </h2>
                <form action="" method="POST">
                    <label class="type_of_subject">Subject</label>
                    <select name="subject">
                        <option name="_">--Select subject--</option>
                        <option name="tpqs001" value="tpqs001">Technolgy Assisted Presentation and Communication</option>
                        <option name="nmqs001" value="nmqs001">Numerical Methods</option>
                        <option name="pdqs001" value="pdqs001">Personal Development</option>
                        <option name="wdqs001" value="wdqs001">Web Development</option>
                    </select>
                    <label class="Question"> Question </label>
                    <input type="text" name="question" id="question" required>
                    <label class="Question"> Type of Question</label>
                    <select onchange="mcOrNot(this)"name="type_of_quiz">
                        <option name="_">--Select a type of question--</option>
                        <option name="mc" value="mc">Multiple Choice</option>
                        <option name="iden" value="iden">Identification</option>
                        <option name="enum" value="enum">Enumeration</option>
                        <option name="tf" value="tf">True or False</option>
                    </select>
                    <label class="Question" id="answerpart"> Answer </label>
                    <input type="text" name="answer" id="answer"required>
                    <label class="Question" id="ifYesLabel" style="display: none;"> Choices </label>
                    <input type="text" id="ifYesInput" style="display: none;" name="choices" required>
                    <label class="Question"> Points </label>
                    <input type="text" name="points" id="points">
                    <input type="submit" value="Next" name="submit" id="submit">
                </form>
            </section-right>
        </div>
        <button class="returnBTN" name="submit" value="submit"> Submit </button>
        <button class="cancelBTN"> Cancel </button>
    </main>
</body>
</html>