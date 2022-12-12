const express = require("express")
const router = express.Router()

const { studDashboard } = require("../public/js/dashboard")
const { postQuiz, generateQuizPage } = require("../public/js/quiz")

//routes for student
router.get("/dashboard", studDashboard)
router.post("/take_quiz", postQuiz)
router.get("/take_quiz", generateQuizPage)

module.exports = router