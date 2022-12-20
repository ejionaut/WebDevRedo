const db = require("./db")

const listStudents = (async(req, res) => {
    await getStudentList()
        .then(students => {
            // console.log(students)
            res.render("studentList", {
                student_list: students
            })
        })
})

function getStudentList(){
    const promise = new Promise((resolve, reject) => {
        const q = "SELECT user_id, CONCAT(firstname, \" \", lastname) AS name FROM student"

        db.query(q, (err, result) => {
            result = JSON.parse(JSON.stringify(result))[0]
            
            console.log(result)
            resolve(result)
            reject(err)
        })
    })
    return promise
}

module.exports = {
    listStudents: listStudents
}