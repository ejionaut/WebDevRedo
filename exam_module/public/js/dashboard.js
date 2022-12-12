const db = require("./db")

var quizContainer = []
var studName = ""

const studDashboard = ((req, res) => {
    if(req.session.loggedIn){
        const q = "SELECT q_name FROM quizzes WHERE q_display_setting = \"listed\""

        db.query(q, (err, result) => {
            result = JSON.parse(JSON.stringify(result))

            populateQuizzes(result)
            getName(req.session.userid)
                .then( (data) => {
                    studName = data
                    return [quizContainer, studName]
                })
                .then( (data) => {
                    res.render("dashboard", {
                        availQuizzes: data[0],
                        studentName: data[1]
                    })
                })
        })
    }else{
        res.redirect("/login")
    }
})

// <<<*** FUNCTION/METHOD HELPERS ***>>>

// Populates the quizContainer variable with the available quizzes
async function populateQuizzes(quizzes){
    if(quizContainer.length){
        quizContainer = []
    }
    await quizzes.forEach(quiz => {
        quizContainer.push(quiz)
    });
}

// Gets the name of the logged in user
function getName(userid){
    const promise = new Promise((resolve, reject) => {
        const q = "SELECT lastname, firstname FROM students WHERE user_id = ?"
    
        db.query(q, [userid], (err, result) => {
            result = JSON.parse(JSON.stringify(result))[0]
            resolve(`${result.firstname} ${result.lastname}`)
            reject(err)
        })
    })
    return promise
}

module.exports = {
    studDashboard: studDashboard
}