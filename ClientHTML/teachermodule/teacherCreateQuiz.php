<?php
    include "config.php";

    if (isset($_POST['submit'])) {
        // collect values of input field

        $type_of_quiz = $_POST['type_of_quiz'];
        $question = $_POST['question'];
        $choices = $_POST['choices'];
        $answer = $_POST['answer'];
        $points = $_POST['points'];

        $st = $connection->prepare("INSERT INTO quiz_inventory(type_of_quiz, question, choices, answer, points) VALUES(?, ?, ?, ?, ?, ?)");
        $st->bind_param('ssssss',  $type_of_quiz, $question, $choices, $answer, $points);
        $st->execute();

        echo "gumana na besh";
        $st->close();

    }
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
                    <div>
                        <h4>Question 1</h4>
                        <div>
                            <button class="editQuestion"> edit </button>
                            <button class="deleteQuestion"> delete </button>
                        </div>
                    </div>
                    <div>
                        <h4>Question 2</h4>
                        <div>
                            <button class="editQuestion"> edit </button>
                            <button class="deleteQuestion"> delete </button>
                        </div>
                    </div>
                    <div>
                        <h4>Question 3</h4>
                        <div>
                            <button class="editQuestion"> edit </button>
                            <button class="deleteQuestion"> delete </button>
                        </div>
                    </div>
                </div>
            </section-left>
            <section-right>
                <h2> Create Question </h2>
                <form action="" method="POST">
                    <label class="Question"> Question </label>
                    <input type="text" name="question" required>
                    <label class="Question"> Type of Question</label>
                    <select onchange="mcOrNot(this)"name="type_of_quiz">
                        <option value="_">--Select a type of question--</option>
                        <option value="mc">Multiple Choice</option>
                        <option value="iden">Identification</option>
                        <option value="enum">Enumeration</option>
                        <option value="tf">True or False</option>
                    </select>
                    <label class="Question" id="answerpart"> Answer </label>
                    <input type="text" name="answer" required>
                    <label class="Question" id="ifYesLabel" style="display: none;"> Choices </label>
                    <input type="text" id="ifYesInput" style="display: none;" name="choices" required>
                    <label class="Question"> Points </label>
                    <input type="text" name="points">
                    <input type="submit" value="Next" onsubmit="submitForm()">
                </form>
            </section-right>
        </div>
        <button class="returnBTN"> Submit </button>
        <button class="cancelBTN"> Cancel </button>
    </main>
</body>
</html>