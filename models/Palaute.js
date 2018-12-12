var db = require('../lib/dbconn'); //reference of dbconnection.js 

var Task = { 
    getAllPalautteet: function(callback) { 
    return db.query("select * from task", callback); 
  }, 
  getPalauteById: function(id, callback) { 
    return db.query("select * from task where id=?", [id], callback); 
  }, 
  addPalaute: function(Task, callback) { 
	return db.query("insert into task (id,title,status) values(NULL,?,?)", [Task.title, Task.status], callback); 
	}, 
  deletePalaute: function(id, callback) { 
    return db.query("delete from task where id=?", [id], callback); 
  }, 
  
  
  /*
  updateTask: function(id, Task, callback) { 
    return db.query("update task set title=?,status=? where id=?", [Task.title, Task.status, id], callback); 
  } */
}; 
module.exports = Task;