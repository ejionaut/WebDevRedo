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
                        include 'cQuestion.php';

                        if ($quizQuestionsResults->num_rows > 0) {
                            while ($row = $quizQuestionsResults->fetch_assoc()) {
                                echo "<div><h4>" . $row['question'] . "</h4><div><button class='editQuestion' onclick='location.href='teacherEditQuestion.php'> edit </button><button class='deleteQuestion'> delete </button></div></div>";
                            }
                        }
                    ?>
                </div>
            </section-left>
            <section-right>
                <h2> Create Question </h2>
                <form action="cQuestion.php" method="POST" id="QuestionForm" target="hiddenFrame">
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
                        <label class="Question" id="ifYesLabel" style="display: block;"> Choices </label> 
                        <input type="text" id="ifYesInput" style="display: block;" name="choices" id="choices"> 
                        <label class="Question" id="points"> Points </label> 
                        <input type="text" name="points" id="points"> 
                    </fieldset>
                    <input type="submit" value="Next" name="submitCQuestion" id="submitForm">
                    <input type="reset" value="Reset">
                </form>
                <iframe name="hiddenFrame" style="display: none;"></iframe>
            </section-right>
        </div>
        <button class="returnBTN" name="submitCQuestion" value="submit"> Submit </button>
        <button class="cancelBTN"> Cancel </button>
    </main>
</body>
</html>