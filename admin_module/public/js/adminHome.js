const db = require("./db")

const showAdminHome = ((req,res) => {
    getQuizTotalScore()
        .then(data => {
            // res.send(data)
            res.redirect("/student_list")
        })
        .catch(err => {
            console.log(err)
        })
    
})

function getQuizTotalScore(){
    const promise = new Promise((resolve, reject) => {
        const q = "SELECT * FROM quiz_tot_score_view"

        db.query(q, (err, result) => {
            result = JSON.parse(JSON.stringify(result))
            resolve(result)
            reject(err)
        })
    })
    return promise
}

module.exports = {
    showAdminHome: showAdminHome
}

