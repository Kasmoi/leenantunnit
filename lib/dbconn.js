var mysql        = require('mysql'); 

var connection   = mysql.createConnection({ 
  supportBigNumbers: true, 
  bigNumberStrings: true, 
  host     : "magnesium", 
  user     : "16bkasmirm", 
  password : "salasana", 
  database : "db16bkasmirm" 
}); 

module.exports = connection;