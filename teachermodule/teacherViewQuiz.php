<?php
    include('./includes/viewQuizStaticData.php');
    
    $row = mysqli_fetch_assoc($passedResult);
    $passed = $row['passed'];

    $row = mysqli_fetch_assoc($failedResult);
    $failed = $row['failed'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <!--<meta http-equiv="Content-Type" content="text/html; charset=utf-8">-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/styles/teacherViewQuiz.css">
    <title>View Quiz Details</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {

            var data = google.visualization.arrayToDataTable([
            ['Result', 'Number Of Students'],
            ['Passed', <?php echo $passed?>],
            ['Failed', <?php echo $failed?>]
            ]);

            var options = {
                backgroundColor: 'transparent',
                title: 'Passed vs. Failed',
                width: 400,
                height: 240,
                title: 'Passed vs. Failed',
                colors: ['#618F51', '#B64A18'],
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

            chart.draw(data, options);
        }
    </script>
</head>
<body>
    <header>
        <h2> View Quiz </h2>
    </header>
    <main>
        <div>
            <h1 class="subject">  <?php echo $q_name?> </h1>
            <!--<h2 class="quizTitle"> <?php echo $q_name?> </h2>-->
        </div>
        <div>
            <section-left>
                <h3> Students Completed </h3>
                <div class="studentQuizzes">
                    <?php
                        $row2 = $overResult->fetch_assoc();
                        $total_score = $row2['total_score'];
                        if ($studentsNameResult->num_rows > 0) {
                            while ($row = $studentsNameResult->fetch_assoc()) {
                                $row1 = $studentsScoreResult->fetch_assoc();
                                echo "<div><h4>" . $row['fullname'] . "</h4><h4>". $row1['score']. "/". $total_score . "</h4></div>";         
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
                                if(mysqli_num_rows($highestScoreNameResult) == 0){
                                echo "No students have taken the quiz yet.";
                                } else if ($highestScoreNameResult > 0) {
                                    $row = mysqli_fetch_assoc($highestScoreNameResult);
                                    $highestScoreName = $row['fullname'];
                                
                                    echo $highestScoreName;
                                } else {
                                    echo "Error: " . $sql . "<br>" . mysqli_error($connection);
                                }
                            ?> 
                        </h3>
                        <h3> 
                            <?php
                                if ($highestScoreResult) {
                                        
                                    $row = mysqli_fetch_assoc($highestScoreResult);
                                    $highestScore = $row['highestScore'];
                                
                                    echo '<h3>Score: ' . $highestScore .'</h3>';
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
                            <div id="piechart" style="width: 900px; height: 500px;"></div>
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
                                    if ($studentsMissedResult) {
                                        
                                        $row = mysqli_fetch_assoc($studentsMissedResult);
                                        $studentsMissed= $row['students_Missed'];
                                    
                                        echo $studentsMissed;
                                    } else {
                                        echo "Error: " . $sql . "<br>" . mysqli_error($connection);
                                    }
                            ?>  
                        </h2>
                    </div>
                    <div>
                        <h3> No. of Students Completed </h3>
                        <h2 class="missedStudents">
                            <?php
                                if ($studentsCompleted) {
                                    
                                    $row = mysqli_fetch_assoc($studentsCompletedResult);
                                    $studentsCompleted= $row['students_Completed'];
                                
                                    echo $studentsCompleted;
                                } else {
                                    echo "Error: " . $sql . "<br>" . mysqli_error($connection);
                                }
                            ?>  
                        </h2>
                    </div>
                    <div>
                        <h3> Late Submissions </h3>
                        <h2 class="missedStudents">
                            <?php
                                if ($lateSubmissions) {
                                    
                                    $row = mysqli_fetch_assoc($lateSubmissionsResult);
                                    $lateSubmissions= $row['late_submissions'];
                                
                                    echo $lateSubmissions;
                                } else {
                                    echo "Error: " . $sql . "<br>" . mysqli_error($connection);
                                }
                            ?>  
                        </h2>
                    </div>
                </div>
            </section-right>
        </div>
        <button class="returnBTN" onclick="history.go(-1)"> Return </button>
    </main>
</body>
</html>
