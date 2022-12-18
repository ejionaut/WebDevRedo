function sortBy(that) {
    if (that.value == "subjectNum") {
        document.getElementById("quizzes").innerHTML = `<?php
            $givenQuizSet = "nmqs%";
            $quiz = "SELECT * FROM 'quiz_list' WHERE 'quiz_set' LIKE '$givenQuizSet'";
            $quizResults = $connection->query($quiz);

            if ($quizResults->num_rows > 0) {
                while ($row = $quizResults->fetch_assoc()) {
                    echo "<div class='left_Section'>";
                    echo "<h2 class='Subject'>" . $row['q_name'] . "</h2>";
                    echo "<h3 class='Quiz_title'>" . $row['q_name'] . "</h3>";
                    echo "<div class='date'>";
                    echo "<h3 class='datePosted'> Date Posted: " . $row['start_quiz'] . "</h2>";
                    echo "<h3 class='dateQuiz'> Date Due: " . $row['end_quiz'] . "</h2>";
                    echo "</div>";
                    echo "<div class='right_Section'>";
                    echo "<button class='listUnlist'> Unlist </button>";
                    echo "<button class='View'> View </button>";
                    echo "<button class='Edit'> Edit </button>";
                    echo "</div>";
                }
            }
        ?>`;
    }
}