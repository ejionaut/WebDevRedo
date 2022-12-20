<?php
include "config.php";
$quiz_code = $_GET['id'];
$query = "DELETE FROM `quiz_list` WHERE `quiz_code` = '$quiz_code'";
$query2 = "DELETE FROM `quiz_inventory` WHERE `quiz_code` = '$quiz_code'";

if($connection->query($query) === TRUE){
	$connection->query($query2);
	header('Location: teacherQuizzes.php');
}

?>