const express = require("express")
const router = express.Router()

const { showAdminHome } = require("../public/js/adminHome")

router.get("/home", showAdminHome)

module.exports = router