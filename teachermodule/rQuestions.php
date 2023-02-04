<?php
    include "config.php";

    $_SESSION['quiz_code'];

    $sql = "SELECT `question` FROM `quiz_inventory` WHERE `quiz_code` = '" . $_SESSION['quiz_code'] . "'";

    $result = mysqli_query($connection, $sql);

    while ($row = $result->fetch_assoc()) {
        echo "<div>";
        echo "<h4>". $row['question'] . "</h4>";
        echo "<div>";
        echo "<button class='editQuestion'><a href='teacherEditQuestion.php?quiz_code=" . $_SESSION['quiz_code'] . "&question=". $row['question'] . "'> edit </a></button>";
        echo "<button class='Delete'><a onClick=\"javascript: return confirm('Are you sure you want to delete?');\" href='dQuestion.php?quiz_code=" . $_SESSION['quiz_code'] . "&question=" . $row['question'] . "'>delete</a></button>";
        echo "</div>";
        echo "</div>";
    }

?>