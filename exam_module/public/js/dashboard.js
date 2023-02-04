const db = require("./db")
const { result } = require("./quiz")

var availQuizzes = []
var history = []
var studName = ""

const studDashboard = (async (req, res) => {
    if(req.session.loggedIn){
        await getHistory(req.session.userid)
            .then((historyData) => {
                populateHistory(historyData)
            })
            .catch((err) => {
                console.log(err)
            })
        await getAvailQuizzes()
            .then((quizData) => {
                populateAvailQuizzes(quizData)
            })
            .catch((err) => {
                console.log(err)
            })
        await getName(req.session.userid)
            .then((name) => {
                if(studName.length){
                    studName = ""
                }
                studName = name
            })
            .catch((err) => {
                console.log(err)
            })
        res.render("dashboard", {
            availQuizzes: availQuizzes,
            studentName: studName,
            studentHistory: history
        })
        }else{
        res.redirect("/login")
    }
})

// <<<*** FUNCTION/METHOD HELPERS ***>>>

// Gets the available quizzes for the student
function getAvailQuizzes(){
    const promise = new Promise((resolve, reject) => {
        const q = "SELECT quiz_code, q_name FROM quiz_list WHERE q_display_setting = \"listed\""

        db.query(q, (err, result) => {
            result = JSON.parse(JSON.stringify(result))

            resolve(result)
            reject(err)
        })
    })
    return promise
}

// Gets the history of the students quizzes
function getHistory(userid){
    const promise = new Promise((resolve, reject) => {
        const q = "SELECT quiz_code, score FROM student_quiz WHERE user_id = ?"

        db.query(q, [userid], (err, result) => {
            if(result.length){
                result = JSON.parse(JSON.stringify(result))
            }else{
                result = [{
                    quiz_code: 0,
                    quiz_name: "No history yet"
                }]
            }
            resolve(result)
            reject(err)
        })
    })
    return promise
}

// Populates the availQuizzes variable with the available quizzes
// disregarding the ones that the students already taken
async function populateAvailQuizzes(quizData){
    if(availQuizzes.length){
        availQuizzes = []
    }
    let quizHistory = history.map(quiz => quiz.quiz_name)
    availQuizzes = quizData.filter(quiz => {
        if(! quizHistory.includes(quiz.q_name))
            return quiz
    })
}

// Populates the history variable with the history of quizzes of the student
function populateHistory(historyData){
    if(history.length){
        history = []
    }

    if(historyData[0].quiz_code == 0){
        history.push({
            quiz_code: historyData[0].quiz_code,
            quiz_name: historyData[0].quiz_name
        })
    }else{
        historyData.forEach(async(datum) => {
            let quiz_name
            let over
    
            getQuizName(datum.quiz_code)
                .then((data) => {
                    quiz_name = data
            });
            await getOverAll(datum.quiz_code)
                .then((data) => {
                    over = data
    
            });
            history.push({
                quiz_code: datum.quiz_code,
                score: datum.score,
                quiz_name: quiz_name,
                over: over
            })
        })
    }
}

// Gets the name of the logged in user
function getName(userid){
    const promise = new Promise((resolve, reject) => {
        const q = "SELECT last_name, first_name FROM students WHERE user_id = ?"
    
        db.query(q, [userid], (err, result) => {
            result = JSON.parse(JSON.stringify(result))[0]
            resolve(`${result.first_name} ${result.last_name}`)
            reject(err)
        })
    })
    return promise
}

// Fetches and returns the quiz name of a given quiz code (q_code)
function getQuizName(q_code){
    const promise = new Promise((resolve, reject) => {
        const q = "SELECT q_name FROM quiz_list WHERE quiz_code = ?"

        db.query(q, [q_code], (err, result) => {
            result = JSON.parse(JSON.stringify(result))[0]
            resolve(result.q_name)
            reject(err)
        })
    })
    return promise
}

// Fetches and returns the perfect score of a given quiz code (q_code)
function getOverAll(q_code){
    const promise = new Promise((resolve, reject) => {
        const q = "SELECT SUM(points) AS tot_score FROM quiz_inventory WHERE quiz_code = ?"

        db.query(q, [q_code], (err, result) => {
            result = JSON.parse(JSON.stringify(result))[0]
            resolve(result.tot_score)
            reject(err)
        })
    })
    return promise
}

module.exports = {
    studDashboard: studDashboard
}