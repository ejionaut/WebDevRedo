<?php
include "config.php";

$dropdown = $_POST['dropdown'];

$sql = "SELECT * FROM `quiz_list` WHERE `quiz_set` LIKE 'nmqs%'";

$result = mysqli_query($connection, $sql);
?>












