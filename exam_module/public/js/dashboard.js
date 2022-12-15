const db = require("./db")

var quizContainer = []
var history = []
var studName = ""

const studDashboard = ((req, res) => {
    if(req.session.loggedIn){
        const q = "SELECT q_name FROM quiz_list WHERE q_display_setting = \"listed\""

        db.query(q, (err, result) => {
            result = JSON.parse(JSON.stringify(result))

            getHistory(req.session.userid)
                .then((data) => {
                    populateHistory(data)
                })
            populateQuizzes(result)
            getName(req.session.userid)
                .then( (data) => {
                    studName = data
                    return [quizContainer, studName]
                })
                .then( (data) => {
                    res.render("dashboard", {
                        availQuizzes: data[0],
                        studentName: data[1],
                        studentHistory: history
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

function populateHistory(data){
    if(history.length){
        history = []
    }
    data.forEach((datum) => {
        history.push(datum)
    })
}

// Gets the name of the logged in user
function getName(userid){
    const promise = new Promise((resolve, reject) => {
        const q = "SELECT lastname, firstname FROM student WHERE user_id = ?"
    
        db.query(q, [userid], (err, result) => {
            result = JSON.parse(JSON.stringify(result))[0]
            resolve(`${result.firstname} ${result.lastname}`)
            reject(err)
        })
    })
    return promise
}

// Gets the history of quizzes
function getHistory(userid){
    const promise = new Promise((resolve, reject) => {
        const q = "SELECT quiz_code, score FROM student_quiz WHERE user_id = ?"

        db.query(q, [userid], (err, result) => {
            result = JSON.parse(JSON.stringify(result))

            resolve(result)
            reject(err)
        })
    })
    return promise
}

function getQuizName(q_code){
    const promise = new Promise((resolve, reject) =>{
        const q = "SELECT q_name FROM quiz_list WHERE quiz_code = ?"

        db.query(q, [q_code], (err, result) => {
            result = JSON.parse(JSON.stringify(result))
            resolve(result)
            reject(err)
        })
    })
    return promise
}

function getOverAll(q_code){
    const promise = new Promise((resolve, reject) => {
        const q = "SELECT SUM(points) AS \"tot_score\" FROM quiz_inventory WHERE quiz_set=?"

        db.query(q, [q_code], (err, result) => {
            result = JSON.parse(JSON.stringify(result))
            resolve(result)
            reject(err)
        })
    })
    return promise
}

module.exports = {
    studDashboard: studDashboard
}