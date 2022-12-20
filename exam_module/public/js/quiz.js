const db = require("./db")

var questionnaire = []
var chosenQuiz = []

// Function for validating what questionnaire has been chosen
const postQuiz = ((req, res) => {
    if(req.session.loggedIn){
        // chosenQuiz = req.body.quiz_name
        if(chosenQuiz.length){
            chosenQuiz = []
        }
        getQCode(req.body.quiz_name)
            .then((data) => {
                data = JSON.parse(JSON.stringify(data))
                chosenQuiz.push(data[0].quiz_code, req.body.quiz_name)
            })

        res.redirect("/take_quiz")
    }else{
        res.redirect("/login")
    }
})

// Loads needed data in the generated quiz page
const generateQuizPage = ((req, res) => {
    if(req.session.loggedIn){
        getQuestionnaires()
            .then((data) => {
                if(questionnaire.length){
                    questionnaire = []
                }else{
                    data.forEach((element) => {
                        questionnaire.push({
                            type: element.type_of_quiz,
                            question: element.question,
                            answer: element.answer
                        })
                    })
                }
            
                res.render("quiz", {
                    quizData: data
                })
            })
    }else{
        res.redirect("/login")
    }
})

// Fetches the students answers
const result = ((req, res) => {
    if(req.session.loggedIn){
        checkAnswers(req.body)
            .then((data) => {
                console.log(req.body)
                saveResult(req.session.userid, data)
                res.redirect("/dashboard")
            })
    }else{
        res.redirect("/login")
    }
})

// Fetches the questionnaires
function getQuestionnaires(){
    const promise = new Promise((resolve, reject) => {
        const q = "SELECT * FROM quiz_inventory WHERE quiz_code = " +
        "(SELECT quiz_code FROM quiz_list WHERE q_name = ?)"
    
        db.query(q, [chosenQuiz[1]], (err, result) => {
            result = JSON.parse(JSON.stringify(result))
            resolve(result)
            reject(err)
        })
    })
    return promise
}

// Saves the result of a student's quiz and returns its sq_id
function saveResult(userid, score){
    const q = "INSERT INTO student_quiz (user_id, quiz_code, score) VALUES (?, ?, ?)"
    db.query(q, [userid, chosenQuiz[0], score])
}

// Saves student's answers
function saveAnswers(answerData){
    const promise = new Promise((resolve, reject) => {
        const q = "INSERT INTO student_quiz_answer ()"
    })
}

// Checks student's answers
function checkAnswers(answers){
    const promise = new Promise(async(resolve, reject) => {
        var points = 0
        var studAns = Object.values(answers)
        
        for(i = 0; i < questionnaire.length; i++){
            if(questionnaire[i].type === "enum"){
                let correctAnswer = questionnaire[i].answer.toLowerCase().split(",")
                let studentAnswer = studAns[i].toLowerCase().split(",")

                await checkEnum(correctAnswer, studentAnswer)
                    .then(enumScore => {
                        points = points + enumScore
                    })
            }
            if(studAns[i] === questionnaire[i].answer){
                points++
            }
        }
        resolve(points)
    })
    return promise
}

// Checks the enumeration part of the quiz
async function checkEnum(correctAnswer, studentAnswer){
    let score = 0
    await studentAnswer.forEach((answer) => {
        if(correctAnswer.includes(answer)){
            score++
        }
    })
    return score
}

// Fetches and returns the quiz code of a given quiz name
function getQCode(quiz_name){
    const promise = new Promise((resolve, reject) => {
        const q = "SELECT quiz_code FROM quiz_list WHERE q_name = ?"

        db.query(q, [quiz_name], (err, result) => {
            resolve(result)
            reject(err)
        })
    })
    return promise
}

module.exports = {
    postQuiz: postQuiz,
    generateQuizPage: generateQuizPage,
    result: result
}