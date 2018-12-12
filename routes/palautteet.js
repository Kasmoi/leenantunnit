var express = require('express');  
var router = express.Router();  
var Task = require('../models/Palaute');
var task_controller = require('../controllers/palauteController');   
router.get('/:id?', function(req, res, next) {  
if (req.params.id) {  
Task.getPalauteById(req.params.id, function(err, rows) {  
if (err) {  
res.json(err);  
} else {  
res.json(rows);  
}  
});  
} else {  
Task.getAllPalautteet(function(err, rows) {  
if (err) {  
res.json(err);  
} else {  
res.json(rows);  
}  
});  
}  
});  

router.post('/', function(req, res, next) {  
Task.addPalaute(req.body, function(err, count) {  
if (err) {  
res.json(err);  
} else {  
res.json(req.body); //or return count for 1 & 0  
}  
});  
});  

router.delete('/:id', function(req, res, next) {  
Palaute.deletePalaute(req.params.id, function(err, count) {  
if (err) {  
res.json(err);  
} else {  
res.json(count);  
}  
});  
});  
/*
router.put('/:id', function(req, res, next) {  
Task.updateTask(req.params.id, req.body, function(err, rows) {  
if (err) {  
res.json(err);  
} else {  
res.json(rows);  
}  
});  
});
*/
/* GET user information after login 

function isAuthenticated(req, res, next) { 
  if (req.session.user) 
      return next(); 
  res.redirect('/signin'); 
} 

router.get('/',isAuthenticated, task_controller.task_list);     
router.get('/:id',isAuthenticated, task_controller.task_details);
module.exports = router; 
*/