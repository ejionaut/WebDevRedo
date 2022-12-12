const mysql = require("mysql")

const db = mysql.createConnection({
    user: 'root',
    host: 'localhost',
    password: '',
    database: 'nycto_db'
})

module.exports = db