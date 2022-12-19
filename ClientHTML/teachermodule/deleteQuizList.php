<?php
include "config.php";
$quiz_code = $_GET['id'];
$query = "DELETE FROM `quiz_list` WHERE `quiz_code` = '$quiz_code'";

if($connection->query($query) === TRUE){
	header('Location: teacherQuizzes.php');
}

header('location: teacherQuizzes.php')
?>