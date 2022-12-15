<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/teacherQuizzes.css">
    <title>Quizzes Page</title>
</head>

<?php


$mysqli = new mysqli("localhost", "root", "", "quizapplication");

//check connection
if ($mysqli -> connect_errno) {
    echo ("Oops, theres a connection error: " . mysqli_connect_error());
}

$statemnt = $mysqli -> prepare ("INSERT into quizzes (quiz_set, type_of_quiz, question, choices, answer, points) 
VALUES (?, ?, ?, ?, ?, ?, ?)");



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
                <label class="sort"> Sort by: </label>
                <select name="dropdown">
                    <option value="dateCreate" selected> Date Created </option>
                    <option value="dateCreate" selected> Subjects </option>
                    <option value="dateCreate" selected> Listed </option>
                    <option value="dateCreate" selected> Unlisted </option>
                    <option value="subjectNum" selected> Subject: Numerical Methods </option>
                    <option value="subjectTech" selected> Subject: Tech Press </option>
                    <option value="subjectPer" selected> Subject: Personality Dev </option>
                    <option value="subjectApp" selected> Subject: Application </option>
                    <option value="subjectWeb" selected> Subject: Web Dev </option>
                    <option value="subjectSoft" selected> Subject: Soft Eng </option>
                </select>
                <button type="submit"> Sort </button>
            </form>
        </div>
        <div class="QuizList">
            <div class="quizzes">
                <div class="left_Section">
                    <h2 class="Subject"> Numerical Methods </h2>
                    <h3 class="Quiz_title"> Prelims Quiz 1 </h2>
                        <div class="date">
                            <h3 class="datePosted"> Date Posted: 2022/22/1 </h2>
                            <h3 class="dateQuiz"> Date Due: 2022/28/1 </h2>
                        </div>
                </div>
                <div class="right_Section">
                    <button class="listUnlist"> Unlist </button>
                    <button class="View"> View </button>
                    <button class="Edit"> Edit </button>
                </div>
            </div>
        </div>
        <button class="createQuiz"> Create Quiz </button>
    </main>
</body>
</html>