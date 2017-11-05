var express = require('express');
var mysql = require('mysql');

var app = express();
var connection = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: '',
    database: 'node'
});

app.listen(1337);

app.use(function(req, resp, next) {
  resp.header("Access-Control-Allow-Origin", "*");
  // resp.header("Access-Control-Allow-Headers", "Origin, X-Requested-With, Content-Type, Accept");
  // resp.header("Access-Control-Allow-Methods", "GET");
  next();
});


app.get('/a548d15', function(req, resp, next){
  connection.query("SELECT * FROM usuario", function(err, row, fields){
      if(err)
        console.log(err);
      else{
        console.log(row);
        resp.send(row);
      }
  });

});

// connection.query("INSERT INTO usuario(nome) VALUES (?)", "ALINE", function(err, row, fields){
//     if(err)
//       console.log(err);
//     else
//       console.log('sucesso!');
// });

// connection.query("SELECT * FROM usuario", function(err, row, fields){
//     if(err)
//       console.log(err);
//     else
//       console.log(row);
// });

// connection.query("DELETE FROM usuario WHERE nome = ?", "ALINE", function(err, row, fields){
//     if(err)
//       console.log(err);
//     else
//       console.log(row);
// });
