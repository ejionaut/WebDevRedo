//import dependencies
const express = require("express")
const path = require("path")
const cors = require("cors")
const session = require("express-session")

// import routes
const authRoute = require("./routes/authRoute")
const examRoute = require("./routes/examRoute")

// express set-up
const app = express();
app.set("view engine", "ejs")
app.use(express.urlencoded({ extended: false }))
app.use(express.static(path.join(__dirname, "public")))
app.use(cors());
app.use(express.json());
app.use(session({
    secret: "The secret",
    name: "sessionID",
    resave: false,
    saveUninitialized: false
}))

// express routes
app.use(authRoute)
app.use(examRoute)

app.get("/", (req, res) => {
    if(req.session.loggedIn){
        res.redirect("/dashboard")
    } else {
        res.redirect("/login")
    }
})

app.listen(3001, '192.168.137.1', () => {
    console.log("Server is running on port 3001.")
})