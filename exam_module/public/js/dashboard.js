const db = require("./db")
const { result } = require("./quiz")

var availQuizzes = []
var history = []
var studName = ""

const studDashboard = (async (req, res) => {
    if(req.session.loggedIn){
        await getAvailQuizzes()
            .then((quizData) => {
                populateAvailQuizzes(quizData)
            })
            .catch((err) => {
                //console.log(err)
            })
        await getHistory(req.session.userid)
            .then((historyData) => {
                populateHistory(historyData)
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
                //console.log(err)
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
                console.log(result)
            }else{
                result = [{
                    quiz_code: "No history yet"
                }]
            }
            resolve(result)
            reject(err)
        })
    })
    return promise
}

// Populates the availQuizzes variable with the available quizzes
async function populateAvailQuizzes(quizData){
    if(availQuizzes.length){
        availQuizzes = []
    }
    await quizData.forEach(quiz => {
        availQuizzes.push(quiz)
    });
}

// Populates the history variable with the history of quizzes of the student
async function populateHistory(historyData){
    if(history.length){
        history = []
    }
    await historyData.forEach((datum) => {
        let quiz_name = getQuizName(datum.quiz_code).then(data => {return data})
        let over = getOverAll(datum.quiz_code).then(data => {return data})
        history.push({
            quiz_name: quiz_name,
            quiz_code: datum.quiz_code,
            score: datum.score,
            over: over
        })
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

// Fetches the quiz name of a given question code (q_code)
function fetchQuizName(q_code){
    const promise = new Promise((resolve, reject) =>{
        const q = "SELECT q_name FROM quiz_list WHERE quiz_code = ?"

        db.query(q, [q_code], (err, result) => {
            result = JSON.parse(JSON.stringify(result))[0]
            resolve(result.q_name)
            reject(err)
        })
    })
    return promise
}

// Returns the quiz name of a given question code (q_code)
async function getQuizName(q_code){
    await fetchQuizName(q_code)
        .then(data => {
            console.log(data)
            return data
        })
}

// Fetches the perfect score of a given question code (q_code)
function fetchOverAll(q_code){
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

// Returns the perfect score of a given question code (q_code)
async function getOverAll(q_code){
    await fetchOverAll(q_code)
        .then(data => {
            console.log(data)
            return data
        })
}

module.exports = {
    studDashboard: studDashboard
}