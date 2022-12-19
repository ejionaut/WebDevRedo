<?php
    session_start();

    include "config.php";

    $_SESSION['quiz_code'];

    $sql = "SELECT `question` FROM `quiz_inventory` WHERE `quiz_code` = '" . $_SESSION['quiz_code'] . "'";

    $result = mysqli_query($connection, $sql);

    while ($row = $result->fetch_assoc()) {
        echo `<div>
                <h4>`. $row['question'] . `</h4>
                <div>
                    <button class='editQuestion'><a href='teacherEditQuestion.php?question='`. $row['question'] . `> edit </a></button>
                    <button class='deleteQuestion'> delete </button>
                </div>
            </div>`;
    }
?>