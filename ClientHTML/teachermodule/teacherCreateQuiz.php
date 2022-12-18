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
                        <label class="Question">Subject</label>
                        <select name="quiz_set" id="quiz_set">
                            <option name="_">--Select subject--</option>
                            <option name="tpqs" value="tpqs">Technolgy Assisted Presentation and Communication</option>
                            <option name="nmqs" value="nmqs">Numerical Methods</option>
                            <option name="pdqs" value="pdqs">Personal Development</option>
                            <option name="wdqs" value="wdqs">Web Development</option>
                            <option name="seqs" value="seqs">Software Engineering</option>
                            <option name="adqs" value="adqs">Application Development</option>
                        </select> 
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
                        <label class="Question" id="ifYesLabel" style="display: none;"> Choices </label> 
                        <input type="text" id="ifYesInput" style="display: none;" name="choices" id="choices"required> 
                        <label class="Question" id="points"> Points </label> 
                        <input type="text" name="points" id="points"> 
                    </fieldset>
                    <input type="submit" value="Next" name="submit" id="submit">
                </form>
                <iframe name="hiddenFrame" style="display: none;"></iframe>
            </section-right>
        </div>
        <button class="returnBTN" name="submit" value="submit"> Submit </button>
        <button class="cancelBTN"> Cancel </button>
    </main>
</body>
</html>