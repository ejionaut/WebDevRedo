<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/teacherCreateQuiz.css">
    <link rel="stylesheet" href="./styles/manageQuestions.css">
    <title>View Quiz Details</title>
    <script src="mcOrNot.js"></script>
    <script src="showQuestions.js"></script>
</head>
<body>
    <header>
        <h2> Manage Quizzes </h2>
    </header>

    <main>
        <div>
        </div>
        <div>
            <div class="showQuestions">
                <h3> Current Questions </h3>
                <div class="studentQuizzes">
                    <table>
                        <tr>
                            <th>Question/th>
                            <th>Choices</th>
                            <th>Answer</th>
                            <th>Points</th>
                            <th>Action</th>
                        </tr>
                        <?php
                            session_start();

                            $_SESSION['quiz_code'] = $_GET['quiz_code'];
                            include "rQuestionsManage.php";
                        ?>
                    </table>
                </div>
                <button class="addQuestion"><a href="teacherCreateQuestions.php?quiz_code=<?php echo $_SESSION['quiz_code']?>"> Add Question </a></button>
            </div>
    </main>
</body>
</html>