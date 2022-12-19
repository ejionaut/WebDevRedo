<?php 

include "config.php";

$studentsName = "SELECT concat(firstname,' ',lastname) as fullname from student";
$countStudents = "SELECT COUNT(*) as numberOfStudents FROM student";
$countQuizList = "SELECT COUNT(*) as numberOfQuiz FROM quiz_list";
$countCompletedQuiz = "SELECT COUNT(*) as numberOfCompletedQuiz FROM student_quiz";

$studentsNameResult = $connection->query($studentsName);
$countStudentResult = $connection->query($countStudents);
$countQuizListResult = $connection->query($countQuizList);
$countCompletedQuizResult = $connection->query($countCompletedQuiz);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./styles/teacherModule.css">
    <title>Teacher Module</title>
</head>
<body>
    <header>
        <img src="./styles/images/logo_square.png" alt="">
        <ul>
            <li><a href="teacherHome.php" style="text-decoration: none; color: white;">Home</a></li>
            <li><a href="teacherQuizzes.php" style="text-decoration: none; color: white;">Quizzes</a></li>
        </ul>
    </header>
    <main>
        <h1> Home </h1>
        <div class="stats studs">
            <div class="statbox">
                <diV class="noStudents">
                    <h2> Number of Students </h2>
                    <h1 class="numberStundets"><?php
                        if ($countStudentResult) {
                            // Fetch the result as an associative array
                            $row = mysqli_fetch_assoc($countStudentResult);
                        
                            // Access the value of the COUNT function using the array key
                            // associated with the column that contains the function
                            $countStudents = $row['numberOfStudents'];
                        
                            // Print the value of the COUNT function
                            echo $countStudents;
                        } else {
                            echo "Error: " . $sql . "<br>" . mysqli_error($connection);
                        }
                    ?>
                    </h2>
                </diV>
                <diV class="noQuizzes">
                    <h2> Number of Quizzes </h2>
                    <h1 class="numberStundets"> <?php
                        if ($countQuizListResult) {
                            // Fetch the result as an associative array
                            $row = mysqli_fetch_assoc($countQuizListResult);
                        
                            // Access the value of the COUNT function using the array key
                            // associated with the column that contains the function
                            $countQuizList = $row['numberOfQuiz'];
                        
                            // Print the value of the COUNT function
                            echo $countQuizList;
                        } else {
                            echo "Error: " . $sql . "<br>" . mysqli_error($connection);
                        }
                    ?></h2>
                </diV>
                <diV class="noCQuizzes">
                    <h2> Number of Completed Quizzes </h2>
                    <h1 class="numberStundets"> <?php
                        if ($countCompletedQuizResult) {
                            // Fetch the result as an associative array
                            $row = mysqli_fetch_assoc($countCompletedQuizResult);
                        
                            // Access the value of the COUNT function using the array key
                            // associated with the column that contains the function
                            $countCompletedQuiz = $row['numberOfCompletedQuiz'];
                        
                            // Print the value of the COUNT function
                            echo $countCompletedQuiz;
                        } else {
                            echo "Error: " . $sql . "<br>" . mysqli_error($connection);
                        }
                    ?> </h2>
                </diV>
            </div>
            <div class="statbox">
                <h2> Total Quizzes Done This Month </h2>
                <canvas id="mquizzLineChart" class="mquizzLineChart"></canvas>
            </div>

            <div class="statbox">
                <h2> Missed Quizzes This Month </h2>
                <div class="quizzLineChart"></div>
            </div>
            <div class="statbox">
                <h2> Student Quiz Summary </h2>
                <div class="qStudentSummChart">
                    <div class="qStudentPie"></div>
                    <div class="qStudentLine"></div>
                </div>
            </div>
            <div class="statbox">
                <h2> Students </h2>
                <div class="listOfStudents">
                    <h3> 
                        <?php

                            if ($studentsNameResult->num_rows > 0) {

                                while ($row = $studentsNameResult->fetch_assoc()) {

                            ?>
                                    <?php echo $row['fullname']; ?><br>                 

                            <?php       }

                            }

                        ?>    
                    </h3>
                </div>
            </div>
        </div>
    </main>
</body>
</html>