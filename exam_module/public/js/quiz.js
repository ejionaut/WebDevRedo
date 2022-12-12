const db = require("./db")

var questionnaire = []
var chosenQuiz = ""

const postQuiz = ((req, res) => {
    if(req.session.loggedIn){
        chosenQuiz = req.body.quiz_name
        res.redirect("/take_quiz")
    }else{
        res.redirect("/login")
    }
})

const generateQuizPage = ((req, res) => {
    if(req.session.loggedIn){
        getQuestionnaires()
            .then((data) => {
                res.render("quiz", {
                    quizData: data
                })
            })
    }else{
        res.redirect("/login")
    }
})

function getQuestionnaires(){
    const promise = new Promise((resolve, reject) => {
        const q = "SELECT * FROM quiz_inventory WHERE quiz_set = " +
        "(SELECT quiz_set FROM quizzes WHERE q_name = ?)"
    
        db.query(q, [chosenQuiz], (err, result) => {
            result = JSON.parse(JSON.stringify(result))
            resolve(result)
            reject(err)
        })
    })
    return promise
}

module.exports = {
    postQuiz: postQuiz,
    generateQuizPage: generateQuizPage
}