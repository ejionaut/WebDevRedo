<?php 

include "config.php";

  if (isset($_POST['submit'])) {

    $quiz_set = $_POST['quiz_set'];
    $type_of_quiz = $_POST['type_of_quiz'];
    $question = $_POST['question'];
    $choices = $_POST['choices'];
    $answer = $_POST['answer'];
    $points = $_POST['points'];

    $sqlUpdate = "INSERT INTO `quiz_inventory`(`quiz_set`,`type_of_quiz`, `question`, `choices`, `answer`, `points`) 
    VALUES ('$quiz_set', '$type_of_quiz', '$question','$choices', '$answer', '$points')
    WHERE `question` = '$question'";



    $sqlUpdateResult =  $connection->query($sqlUpdate);

  

    if ($sqlCreateResult == TRUE) {

      echo "New record created successfully.";

    }else{

      echo "Error:". $sql . "<br>". $connection->error;

    } 

    $connection->close(); 

  }

  if (isset($_GET['question'])) {

    $question = $_GET['question']; 

    $sql = "SELECT * FROM `quiz_inventory` WHERE `question`='$question'";

    $sqlUpdateresult = $connection->query($sqlUpdate); 

    if ($sqlUpdateResult->num_rows > 0) {        

        while ($row = $result->fetch_assoc()) {

                $quiz_set = $row['quiz_set'];
                $type_of_quiz = $row['type_of_quiz'];
                $question = $row['question'];
                $choices = $row['choices'];
                $answer = $row['answer'];
                $points = $row['points'];

        } 

    ?>
                <h2>Question Update Form</h2>

        <form action="" method="POST">

        <fieldset>

            <legend>Question:</legend>

            Type of Subject:<br>

            <input type="text" name="quiz_set" value="<?php echo $quiz_set; ?>">

            <br>

            Type of Quiz:<br>

            <input type="text" name="type_of_quiz" value="<?php echo $type_of_quiz; ?>">

            <br>

            Question:<br>

            <input type="text" name="question" value="<?php echo $question; ?>">

            <br>

            Choices:<br>

            <input type="text" name="choices" value="<?php echo $choices; ?>">

            <br>

            Answer:<br>

            <input type="text" name="answer" value="<?php echo $answer; ?>">

            <br>
            
            Points:<br>

            <input type="text" name="points" value="<?php echo $points; ?>">

            <br>

            <br><br>

            <input type="submit" value="Update" name="update">

        </fieldset>

    </form> 

        </body>

        </html> 


        <?php
    }else {
        header('Location: teacherCreateQuiz.php');
    } 

 }
        ?>