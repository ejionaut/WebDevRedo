<?php
    include "config.php";

    $sql = "SELECT * FROM `quiz_list` WHERE q_display_setting = 'listed'";

    $result = $connection->query($sql);
?>















