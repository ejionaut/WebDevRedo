<?php
    include "config.php";

    $dropdown = $_POST['dropdown'];

    $sql = "";

    if (isset($_GET['dropdown']) && $_GET['dropdown'] == 'dateCreated') {
        $sql = "SELECT * FROM `quiz_list` ORDER BY `quiz_list`.`start_quiz` ASC";

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
        $sql = "SELECT * FROM `quiz_list` ORDER by `subject_code` ASC";

    }

    $result = mysqli_query($connection, $sql);

    while ($row = $result->fetch_assoc()) {
        echo "<div class='left_Section'>";
        echo "<h2 class='Subject'>" . $row['q_name'] . "</h2>";
        echo "<h3 class='Quiz_title'>" . $row['q_name'] . "</h3>";
        echo "<div class='date'>";
        echo "<h3 class='datePosted'> Date Posted: " . $row['start_quiz'] . "</h2>";
        echo "<h3 class='dateQuiz'> Date Due: " . $row['end_quiz'] . "</h2>";
        echo "</div>";
        echo "<div class='right_Section'>";

        echo "<button class='listUnlist'> Unlist </button>";
        echo "<button class='View'> View </button>";
        echo "<button class='Edit'> Edit </button>";
        echo "</div>";
    }
?>