const express = require("express")
const router = express.Router()

const { listStudents } = require("../public/js/listStudents")

router.get("/student_list", listStudents)

module.exports = router