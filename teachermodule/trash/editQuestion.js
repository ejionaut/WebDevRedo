function editQuestion() {
    const question = document.getElementsByName("question");
    question.setAttribute("value", "<?php echo $question?>");
    const typeOfQuestion = document.getElementsByName("type_of_quiz");
    typeOfQuestion.setAttribute("value", "<?php echo $type_of_quiz?>");
    const answer = document.getElementsByName("answer");
    answer.setAttribute("value", "<?php echo $answer?>");
    const choices = document.getElementsByName("choices");
    choices.setAttribute("value", "<?php echo $choices?>");
    const points = document.getElementsByName("question");
    points.setAttribute("value", "<?php echo $points?>");
}