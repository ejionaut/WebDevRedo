// import dependencies
const express = require("express")
const path = require("path")
const cors = require("cors")

// import routes
const homeRoute = require("./routes/homeRoute")
const slRoute = require("./routes/studListRoute")

// express set-up
const app = express()
app.set("view engine", "ejs")
app.use(express.urlencoded({ extended: false }))
app.use(express.static(path.join(__dirname, "public")))
app.use(cors())
app.use(express.json())

// app.use(ROUTES HERE)
app.use(homeRoute)
app.use(slRoute)

app.get("/", (req, res) => {
    res.redirect("/home")
})

app.listen(3002, '0.0.0.0', () => {
    console.log("Server for Admin listening at port 3002")
})