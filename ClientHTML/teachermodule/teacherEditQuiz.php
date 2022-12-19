<?php
    $quiz_code = $_GET['quiz_code'];

    include "uQuiz.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/teacherCreateQuiz.css">
    <title>Create Quiz Details</title>
</head>
<body>
    <header>
        <h2> Quiz Editor </h2>
    </header>

    <main>
        <div>
        </div>
        <div>
            <section-right>
                <h2> Update Quiz </h2>
                <form action="uQuiz.php" method="POST" id="QuizForm" onSubmit="return confirm('Are you sure? Data will be changed.') ">
                    <label class="Quiz">Subject</label>
                    <select name="quiz_code" id="quiz_code" required>
                        <option name="_">--Select subject--</option>
                        <option name="tpqs" value="tpqs"<?php if($string == 'tpqs') echo ' selected="selected"'?>>Technolgy Assisted Presentation and Communication</option>
                        <option name="nmqs" value="nmqs"<?php if($string == 'nmqs') echo ' selected="selected"'?>>Numerical Methods</option>
                        <option name="pdqs" value="pdqs"<?php if($string == 'pdqs') echo ' selected="selected"'?>>Personal Development</option>
                        <option name="wdqs" value="wdqs"<?php if($string == 'wdqs') echo ' selected="selected"'?>>Web Development</option>
                        <option name="seqs" value="seqs"<?php if($string == 'seqs') echo ' selected="selected"'?>>Software Engineering</option>
                        <option name="adqs" value="adqs"<?php if($string == 'adqs') echo ' selected="selected"'?>>Application Development</option>
                    </select> 
                    <label> Quiz Name </label>
                    <input type="text" name="q_name" id="q_name" value="<?php echo $q_name?>" required> 
                    <label> Quiz Password </label>
                    <input type="text" name="q_password" id="q_password" value="<?php echo $q_password?>" required> 
                    <label> Quiz Start </label>
                    <input type="date" name="start_date" id="start_date" value="<?php echo date('Y-m-d',strtotime($start_date)) ?>" required> 
                    <label> Quiz Due Date </label>
                    <input type="date" name="end_date" id="end_date" value="<?php echo date('Y-m-d',strtotime($end_date)) ?>" required> 
                    <input type="submit" value="Save" name="uQuiz" id="submitForm">

                </form>
            </section-right>
        </div>
        <button class="returnBTN"><a href="teacherQuizzes.php" style="text-decoration: none; color: white;">Return</a></button>
    </main>
</body>
</html>