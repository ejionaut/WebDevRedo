//still needs fixing
SELECT CONCAT(firstname, ' ', lastname), score 
    FROM student JOIN student_quiz
    WHERE score = (SELECT MAX(score) FROM student_quiz WHERE quiz_code = "tp001a")