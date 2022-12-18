<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/teacherQuizzes.css">
    <title>Quizzes Page</title>
    <script src="sortBy.js"></script>
</head>

<?php

?>

<body>
    <header>
        <img src="./styles/images/logo_square.png" alt="">
        <ul>
            <li>Home</li>
            <li>Quizzes</li>
        </ul>
    </header>
    <main>
        <div class="Head">
            <h1> Quizzes </h1>
            <form>
                <label class="sort" for="dropdown"> Sort by: </label>
                <select name="dropdown">
                    <option value="dateCreated" > Date Created </option>
                    <option value="listed" > Listed </option>
                    <option value="unlisted" > Unlisted </option>
                    <option value="subjectNum" > Subject: Numerical Methods </option>
                    <option value="subjectTech" > Subject: Tech Press </option>
                    <option value="subjectPer" > Subject: Personality Dev </option>
                    <option value="subjectApp" > Subject: Application </option>
                    <option value="subjectWeb" > Subject: Web Dev </option>
                    <option value="subjectSoft" > Subject: Soft Eng </option>
                </select>
                <button type="submit"> Sort </button>
            </form>
        </div>
        <div class="QuizList">
            <div class="quizzes" id="quizzes">
                <?php
                    include "sortAlgo.php";
                ?>
            </div>
        </div>
        <form action="teacherCreateQuiz.php" method="POST">
            <button class="createQuiz"> Create Quiz </button>
        </form>

        
    </main>
</body>
</html>