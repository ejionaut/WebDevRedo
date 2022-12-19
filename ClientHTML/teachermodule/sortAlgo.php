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
        echo "<div class='left_Section'>";
        echo "<h2 class='Subject'>" . $row['q_name'] . "</h2>";
        echo "<h3 class='Quiz_title'>" . $row['q_name'] . "</h3>";
        echo "<div class='date'>";
        echo "<h3 class='datePosted'> Date Posted: " . $row['start_date'] . "</h2>";
        echo "<h3 class='dateQuiz'> Date Due: " . $row['end_date'] . "</h2>";
        echo "</div>";
        echo "<div class='right_Section'>";

        if ($row['q_display_setting'] == "listed"){
            echo "<button class='listUnlist'><a href=unlist.php?id=" .$row['quiz_code']."> Listed </a></button>";
            
        } else if($row['q_display_setting'] == "unlisted")
            echo "<button class='listUnlist'><a href=list.php?id=" .$row['quiz_code']."> Unlisted </a></button>";
            
    
        echo "<button class='Manage'> Manage </button>";
        echo "<button class='Edit'><a href='teacherEditQuiz.php?id=" . $row['quiz_code'] . "' style='text-decoration: none; color: white;'>Edit</a></button>";


        echo "<button class='Delete'><a href=deleteQuizList.php?id=" .$row['quiz_code']. "> Delete </a></button>";
        echo "</div>";
    }
    
?>
