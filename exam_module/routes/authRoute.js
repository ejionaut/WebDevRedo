const express = require("express")
const router = express.Router()

const { auth, login, logout } = require("../public/js/auth")

//routes for authorization
router.post("/login", auth)
router.get("/login", login)
router.post("/logout", logout)

module.exports = router