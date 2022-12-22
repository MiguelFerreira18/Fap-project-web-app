const express = require("express");
const app = express();
const bodyParser = require("body-parser");
const mysql = require('mysql');
const { required } = require("nodemon/lib/config");
const cors = require("cors");


var db = mysql.createConnection({
    host: "localhost",
    user: "root",
    password: "",
    database: "fap"
});

app.use(cors());
app.use(express.json());
app.use(bodyParser.urlencoded({ extended: true }));

app.use('/app', function(req, res, next) {
    console.log("Authenticate and Redirect")
    res.redirect('http://localhost/fapprojvs3/client/index.php');
    next();
});
app.use('/team', function(req, res, next) {
    console.log("Authenticate and Redirect")
    res.redirect('http://localhost/fapprojvs3/client/programmers/programadores.html');
    next();
});
app.use('/project', function(req, res, next) {
    console.log("Authenticate and Redirect")
    res.redirect('http://localhost/fapprojvs3/client/relatorio/relatorio.html');
    next();
});


app.listen(3001, () => {
    console.log("server is running");
})