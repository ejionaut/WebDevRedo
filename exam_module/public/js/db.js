const mysql = require("mysql")

const db = mysql.createConnection({
    user: 'root',
    host: 'localhost',
    password: '',
    database: 'maindatabase'
})

module.exports = db