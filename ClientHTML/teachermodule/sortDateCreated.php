<?php
    include "config.php";

    $sql = "SELECT * FROM `quiz_list` ORDER BY `quiz_list`.`start_quiz` ASC";

    $result = $connection->query($sql);
?>

















