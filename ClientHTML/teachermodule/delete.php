<?php 

include "config.php"; 

if (isset($_GET['question'])) {

    $question = $_GET['question'];

    $deleteSql = "DELETE FROM `quiz_inventory` WHERE `question`='$question'";

     $deleteResult = $connection->query($deleteSql);

     if ($deleteResult == TRUE) {

        echo "Record deleted successfully.";

    }else{

        echo "Error:" . $sql . "<br>" . $connection->error;

    }

} 

?>