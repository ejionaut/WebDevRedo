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
                console.log(data)
            })
        
    }else{
        res.redirect("/login")
    }
})

function getQuestionnaires(){
    const promise = new Promise((resolve, reject) => {
        const q = "SELECT * FROM quiz_inventory WHERE quiz_set = " +
        "(SELECT quiz_set FROM quiz_list WHERE q_name = ?)"
    
        db.query(q, [chosenQuiz], (err, result) => {
            result = JSON.parse(JSON.stringify(result))
            resolve(result)
            reject(err)
        })
    })
    return promise
}

function saveAnswers(userid, answers){
    const q = "INSERT INTO "
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

module.exports = {
    postQuiz: postQuiz,
    generateQuizPage: generateQuizPage,
    result: result
}