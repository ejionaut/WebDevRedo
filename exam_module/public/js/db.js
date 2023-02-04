const mysql = require("mysql")

const db = mysql.createConnection({
    user: 'root',
    host: 'localhost',
    password: '',
    database: 'maindatabase4'
})

module.exports = db