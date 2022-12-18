const db = require("./db")

var questionnaire = []
var chosenQuiz = []

const postQuiz = ((req, res) => {
    if(req.session.loggedIn){
        // chosenQuiz = req.body.quiz_name
        if(chosenQuiz.length){
            chosenQuiz = []
        }
        getQCode(req.body.quiz_name)
            .then((data) => {
                data = JSON.parse(JSON.stringify(data))
                // let quiz_code = data[0].quiz_code
                chosenQuiz.push(data[0].quiz_code, req.body.quiz_name)
            })

        res.redirect("/take_quiz")
    }else{
        res.redirect("/login")
    }
})

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

const result = ((req, res) => {
    if(req.session.loggedIn){
        checkAnswers(req.body)
            .then((data) => {
                saveResult(req.session.userid, data)
                res.redirect("/dashboard")
            })
    }else{
        res.redirect("/login")
    }
})

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
    const promise = new Promise((resolve, reject) => {
        const q = "INSERT INTO student_quiz (user_id, quiz_code, score) VALUES (?, ?, ?)"

        db.query(q, [userid, chosenQuiz[0], score])

    })
}

function saveAnswers(answerData){
    const promise = new Promise((resolve, reject) => {
        const q = "INSERT INTO student_quiz_answer ()"
    })
}

function checkAnswers(answers){
    const promise = new Promise((resolve, reject) => {
        var points = 0
        var ans = Object.values(answers)
        for(i = 0; i < questionnaire.length; i++){
            if(ans[i] === questionnaire[i].answer){
                points++
            }
        }
        resolve(points)
    })
    return promise
}

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

//function getStudentQuizCode()

module.exports = {
    postQuiz: postQuiz,
    generateQuizPage: generateQuizPage,
    result: result
}