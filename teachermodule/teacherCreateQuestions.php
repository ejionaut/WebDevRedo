<?php
    session_start();

    $_SESSION['quiz_code'] = $_GET['quiz_code'];
    $quiz_code = $_SESSION['quiz_code'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/styles/teacherCreateQuiz.css">
    <title>View Quiz Details</title>
    <script src="mcOrNot.js"></script>
    
</head>
<body>
    <header>
        <h2> Quiz creator </h2>
    </header>

    <main>
        <div>
        </div>
        <div id="questionSection">
            <section-left>
                <h3> Current Questions </h3>
                <div class="studentQuizzes">
                    <?php
                        include('./includes/rQuestions.php');
                    ?>
                </div>
            </section-left>
            <section-right>
                <h2> Create Question </h2>
                <form action="./includes/cQuestion.php" name="QuestionForm" method="POST" id="QuestionForm" target="hiddenFrame" onsubmit="this.submit(); history.go(0)">
                    <fieldset>
                        <label class="Question"> Question </label> 
                        <input type="text" name="question" id="question" required> 
                        <label class="Question"> Type of Question</label> 
                        <select class="Question" onchange="mcOrNot(this)" name="type_of_quiz" id="type_of_quiz">
                            <option name="_">--Select a type of question--</option>
                            <option name="mc" value="mc">Multiple Choice</option>
                            <option name="iden" value="iden">Identification</option>
                            <option name="enum" value="enum">Enumeration</option>
                            <option name="tf" value="tf">True or False</option>
                        </select> 
                        <label class="Question" id="answerpart"> Answer </label> 
                        <input type="text" name="answer" id="answer"required> 
                        <label class="Question" id="ifYesLabel" style="display: block;" placeholder="Use ' , ' to seperate your answers"> Choices </label> 
                        <input type="text" id="ifYesInput" style="display: block;" name="choices" id="choices"> 
                        <label class="Question" id="points"> Points </label> 
                        <input type="text" name="points" id="points"> 
                    </fieldset>
                    <div>
                        <div>
                            <input type="submit" value="Next" name="submitCQuestion" id="submitForm">
                            <input type="reset" value="Reset">
                        </div>
                    </div>
                </form>
                <div>
                    <button class="submitBTN" name="submitCQuestion" value="submit" onclick=<?php if (strpos($_SERVER['HTTP_REFERER'], "teacherCreateQuiz.php") || strpos($_SERVER['HTTP_REFERER'], "teacherCreateQuestions.php")) { echo "location.href='index.php'";} else { echo "history.go(-1)";}?>> Done </button>
                    <?php
                    if (strpos($_SERVER['HTTP_REFERER'], "teacherCreateQuiz.php")) {
                        echo "<button class='cancelBTN'><a onClick=\"javascript: return confirm('Are you sure you want to cancel? All data will be lost.');\" href=./includes/deleteQuizList.php?quiz_code=" . $quiz_code . " style='text-decoration: none; '> Cancel </a></button>";
                    } else {
                        echo "<button class='cancelBTN'><a onClick=history.go(-1) style='text-decoration: none; '> Cancel </a></button>";
                    }
                    ?>
                </div>
                <iframe name="hiddenFrame" style="display: none;"></iframe>
            </section-right>
        </div>
    </main>
</body>
</html>