<?php
    include('./includes/config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/styles/teacherCreateQuiz.css">
    <title>Create Quiz Details</title>
</head>
<body>
    <header>
        <h2> Quiz creator </h2>
    </header>

    <main>
        <div>
        </div>
        <div>
            <section-right>
                <h2> Create Quiz </h2>
                <form action="./includes/cQuiz.php" method="POST" id="QuizForm">
                    <label class="Quiz">Subject</label>
                    <select name="quiz_code" id="quiz_code" required>
                        <option name="_">--Select subject--</option>
                        <option name="tpqs" value="tpqs">Technolgy Assisted Presentation and Communication</option>
                        <option name="nmqs" value="nmqs">Numerical Methods</option>
                        <option name="pdqs" value="pdqs">Personal Development</option>
                        <option name="wdqs" value="wdqs">Web Development</option>
                        <option name="seqs" value="seqs">Software Engineering</option>
                        <option name="adqs" value="adqs">Application Development</option>
                    </select> 
                    <label> Quiz Name </label>
                    <input type="text" name="q_name" id="q_name" required> 
                    <label> Quiz Password </label>
                    <input type="text" name="q_password" id="q_password" required> 
                    <label> Quiz Start </label>
                    <input type="date" name="start_date" id="start_date" required> 
                    <label> Quiz Due Date </label>
                    <input type="date" name="end_date" id="end_date" required> 
                    <input type="submit" value="Next" name="submitCQuiz" id="submitForm">
                </form>
            </section-right>
        </div>
        <button class="returnBTN"><a href="index.php" style="text-decoration: none; color: white;">Return</a></button>
    </main>
</body>
</html>