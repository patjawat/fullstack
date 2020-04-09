const environment = process.env.NODE_ENV ||  'production'
const config = require('./knexfile')
const environmentConfig = config[environment]
const knex = require('knex');
const connection = knex(environmentConfig)
module.exports = connection;