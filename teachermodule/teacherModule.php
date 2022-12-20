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

    <link rel="stylesheet" href="./styles/teacherModule.css" v=<?php echo time(); ?>>
    <link rel="stylesheet" href="./styles/teacherQuizzes.css" v=<?php echo time(); ?>>
    <title>Teacher Module</title>
</head>
<body>
    <header>
        <img src="./styles/images/logo_square.png" alt="">
        <ul>
            <li><a href="#home">Home</a></li>
            <li><a href="#quizzes">Quizzes</a></li>
        </ul>
    </header>

    <main>
        <div>
            <div class="mainStatBox">
                <div class="noStudents">
                    <h2> Number of Students </h2>
                        <h1 class="numberStudents">
                        <?php
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
                        </h1>
                </div>
                <diV class="noQuizzes">
                    <h2> Number of Quizzes </h2>
                        <h1 class="numberStundets">
                            <?php
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
                            ?>
                        </h1>
                    </diV>
                <diV class="noCQuizzes">
                    <h2> Number of Completed Quizzes </h2>
                        <h1 class="numberStundets"> 
                            <?php
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
                            ?>
                        </h1>
                </diV>
            </div>
        </div>
        <div class="statboxStudents" id="home">
            <h2> Students </h2>
                <div class="listOfStudents">
                    <h2> 
                        mark spenser
                    </h2>
                </div>
        </div>

            <div class="Head" id="quizzes">
                <h1> Quizzes </h1>
                <form name="form" id="form">
                    <label id="sortLabel" class="sort" for="dropdown"> Sort by: </label>
                    <select name="dropdown">
                        <option value="dateCreated" selected> Date Created </option>
                        <option value="listed" > Listed </option>
                        <option value="unlisted" > Unlisted </option>
                        <option value="subjectNum" > Subject: Numerical Methods </option>
                        <option value="subjectTech" > Subject: Tech Press </option>
                        <option value="subjectPer" > Subject: Personality Dev </option>
                        <option value="subjectApp" > Subject: Application </option>
                        <option value="subjectWeb" > Subject: Web Dev </option>
                        <option value="subjectSoft" > Subject: Soft Eng </option>
                    </select>
                    <button type="submit" id="submitSort"> Sort </button>
                </form>
            </div>
            <div class="QuizList">
                    <?php
                        include "sortAlgo.php";
                    ?>
                <form action="teacherCreateQuiz.php" method="POST">
                    <button class="createQuiz"> Create Quiz </button>
                </form>
            </div>
    </main>
</body>
</html>