var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  slides[slideIndex-1].style.display = "block";  
}

$('.buy-button').click(function() {
  // Проверяем, вошел ли пользователь в систему
  if (userIsLoggedIn()) {
      // Если пользователь вошел в систему, показываем всплывающее окно с сообщением о покупке
      alert('Товар куплен!');
  } else {
      // Если пользователь не вошел в систему, показываем всплывающее окно с предложением войти
      alert('Пожалуйста, войдите в систему, чтобы купить этот товар.');
  }
});

function userIsLoggedIn() {
  var mysql = require('mysql');
  var express = require('express');
  var session = require('express-session');
  var bodyParser = require('body-parser');
  var path = require('path');
  
  var connection = mysql.createConnection({
      host     : 'localhost',
      user     : 'root',
      password : '',
      database : 'register'
  });
  
  var app = express();
  app.use(session({
      secret: 'secret',
      resave: true,
      saveUninitialized: true
  }));
  app.use(bodyParser.urlencoded({extended : true}));
  app.use(bodyParser.json());
  
  app.post('/auth', function(request, response) {
      var username = request.body.username;
      var password = request.body.password;
      if (username && password) {
          connection.query('SELECT * FROM accounts WHERE username = ? AND pass = ?', [username, password], function(error, results, fields) {
              if (results.length > 0) {
                  request.session.loggedin = true;
                  request.session.username = username;
                  response.redirect('/home');
              } else {
                  response.send('Incorrect Username and/or Password!');
              }           
              response.end();
          });
      } else {
          response.send('Please enter Username and Password!');
          response.end();
      }
  });
  
  app.get('/home', function(request, response) {
      if (request.session.loggedin) {
          response.send('Welcome back, ' + request.session.username + '!');
      } else {
          response.send('Please login to view this page!');
      }
      response.end();
  });
  
  app.listen(3000);
}

var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}
document.getElementById("contact-form").addEventListener("submit", function (e) {
  e.preventDefault();
  const name = document.getElementById("name").value;
  const email = document.getElementById("email").value;
  const message = document.getElementById("message").value;
  console.log("Форма отправлена:", { name, email, message });
});
