<?php
    include "config.php";

    

    $sql = "";

    if (isset($_GET['dropdown']) && $_GET['dropdown'] == 'dateCreated') {
        $sql = "SELECT * FROM `quiz_list` ORDER BY `quiz_list`.`start_date` ASC";

    } elseif (isset($_GET['dropdown']) && $_GET['dropdown'] == 'listed') {
        $sql = "SELECT * FROM `quiz_list` WHERE `q_display_setting` = 'listed'";

    } elseif (isset($_GET['dropdown']) && $_GET['dropdown'] == 'unlisted'){
        $sql = "SELECT * FROM `quiz_list` WHERE `q_display_setting` = 'unlisted'";

    } elseif (isset($_GET['dropdown']) && $_GET['dropdown'] == 'subjectNum'){
        $sql = "SELECT * FROM `quiz_list` WHERE `quiz_code` LIKE 'nmqs%'";

    } elseif (isset($_GET['dropdown']) && $_GET['dropdown'] == 'subjectTech'){
        $sql = "SELECT * FROM `quiz_list` WHERE `quiz_code` LIKE 'tpqs%'";

    } elseif (isset($_GET['dropdown']) && $_GET['dropdown'] == 'subjectPer'){
        $sql = "SELECT * FROM `quiz_list` WHERE `quiz_code` LIKE 'pdqs%'";

    } elseif (isset($_GET['dropdown']) && $_GET['dropdown'] == 'subjectApp'){
        $sql = "SELECT * FROM `quiz_list` WHERE `quiz_code` LIKE 'adqs%'";

    } elseif (isset($_GET['dropdown']) && $_GET['dropdown'] == 'subjectWeb'){
        $sql = "SELECT * FROM `quiz_list` WHERE `quiz_code` LIKE 'wdqs%'";

    } elseif (isset($_GET['dropdown']) && $_GET['dropdown'] == 'subjectSoft'){
        $sql = "SELECT * FROM `quiz_list` WHERE `quiz_code` LIKE 'seqs%'";

    } else {
        $sql = "SELECT * FROM `quiz_list` ORDER by `q_name` ASC";

    }

    $result = mysqli_query($connection, $sql);

    while ($row = $result->fetch_assoc()) {
        $quiz_code_url = urlencode($row['q_name']);
        echo "<div class='quizzes' id='quizzes'>";
            echo "<div class='left_Section'>";
                echo "<h2 class='Subject'><a href='../teacherViewQuiz.php?quiz_code=" .$row['quiz_code']."&q_name=" . $quiz_code_url . "' style='text-decoration: none;'>" . $row['q_name'] . "</a></h2>";
                //echo "<h3 class='Quiz_title'>" . $row['q_name'] . "</h3>";
            echo "</div>";
            echo "<div class='date'>";
                echo "<h3 class='datePosted'> Date Posted: " . $row['start_date'] . "</h2>";
                echo "<h3 class='dateQuiz'> Date Due: " . $row['end_date'] . "</h2>";
            echo "</div>";
            echo "<div class='right_Section'>";

                if ($row['q_display_setting'] == "listed" || $row['q_display_setting'] == ""){
                    echo "<button class='list'><a href=./includes/unlist.php?quiz_code=" .$row['quiz_code']." style='text-decoration: none;'> Unlist </a></button>";
                    
                } else if($row['q_display_setting'] == "unlisted")
                    echo "<button class='unnlist'><a href=./includes/list.php?quiz_code=" .$row['quiz_code']." style='text-decoration: none;'> List </a></button>";

                echo "<button class='Manage'><a href=teacherManageQuestions.php?quiz_code=" . $row['quiz_code'] . " style='text-decoration: none; color: white;'> Manage </a></button>";
                echo "<button class='Edit'><a href=teacherEditQuiz.php?quiz_code=" . $row['quiz_code'] . " style='text-decoration: none; color: white;'>Edit</a></button>";

                echo "<button class='Delete'><a onClick=\"javascript: return confirm('Are you sure you want to delete?');\" href=./includes/deleteQuizList.php?quiz_code=" .$row['quiz_code']. " style='text-decoration: none; '> Delete </a></button>";
            echo "</div>";
        echo "</div>";
    }
    
?>
