<?php
include "config.php";
$quiz_code = $_GET['quiz_code'];
$query = "DELETE FROM `quiz_list` WHERE `quiz_code` = '$quiz_code'";
$query2 = "DELETE FROM `quiz_inventory` WHERE `quiz_code` = '$quiz_code'";

if($connection->query($query) === TRUE){
	echo "<script>confirm('Are you sure? Data will be deleted.')</script>";
	$connection->query($query2);
	header('Location: teacherModule.php');
}

?>