function showQuestions() {
    if(document.getElementById("quizQuestions").innerHTML = "") {
        document.getElementById("quizQuestions").innerHTML = `<?php
        include "cQuestion.php";

        if ($quizQuestionsResults->num_rows > 0) {
            while ($row = $quizQuestionsResults->fetch_assoc()) {
                echo "<div><h4>" . $row['question'] . "</h4><div><button class='editQuestion' onclick='location.href='teacherEditQuestion.php'> edit </button><button class='deleteQuestion'> delete </button></div></div>";
            }
        } 
        ?>`;
    } else {
        
    }
    
}