<?php
    include "config.php";

    $sql = "SELECT * FROM `quiz_list` WHERE subject_code = 'tp'";

    $result = $connection->query($sql);
?>


