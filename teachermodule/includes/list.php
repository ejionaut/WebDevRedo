<?php

include "config.php";
  
    // Check if id is set or not if true toggle,
    // else simply go back to the page
    if (isset($_GET['quiz_code'])){
  
        // Store the value from get to a 
        // local variable "course_id"
        $quiz_code=$_GET['quiz_code'];
  
        // SQL query that sets the status
        // to 1 to indicate activation.
        $sql="UPDATE `quiz_list` SET 
             `q_display_setting`= 'listed' WHERE `quiz_code` ='$quiz_code'";
  
        // Execute the query
        mysqli_query($connection,$sql);

    }
  
    header('location: ../index.php');
?>