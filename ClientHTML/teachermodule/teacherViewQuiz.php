<?php
    include "config.php";

    $quiz_code = "tp001a";

    $highestScoreName = "SELECT CONCAT(student.firstname, ' ', student.lastname) as fullname, student_quiz.score as score
    FROM student JOIN student_quiz on student.user_id = student_quiz.user_id
    WHERE score = (SELECT MAX(score) FROM `student_quiz` WHERE quiz_code = '$quiz_code')
    LIMIT 1";
    
    $highestScore = "SELECT CONCAT(student.firstname, ' ', student.lastname) as fullname, student_quiz.score as score
    FROM student JOIN student_quiz on student.user_id = student_quiz.user_id
    WHERE score = (SELECT MAX(score) FROM `student_quiz` WHERE quiz_code = '$quiz_code')
    LIMIT 1";

    $averageScore = "SELECT AVG(score) as average FROM student_quiz WHERE quiz_code ='$quiz_code'";

    $passed = "SELECT COUNT(CASE WHEN score >= 0.50 * (SELECT total_score FROM quiz_list WHERE quiz_code = '$quiz_code') THEN 1 END) as passed
    FROM student JOIN student_quiz on student.user_id = student_quiz.user_id
    WHERE quiz_code ='$quiz_code'";

    $failed = "SELECT COUNT(CASE WHEN score < 0.50 * (SELECT total_score FROM quiz_list WHERE quiz_code = '$quiz_code') THEN 1 END) as failed
    FROM student JOIN student_quiz on student.user_id = student_quiz.user_id
    WHERE quiz_code ='$quiz_code'";

    $over = "SELECT total_Score from quiz_list
    WHERE quiz_code = '$quiz_code'";

    $studentsName = "SELECT CONCAT(firstname,' ',lastname) as fullname FROM student JOIN student_quiz on student.user_id = student_quiz.user_id WHERE quiz_code ='$quiz_code'";

    $missed = "SELECT (SELECT COUNT(*) FROM student) - (SELECT COUNT(*) FROM student JOIN student_quiz on student.user_id = student_quiz.user_id WHERE quiz_code = '$quiz_code') as total_studentsMissed";

    $passedResult = $connection->query($passed);
    $failedResult = $connection->query($failed);
    $overResult = $connection->query($over);
    $highestScoreNameResult = $connection->query($highestScoreName);
    $highestScoreResult = $connection->query($highestScoreName);
    $averageScoreResult = $connection->query($averageScore);
    $studentsNameResult = $connection->query($studentsName);
    $missedResult = $connection->query($missed);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/teacherViewQuiz.css">
    <title>View Quiz Details</title>
</head>
<body>
    <header>
        <h2> View Quiz </h2>
    </header>
    <main>
        <div>
            <h1 class="subject"> Numerical Methods </h1>
            <h2 class="quizTitle"> Prelims Quiz 2 </h2>
        </div>
        <div>
            <section-left>
                <h3> Students Completed </h3>
                <div class="studentQuizzes">
                    <?php
                        if ($studentsNameResult->num_rows > 0) {
                            while ($row = $studentsNameResult->fetch_assoc()) {
                                echo "<div><h4>" . $row['fullname'] . "</h4><br><button class='viewStudentQuiz'> View </button></div>";         
                            }
                        }
                    ?>

                </div>
            </section-left>
            <section-right>
                <div>
                    <h3> Highest Score </h3>
                    <div>
                        <h3> 
                            <?php
                                if ($highestScoreNameResult) {
                                    
                                    $row = mysqli_fetch_assoc($highestScoreNameResult);
                                    $highestScore = $row['fullname'];
                                
                                    echo $highestScore;
                                } else {
                                    echo "Error: " . $sql . "<br>" . mysqli_error($connection);
                                }
                            ?> 
                        </h3>
                        <h3> 
                            <?php
                                if ($highestScoreResult) {

                                    $row = mysqli_fetch_assoc($highestScoreResult);
                                    $highestScore = $row['score'];
                                
                                    echo $highestScore . " /";
                                } else {
                                    echo "Error: " . $sql . "<br>" . mysqli_error($connection);
                                }
                            ?>  

                            <?php
                                if ($overResult) {
                                    
                                    $row = mysqli_fetch_assoc($overResult);
                                    $over = $row['total_Score'];
                                
                                    echo $over;
                                } else {
                                    echo "Error: " . $sql . "<br>" . mysqli_error($connection);
                                }
                            ?> 
                        </h3>
                    </div>
                </div>
                <div>
                    <div>
                        <h3> Average Score <br>
                            <?php
                                if ($averageScoreResult) {
                                    
                                    $row = mysqli_fetch_assoc($averageScoreResult);
                                    $averageScore= $row['average'];
                                
                                    echo $averageScore;
                                } else {
                                    echo "Error: " . $sql . "<br>" . mysqli_error($connection);
                                }
                            ?>
                        </h3>
                        <div class="AverageScoreGraph">
        
                        </div>
                    </div>
                    <div>
                        
                    </div>
                    <div>
                        <h3> Passed vs Failed <br>
                            <?php
                                if ($passedResult) {
                                    
                                    $row = mysqli_fetch_assoc($passedResult);
                                    $passed = $row['passed'];
                                
                                    echo $passed . " :";
                                } else {
                                    echo "Error: " . $sql . "<br>" . mysqli_error($connection);
                                }
                            ?> 

                                <?php
                                    if ($failedResult) {
                                        
                                        $row = mysqli_fetch_assoc($failedResult);
                                        $failed = $row['failed'];
                                    
                                        echo $failed;
                                    } else {
                                        echo "Error: " . $sql . "<br>" . mysqli_error($connection);
                                    }
                                ?>
                        
                    
                        </h3>
                        <div class="AveragePassVsFail">
        
                        </div>
                    </div>
                </div>
                <div>
                    <div>
                        <h3> Students Missed </h3>
                        <h2 class="missedStudents">
                            <?php
                                if ($missedResult) {
                                        
                                    $row = mysqli_fetch_assoc($missedResult);
                                    $missed= $row['total_students_missed'];

                                    echo $missed;
                                } else {
                                    echo "Error: " . $sql . "<br>" . mysqli_error($connection);
                                }
                            ?>
                        </h2>
                    </div>
                    <div>
                        <h3> Students Completed </h3>
                        <h2 class="missedStudents"> 22 </h2>
                    </div>
                    <div>
                        <h3> Late Submissions </h3>
                        <h2 class="missedStudents"> 8 </h2>
                    </div>
                </div>
            </section-right>
        </div>
        <button class="returnBTN"> Return </button>
    </main>
</body>
</html>