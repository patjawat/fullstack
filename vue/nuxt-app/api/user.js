require('rootpath')();
const express = require('express');
const app = express();
const cors = require('cors');
const bodyParser = require('body-parser');
const jwt = require('./_helpers/jwt');
const errorHandler = require('./_helpers/error-handler');

app.use(bodyParser.urlencoded({ extended: false }));
app.use(bodyParser.json());
app.use(cors());


// use JWT auth to secure the api
app.use(jwt());

// api routes
app.use('/users', require('./users/users.controller'));

// global error handler
app.use(errorHandler);

app.get('/', (req, res) => {
  res.json({ it: 'works!' })
})
app.get('/aa', (req, res) => {
  res.json({ it: 'aaaaa' })
})

module.exports = {
   path: '/api',
   handler: app,
//    handler: serveStatic(__dirname + '/api/file')
}