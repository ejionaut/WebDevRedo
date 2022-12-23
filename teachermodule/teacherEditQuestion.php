<?php
    session_start();

    $_SESSION['question'] = $_GET['question'];
    $_SESSION['quiz_code'] = $_GET['quiz_code'];

    include "uQuestion.php";
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
    <script src="showQuestions.js"></script>
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
                        include "rQuestions.php";
                    ?>
                </div>
            </section-left>
            <section-right>
                <h2> Edit Question </h2>
                <form action="uQuestion.php" method="POST" id="QuestionForm" target="hiddenFrame">
                    <fieldset>
                        <label class="Question"> Question </label> 
                        <input type="text" name="question" id="question" value="<?php echo $_SESSION['question']?>"required> 
                        <label class="Question"> Type of Question</label> 
                        <select class="Question" onchange="mcOrNot(this)" name="type_of_quiz" id="type_of_quiz">
                            <option name="_">--Select a type of question--</option>
                            <option name="mc" value="mc"<?php if($type_of_quiz == 'mc') echo ' selected="selected"'?>>Multiple Choice</option>
                            <option name="iden" value="iden"<?php if($type_of_quiz == 'iden') echo ' selected="selected"'?>>Identification</option>
                            <option name="enum" value="enum"<?php if($type_of_quiz == 'enum') echo ' selected="selected"'?>>Enumeration</option>
                            <option name="tf" value="tf"<?php if($type_of_quiz == 'tf') echo ' selected="selected"'?>>True or False</option>
                        </select> 
                        <label class="Question" id="answerpart"> Answer </label> 
                        <input type="text" name="answer" id="answer" value="<?php echo $answer?>" required> 
                        <label class="Question" id="ifYesLabel" style="display: block;"> Choices </label> 
                        <input type="text" id="ifYesInput" style="display: block;" name="choices" id="choices" value="<?php echo $choices?>"> 
                        <label class="Question" id="points"> Points </label> 
                        <input type="text" name="points" id="points" value="<?php echo $points?>"> 
                    </fieldset>
                    <input type="submit" value="Save" name="uQuestion" id="submitForm" onclick=<?php if (strpos($_SERVER['HTTP_REFERER'], "teacherCreateQuiz.php")) { echo "location.href='teacherModule.php'";} else { echo "teacherCreateQuestions.php?quiz_code=" . $quiz_code;}?>>
                    <input type="reset" value="Reset">
                </form>
                <iframe name="hiddenFrame" style="display: none;"></iframe>
            </section-right>
        </div>
        <button class="returnBTN" name="submitCQuestion" value="submit"> Done </button>
        <button class="cancelBTN"> Cancel </button>
    </main>
</body>
</html>