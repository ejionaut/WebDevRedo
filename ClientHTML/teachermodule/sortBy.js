function sortBy(that) {
    const content = document.getElementById("quizzes").innerHTML;
    if (that.value == "subjectNum") {
        document.getElementById("quizzes").innerHTML = `<?php include "sortNumericalMethods.php"?>` + content;
    }
}