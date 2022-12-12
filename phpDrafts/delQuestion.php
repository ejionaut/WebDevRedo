<?php 
    include "config.php"; 

    if (isset($_GET['question'])) {
        $question = $_GET['question'];

        $query = "DELETE FROM `quiz_inventory` WHERE `question`='$question'";
        
        $result = $conn->query($sql);

        if ($result == TRUE) {
            echo "Question deleted successfully.";
        }else{
            echo "Error:" . $sql . "<br>" . $conn->error;
        }
    } 
?>