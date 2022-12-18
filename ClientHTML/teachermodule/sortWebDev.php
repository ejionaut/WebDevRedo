<?php
    include "config.php";

    $sql = "SELECT * FROM `quiz_list` WHERE subject_code = 'wd'";

    $result = $connection->query($sql);
?>



