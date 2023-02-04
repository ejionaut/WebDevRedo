<?php
    include "config.php";

    $_SESSION['quiz_code'];

    $sql = "SELECT * FROM `quiz_inventory` WHERE `quiz_code` = '" . $_SESSION['quiz_code'] . "'";

    $result = mysqli_query($connection, $sql);

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['question'] . "</td>";
        echo "<td>" . $row['choices'] . "</td>";
        echo "<td>" . $row['answer'] . "</td>";
        echo "<td>" . $row['points'] . "</td>";
        echo "<td>";
        echo "<button class='editQuestion'><a href='teacherEditQuestion.php?quiz_code=" . $_SESSION['quiz_code'] . "&question=". $row['question'] . "'> edit </a></button>";
        echo "<button class='Delete'><a onClick=\"javascript: return confirm('Are you sure you want to delete?');\" href='dQuestion.php?quiz_code=" . $_SESSION['quiz_code'] . "&question=" . $row['question'] . "'>delete</a></button>";
        echo "</td>";
        echo "</tr>";
    }
?>