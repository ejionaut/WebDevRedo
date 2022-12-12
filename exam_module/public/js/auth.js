const db = require("./db")

const auth = ((req, res) => {
    if(req.session.loggedIn){
        res.redirect("/dashboard")
    }else{
        const q = "SELECT * FROM accounts WHERE user_id = ? AND password = ?"
    
        db.query(q, [req.body.userid, req.body.password], (error, result) => {
            if(error) throw error
            if(result.length){
                req.session.userid = req.body.userid
                req.session.loggedIn = true
                res.redirect("/dashboard")
            }else{
                res.render("login", {errMessage: "Incorrect user ID or password"})
            }
        })
    }
})

const login = ((req, res)=> {
    res.header('Cache-Control', 'no-cache, private, no-store, must-revalidate, max-stale=0, post-check=0, pre-check=0')
    if(req.session.loggedIn){
        res.redirect("/dashboard")
    }else{
        res.render("login", {errMessage: ""})
    }
})

const logout = ((req, res) => {

})

module.exports = {
    auth: auth,
    login: login,
    logout: logout
}